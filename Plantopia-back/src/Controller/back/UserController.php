<?php

namespace App\Controller\back;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Security\Voter\UserVoter;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('back/user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder, FileUploader $fileUploader): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        // dd($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $rawPassword = $request->request->get('user')['password']['first'];
            // dd($request);
            if (! empty($rawPassword))
            {
                // dd($rawPassword);
                // l'encoder
                $encodedPassword = $passwordEncoder->encodePassword($user, $rawPassword);
            
                // le renseigner dans l'objet
                $user->setPassword($encodedPassword);
            }

            $image = $form->get('avatar')->getData();
            $fileUploader->moveUserAvatar($image, $user);

            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('success', 'Nouvel utilisateur créé.');

            return $this->redirectToRoute('user_index');
        }

        return $this->render('back/user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user, UserRepository $userRepo): Response
    {   
        $userId = $user->getId();
        $plants = $userRepo->findPlantByUser($userId);
        $this->denyAccessUnlessGranted(UserVoter::USER_READ, $user);
        return $this->render('back/user/show.html.twig', [
            'user' => $user,
            'plants' => $plants
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user, FileUploader $fileUploader): Response
    {   
        $this->denyAccessUnlessGranted(UserVoter::USER_EDIT, $user);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();

            $image = $form->get('avatar')->getData();
            $fileUploader->moveUserAvatar($image, $user);

            $user->setUpdatedAt(new \DateTime());

            $entityManager->flush();
            $this->addFlash('success', 'Profil de l\'utilisateur modifié.');

            return $this->redirectToRoute('user_index');
        }

        return $this->render('back/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        $this->denyAccessUnlessGranted(UserVoter::USER_DELETE, $user);
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
            $this->addFlash('danger', 'Profil de l\'utilisateur supprimé.');
        }

        return $this->redirectToRoute('user_index');
    }
}

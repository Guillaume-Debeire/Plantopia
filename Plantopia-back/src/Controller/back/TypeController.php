<?php

namespace App\Controller\back;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type")
 */
class TypeController extends AbstractController
{
    /**
     * @Route("/", name="type_index", methods={"GET"})
     */
    public function index(TypeRepository $typeRepository): Response
    {
        return $this->render('back/type/index.html.twig', [
            'types' => $typeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $type = new Type();
        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($type);
            $entityManager->flush();
            $this->addFlash('success', 'Type de plante créé.');

            return $this->redirectToRoute('type_index');
        }

        return $this->render('back/type/new.html.twig', [
            'type' => $type,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_show", methods={"GET"})
     */
    public function show(Type $type): Response
    {
        return $this->render('back/type/show.html.twig', [
            'type' => $type,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Type $type): Response
    {
        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Type de plante modifié.');

            return $this->redirectToRoute('type_index');
        }

        return $this->render('back/type/edit.html.twig', [
            'type' => $type,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Type $type): Response
    {
        if ($this->isCsrfTokenValid('delete'.$type->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($type);
            $entityManager->flush();
            $this->addFlash('danger', 'Type de plante supprimé.');
        }

        return $this->redirectToRoute('type_index');
    }
}

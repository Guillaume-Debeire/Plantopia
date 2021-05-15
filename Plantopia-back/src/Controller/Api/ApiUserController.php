<?php

namespace App\Controller\Api;

use App\Entity\CalendarSchedule;
use App\Entity\Plant;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use App\Service\Slugger;
use DatePeriod;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\IsNull;

/**
 * @Route("/api/myaccount", name="api_myaccount_")
 */
class ApiUserController extends AbstractController
{
    /**
     * @Route("/browse", name="browse", methods="GET")
     */
    public function browse (userRepository $userRepo): Response
    {
        
        $users = $userRepo->findAll();
        //dd($users);
        return $this->json($users, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'calendarSchedule'
            ]
        ]);
    }

    /**
     * @Route("", name="read", methods="GET")
     */
    public function read (UserRepository $userRepo): Response
    {
        $user = $this->getUser();
        $userId = $user->getId();
        // dd($user);
        $plants = $userRepo->findPlantByUser($userId);
        $authUser = $this->getUser();
        if ($authUser == $user) {
            return $this->json([$user, $plants], 200, [], [
                AbstractNormalizer::IGNORED_ATTRIBUTES => [
                    'calendarSchedule'
                ]
            ]);
        }
        else return $this->json("Vous n'avez pas accès à cette ressource.");
        // $user = $this->getUser();
        
    }

    /**
     * @Route("", name="add", methods={"GET","POST"})
     */
    public function add (Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $em, FileUploader $fileUploader): Response
    {
        $userAsArray = json_decode($request->getContent(), true);

        $user = new User();
        $form = $this->createForm(UserType::class, $user, ['csrf_protection' => false]);
        // dd($userAsArray);
        $form->submit($userAsArray);
        // dd($form);
        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $plainPassword = $userAsArray['password']['first'];
            
            if (! empty($plainPassword))
            {   
                
                // l'encoder
                $encodedPassword = $passwordEncoder->encodePassword($user, $plainPassword);
                // le renseigner dans l'objet
                $user->setPassword($encodedPassword);
            }

            $image = $form->get('avatar')->getData();
            $fileUploader->moveUserAvatar($image, $user);
            $em->persist($user);
            $em->flush();
            
        }

        return $this->json($user, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'calendarSchedule'
            ]
        ]);
    }

     /**
     * @Route("/edit/{id}", name="edit", methods="PUT")
     */
    public function edit(Request $request, User $user, FileUploader $fileUploader, EntityManagerInterface $em, UserRepository $userRepo, UserPasswordEncoderInterface $passwordEncoder)
    {
        $form = $this->createForm(UserType::class, $user, ['csrf_protection' => false]);
        $userAsArray = json_decode($request->getContent(), true);
        $form->submit($userAsArray, $clearMissing = false);

        if ($form->isValid()) {
            // puisque l'image n'est pas mappé, il faut la traiter manuellement
            $plainPassword = $userAsArray['password']['first'];
            if (! empty($plainPassword))
            {   
                
                // l'encoder
                $encodedPassword = $passwordEncoder->encodePassword($user, $plainPassword);
                // le renseigner dans l'objet
                $user->setPassword($encodedPassword);
            }

            $avatar = $form->get('avatar')->getData();
            $fileUploader->moveUserAvatar($avatar, $user);

            $user->setUpdatedAt(new \DateTime());

            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Utilisateur modifié');
        }

        return $this->json($user, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'calendarSchedule'
            ]
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods="DELETE")
     */
    public function delete(User $user, EntityManagerInterface $em): Response
    {
        $em->remove($user);
        $em->flush();
        $this->addFlash("success", "L'utilisateur a été supprimé.");

        return $this->json("", 204);
    }
    
    /**
     * @Route("/watering", name="watering", methods="GET")
     */
    public function watering(Request $request, UserRepository $userRepo) 
    {
        $user = $this->getUser();
        $userId = $user->getId();
        
        $listeDateArrosage = [];

        $plants = $userRepo->findPlantByUser($userId);
        // dd($plants);
        
        foreach ($plants as $plant) {
            
            // dd($plant);
            $dateDeDebut = $plant["initialization_date"];
            $joursInterval = $plant["watering"];
            $titre = $plant['name'];
            // dd($joursInterval);

            // dd($plant);
            if (!is_null($joursInterval)) {
                
                $dateCalendrier = new DatePeriod($dateDeDebut, $joursInterval, 10);
                // dd($dateCalendrier);
                for ($date = 0; $date<10; $date++)
                    {
                        $tableauTemp = [
                            "title" => $titre,
                            "start" => $dateCalendrier->getStartDate(),
                            "intervalle" => $joursInterval
                        ];
                    }
                    // dd ($dateCalendrier);
                
                    
                
                // dd($tableauTemp);
                
                $listeDateArrosage[] = $tableauTemp;
            }
        }
        
        return $this->json($listeDateArrosage);
    }

    /**
     * @Route("/fertilization", name="fertilization", methods="GET")
     */
    public function fertilization(Request $request, UserRepository $userRepo) 
    {
        $user = $this->getUser();
        $userId = $user->getId();
        
        $listeDateFertilisation = [];

        $plants = $userRepo->findPlantByUser($userId);
        // dd($plants);
        foreach ($plants as $plant) {
            // dd($plant);
            $dateDeDebut = $plant["initialization_date"];
            $fertilizationMonth = $plant["fertilization"];
            $titre = $plant['name'];
     
            $tableauTemp = [
                "title" => $titre,
                "start" => $fertilizationMonth,
                
            ];
            // dd($tableauTemp);
            $listeDateFertilisation[] = $tableauTemp;
            
        }
        return $this->json($listeDateFertilisation);
    }

    /**
     * @Route("/repotting", name="repotting", methods="GET")
     */
    public function repotting(Request $request, UserRepository $userRepo) 
    {
        $user = $this->getUser();
        $userId = $user->getId();
        
        $listeDateRepotting = [];

        $plants = $userRepo->findPlantByUser($userId);
        // dd($plants);
        foreach ($plants as $plant) {
            $repottingMonth = $plant["repotting"];
            $titre = $plant['name'];
     
            $tableauTemp = [
                "title" => $titre,
                "start" => $repottingMonth,
                
            ];
            // dd($tableauTemp);
            $listeDateRepotting[] = $tableauTemp;
            
        }
        return $this->json($listeDateRepotting);
    }

    /**
     * @Route("/cut", name="cut", methods="GET")
     */
    public function cut(Request $request, UserRepository $userRepo) 
    {
        $user = $this->getUser();
        $userId = $user->getId();
        
        $listeDateCut = [];

        $plants = $userRepo->findPlantByUser($userId);
        // dd($plants);
        foreach ($plants as $plant) {
            $cutMonth = $plant["cut"];
            $titre = $plant['name'];
     
            $tableauTemp = [
                "title" => $titre,
                "start" => $cutMonth,
                
            ];
            // dd($tableauTemp);
            $listeDateCut[] = $tableauTemp;
            
        }
        return $this->json($listeDateCut);
    }

}
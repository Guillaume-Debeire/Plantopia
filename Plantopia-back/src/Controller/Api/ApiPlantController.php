<?php

namespace App\Controller\Api;

use App\Entity\CalendarSchedule;
use App\Entity\Plant;
use App\Form\PlantType;
use App\Repository\PlantRepository;
use App\Service\Slugger;
use App\Service\IntervalStringer;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/api/plants", name="api_plant_")
 */
class ApiPlantController extends AbstractController
{
    /**
     * @Route("", name="browse", methods="GET")
     */
    public function browse (PlantRepository $plantRepo): Response
    {   
        $plants = $plantRepo->findAll();
        return $this->json($plants, 200);
    }

    /**
     * @Route("/{id}", name="read", methods="GET")
     */
    public function read (Plant $plant, PlantRepository $plantRepo, IntervalStringer $intervalStringer): Response
    {  
        if (is_null($plant)) {
            throw new NotFoundHttpException("");
        }
        else {
            $plantW = "";
            if (!is_null($plant->getWatering())) {
                $plantW = $intervalStringer->interval_to_string($plant->getWatering());
            } 
            $plantid = $plant->getId();
            $plantType = $plantRepo->findTypebyId($plantid);
            $plantSkill = $plantRepo->findSkillbyId($plantid);
            return $this->json([$plant, $plantType, $plantSkill, $plantW]);
        }
    }

    /**
     * @Route("", name="add", methods="POST")
     */
    public function add (Request $request, EntityManagerInterface $em, Slugger $slugger): Response
    {
        $plantAsArray = json_decode($request->getContent(), true);

        $plant = new Plant();

        $form = $this->createForm(PlantType::class, $plant, ['csrf_protection' => false]);
        $form->submit($plantAsArray);
        if ($form->isValid())
        {
            $plantSkill = $form->get('skill')->getData();
            $plant->setSkill($plantSkill);
            $plantType = $form->get('type')->getData();
            $plant->setType($plantType);
            $calendarSchedule = new CalendarSchedule();
            $user = $this->getUser();
            $calendarSchedule->addPlant($plant);
            $calendarSchedule->setUser($user);
            $em->persist($calendarSchedule); 
            $em->persist($plant);
            $em->flush();
            // on slugifie après le flush car slugifyPlant a besoin d'un id
            $slugger->slugifyPlant($plant);
        }
        //dd($plant);
        return $this->json([$plant, $plantType, $plantSkill],  201, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'calendarSchedule'
            ]
        ]);
    }

    

    /**
     * @Route("/edit/{id}", name="edit", methods={"PUT"})
     */
    public function edit (Request $request, Plant $plant, EntityManagerInterface $em, Slugger $slugger): Response
    {
        $form = $this->createForm(PlantType::class, $plant, ['csrf_protection' => false]);
        $plantAsArray = json_decode($request->getContent(), true);

        
        $form->submit($plantAsArray, $clearMissing = false);
        
        if ($form->isValid())
        {   
            $plantSkill = $form->get('skill')->getData();
            // dd($plantSkill);
            if (!is_null($plantSkill)){
                $plant->setSkill($plantSkill);
            }
            $plantType = $form->get('type')->getData();
            // dd($plantSkill);
            if (!is_null($plantType)){
                $plant->setType($plantType);
            }
            $plant->setUpdatedAt(new \DateTime());
            $em->flush();
            // on slugifie après le flush car slugifyPlant a besoin d'un id
            $slugger->slugifyPlant($plant);
            // $this->addFlash('success', 'Plante modifiée');
        }
        //dd($plant);
        return $this->json($plant, 200, [], [
            AbstractNormalizer::IGNORED_ATTRIBUTES => [
                'calendarSchedule'
            ]
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods="DELETE")
     */
    public function delete(Plant $plant, EntityManagerInterface $em): Response
    {
        $em->remove($plant);

        $em->flush();
        $this->addFlash("sucess", "La plante a été supprimée.");

        return $this->json("", 204);
    }

    
}   
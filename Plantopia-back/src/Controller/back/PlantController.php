<?php

namespace App\Controller\back;

use App\Entity\CalendarSchedule;
use App\Entity\Plant;
use App\Entity\User;
use App\Entity\Type;
use App\Form\PlantType;
use App\Repository\PlantRepository;
use App\Security\Voter\PlantVoter;
use App\Service\FileUploader;
use App\Service\Slugger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/plant")
 */
class PlantController extends AbstractController
{
    /**
     * @Route("/", name="plant_index", methods={"GET"})
     */
    public function index(PlantRepository $plantRepository): Response
    {
        return $this->render('back/plant/index.html.twig', [
            'plants' => $plantRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="plant_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader, Slugger $slugger): Response
    {
        $plant = new Plant();
        $form = $this->createForm(PlantType::class, $plant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $image = $form->get('picture')->getData();
            $fileUploader->movePlantPicture($image, $plant);
            $type = new Type();
            $plantType = $form->get('type')->getData();
            $plant->setType($plantType);
            $calendarSchedule = new CalendarSchedule();
            $user = $this->getUser();
            $calendarSchedule->addPlant($plant);
            $calendarSchedule->setUser($user);
            $entityManager->persist($calendarSchedule);           
            $entityManager->persist($plant);
            $entityManager->flush();
            $slugger->slugifyPlant($plant);
            $this->addFlash('success', 'Plante créée avec succès.');

            return $this->redirectToRoute('plant_index');
        }

        return $this->render('back/plant/new.html.twig', [
            'plant' => $plant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="plant_show", methods={"GET"})
     */
    public function show(Plant $plant): Response
    {   
        return $this->render('back/plant/show.html.twig', [
            'plant' => $plant,
            ]);      
    }

    /**
     * @Route("/{id}/edit", name="plant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Plant $plant, FileUploader $fileUploader): Response
    {
        $this->denyAccessUnlessGranted(PlantVoter::PLANT_EDIT, $plant);
        $form = $this->createForm(PlantType::class, $plant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $image = $form->get('picture')->getData();
            $fileUploader->movePlantPicture($image, $plant);

            $plant->setUpdatedAt(new \DateTime());

            $em->flush();
            $this->addFlash('success', 'Données de la plante modifiées.');

            return $this->redirectToRoute('plant_index');
        }

        return $this->render('back/plant/edit.html.twig', [
            'plant' => $plant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="plant_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Plant $plant): Response
    {
        $this->denyAccessUnlessGranted(PlantVoter::PLANT_DELETE, $plant);
        if ($this->isCsrfTokenValid('delete'.$plant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($plant);
            $entityManager->flush();
            $this->addFlash('danger', 'Plante effacée.');
        }

        return $this->redirectToRoute('plant_index');
    }
}

<?php

namespace App\Controller\back;

use App\Entity\Role;
use App\Form\RoleType;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/role")
 */
class RoleController extends AbstractController
{
    /**
     * @Route("/", name="role_index", methods={"GET"})
     */
    public function index(RoleRepository $roleRepository): Response
    {
        return $this->render('back/role/index.html.twig', [
            'roles' => $roleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="role_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $role = new Role();
        $form = $this->createForm(RoleType::class, $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($role);
            $entityManager->flush();
            $this->addFlash('success', 'Rôle créé avec succès.');

            return $this->redirectToRoute('role_index');
        }

        return $this->render('back/role/new.html.twig', [
            'role' => $role,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="role_show", methods={"GET"})
     */
    public function show(Role $role): Response
    {
        return $this->render('back/role/show.html.twig', [
            'role' => $role,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="role_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Role $role): Response
    {
        $form = $this->createForm(RoleType::class, $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Rôle modifié.');

            return $this->redirectToRoute('role_index');
        }

        return $this->render('back/role/edit.html.twig', [
            'role' => $role,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="role_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Role $role): Response
    {
        if ($this->isCsrfTokenValid('delete'.$role->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($role);
            $entityManager->flush();
            $this->addFlash('danger', 'Rôle supprimé.');
        }

        return $this->redirectToRoute('role_index');
    }
}

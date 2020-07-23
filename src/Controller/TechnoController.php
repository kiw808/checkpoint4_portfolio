<?php

namespace App\Controller;

use App\Entity\Techno;
use App\Form\TechnoType;
use App\Repository\TechnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/techno", name="admin_techno_")
 */
class TechnoController extends AbstractController
{
    /**
     * @Route("", name="index", methods={"GET"})
     */
    public function index(TechnoRepository $technoRepository): Response
    {
        return $this->render('admin/techno/index.html.twig', [
            'technos' => $technoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $techno = new Techno();
        $form = $this->createForm(TechnoType::class, $techno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($techno);
            $entityManager->flush();

            return $this->redirectToRoute('admin_techno_index');
        }

        return $this->render('admin/techno/new.html.twig', [
            'techno' => $techno,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show(Techno $techno): Response
    {
        return $this->render('admin/techno/show.html.twig', [
            'techno' => $techno,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Techno $techno): Response
    {
        $form = $this->createForm(TechnoType::class, $techno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('techno_index');
        }

        return $this->render('admin/techno/edit.html.twig', [
            'techno' => $techno,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, Techno $techno): Response
    {
        if ($this->isCsrfTokenValid('delete'.$techno->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($techno);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_techno_index');
    }
}

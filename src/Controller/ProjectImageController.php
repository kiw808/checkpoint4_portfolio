<?php

namespace App\Controller;

use App\Entity\ProjectImage;
use App\Form\ProjectImageType;
use App\Repository\ProjectImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/projectimage", name="admin_project_image_")
 */
class ProjectImageController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @param ProjectImageRepository $projectImageRepository
     * @return Response
     */
    public function index(ProjectImageRepository $projectImageRepository): Response
    {
        return $this->render('admin/project_image/index.html.twig', [
            'project_images' => $projectImageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $projectImage = new ProjectImage();
        $form = $this->createForm(ProjectImageType::class, $projectImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projectImage);
            $entityManager->flush();

            return $this->redirectToRoute('admin_project_image_index');
        }

        return $this->render('admin/project_image/new.html.twig', [
            'project_image' => $projectImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     * @param ProjectImage $projectImage
     * @return Response
     */
    public function show(ProjectImage $projectImage): Response
    {
        return $this->render('admin/project_image/show.html.twig', [
            'project_image' => $projectImage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     * @param Request $request
     * @param ProjectImage $projectImage
     * @return Response
     */
    public function edit(Request $request, ProjectImage $projectImage): Response
    {
        $form = $this->createForm(ProjectImageType::class, $projectImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_project_image_index');
        }

        return $this->render('admin/project_image/edit.html.twig', [
            'project_image' => $projectImage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     * @param Request $request
     * @param ProjectImage $projectImage
     * @return Response
     */
    public function delete(Request $request, ProjectImage $projectImage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projectImage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projectImage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_project_image_index');
    }
}

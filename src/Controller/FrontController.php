<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\TechnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FrontController
 * @package App\Controller
 * @Route("/", name="front_")
 */
class FrontController extends AbstractController
{
    private $projects;

    private $technos;

    public function __construct(TechnoRepository $technos, ProjectRepository $projects)
    {
        $this->projects = $projects;
        $this->technos = $technos;
    }

    /**
     * @Route("", name="home")
     */
    public function index()
    {
        return $this->render('front/home/index.html.twig', [
            'technos' => $this->technos->findAll(),
            'projects' => $this->projects->findAll(),
        ]);
    }
}

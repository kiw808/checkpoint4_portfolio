<?php

namespace App\Controller;

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
    private $technos;

    public function __construct(TechnoRepository $technos)
    {
        $this->technos = $technos;
    }

    /**
     * @Route("", name="home")
     */
    public function index()
    {
        $technos = $this->technos->findAll();

        return $this->render('front/home/index.html.twig', [
            'technos' => $technos,
        ]);
    }
}

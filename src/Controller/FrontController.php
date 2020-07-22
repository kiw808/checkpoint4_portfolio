<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FrontController
 * @package App\Controller
 * @Route("/", name="front_")
 */
class FrontController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function index()
    {
        return $this->render('front/index.html.twig');
    }
}
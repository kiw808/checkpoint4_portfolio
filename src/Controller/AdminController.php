<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin", name="admin_" )
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("", name="dashboard")
     */
    public function adminDashboard()
    {
        /**
         * @var User $user
         */
        $user = $this->getUser();

        $greet = 'Welcome back ' . $user->getUsername() . ' !';

        return $this->render('admin/index.html.twig', [
            'greet' => $greet,
        ]);
    }
}

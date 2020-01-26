<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Security\User;

class WelcomeController extends AbstractController
{

    private $session;

    public function __construct(SessionInterface $session)
    {
      $this->session = $session;
    }

    /**
     * @Route("/welcome", name="welcome")
     */
    public function index()
    {
        $user = $this->getUser();
        $this->session->set('username', $user->getUsername());
        $this->session->set('fullname', $user->getFullname());
        $this->session->set('email', $user->getEmail());
        return $this->render('welcome/index.html.twig', [
            'controller_name' => 'WelcomeController',
        ]);
    }
}

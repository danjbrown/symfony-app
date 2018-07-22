<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;

class IndexController extends AbstractController
{
    public function homepage(UserInterface $user)
    {
        $number = random_int(0, 100);

        return $this->render('index.html.twig', array(
            'page' => 'homepage',
            'username' => $user->getUsername()
        ));
    }
}
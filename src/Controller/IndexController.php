<?php
// src/Controller/IndexController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function homepage()
    {
        $number = random_int(0, 100);

        return $this->render('index.html.twig', array(
            'number' => $number,
        ));
    }
}
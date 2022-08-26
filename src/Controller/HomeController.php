<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/home', name: 'home')]
    public function index(): Response

    {
        $home = $this->entityManager->getRepository(Home::class)->findAll();
  
        return $this->render('home/index.html.twig',[
            'home' => $home,
        ]);
    
    
    }
}

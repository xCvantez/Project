<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    
    #[Route('/produits', name: 'produits')]
    public function index(): Response
    {

        $produits = $this->entityManager->getRepository(produits::class)->findAll();
        return $this->render('produits/index.html.twig', [
            'produits' => $produits
        ]);
    }
}

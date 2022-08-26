<?php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactsController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/contacts', name: 'contacts')]
    public function index(): Response
    {
        $contacts = $this->entityManager->getRepository(Home::class)->findAll();

        return $this->render('contacts/index.html.twig',[
            'contacts' => $contacts
        ]
    );
    }
}






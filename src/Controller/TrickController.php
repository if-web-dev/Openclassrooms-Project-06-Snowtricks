<?php

namespace App\Controller;

use App\Entity\Tricks;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/trick', 'trick_', methods: ['GET', 'POST'])]
class TrickController extends AbstractController
{
    #[Route('/{slug}', 'details', methods: ['GET', 'POST'])]
    public function details(Tricks $trick): Response
    {
        return $this->render('trick.html.twig', [
            'trick' => $trick
        ]);
    }

    #[Route('/add', 'add', methods: ['GET', 'POST'])]
    public function addTrick(): Response
    {
        return $this->render('addTrick.html.twig');
    }

    #[Route('/edit/{slug}', 'edit', methods: ['GET', 'POST'])]
    public function editTrick(Tricks $trick): Response
    {
        return $this->render('editTrick.html.twig', [
            'trick' => $trick
        ]);
    }
}


<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/trick', 'trick_', methods: ['GET', 'POST'])]
class TrickController extends AbstractController
{
    #[Route('/add', 'add', methods: ['GET', 'POST'])]
    public function addTrick(CategoryRepository $categories): Response
    {
        return $this->render('addTrick.html.twig', [ 'categories' => $categories->findAll()]);
    }
    
    #[Route('/{slug}', 'details', methods: ['GET', 'POST'])]
    public function details(Trick $trick): Response
    {
        return $this->render('trick.html.twig', [
            'trick' => $trick
        ]);
    }

    #[Route('/edit/{slug}', 'edit', methods: ['GET', 'POST'])]
    public function editTrick(Trick $trick, CategoryRepository $categories): Response
    {
        return $this->render('editTrick.html.twig', [
            'trick' => $trick,
            'categories' => $categories->findAll(),
        ]);
    }
}


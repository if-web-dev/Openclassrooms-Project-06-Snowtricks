<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', 'home.index', methods: ['GET'])]
    public function index(TrickRepository $tricksRepository, Request $request): Response
    {
        //$page = $request->query->getInt('page', 1);
        
        //$tricks = $tricksRepository->findTricksPaginated($page, 5);

        return $this->render('home.html.twig', [ 'tricks' => $tricksRepository->findAll()]);

        //return $this->render('home.html.twig', [ 'tricks' => $tricks ]);

    }
}


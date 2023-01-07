<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/trick', 'trick_', methods: ['GET', 'POST'])]
class TrickController extends AbstractController
{   
    #[Route('/{slug}', 'details', methods: ['GET', 'POST'])]
    public function details(Trick $trick, Request $request, EntityManagerInterface $entityManager): Response
    {

        $comment = new Comment;
        $commentForm = $this->createForm(CommentType::class, $comment);
        $commentForm->handleRequest($request);

        if($commentForm->isSubmitted() and $commentForm->isValid())
        {
            $comment->setAuthor($this->getUser());
            $comment->setTrick($trick);

            $entityManager->persist($comment);
            $entityManager->flush();

            $this->addFlash('success', 'Your comment has been added successfully !');
            return $this->redirectToRoute('trick_details', [
                'slug' => $trick->getSlug()
            ]);
            
        }

        $comments = $entityManager
            ->getRepository(Comment::class)
            ->findBy(
                [
                    'trick' => $trick->getId(),
                ],
                [
                    'createdAt' => 'DESC',
                ],
            );
        
        return $this->render('trick.html.twig', [
            'trick' => $trick,
            'comments' => $comments,
            'commentForm' => $commentForm->createView()
        ]);
    }

    #[Route('/add', 'add', methods: ['GET', 'POST'])]
    public function addTrick(CategoryRepository $categories): Response
    {
        return $this->render('addTrick.html.twig', [ 'categories' => $categories->findAll()]);
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


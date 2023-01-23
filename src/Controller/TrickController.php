<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Form\AddTrickFormType;
use App\Service\ImageUploader;
use App\Form\EditTrickFormType;
use App\Service\YoutubeThumbnail;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/trick', 'trick_', methods: ['GET', 'POST'])]
class TrickController extends AbstractController
{   

    #[Route('/add', 'add')]
    public function addTrick(CategoryRepository $categories, 
                            EntityManagerInterface $em, 
                            Request $request, 
                            SluggerInterface $slugger, 
                            YoutubeThumbnail $youtubeThumbnail,
                            ImageUploader $imageUploader): Response
    {

        $trick = new Trick();

        $trickForm = $this->createForm(AddTrickFormType::class, $trick);

        $trickForm->handleRequest($request);

       if($trickForm->isSubmitted() and $trickForm->isValid())
        {
            $trick->setAuthor($this->getUser());
            $trick->setSlug(($slugger->slug($trick->getName()))->lower());

        
         //add videos
            foreach($trickForm->get('videos')->getData() as $video){
            
                $video->setThumbnail($youtubeThumbnail->getThumbnail($video->getUrl()));
                $trick->addVideo($video);
            }
        //add images
            foreach ($trickForm->get('images') as $image) {

                if ($image->get('path')->getData()!==null) {
                    $newImage = $image->getData();
                    $filePath = $imageUploader->upload($image->get('path')->getData());
                    $newImage->setPath($filePath);

                    $image->getData()->setTrick($trick);
                    $trick->addImage($image->getData());
                }
            }
           
            $em->persist($trick);
         
            $em->flush();

            $this->addFlash('success', 'Your Trick has been added successfully !');
            return $this->redirectToRoute('home.index');
        }

        return $this->render('addTrick.html.twig', [
            'trickForm' => $trickForm->createView(),
            'categories' => $categories->findAll()]);
    }


    #[Route('/{slug}', 'details')]
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

    #[Route('/edit/{slug}', 'edit')]
    public function editTrick(Trick $trick,
                              EntityManagerInterface $em, 
                              Request $request, 
                              SluggerInterface $slugger, 
                              YoutubeThumbnail $youtubeThumbnail,
                              ImageUploader $imageUploader): Response
                              
    {
        $trickForm = $this
            ->createForm(EditTrickFormType::class, $trick)
            ->handleRequest($request);

        if ($trickForm->isSubmitted() && $trickForm->isValid()) {
            $trick->setAuthor($this->getUser());
            $trick->setSlug(($slugger->slug($trick->getName()))->lower());


            //add videos
            foreach ($trickForm->get('videos')->getData() as $video) {

                $video->setThumbnail($youtubeThumbnail->getThumbnail($video->getUrl()));
                $trick->addVideo($video);
            }
            //add images
            foreach ($trickForm->get('images') as $image) {

                if ($image->get('path')->getData() !== null) {
                    $newImage = $image->getData();
                    $filePath = $imageUploader->upload($image->get('path')->getData());
                    $newImage->setPath($filePath);

                    $image->getData()->setTrick($trick);
                    $trick->addImage($image->getData());
                }
            }

            $em->persist($trick);

            $em->flush();

            $this->addFlash('success', 'Your Trick has been modified successfully !');
            return $this->redirectToRoute('home.index');
        }

        return $this->render('editTrick.html.twig', [
            'trickForm' => $trickForm->createView(),
            'trick' => $trick,
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function deleteTrick(Request $request, 
                                Trick $trick,
                                EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trick->getId(), $request->request->get('_token'))) {
            $em->remove($trick);
            $em->flush();

            $this->addFlash('success', 'Your Trick has been delete successfully !');
        }

        return $this->redirectToRoute('home.index');
    }
}


<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Video;
use App\Repository\ImageRepository;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



#[Route('/media/delete', 'media_delete', methods: ['GET','POST'])]
class MediaController extends AbstractController
{
    #[Route('/image/{id}', name: '_image', methods: ['GET','POST'])]
    public function deleteImage(Request $request, Image $image, ImageRepository $imageRepository): Response
    {

        $trick = $image->getTrick();

        if ($this->isCsrfTokenValid('delete'.$image->getId(), $request->request->get('_token'))) {
            $imageRepository->remove($image, true);

            $this->addFlash('success', 'this image has been delete successfully !');
        }

        return $this->redirectToRoute('trick_details', [
            'slug' => $trick->getSlug()
        ]);
    
    }

    #[Route('/video/{id}', name: '_video', methods: ['GET','POST'])]
    public function deleteVideo(Request $request, Video $video, VideoRepository $videoRepository): Response
    {
        $trick = $video->getTrick();

        if ($this->isCsrfTokenValid('delete'.$video->getId(), $request->request->get('_token'))) {
            $videoRepository->remove($video, true);

            $this->addFlash('success', 'Your video has been delete successfully !');
        }

        return $this->redirectToRoute('trick_details', [
            'slug' => $trick->getSlug()
        ]);

    }

}

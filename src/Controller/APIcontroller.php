<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class APIController extends AbstractController
{
    #[Route('/removePicture', name: 'API_remove_picture', methods:["POST"])]
    public function remove(Request $request, ImageRepository $imageRepository, Filesystem $filesystem ): Response
    {

        $pictureId = $request->request->get("pictureId");

        $image = $imageRepository->find($pictureId);

        if($image){

            //$imageId = $image->getId();
            $filesystem->remove(["uploads/images/" + $image->getPath()]);
            $imageRepository->remove($image, true);

            return $this->json($pictureId);
        }

        return null;
        
    }
}

<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\ImageUploader;
use App\Service\SendMailService;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Service\TokenVerifyService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request, 
        UserPasswordHasherInterface $userPasswordHasher, 
        EntityManagerInterface $entityManager, 
        SendMailService $mail, 
        ImageUploader $imageUploader,
        TokenGeneratorInterface $tokenGenerator, 
    ): Response {
        $user = new User();
      
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $avatar = $imageUploader->upload($form->get('avatar')->getData());
            $user->setAvatar($avatar);

            // set a User token when creating a user
            $token = $tokenGenerator->generateToken();
            $user->setToken($token);
            $user->setRoles($user->getRoles());

            $entityManager->persist($user);
            $entityManager->flush();

            // send an email
            $mail->send(
                'no-reply@project6.net',
                $user->getEmail(),
                'Activation of your Snowtricks account',
                'register',
                ['user' => $user]
            );

            $this->addFlash("warning", "An account activation link was sent in your mail box" );
            return $this->redirectToRoute('home.index');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verif', name: 'verify_user', methods: ['GET'])]
    public function verifyUser(
        Request $request, 
        TokenVerifyService $tokenVerifyed, 
        UserRepository $UserRepository, 
        EntityManagerInterface $em 
    ): Response {

        $id = $request->query->get('id');
        $token = $request->query->get('token');
        $user = $UserRepository->find($id);

        if (!$user->getIsVerified()==true)
        {
            if ($tokenVerifyed->isCombinationValid($token, $user))
            {
                $user
                     ->setIsVerified(true)
                     ->setRoles(['ROLE_USER']);
                $em->persist($user);
                $em->flush();
                $this->addFlash('success', "User account activated, go to login");
                return $this->redirectToRoute('home.index');
            }
            $this->addFlash('danger', 'Le token est invalide');
            return $this->redirectToRoute('home.index');
            
        }
        $this->addFlash('warning', 'Your account is already activated, go to login page');
        return $this->redirectToRoute('home.index');

    }
}

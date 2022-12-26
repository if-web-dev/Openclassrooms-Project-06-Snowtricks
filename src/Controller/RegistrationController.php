<?php

namespace App\Controller;

use App\Entity\Users;
use App\Service\SendMailService;
use App\Form\RegistrationFormType;
use App\Repository\UsersRepository;
use App\Service\TokenVerifyService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, SendMailService $mail): Response
    {
        $user = new Users();
      
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

            // set a User token when creating a user
            $user->setToken(rand(1, 9999));

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
    public function verifyUser(Request $request, TokenVerifyService $tokenVerifyed, UsersRepository $usersRepository, EntityManagerInterface $em ): Response
    {

        $id = $request->query->get('id');
        $token = $request->query->get('token');
        $user = $usersRepository->find($id);

        if(!$user->getIsVerified())
        {
            if($tokenVerifyed->isCombinationValid($token, $user))
            {
                $user->setIsVerified(true);
                $em->persist($user);
                $em->flush();
                $this->addFlash('success', "User account activated, go to login");
                return $this->redirectToRoute('home.index');
            }
            $this->addFlash('danger', 'Le token est invalide');
            return $this->redirectToRoute('home.index');
            
        }
        $this->addFlash('warning', 'Your account is already activated, go to login page </a>');
        return $this->redirectToRoute('home.index');

    }
}

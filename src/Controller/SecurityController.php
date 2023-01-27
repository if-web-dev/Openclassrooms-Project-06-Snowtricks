<?php

namespace App\Controller;

use App\Service\SendMailService;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ResetPasswordRequestFormType;
use App\Form\ResetPasswordFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        
        if ($this->getUser()) {

           $this->addFlash("warning", "you are already logged in " . $this->getUser()->getUserIdentifier() );
           return $this->redirectToRoute('home.index');

        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();


        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/forgottenPassword', name: 'app_forgotten_password')]
    public function forgottenPassword(
        Request $request, 
        UserRepository $UserRepository, 
        TokenGeneratorInterface $tokenGenerator, 
        EntityManagerInterface $entityManager,
        SendMailService $mail 
    ): Response {
        $form = $this->createForm(ResetPasswordRequestFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid()){
            $user = $UserRepository->findOneByUsername($form->get('username')->getData());

            if($user){

              
                //reset password token
                $token = $tokenGenerator->generateToken();
                $user->setToken($token);
                $entityManager->persist($user);
                $entityManager->flush();

                //link generated
                $url = $this->generateUrl('app_reset_password_verif', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

                //email datas
                $context = ['url' => $url, "user" => $user];

                //create the email
                $mail->send(
                    'no-reply@project06.net',
                    $user->getEmail(),
                    'Réinitialisation de mot de passe',
                    'passwordReset',
                    $context
                );

                $this->addFlash('success', 'Reset password Email sent successfully');
                return $this->redirectToRoute('app_login');
            }

            //if find no user
            $this->addFlash('danger', 'Un probleme est survenu');
            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/forgottenPassword.html.twig', ['requestPassForm' => $form->createView()]);
    }

    #[Route(path: '/resetPasswordVerif/{token}', name: 'app_reset_password_verif')]
    public function resetPasswordVerif(
        string $token,
        Request $request,
        UserRepository $user,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher
    ): Response {
        //verify token in database
        $user = $user->findOneByToken($token);
      
        //if matched a real user
        if($user){

            $form = $this->createForm(ResetPasswordFormType::class);
            $form->handleRequest($request);
            
            //if the form is submited
            if($form->isSubmitted() and $form->isValid())
            {
                $user
                     //->setResetToken(null)
                     ->setPassword(
                     $passwordHasher->hashPassword(
                        $user,
                        $form->get('password')->getData()
                     )
                );
                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'Password successfully changed');
                return $this->redirectToroute('app_login');
            }

            return $this->render('security/resetPassword.html.twig', ['passForm' => $form->createView()]);

        }

        $this->addFlash('danger', 'Invalid token');
        return $this->redirectToroute('app_login');
        
    }
}

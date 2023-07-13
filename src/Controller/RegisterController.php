<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{

    public function __construct(private readonly UserPasswordHasherInterface $userPasswordHasher, private readonly UserRepository $userRepository)
    {

    }

    #[Route('/register', name: 'app_register')]
    public function index(): Response
    {
        $password = '123456';
        $user = new User();
        $user->setEmail('spyros@gmail.com');
        $hashedPassword = $this->userPasswordHasher->hashPassword($user, $password);
        $user->setPassword($hashedPassword);

        $this->userRepository->save($user);

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
        ]);
    }
}

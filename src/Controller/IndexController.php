<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/spyros')]
class IndexController extends AbstractController
{

    public function __construct(private readonly Security $security, private readonly EntityManagerInterface $entityManager)
    {
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
//        dd($this->security->getUser());
//        $this->security->logout(false);
//
//        $user = $this->entityManager->getRepository(User::class)->findBy(['email'=>'spyros@gmail.com']);
//
//        $this->security->login($user);

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/secret', name: 'app_index_secret')]
    #[IsGranted('ROLE_USER')]
    public function secret(): Response
    {
//        $this->denyAccessUnlessGranted('ROLE_USER','You must login','Please login');
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}

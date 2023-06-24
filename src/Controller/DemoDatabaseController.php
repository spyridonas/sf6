<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Product;
use App\Services\DatabaseServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoDatabaseController extends AbstractController
{
    public function __construct(private readonly DatabaseServiceInterface $databaseService)
    {
    }

    #[Route('/demo/database', name: 'app_demo_database')]
    public function index(): Response
    {

        $product = $this->databaseService->addProduct("p1");
        $customer = $this->databaseService->addCustomer("c1");
        $this->databaseService->linkCustomerProduct($customer, $product);


        return $this->render('demo_database/index.html.twig', [
            'controller_name' => 'DemoDatabaseController',
        ]);
    }
    #[Route('/demo/product/{id}')]
    public function getProduct(Product $id)
    {
        return $this->render('demo_database/index.html.twig', [
            'controller_name' => 'DemoDatabaseController',
        ]);
    }
}

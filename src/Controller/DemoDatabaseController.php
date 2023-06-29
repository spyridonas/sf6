<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Product;
use App\Services\DatabaseServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class DemoDatabaseController extends AbstractController
{
    public function __construct(private readonly DatabaseServiceInterface $databaseService, private readonly LoggerInterface $logger)
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

    #[Route('/customers')]
    public function getAllCustomers(): JsonResponse
    {
        return $this->json($this->databaseService->getAllCustomers());
    }

    #[Route('/customer/{id}')]
    public function getAllCustomerId(int $id): JsonResponse
    {
        $customer = $this->databaseService->getCustomer($id);
        if(!$customer) {
            $this->logger->critical("Customer $id not found");
            throw new NotFoundHttpException("Not Found");
        }


        return $this->json($this->databaseService->getCustomer($id));

    }
}

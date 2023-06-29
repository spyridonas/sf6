<?php

namespace App\Services;

use App\Entity\Customer;
use App\Entity\Product;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;

class DatabaseService implements DatabaseServiceInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {

    }

    public function addCustomer(string $name): Customer
    {
       $customer = new Customer();
       $customer->setName($name);
       $this->saveToDb($customer);

       return $customer;
    }

    public function addProduct(string $name): Product
    {
        $product = new Product();
        $product->setName($name);
        $this->saveToDb($product);
        return $product;
    }

    public function linkCustomerProduct(Customer $customer, Product $product): void
    {
        $product->setCustomer($customer);
        $this->saveToDb($product);
    }

    protected function saveToDb($item)
    {
        $this->entityManager->persist($item);
        $this->entityManager->flush();
    }

    public function getAllCustomers(): array
    {
        return $this->entityManager->getRepository(Customer::class)->getAllCustomersArray();
    }

    public function getCustomer(int $id): array
    {
        return $this->entityManager->getRepository(Customer::class)->getCustomerId($id);
    }
}

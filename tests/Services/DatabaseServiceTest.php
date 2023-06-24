<?php

namespace App\Tests\Services;

use App\Entity\Customer;
use App\Services\DatabaseService;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DatabaseServiceTest extends KernelTestCase
{

    public function testAddCustomer()
    {
        self::bootKernel();
        $container = self::getContainer();

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get(EntityManagerInterface::class);

        $databaseService = new DatabaseService($entityManager);

        $customer = $databaseService->addCustomer('c1');

        $existingCustomer = $entityManager->getRepository(Customer::class)->find(1);

        $this->assertEquals($customer, $existingCustomer);


    }

    public function testAddProduct()
    {

    }

    public function testLinkCustomerProduct()
    {

    }
}

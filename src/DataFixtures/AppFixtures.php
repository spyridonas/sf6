<?php

namespace App\DataFixtures;

use App\Entity\Books;
use App\Entity\Customer;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for($i = 0; $i <= 100; $i++) {
            $customer = new Customer();
            $customer->setName("Name$i");
            $manager->persist($customer);

            $product = new Product();
            $product->setName("product $i");
            $product->setCustomer($customer);
            $manager->persist($product);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

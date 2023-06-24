<?php

namespace App\Services;

use App\Entity\Customer;
use App\Entity\Product;

interface DatabaseServiceInterface
{
    public function addCustomer(string $name): Customer;

    public function addProduct(string $name): Product;

    public function linkCustomerProduct(Customer $customer, Product $product): void;
}
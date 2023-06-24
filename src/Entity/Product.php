<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product extends CommonProperties
{
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Customer $customer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): static
    {
        $this->customer = $customer;

        return $this;
    }
}

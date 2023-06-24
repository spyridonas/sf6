<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

#[MappedSuperclass]
class CommonProperties
{
    #[ORM\Column(type: 'string', length: 255)]
    protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}
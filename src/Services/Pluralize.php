<?php

declare(strict_types=1);


namespace App\Services;

use Symfony\Component\String\Inflector\EnglishInflector;

class Pluralize implements PluralizeService
{

    public function pluralize(string $name): string
    {
        $inflector = new EnglishInflector();
        return $inflector->pluralize($name)[0];
    }
}

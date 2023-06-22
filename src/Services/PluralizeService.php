<?php

declare(strict_types=1);


namespace App\Services;

interface PluralizeService
{
    public function pluralize(string $name): string;
}

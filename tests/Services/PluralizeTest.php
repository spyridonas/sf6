<?php

namespace App\Tests\Services;

use App\Services\Pluralize;
use PHPUnit\Framework\TestCase;

class PluralizeTest extends TestCase
{

    public function testPluralize(): void
    {
        $pluralize = new Pluralize();
        $this->assertEquals('leafs',$pluralize->pluralize('leaf'));
    }
}

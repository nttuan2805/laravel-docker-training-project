<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MotobikeTest extends TestCase
{
    use DatabaseTransactions;

    protected $connectionsToTransact = 'mysql2';

    public function testfilterMotobikeList()
    {
        $this->assertTrue(true);
    }
}

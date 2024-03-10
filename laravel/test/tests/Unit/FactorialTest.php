<?php

namespace Tests\Unit;

use App\Http\Controllers\UnitTestsController;
use PHPUnit\Framework\TestCase;


class FactorialTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $u= new UnitTestsController;
        //test case negative number
        $this->assertEquals(null,$u->factorial(-3));
        //test case Float number
        $this->assertEquals(null,$u->factorial(1.5));
        //test case Positive number
        $this->assertEquals(24,$u->factorial(4));
        //test case Zero 
        $this->assertEquals(1,$u->factorial(0));
    }
}

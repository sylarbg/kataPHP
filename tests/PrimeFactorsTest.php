<?php

namespace Kata\Tests;

use Kata\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /**
     * @test
     * @dataProvider factors
     **/
    public function it_generates_prime_factors_with_recursion($number, $expected)
    {
        $this->assertEquals($expected, (new PrimeFactors())->generateWithRecursion($number));
    }

    /**
     * @test
     * @dataProvider factors
     **/
    public function it_generates_prime_factors_with_while_loop($number, $expected)
    {
        $this->assertEquals($expected, (new PrimeFactors())->generateWithWhileLoop($number));
    }

    /**
     * @test
     * @dataProvider factors
     **/
    public function it_generates_prime_factors_with_for_loop($number, $expected)
    {
        $this->assertEquals($expected, (new PrimeFactors())->generateWithForLoop($number));
    }

    public function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2,2]],
            [5, [5]],
            [6, [2,3]],
            [8, [2,2,2]],
            [100, [2,2,5,5]]
        ];
    }
}

<?php

namespace Kata;

class PrimeFactors
{
    public function generateWithRecursion($number, $divisor = 2)
    {
        if ($number == 1) {
            return  [];
        }

        if ($number % $divisor !== 0) {
            return $this->generateWithRecursion($number, $divisor+1);
        }

        return array_merge([$divisor], $this->generateWithRecursion($number/$divisor, $divisor));
    }

    public function generateWithWhileLoop($number)
    {
        $factors = [];
        $divisor = 2;

        while ($number > 1) {
            while ($number % $divisor === 0) {
                $factors[] = $divisor;

                $number /= $divisor;
            }
            $divisor++;
        }

        return $factors;
    }

    public function generateWithForLoop($number)
    {
        $factors = [];

        for ($divisor=2; $number > 1; $divisor++) {
            for (; $number % $divisor === 0; $number = $number / $divisor) {
                $factors[] = $divisor;
            }
        }

        return $factors;
    }
}

<?php

namespace Kata;

class BowlingGame
{
    protected $rolls = [];

    const FRAMES = 10;

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll) + $this->addStrikeBonus($roll);
                $roll += 1;

                continue;
            }

            $score += $this->defaultFrameScore($roll);

            if ($this->isSpare($roll)) {
                $score +=  $this->spareBonus($roll);
            }

            $roll += 2;
        }
        return $score;
    }

    protected function isStrike($roll)
    {
        return $this->pinCount($roll) == 10;
    }

    protected function isSpare($roll)
    {
        return $this->defaultFrameScore($roll) == 10;
    }

    protected function defaultFrameScore($roll)
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    protected function addStrikeBonus($roll)
    {
        return $this->pinCount($roll +1) + $this->pinCount($roll + 2);
    }

    protected function spareBonus(int $roll)
    {
        return $this->pinCount($roll + 2);
    }

    protected function pinCount($roll)
    {
        return $this->rolls[$roll];
    }
}

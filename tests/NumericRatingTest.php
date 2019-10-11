<?php

namespace Tests;

use App\Strategies\NumericRating;
use Exception;
use PHPUnit\Framework\TestCase;

class NumericRatingTest extends TestCase
{
    /** @test */
    public function can_set_limits()
    {
        $rating = new NumericRating(1, 5);

        $this->assertEquals($rating->min, 1);
        $this->assertEquals($rating->max, 5);
    }

    /** @test */
    public function validates_a_rating()
    {
        $rating = new NumericRating(1, 5);

        $this->assertEquals(3, $rating->rate(3));

        $this->expectException(Exception::class);
        $rating->rate(0);

        $this->expectException(Exception::class);
        $rating->rate(10);
    }

    /** @test */
    public function calculates_average_rating()
    {
        $rating = new NumericRating(1, 5);

        $this->assertEquals($rating->getAverage([3 => 9]), 3);
        $this->assertEquals($rating->getAverage([1 => 1, 5 => 1]), 3.0);
        $this->assertEquals($rating->getAverage([2 => 1, 3 => 1, 5 => 1]), 3.33);
    }
}

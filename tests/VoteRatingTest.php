<?php

namespace Tests;

use App\Strategies\VoteRating;
use Exception;
use PHPUnit\Framework\TestCase;

class VoteRatingTest extends TestCase
{
    /** @test */
    public function validates_a_rating()
    {
        $rating = new VoteRating();

        $this->assertEquals(1, $rating->rate('true'));
        $this->assertEquals(1, $rating->rate('1'));
        $this->assertEquals(0, $rating->rate('false'));
        $this->assertEquals(0, $rating->rate('0'));

        $this->expectException(Exception::class);
        $rating->rate(2);

        $this->expectException(Exception::class);
        $rating->rate('foo');
    }

    /** @test */
    public function calculates_average_rating()
    {
        $rating = new VoteRating;

        $this->assertEquals($rating->getAverage([true]), json_encode(['yes' => 1, 'no' => 0]));
        $this->assertEquals($rating->getAverage([true, false, false]), json_encode(['yes' => 1, 'no' => 2]));
        $this->assertEquals($rating->getAverage([]), json_encode(['yes' => 0, 'no' => 0]));
    }
}

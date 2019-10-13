<?php

namespace Tests;

use App\CreateRating;
use App\Strategies\NumericRating;
use App\Strategies\VoteRating;
use Exception;
use PHPUnit\Framework\TestCase;

final class CreateRatingTest extends TestCase {
  public $createRating;

  public function testNumericRatingCanBeCalled() {
    $numericRating = new CreateRating('numeric');
    $this->assertNotNull($numericRating->index(), 'not null');
  }

  public function testVotingRatingCanBeCalled() {
    $votingRating = new CreateRating('voting');
    $this->assertNotNull($votingRating->index(), 'voting rating not null');
  }

  /** @test */
  public function sets_rating_type_on_instantiation()
  {
    $rating = new CreateRating('vote');

    $this->assertEquals($rating->type, 'vote');
  }

  /** @test */
  public function errors_when_range_limit_is_not_numeric()
  {
    $rating = new CreateRating();

    $this->expectException(Exception::class);
    $rating->index('foo', 5);

    $this->expectException(Exception::class);
    $rating->index(1, 'bar');
  }

  /** @test */
  public function errors_when_range_is_out_of_bounds()
  {
    $rating = new CreateRating();

    $this->expectException(Exception::class);
    $rating->index(0, 5);

    $this->expectException(Exception::class);
    $rating->index(1, -5);
  }

  /** @test */
  public function errors_when_ranges_are_invalid()
  {
    $rating = new CreateRating('number');

    $this->expectException(Exception::class);
    $rating->index(5, 1);

    $this->expectException(Exception::class);
    $rating->index(1, 2);
  }

  /** @test */
  public function creates_number_rating_instance()
  {
    $rating = new CreateRating('number');

    $this->assertInstanceOf(NumericRating::class, $rating->index());
  }

  /** @test */
  public function creates_voting_rating_instance()
  {
    $rating = new CreateRating('voting');

    $this->assertInstanceOf(VoteRating::class, $rating->index(1, 4));
  }
}

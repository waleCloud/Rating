<?php

namespace Tests;

use App\Strategies\NumericRating;
use Exception;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class NumericRatingTest extends TestCase {
  public $numericRating;
  public function testNumericRatingCanBeCreated() {
    $this->assertNotNull(new NumericRating(1,5), 'Null');
  }

  public function testNumericRatingCannotBeCreatedWithInvalidArgs() {
    $this->expectException(InvalidArgumentException::class);
    $numericRating = new NumericRating(5,2);
  }
  
  /**
   * @before
   */
  public function setUpRating() {
    $this->numericRating = new NumericRating(1,5);
  }

  public function testNumericCannotRateWithInvalidRateArgs() {
    $this->expectExceptionMessage("Invalid value provided");
    $this->numericRating->rate('john');
  }

  public function testNumericCanRate() {
    $rated = $this->numericRating->rate(4);
    $this->assertEquals(4,$rated);
  }

  public function testNumericCanGetAverage() {
    $ratingsList = array
    (
      '5' => 2,
      4 => 2,
      3 => 2,
      2 => 2,
      1 => 2,
    );
    $average = $this->numericRating->getAverage($ratingsList);
    $this->assertEquals(3,$average);
  }

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

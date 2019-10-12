<?php

use App\Strategies\NumericRating;
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
    echo ($average);
  }

}

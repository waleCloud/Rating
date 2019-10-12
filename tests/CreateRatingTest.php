<?php

use App\CreateRating;
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
}
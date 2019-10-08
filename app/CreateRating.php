<?php
namespace App;

use App\Strategies\NumericRating;
use App\Strategies\VoteRating;
use Exception;

class CreateRating extends Exception {

	public $type;
	function __construct($type = 'number')
	{
		$this->type = $type;
	}

	public function index($minRange = 1, $maxRange = 5) {
		if (!is_numeric($minRange) || !is_numeric($maxRange) || ($minRange < 1 || $maxRange < 1))
			throw new Exception("Ranges must be numberic and greater than 1", 1);
		if ($minRange > $maxRange || ($maxRange-$minRange) == 1)
			throw new Exception("Range misMatch, minRange must be less than maxRange by more than 1", 1);
		
		if ($this->type === 'number') {
			return new NumericRating($minRange, $maxRange);
		} else return new VoteRating();
	}
}
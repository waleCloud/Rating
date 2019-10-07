<?php
namespace App;

use App\Strategies\NumericRating;
use App\Strategies\VoteRating;

class CreateRating {

	public $type;
	function __construct($type = 'number')
	{
		$this->type = $type;
	}

	public function index($minNum = 1, $maxNum = 5) {
		if ($this->type === 'number') {
			return new NumericRating($minNum, $maxNum);
		} else return new VoteRating();
	}
}
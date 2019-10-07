<?php
namespace App\Strategies;

use App\Interfaces\Rating;
use Exception;

class NumericRating extends Exception implements Rating {
	public $value;
	public $min, $max;
	function __construct($min, $max)
	{
		$this->min = $min;
		$this->max = $max;
	}

	function rate($value)
	{
		try {
			if ($value < $this->min || $value > $this->max)
				throw new Exception("Invalid value provided", 1);
			echo $value;
		} catch (\Throwable $th) {
			throw $th;
		}
	}

	function getAverage()
	{
		
	}
}

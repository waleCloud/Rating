<?php
namespace App\Strategies;

use App\Interfaces\Rating;
use Exception;
use InvalidArgumentException;

class NumericRating extends Exception implements Rating {
	public $value;
	public $min, $max;
	function __construct($min, $max)
	{
		if ($min >= $max || ($max - $min < 2) )
			throw new InvalidArgumentException(
				"MaxRange must be greater than MinRange by atleast a difference of 2 "
			);
		$this->min = $min;
		$this->max = $max;
	}

	function rate($value)
	{
		try {
			if ($value < $this->min || $value > $this->max)
				throw new Exception("Invalid value provided", 1);
			
			return $value;
		} catch (Throwable $th) {
			throw $th;
		}
	}

	function getAverage($ratingsKeyValuePairList)
	{
		try {
			if (!is_array($ratingsKeyValuePairList)) throw new Exception("Must be an array!");
			if (\count($ratingsKeyValuePairList) > $this->max 
			|| count($ratingsKeyValuePairList) < $this->min )
				throw new Exception("Length of array should above {$this->min} & less than or == {$this->max}", 1);
				
			$ratingCount = 0;
			$ratingWeightSum = 0;
			foreach ($ratingsKeyValuePairList as $key => $value) {
				$ratingCount += $value;
				$ratingWeightSum += ($key * $value);
			}

			return (round($ratingWeightSum/$ratingCount, 2));
			
		} catch (\Throwable $th) {
			throw $th;
		}
	}

}

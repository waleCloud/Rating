<?php
namespace App\Strategies;

use App\Interfaces\Rating;
use Exception;
use Throwable;

class VoteRating extends Exception implements Rating {
	function __construct()
	{
		echo 'vote';
	}

	function rate($value)
	{
		try {
			if ($value !== true || $value !== false)
				throw new Exception("Must be a boolean True or False", 0);
		
			return $value;

		} catch (\Throwable $th) {
			throw $th;
		}
	}

	function getAverage($ratings)
	{
		try {
			
		} catch(Throwable $th) {
			throw $th;
		}
		
	}

}

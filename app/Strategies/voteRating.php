<?php
namespace App\Strategies;

use App\Interfaces\Rating;
use Exception;

class VoteRating extends Exception implements Rating {
	function __construct()
	{
		echo 'vote';
	}

	function rate($value)
	{
		
	}

	function getAverage()
	{
		
	}
}

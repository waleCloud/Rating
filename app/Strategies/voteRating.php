<?php
namespace App\Strategies;

use App\Interfaces\Rating;
use Exception;

class VoteRating extends Exception implements Rating {
	function rate($value)
	{
		try {
			switch ($value) {
				case '1':
				case 'true':
					return 1;
					break;

				case '0':
				case 'false':
					return 0;
					break;

				default:
					throw new Exception("Must be a boolean True/False 1/0", 0);
					break;
			}

		} catch (Throwable $th) {
			throw $th;
		}
	}

	function getAverage($ratings)
	{
		try {
			$true = $false = 0;
			for ($i=0; $i < count($ratings); $i++) {
				$ratings[$i] ? $true++ : $false++;
			}
			return json_encode(array('yes' => $true, 'no' => $false));
		} catch(Throwable $th) {
			throw $th;
		}
		
	}

}

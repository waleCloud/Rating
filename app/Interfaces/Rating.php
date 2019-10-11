<?php
namespace App\Interfaces;

interface Rating {
	public function rate($value);
	public function getAverage($arrayOfratings);
}
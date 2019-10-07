<?php
namespace App\Usage;

require '../vendor/autoload.php';
use App\CreateRating;

$initialiseRating = new CreateRating('number'); // number rating

$rating = $initialiseRating->index();

$rating->rate(2);

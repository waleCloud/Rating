<?php
namespace App\Usage;

require '../vendor/autoload.php';
use App\CreateRating;

$initialiseRating = new CreateRating('vote'); // number rating

$rating = $initialiseRating->index();

echo $rating->rate(true). "<br />";

$ratingVal = array(
  1,true,false, 0, 0, 0, 0,1,1,1,1,1
);

echo $rating->getAverage($ratingVal);

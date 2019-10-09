<?php
use App\CreateRating;

require 'vendor/autoload.php';

$initialiseRating = new CreateRating('vote'); // number rating

$rating = $initialiseRating->index();

echo $rating->rate(false). "<br />";

$ratingsKeyValuePairList = array
(
  '5' => 7,
  4 => 2,
  3 => 2,
  2 => 2,
  1 => 2,
);

$ratingVal = array(
  1,true,false, 0, 0, 0, 0,1,1,1,1,1
);

echo $rating->getAverage($ratingVal);
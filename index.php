<?php
use App\CreateRating;

require 'vendor/autoload.php';

$initialiseRating = new CreateRating('number'); // number rating

$rating = $initialiseRating->index('1', '5');

echo $rating->rate(4). "<br />";

$ratingsKeyValuePairList = array
(
  '5' => 7,
  4 => 2,
  3 => 2,
  2 => 2,
  1 => 2,
);

echo $rating->getAverage($ratingsKeyValuePairList);
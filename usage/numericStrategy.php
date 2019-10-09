<?php
namespace App\Usage;

require '../vendor/autoload.php';
use App\CreateRating;

$initialiseRating = new CreateRating('number'); // number rating

$rating = $initialiseRating->index(1, 10);

echo $rating->rate(5). "<br />";

$ratingsKeyValuePairList = array
(
  '5' => 7,
  4 => 2,
  3 => 2,
  2 => 2,
  1 => 2,
);

echo $rating->getAverage($ratingsKeyValuePairList);

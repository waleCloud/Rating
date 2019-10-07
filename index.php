<?php
use App\CreateRating;

require 'vendor/autoload.php';

$initialiseRating = new CreateRating('number'); // number rating

$rating = $initialiseRating->index();

$rating->rate(4);

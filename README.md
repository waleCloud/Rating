# Rating

[![Build Status](https://travis-ci.org/waleCloud/Rating.svg?branch=master)](https://travis-ci.org/waleCloud/Rating) [![CircleCI](https://circleci.com/gh/waleCloud/Rating/tree/master.svg?style=svg)](https://circleci.com/gh/waleCloud/Rating/tree/master)[![Maintainability](https://api.codeclimate.com/v1/badges/4a974c8a845eb913f4ae/maintainability)](https://codeclimate.com/github/waleCloud/Rating/maintainability)[![Test Coverage](https://api.codeclimate.com/v1/badges/4a974c8a845eb913f4ae/test_coverage)](https://codeclimate.com/github/waleCloud/Rating/test_coverage)

A rating system that can be integrated with any customer satisfaction and feedback system

## Options
- Numeric: Similar to how star ratings work, you can customize it to have different ranges starting from 1- 3,4,5...99999.
- Voting: For Like or Dislike, Upvote or Downvote.

### Usage

`require '../vendor/autoload.php';`

`use App\CreateRating;`

- For `NUMERIC, RANGE`  based rating, click [here](numericStrategy.php)

`$initialiseRating = new CreateRating('number'); // number rating`

`$rating = $initialiseRating->index(1, 10);`

`echo $rating->rate(5);` // returns the rating provided

`$ratingsKeyValuePairList = array
(
  '5' => 7,
  4 => 2,
  3 => 2,
  2 => 2,
  1 => 2,
);`
`echo $rating->getAverage($ratingsKeyValuePairList);` // returns the average rating, provided arrays of ratings in key value pairs.

#
- For `Voting, Like/Dislike`  based rating, click [here](votingStrategy.php)

`$initialiseRating = new CreateRating('vote');` // voting rating

`$rating = $initialiseRating->index();` // no need to supply any argument

`echo $rating->rate(true);` // accepts 1/0, true/false returns 1 or 0

`$ratingVal = array(
  1,true,false, 0, 0, 0, 0,1,1,1,1,1
);`

`echo $rating->getAverage($ratingVal);` // takes in array of reactions, (true, false, 1, 0) returns `(yes=>7, no=>5)`

<?php

include_once("./Domain/Movie.php");
include_once("./Domain/MovieCollection.php");
include_once("./Domain/MovieFormatter.php");
include_once("./Domain/MovieStats.php");

$movie_1 =  new Movie('Gladiator', 2000, 138);
$movie_2 =  new Movie('Harry Potter and the Sorcerer’s Stone', 2001, 115);
$movie_3 =  new Movie('Forrest Gump', 1994, 125);
$movie_4 =  new Movie('Lord of the Rings: Fellowship of the rings', 2001, 178);
$movie_5 =  new Movie('Star Wars: New Hope', 1979, 131);

$my_collection = new MovieCollection([]);
$my_collection->add($movie_1);
$my_collection->add($movie_2);
$my_collection->add($movie_3);
$my_collection->add($movie_4);
$my_collection->add($movie_5);

echo "All movies: </br>";
MovieFormatter::renderList($my_collection->get());
echo "<br>";
echo ("Movies of 2001: </br>");
MovieFormatter::renderList($my_collection->findByYear(2001));

echo "<br>";
echo ("Longest movie: </br>");
MovieFormatter::render($my_collection->getLongestMovie());

echo "<br>";
echo "Filter by 'the': <br>";
MovieFormatter::renderList($my_collection->filterByKeyword('the'));

echo "<br>";
echo "Average movie length is':" . MovieStats::averageLength($my_collection->get()) . " min";

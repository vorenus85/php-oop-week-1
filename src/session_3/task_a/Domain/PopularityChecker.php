<?php
class PopularityChecker
{
    public static function isPopular(Book $book): bool
    {
        return $book->getLikes() > 0;
    }
}

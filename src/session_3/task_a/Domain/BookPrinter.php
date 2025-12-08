<?php

require_once __DIR__ . "/PopularityChecker.php";

class BookPrinter
{
    /**
     *
     * @param Book $book
     * @param boolean $isHTML
     * @return void
     */
    public static function print(Book $book, bool $isHTML = false)
    {
        $return = "";

        if ($isHTML) {
            $return .= '<strong>' . $book->getAuthor() . '</strong>: ' . $book->getTitle();
        } else {
            $return .= $book->getAuthor() . ': ' . $book->getTitle();
        }

        if (PopularityChecker::isPopular($book)) {
            $return .= ' - This book is popular!';
        }

        echo ($return . '<br>');
    }
}

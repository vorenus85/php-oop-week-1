<?php

class BookInputValidator
{

    /**
     *
     * @param string $title
     * @param string $author
     * @param integer $likes
     * @return void
     */
    public static function validate(string $title, string $author, int $likes)
    {
        self::validateTitle($title);
        self::validateAuthor($author);
        self::validateLikes($likes);
    }

    /**
     *
     * @param string $title
     * @return void
     */
    public static function validateTitle(string $title): void
    {
        if ($title === "") {
            throw new InvalidArgumentException('Title must be not empty');
        }
    }

    /**
     *
     * @param string $author
     * @return void
     */
    public static function validateAuthor(string $author): void
    {
        if ($author === "") {
            throw new InvalidArgumentException('Author must be not empty');
        }
    }

    /**
     *
     * @param integer $likes
     * @return void
     */
    public static function validateLikes(int $likes): void
    {
        if ($likes < 0) {
            throw new InvalidArgumentException('Likes must be positive number');
        }
    }
}

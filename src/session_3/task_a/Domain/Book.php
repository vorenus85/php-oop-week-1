<?php
require_once __DIR__ . "/BookInputValidator.php";

class Book
{
    private string $title;
    private string $author;
    private int $likes;

    /**
     *
     * @param string $title
     * @param string $author
     * @param integer $likes
     */
    public function __construct(string $title, string $author, int $likes = 0)
    {
        BookInputValidator::validate($title, $author, $likes);
        $this->title = $title;
        $this->author = $author;
        $this->likes = $likes;
    }

    /**
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        BookInputValidator::validateTitle($title);
        $this->title = $title;
    }

    /**
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     *
     * @param string $author
     * @return void
     */
    public function setAuthor(string $author): void
    {
        BookInputValidator::validateAuthor($author);
        $this->author = $author;
    }

    /**
     *
     * @return integer
     */
    public function getLikes(): int
    {
        return $this->likes;
    }

    /**
     *
     * @param integer $likes
     * @return void
     */
    public function addLikes(int $likes): void
    {
        BookInputValidator::validateLikes($likes);
        $this->likes += $likes;
    }
}

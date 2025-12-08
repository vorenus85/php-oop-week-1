<?php
require_once __DIR__ . "/BookPrinter.php";

class Library
{
    /**
     *
     * @var array<Book>
     */
    private array $books = [];

    /**
     *
     * @param array<Book> $books
     */
    public function __construct(array $books)
    {
        $this->books = $books;
    }

    /**
     *
     * @param Book $book
     * @return void
     */
    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    /**
     *
     * @return array<Book>
     */
    public function getBooks(): array
    {
        return $this->books;
    }

    /**
     *
     * @return array<Book>
     */
    public function getPopularBooks(): array
    {
        return array_filter($this->books, function ($book) {
            return $book->getLikes() > 0;
        });
    }

    /**
     *
     * @return void
     */
    public function showBooks(): void
    {
        foreach ($this->books as $book) {
            BookPrinter::print($book);
        }
    }

    /**
     *
     * @return void
     */
    public function showPopularBooks(): void
    {
        foreach ($this->getPopularBooks() as $book) {
            BookPrinter::print($book);
        }
    }
}

<?php

class BookInputValidator
{
    public static function validate(string $title, string $author, int $likes)
    {
        self::validateTitle($title);
        self::validateAuthor($author);
        self::validateLikes($likes);
    }

    public static function validateTitle(string $title): void
    {
        if (!$title) {
            throw new InvalidArgumentException('Title must be not empty');
        }
    }

    public static function validateAuthor(string $author): void
    {
        if (!$author) {
            throw new InvalidArgumentException('Author must be not empty');
        }
    }

    public static function validateLikes(int $likes): void
    {
        if ($likes < 0) {
            throw new InvalidArgumentException('Likes must be positive number');
        }
    }
}

class PopularityChecker
{
    public static function isPopular(Book $book): bool
    {
        return $book->getLikes() > 0;
    }
}

class BookPrinter
{
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

class Book
{
    private string $title;
    private string $author;
    private int $likes;

    public function __construct(string $title, string $author, int $likes = 0)
    {
        BookInputValidator::validate($title, $author, $likes);
        $this->title = $title;
        $this->author = $author;
        $this->likes = $likes;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        BookInputValidator::validateTitle($title);
        $this->title = $title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(int $author)
    {
        BookInputValidator::validateAuthor($author);
        $this->author = $author;
    }

    public function getLikes(): string
    {
        return $this->likes;
    }

    public function addLikes(int $likes)
    {
        BookInputValidator::validateLikes($likes);
        $this->likes += $likes;
    }
}

class Library
{
    private array $books = [];

    public function __construct(array $books)
    {
        $this->books = $books;
    }

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function getPopularBooks()
    {
        return array_filter($this->books, function ($book) {
            return $book->getLikes() > 0;
        });
    }

    public function showBooks()
    {
        foreach ($this->books as $book) {
            BookPrinter::print($book);
        }
    }

    public function showPopularBooks()
    {
        foreach ($this->getPopularBooks() as $book) {
            BookPrinter::print($book);
        }
    }
}




$book_1 = new Book('Harry Potter 1', 'J. K. Rowling', 0);
$book_2 = new Book('Game of Thrones 1', 'Gergge R. R. Martin', 0);
$book_3 = new Book('Bello Gallico', 'Julius Ceasar', 0);

$book_2->addLikes(10);
$book_3->addLikes(2);

// BookPrinter::print($book_1);
// BookPrinter::print($book_2, true);
// BookPrinter::print($book_3);

$library = new Library([]);
$library->addBook($book_1);
$library->addBook($book_2);
$library->addBook($book_3);

$library->showBooks();
echo "<br>";
$library->showPopularBooks();

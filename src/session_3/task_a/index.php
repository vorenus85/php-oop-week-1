<?php
include_once("./Domain/Book.php");
include_once("./Domain/Library.php");

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

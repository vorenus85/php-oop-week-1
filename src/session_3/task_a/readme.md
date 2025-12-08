## 🟩 3. Feladatpár
### (A) SPAGETTI → OOP (Téma: Könyves alkalmazás)
** Spagetti kód (refaktorálandó) **
```php
$bookTitle = "Harry Potter";
$author = "J.K. Rowling";
$favorites = 120;


echo "Könyv: $bookTitle\n";
echo "Író: $author\n";
echo "Kedvelések száma: $favorites\n";


if ($favorites > 100) {
    echo "Ez a könyv nagyon népszerű!";
}
```

#### Megkötések
- Book class: 
    - tárolja a könyv címét, íróját, kedvelések számát
- PopularityChecker class: 
    - legyen metódus isPopular(Book $book): bool, ami eldönti, hogy a könyv népszerű-e
- BookPrinter class: 
    - legyen metódus print(Book $book), ami szép formában kiírja a könyvet, és ha népszerű, jelzi


#### Nice-to-have
- Library class: több könyvet kezel, listázni, szűrni kedvelések alapján
- Lehetőség többféle kiírás formátumra (pl. HTML, szöveg)

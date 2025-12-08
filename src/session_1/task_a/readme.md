## ✅ 1. Modul — Bevezető OOP alapok (1–1.5 óra)
Cél: megérteni az osztály, property, metódus, konstruktor, visibilities, basic encapsulation működését.

### ➤ (A) Procedurális → OOP refaktor feladat
Procedurális kiinduló kód:
```php
$products = [
    ['name' => 'Pizza Margherita', 'price' => 2500],
    ['name' => 'Carbonara', 'price' => 3200],
];

function getTotalPrice($products) {
    $total = 0;
    foreach($products as $product) {
        $total += $product['price'];
    }
    return $total;
}

echo "Total price: " . getTotalPrice($products) . " Ft";
```

####  ✔️ Feladatok
- Hozz létre egy Product osztályt (name, price property).
- Hozz létre egy Cart osztályt:
    - addProduct()
    - getTotal()

####  Később:

- védelem: negatív ár ne mehessen be
- getProducts() adjon vissza DTO-t (pl. tömb), ne belső state-t

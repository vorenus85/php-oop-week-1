## 🟦 5. Feladatpár — Közepesen komplex üzleti logika
### (A) SPAGETTI → OOP (Téma: Éttermi rendelés + kedvezmény)
Refaktoráld:
```php
$order = [
    ['name' => 'Hamburger', 'price' => 2500, 'qty' => 2],
    ['name' => 'Sült krumpli', 'price' => 1200, 'qty' => 1],
    ['name' => 'Cola', 'price' => 600, 'qty' => 3]
];

$total = 0;

foreach ($order as $item) {
    $total += $item['price'] * $item['qty'];
}

$discount = 0;

if ($total > 5000 && $total < 10000) {
    $discount = $total * 0.1;
} elseif ($total >= 10000) {
    $discount = $total * 0.2;
}

echo "Fizetendő: " . ($total - $discount);
```

#### 🔹 Kötelező megkötések
- MenuItem (name, price)
- OrderItem (MenuItem, qty)
- Order:
    - getSubtotal()
    - getFinalAmount()
- kedvezmény logika kerül külön class-ba:
- DiscountPolicy interface
- TieredDiscountPolicy (10%, 20%)


#### 🔹 Nice-to-have
- OrderPrinter külön felelősséggel
- többféle kedvezmény stratégia (Strategy minta)
- áfa számítás külön osztályban

## (B) ÚJ TÉMA: OOP megvalósítás (Téma: Streaming platform ajánlórendszer)
### Építs egy mini ajánlórendszert streaming platformhoz.

- Osztályok:
    - 1. Content
        - title
        - genre
        - rating (1–10)
    - 2. User
        - username
        - preferredGenres (tömb)
        - minimumRating elvárás
    - 3. RecommendationEngine
        - recommend(User $user, array $contents): array
            - csak azokat a filmeket/sorozatokat adja vissza,
                - amelyek:
                    - megfelelnek a kedvenc műfajoknak
                    - rating ≥ user minimum rating


#### Kötelező megkötések
- RecommendationEngine ne végezzen I/O műveletet
- genre összehasonlításnál tömbmetszetet használj
- rating legyen float


#### Nice-to-have
- többféle ajánló algoritmus (Strategy)
- pontozási rendszer pl. relevancia alapján
- ContentCollection osztály

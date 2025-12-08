## 🟦 6. Feladatpár — Összetettebb adatszerkezet + szabályrendszer
### (A) SPAGETTI → OOP (Téma: Raktárkészlet kezelés)
Refaktor:
```php
$items = [
    ['sku' => 'ABC123', 'stock' => 10],
    ['sku' => 'XYZ555', 'stock' => 0],
    ['sku' => 'QWE789', 'stock' => 3]
];

foreach ($items as $item) {
    echo $item['sku'] . ": " . $item['stock'] . "\n";
}

$sku = "QWE789";
$newQty = 5;

foreach ($items as &$item) {
    if ($item['sku'] === $sku) {
        $item['stock'] += $newQty;
    }
}
```

#### Kötelező megkötések
- StockItem (sku, stock)
- Inventory class:
    - addItem(StockItem $i)
    - increaseStock(string $sku, int $amount)
    - getStock(string $sku): ?int
- SKU ellenőrzés történjen külön validatorban (SkuValidator)


#### Nice-to-have
- OutOfStockDetector
- LowStockNotifier
- custom exception osztályok



## (B) ÚJ TÉMA: OOP megvalósítás (Téma: Egyszerű banki tranzakciós rendszer)
### Építs mini banki tranzakciós modellt.
Osztályok:
- 1. Account
    - accountNumber
    - owner
    - balance
- 2. Transaction
    - fromAccount
    - toAccount
    - amount
    - timestamp
    - apply(): void
- 3. Bank
    - tárolja az Account példányokat
        - metódusok:
        - addAccount(Account $a)
        - executeTransaction(Transaction $t)
        - getBalance(string $accountNumber): int


#### Kötelező megkötések
- negatív egyenleg nem engedélyezett
- Account legyen felelős az egyenleg módosításért
- Bank NEM módosíthat közvetlenül balance-t, csak az Account metódusain keresztül


#### Nice-to-have
- központi logger
- InsufficientFundsException
- TransactionHistory osztály
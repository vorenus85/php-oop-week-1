## 🟩 2. Feladatpár

### (A) SPAGETTI → OOP (Téma: Időjárás riport generálása)
Refaktoráld az alábbi kódot:
```php
$temp = 12;
$humidity = 60;
$wind = 12;


echo "Mai időjárás:\n";
echo "Hőmérséklet: " . $temp . "°C\n";
echo "Páratartalom: " . $humidity . "%\n";
echo "Szélsebesség: " . $wind . " km/h\n";


if ($temp < 0) {
    echo "Figyelem: Fagyveszély!\n";
}


if ($humidity > 80) {
    echo "Magas páratartalom!\n";
}
```

#### 🔹 Megkötések
- WeatherReport class: temperature, humidity, wind
- metódusok:
    - printReport()
    - getWarnings(): array → visszaadja a figyelmeztetéseket
- a figyelmeztetés logika kerüljön külön metódusba


#### 🔹 Nice-to-have
- WeatherAnalyzer külön osztály, ami eldönti a veszélyhelyzeteket
- WeatherReportFormatter osztály a formázásra
- típusannotációk
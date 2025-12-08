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

## (B) ÚJ TÉMA: OOP megvalósítás (Téma: Edzésnapló / Fitness Tracker)

Készíts egy mini Exercise Tracker rendszert!

### Osztályok:

- 1. Exercise
    - név
    - elégetett kalória per perc
- 2. TrainingSession
    - exercise (Exercise)
    - duration (perc)
    - getBurnedCalories()
- 3. WorkoutLog
    - több TrainingSession tárolása
    - metódusok:
        - addSession(TrainingSession $s)
        - getTotalCalories()
        - getSummary(): string

#### Megkötések
- legalább 3 különböző edzés
- minden osztály privát property-ket használjon
- MINDEN metódus kapjon tiszta paraméter- és visszatérési típust


#### Nice-to-have
- WorkoutStats külön helper osztály
- napi cél megadása (pl. 500 kcal) és ellenőrzése

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

## (B) ÚJ TÉMA: OOP megvalósítás (Téma: Filmek kezelése)
### Készíts egy mini filmkezelő rendszert!
- Osztályok:
    - 1. Movie
        - cím
        - év
        - hossz (perc)
    - 2. MovieCollection
        - több Movie tárolása
            - metódusok:
                - add(Movie $m)
                - findByYear(int $year):array
                - getLongestMovie(): Movie
    - 3. MovieFormatter
        - format(Movie $m): string
        - → pl.: "Inception (2010) – 148 perc"

#### Megkötések
- legalább 5 filmet adj hozzá a kollekcióhoz
- a MovieCollection NEM írhat ki semmit → csak adatok
- a formázás és keresés külön felelősség


#### Nice-to-have
- sortByLength()
- filterByKeyword(string $k)
- Stats osztály: átlagos filmhossz kiszámítása
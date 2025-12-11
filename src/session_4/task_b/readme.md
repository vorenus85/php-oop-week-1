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

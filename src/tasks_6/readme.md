## 🟦 7. Feladatpár — Többosztályos architektúra + kis “mini domain”
### (A) SPAGETTI → OOP (Téma: Egyszerű tudáspróba / Quiz)
Refaktoráld:
```php
$questions = [
    ['q' => 'Melyik évben volt 1956?', 'a' => '1956'],
    ['q' => '2+2?', 'a' => '4']
];

$correct = 0;

foreach ($questions as $q) {
    echo $q['q'] . "\n";
    $userAnswer = '4'; // csak teszt miatt
    if ($userAnswer === $q['a']) {
        $correct++;
    }
}

echo "Pontszám: $correct";
```

#### Kötelező megkötések
- Question (text, answer)
- Quiz class:
    - addQuestion(Question $q)
    - grade(array $userAnswers): int
- legyen külön osztály, ami kezeli a felhasználói választ: QuizRunner (később UI-hoz jó)


#### Nice-to-have
- több válaszlehetőséges rendszer (A/B/C/D)
- időzítés
- pontozás súly alapján



## (B) ÚJ TÉMA: OOP megvalósítás (Téma: Egyszerű projekt menedzsment / Tasks)
### Építs mini projekt/task követőt.
- Osztályok:
    - 1. Task
        - title
        - description
        - status (todo, doing, done)
    - 2. Project
        - name
        - tasks (Task[])
        - metódusok:
            - addTask(Task $t)
            - getTasksByStatus(string $status): array
    - 3. TaskStatusValidator
        - valid status értékek ellenőrzése


#### Kötelező megkötések
- status csak a 3 közül lehet
- Project NEM végez validációt — delegálja a validatornak
- Task csak saját mezőit kezeli

#### Nice-to-have
- státuszváltás időbélyeggel
- ProjectStats → összesített adatok
- sorrendezés priority alapján

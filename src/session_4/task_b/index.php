<?php
/*
include_once './Domain/Genre.php';
include_once './Domain/Content.php';
include_once './Domain/ContentCollection.php';
include_once './Domain/User.php';
include_once './Domain/RecommendationEngine.php';
*/

enum Genre: string
{
    case SCI_FI = 'sci-fi';
    case DRAMA = 'drama';
    case ROMANTIC = 'romantic';
    case COMEDY = 'comedy';
    case HORROR = 'horror';
}

class ContentInputValidator
{

    /**
     *
     * @param string $title
     * @param float $rating
     * @return void
     */
    public function validate(string $title, float $rating): void
    {
        $this->validateTitle($title);
        $this->validateRating($rating);
    }

    /**
     *
     * @param string $title
     * @return void
     */
    private function validateTitle(string $title): void
    {
        BasicInputValidator::stringValidation($title, 'title');
    }

    /**
     *
     * @param float $rating
     * @return void
     */
    private function validateRating(float $rating): void
    {
        BasicInputValidator::ratingValidation($rating, 'rating');
    }
}

class ContentCollection
{
    /**
     * Undocumented variable
     *
     * @var array<Content>
     */
    private array $contents;

    public function __construct()
    {
        $this->contents = [];
    }

    /**
     *
     * @param Content $content
     * @return void
     */
    public function add(Content $content): void
    {
        $this->contents[] = $content;
    }

    /**
     *
     * @return array<Content>
     */
    public function get(): array
    {
        return $this->contents;
    }
}

class Content
{
    private string $title;
    private Genre $genre;
    private float $rating;

    /**
     *
     * @param string $title
     * @param Genre $genre
     * @param float $rating
     */
    public function __construct(string $title, Genre $genre, float $rating)
    {

        $contentValidator = new ContentInputValidator();

        $contentValidator->validate($title, $rating);
        $this->title = $title;
        $this->genre = $genre;
        $this->rating = $rating;
    }

    /**
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     *
     * @return Genre
     */
    public function getGenre(): Genre
    {
        return $this->genre;
    }

    /**
     *
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }
}

class BasicInputValidator
{
    /**
     *
     * @param string $value
     * @param string $fieldName
     * @return void
     */
    public static function stringValidation(string $value, string $fieldName): void
    {
        if (strlen($value) < 1) {
            throw new InvalidArgumentException('Missing ' . $fieldName . ' parameter');
        }
    }

    /**
     *
     * @param float $value
     * @param string $fieldName
     * @return void
     */
    public static function ratingValidation(float $value, string $fieldName): void
    {
        if ($value < 0 || $value > 10) {
            throw new InvalidArgumentException($fieldName . ' must be 0 and 10');
        }
    }
}


class UserInputValidator
{
    /**
     *
     * @param string $username
     * @param float $rating
     * @return void
     */
    public function validate(string $username, float $rating): void
    {
        $this->validateUsername($username);
        $this->validateMinimumRating($rating);
    }

    /**
     *
     * @param string $username
     * @return void
     */
    private function validateUsername(string $username): void
    {
        BasicInputValidator::stringValidation($username, 'username');
    }

    /**
     *
     * @param float $minimumRating
     * @return void
     */
    private function validateMinimumRating(float $minimumRating): void
    {
        BasicInputValidator::ratingValidation($minimumRating, 'minimumRating');
    }
}

class User
{
    private string $username;
    /**
     *
     * @var array<Genre>
     */
    private array $preferredGenres;
    private float $minimumRating;

    /**
     *
     * @param string $username
     * @param array<Genre> $preferredGenres
     * @param float $minimumRating
     */
    public function __construct(string $username, array $preferredGenres, float $minimumRating)
    {
        $userInputValidator = new UserInputValidator();
        $userInputValidator->validate($username, $minimumRating);

        $this->username = $username;
        $this->preferredGenres = $preferredGenres;
        $this->minimumRating = $minimumRating;
    }

    /**
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     *
     * @return array<Genre>
     */
    public function getPreferredGenres(): array
    {
        return $this->preferredGenres;
    }

    /**
     *
     * @return float
     */
    public function getMinimumRating(): float
    {
        return $this->minimumRating;
    }
}

class RecommendationEngine
{

    /**
     *
     * @param User $user
     * @param array<Content> $contents
     * @return array<Content>
     */
    public static function recommend(User $user, array $contents): array
    {
        $result = [];
        foreach ($contents as $content) {
            $genre = $content->getGenre();
            $rating = $content->getRating();

            if (in_array($genre, $user->getPreferredGenres(), true)) {
                if ($rating >= $user->getMinimumRating()) {
                    $result[] = $content;
                }
            }
        }

        return $result;
    }
}


// rating ≥ 5 (21 db)
$content_1 = new Content('Star Wars', Genre::SCI_FI, 9.1);
$content_2 = new Content('Titanic', Genre::ROMANTIC, 9.5);
$content_3 = new Content('Whisperers', Genre::DRAMA, 7.1);
$content_4 = new Content('Star Trek', Genre::SCI_FI, 8.4);
$content_5 = new Content('Forrest Gump', Genre::DRAMA, 9.2);
$content_6 = new Content('Provance', Genre::ROMANTIC, 6.1);
$content_7 = new Content('Chicago', Genre::ROMANTIC, 7.5);
$content_8 = new Content('Interstellar', Genre::SCI_FI, 8.9);
$content_9 = new Content('The Notebook', Genre::ROMANTIC, 7.9);
$content_10 = new Content('The Godfather', Genre::DRAMA, 9.7);
$content_11 = new Content('Blade Runner 2049', Genre::SCI_FI, 8.1);
$content_12 = new Content('A Beautiful Mind', Genre::DRAMA, 8.2);
$content_13 = new Content('Arrival', Genre::SCI_FI, 7.8);
$content_14 = new Content('La La Land', Genre::ROMANTIC, 8.0);
$content_15 = new Content('The Hangover', Genre::COMEDY, 7.2);
$content_16 = new Content('Get Out', Genre::HORROR, 7.6);
$content_17 = new Content('Avengers', Genre::SCI_FI, 8.3);
$content_18 = new Content('The Lion King', Genre::COMEDY, 8.7);
$content_19 = new Content('Pulp Fiction', Genre::DRAMA, 9.0);
$content_20 = new Content('The Shining', Genre::HORROR, 7.4);
$content_21 = new Content('Crazy Rich Asians', Genre::ROMANTIC, 7.0);

$content_22 = new Content('Wing Commander', Genre::SCI_FI, 4.8);
$content_23 = new Content('Dolly', Genre::ROMANTIC, 4.2);
$content_24 = new Content('Arthur', Genre::DRAMA, 3.5);
$content_25 = new Content('After Earth', Genre::SCI_FI, 4.9);
$content_26 = new Content('The Roommate', Genre::DRAMA, 3.8);
$content_27 = new Content('Scary Movie 5', Genre::COMEDY, 4.4);
$content_28 = new Content('Love Again', Genre::ROMANTIC, 5.0);
$content_29 = new Content('Horror Nights', Genre::HORROR, 4.1);
$content_30 = new Content('Disaster Movie', Genre::COMEDY, 3.9);

$contentCollection = new ContentCollection();

$contentCollection->add($content_1);
$contentCollection->add($content_2);
$contentCollection->add($content_3);
$contentCollection->add($content_4);
$contentCollection->add($content_5);
$contentCollection->add($content_6);
$contentCollection->add($content_7);
$contentCollection->add($content_8);
$contentCollection->add($content_9);
$contentCollection->add($content_10);
$contentCollection->add($content_11);
$contentCollection->add($content_12);
$contentCollection->add($content_13);
$contentCollection->add($content_14);
$contentCollection->add($content_15);
$contentCollection->add($content_16);
$contentCollection->add($content_17);
$contentCollection->add($content_18);
$contentCollection->add($content_19);
$contentCollection->add($content_20);
$contentCollection->add($content_21);
$contentCollection->add($content_22);
$contentCollection->add($content_22);
$contentCollection->add($content_23);
$contentCollection->add($content_24);
$contentCollection->add($content_25);
$contentCollection->add($content_26);
$contentCollection->add($content_27);
$contentCollection->add($content_28);
$contentCollection->add($content_29);
$contentCollection->add($content_30);

$user_1 = new User('User 1', [Genre::SCI_FI, Genre::DRAMA], 7);
$user_2 = new User('User 2', [Genre::SCI_FI, Genre::ROMANTIC, Genre::COMEDY], 6);
$user_3 = new User('User 3', [Genre::DRAMA, Genre::HORROR], 8);
$user_4 = new User('User 4', [Genre::SCI_FI, Genre::DRAMA, Genre::COMEDY, Genre::HORROR], 6.5);
$user_5 = new User('User 5', [Genre::ROMANTIC], 7.5);

$recommends_1 = RecommendationEngine::recommend($user_1, $contentCollection->get());
$recommends_2 = RecommendationEngine::recommend($user_2, $contentCollection->get());
$recommends_3 = RecommendationEngine::recommend($user_3, $contentCollection->get());
$recommends_4 = RecommendationEngine::recommend($user_4, $contentCollection->get());
$recommends_5 = RecommendationEngine::recommend($user_5, $contentCollection->get());

echo "User 1:";
echo "<br>";
foreach ($recommends_1 as $content) {
    echo ($content->getTitle());
    echo "<br>";
}
echo "--------------<br>";

echo "User 2:";
echo "<br>";
foreach ($recommends_2 as $content) {
    echo ($content->getTitle());
    echo "<br>";
}
echo "--------------<br>";

echo "User 3:";
echo "<br>";
foreach ($recommends_3 as $content) {
    echo ($content->getTitle());
    echo "<br>";
}
echo "--------------<br>";

echo "User 4:";
echo "<br>";
foreach ($recommends_4 as $content) {
    echo ($content->getTitle());
    echo "<br>";
}
echo "--------------<br>";

echo "User 5:";
echo "<br>";
foreach ($recommends_5 as $content) {
    echo ($content->getTitle());
    echo "<br>";
}
echo "--------------<br>";

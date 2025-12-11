<?php

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

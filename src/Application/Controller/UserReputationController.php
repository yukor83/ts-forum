<?php

declare(strict_types=1);

namespace Terricon\Forum\Application\Controller;

use Terricon\Forum\Domain\model\UserReputation;

class UserReputationController extends UserReputation
{
    public function __construct(
       public int $userId
    ) {
    }

    public function changeScore(int $userId, string $action, array $ReputationScores): void
    {
        $userScore = $this->getScore($userId);
        
        foreach($ReputationScores as $reputationScore)
        {
            if ($reputationScore['action'] == $action) {
                if ((($userScore + $reputationScore['score']) >= MIN_SCORE) & (($userScore + $reputationScore['score']) <= MAX_SCORE)) {
                    $userScore += $reputationScore['score'];
                    $this->saveScore($userId, $userScore);
                    dump($userScore);
                }
            }
        }
    }

    public function getScore(int $userId) : int
    {
        return $this->loadScore($userId);
    }
}
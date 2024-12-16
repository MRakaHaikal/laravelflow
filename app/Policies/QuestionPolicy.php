<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Question;

class QuestionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Question $question): bool
    {
        return $user->id === $question->user_id;
    }

    public function delete(User $user, Question $question): bool
    {
        return $user->id === $question->user_id && $question->answers()->count() < 1;
    }
}

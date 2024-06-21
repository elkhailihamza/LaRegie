<?php

namespace App\Policies;

use App\Models\User;

class ViewPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user)
    {
        return $user->profile_id > 2;
    }
}

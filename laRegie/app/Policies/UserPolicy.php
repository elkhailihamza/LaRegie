<?php

namespace App\Policies;

use App\Models\Metier;
use App\Models\User;

class userPolicy
{
    /**
     * Create a new policy instance.
     */
    public function AdminView(User $user)
    {
        return $user->profile_id == 3;
    }
    public function OperateurView(User $user)
    {
        return $user->profile_id == 2;
    }
    public function HigherAuthView(User $user)
    {
        return $user->profile_id >= 2;
    }
    public function UserMetier(User $user, Metier $metier)
    {
        return $user->metier->metier_nom == $metier->metier_nom;
    }
}

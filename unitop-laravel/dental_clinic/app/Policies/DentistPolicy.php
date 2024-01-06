<?php

namespace App\Policies;

use App\Models\User;
use Auth;

class DentistPolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user): bool
    {
        if (Auth::user()->name === 'Administrator') {
            return true;
        }
        return false;
    }
    public function update(User $user): bool
    {
        if (Auth::user()->name === 'Administrator') {
            return true;
        }
        return false;
    }
}

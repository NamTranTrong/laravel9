<?php

namespace App\Policies;

use App\Models\User;
use Auth;

class PlanPolicy
{
    public function create(User $user): bool
    {
        if (Auth::user()->name === 'Staff') {
            return true;
        }
        return false;
    }

}

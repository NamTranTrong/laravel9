<?php

namespace App\Policies;

use App\Models\User;
use Auth;

class ApointmentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function index(User $user): bool
    {
        $userName = Auth::user()->name;

        if ($userName === 'Staff' || $userName === 'Administrator') {
            return true;
        }
    
        return false;
    }

    public function delete(User $user): bool
    {
        $userName = Auth::user()->name;

        if ($userName === 'Staff' || $userName === 'Administrator') {
            return true;
        }
    
        return false;
    }
}

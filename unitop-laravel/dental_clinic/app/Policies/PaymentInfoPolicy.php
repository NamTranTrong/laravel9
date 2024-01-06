<?php

namespace App\Policies;

use App\Models\User;
use Auth;

class PaymentInfoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function index(User $user): bool
    {
        if (Auth::user()->name === 'Dentist') {
            return true;
        }
        return false;
    }
}

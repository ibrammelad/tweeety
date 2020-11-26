<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function edit(User $Current_user, User $user)
    {
        return $Current_user->is($user);
    }

}

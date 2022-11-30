<?php

namespace App\Policies;

use App\Traits\AdminPolicyTrait;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    use AdminPolicyTrait;

    public function duplicate(User $user): bool
    {
        return $user->isWyvern() || $user->isElemental() || $user->isAdmin();
    }
}

<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    

    public function viewAny(User $user)
    {
        return $user->superadmin;
    }


    public function view(User $user, User $model)
    {
        return $user->id === $model->id;
    }


    public function create(User $user)
    {
        return $user->superadmin;
    }


    public function update(User $user, User $model)
    {
        return $user->superadmin;
    }

    public function delete(User $user, User $model)
    {
        return $user->superadmin;
    }


    public function restore(User $user, User $model)
    {
        return $user->superadmin;
    }


    public function forceDelete(User $user, User $model)
    {
        return $user->superadmin;
    }

}

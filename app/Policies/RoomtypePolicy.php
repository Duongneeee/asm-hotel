<?php

namespace App\Policies;

use App\Models\Roomtype;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RoomtypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Roomtype $roomtype): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return getRole($user,'roomtypes','add');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return getRole($user,'roomtypes','edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return getRole($user,'roomtypes','delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return getRole($user,'roomtypes','restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return getRole($user,'roomtypes','forcedelete');
    }
}

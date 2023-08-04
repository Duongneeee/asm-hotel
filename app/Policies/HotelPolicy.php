<?php

namespace App\Policies;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HotelPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $roleJson = $user->role->permissions;

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);

            $check = isRole($roleArr, 'hotels');

            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hotel $hotel): bool
    {
        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // $roleJson = $user->role->permissions;

        // if (!empty($roleJson)) {
        //     $roleArr = json_decode($roleJson, true);

        //     $check = isRole($roleArr, 'hotels','add');

        //     return $check;
        // }
        // return false;
        return getRole($user,'hotels','add');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return getRole($user,'hotels','edit');
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return getRole($user,'hotels','delete');
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return getRole($user,'hotels','restore');
        
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return getRole($user,'hotels','forcedelete');
        
    }
}

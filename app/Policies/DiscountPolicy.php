<?php

namespace App\Policies;

use App\Models\Discount;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DiscountPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Discount $discount): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return getRole($user,'discounts','add');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        return getRole($user,'discounts','edit');
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        return getRole($user,'discounts','delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return getRole($user,'discounts','restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return getRole($user,'discounts','forcedelete');
    }
}
<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny($user): bool
    {
        return $user->can('view-admins');
    }

    /**
     * Determine whether the user can view the model.
     */

    // public function view($user, Admin $admin): bool
    // {
    //     return true;
    // }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user->can('create-admins');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Admin $admin): bool
    {
        return $user->can('update-admins');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny($user): bool
    {
        return $user->can('delete-admins');
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;


class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny($user): bool
    {
        return $user->can('view-roles');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user->can('create-roles');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Role $role): bool
    {
        return $user->can('update-roles');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny($user): bool
    {
        return $user->can('delete-roles');
    }

}

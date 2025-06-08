<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Store;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StorePolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny($user): bool
    {
        return $user->can('view-stores');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user->can('create-stores');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Store $store): bool
    {
        return $user->can('update-stores');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny($user): bool
    {
        return $user->can('delete-stores');
    }
}

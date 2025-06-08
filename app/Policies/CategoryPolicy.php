<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Category;


class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny($user): bool
    {
        return $user->can('view-categories');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user->can('create-categories');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Category $category): bool
    {
        return $user->can('update-categories');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny($user): bool
    {
        return $user->can('delete-categories');
    }
}

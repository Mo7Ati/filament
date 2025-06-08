<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */

    public function viewAny($user): bool
    {
        return $user->can('view-products');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create($user): bool
    {
        return $user->can('create-products');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Product $product): bool
    {
        return $user->can('update-products');
    }

    /**
     * Determine whether the user can delete the model.
     */
     public function deleteAny($user): bool
    {
        return $user->can('delete-products');
    }
}

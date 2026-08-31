<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Breed;
use Illuminate\Auth\Access\HandlesAuthorization;

class BreedPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Breed');
    }

    public function view(AuthUser $authUser, Breed $breed): bool
    {
        return $authUser->can('View:Breed');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Breed');
    }

    public function update(AuthUser $authUser, Breed $breed): bool
    {
        return $authUser->can('Update:Breed');
    }

    public function delete(AuthUser $authUser, Breed $breed): bool
    {
        return $authUser->can('Delete:Breed');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Breed');
    }

    public function restore(AuthUser $authUser, Breed $breed): bool
    {
        return $authUser->can('Restore:Breed');
    }

    public function forceDelete(AuthUser $authUser, Breed $breed): bool
    {
        return $authUser->can('ForceDelete:Breed');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Breed');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Breed');
    }

    public function replicate(AuthUser $authUser, Breed $breed): bool
    {
        return $authUser->can('Replicate:Breed');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Breed');
    }

}
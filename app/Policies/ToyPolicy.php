<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Toy;
use Illuminate\Auth\Access\HandlesAuthorization;

class ToyPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Toy');
    }

    public function view(AuthUser $authUser, Toy $toy): bool
    {
        return $authUser->can('View:Toy');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Toy');
    }

    public function update(AuthUser $authUser, Toy $toy): bool
    {
        return $authUser->can('Update:Toy');
    }

    public function delete(AuthUser $authUser, Toy $toy): bool
    {
        return $authUser->can('Delete:Toy');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Toy');
    }

    public function restore(AuthUser $authUser, Toy $toy): bool
    {
        return $authUser->can('Restore:Toy');
    }

    public function forceDelete(AuthUser $authUser, Toy $toy): bool
    {
        return $authUser->can('ForceDelete:Toy');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Toy');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Toy');
    }

    public function replicate(AuthUser $authUser, Toy $toy): bool
    {
        return $authUser->can('Replicate:Toy');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Toy');
    }

}
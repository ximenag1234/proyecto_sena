<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Species;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpeciesPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Species');
    }

    public function view(AuthUser $authUser, Species $species): bool
    {
        return $authUser->can('View:Species');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Species');
    }

    public function update(AuthUser $authUser, Species $species): bool
    {
        return $authUser->can('Update:Species');
    }

    public function delete(AuthUser $authUser, Species $species): bool
    {
        return $authUser->can('Delete:Species');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Species');
    }

    public function restore(AuthUser $authUser, Species $species): bool
    {
        return $authUser->can('Restore:Species');
    }

    public function forceDelete(AuthUser $authUser, Species $species): bool
    {
        return $authUser->can('ForceDelete:Species');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Species');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Species');
    }

    public function replicate(AuthUser $authUser, Species $species): bool
    {
        return $authUser->can('Replicate:Species');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Species');
    }

}
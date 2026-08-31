<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\BathRoutine;
use Illuminate\Auth\Access\HandlesAuthorization;

class BathRoutinePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:BathRoutine');
    }

    public function view(AuthUser $authUser, BathRoutine $bathRoutine): bool
    {
        return $authUser->can('View:BathRoutine');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:BathRoutine');
    }

    public function update(AuthUser $authUser, BathRoutine $bathRoutine): bool
    {
        return $authUser->can('Update:BathRoutine');
    }

    public function delete(AuthUser $authUser, BathRoutine $bathRoutine): bool
    {
        return $authUser->can('Delete:BathRoutine');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:BathRoutine');
    }

    public function restore(AuthUser $authUser, BathRoutine $bathRoutine): bool
    {
        return $authUser->can('Restore:BathRoutine');
    }

    public function forceDelete(AuthUser $authUser, BathRoutine $bathRoutine): bool
    {
        return $authUser->can('ForceDelete:BathRoutine');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:BathRoutine');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:BathRoutine');
    }

    public function replicate(AuthUser $authUser, BathRoutine $bathRoutine): bool
    {
        return $authUser->can('Replicate:BathRoutine');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:BathRoutine');
    }

}
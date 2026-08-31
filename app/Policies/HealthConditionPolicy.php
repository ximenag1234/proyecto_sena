<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\HealthCondition;
use Illuminate\Auth\Access\HandlesAuthorization;

class HealthConditionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:HealthCondition');
    }

    public function view(AuthUser $authUser, HealthCondition $healthCondition): bool
    {
        return $authUser->can('View:HealthCondition');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:HealthCondition');
    }

    public function update(AuthUser $authUser, HealthCondition $healthCondition): bool
    {
        return $authUser->can('Update:HealthCondition');
    }

    public function delete(AuthUser $authUser, HealthCondition $healthCondition): bool
    {
        return $authUser->can('Delete:HealthCondition');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:HealthCondition');
    }

    public function restore(AuthUser $authUser, HealthCondition $healthCondition): bool
    {
        return $authUser->can('Restore:HealthCondition');
    }

    public function forceDelete(AuthUser $authUser, HealthCondition $healthCondition): bool
    {
        return $authUser->can('ForceDelete:HealthCondition');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:HealthCondition');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:HealthCondition');
    }

    public function replicate(AuthUser $authUser, HealthCondition $healthCondition): bool
    {
        return $authUser->can('Replicate:HealthCondition');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:HealthCondition');
    }

}
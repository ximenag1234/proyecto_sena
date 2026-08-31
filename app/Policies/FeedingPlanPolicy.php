<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FeedingPlan;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedingPlanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FeedingPlan');
    }

    public function view(AuthUser $authUser, FeedingPlan $feedingPlan): bool
    {
        return $authUser->can('View:FeedingPlan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FeedingPlan');
    }

    public function update(AuthUser $authUser, FeedingPlan $feedingPlan): bool
    {
        return $authUser->can('Update:FeedingPlan');
    }

    public function delete(AuthUser $authUser, FeedingPlan $feedingPlan): bool
    {
        return $authUser->can('Delete:FeedingPlan');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:FeedingPlan');
    }

    public function restore(AuthUser $authUser, FeedingPlan $feedingPlan): bool
    {
        return $authUser->can('Restore:FeedingPlan');
    }

    public function forceDelete(AuthUser $authUser, FeedingPlan $feedingPlan): bool
    {
        return $authUser->can('ForceDelete:FeedingPlan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FeedingPlan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FeedingPlan');
    }

    public function replicate(AuthUser $authUser, FeedingPlan $feedingPlan): bool
    {
        return $authUser->can('Replicate:FeedingPlan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FeedingPlan');
    }

}
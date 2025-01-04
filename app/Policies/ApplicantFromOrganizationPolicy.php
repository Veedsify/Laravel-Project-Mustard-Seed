<?php

namespace App\Policies;

use App\Models\ApplicantFromOrganization;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ApplicantFromOrganizationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $roles = ["admin", "volunteer", "user"];
        return in_array($user->role, $roles)
            ? true
            : false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ApplicantFromOrganization $applicantFromOrganization): bool
    {
        $roles = ["admin", "volunteer", "user"];
        return in_array($user->role, $roles)
            ? true
            : false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $roles = ["admin", "volunteer"];
        return in_array($user->role, $roles)
            ? true
            : false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ApplicantFromOrganization $applicantFromOrganization): bool
    {
        $roles = ["admin", "volunteer"];
        return in_array($user->role, $roles)
            ? true
            : false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ApplicantFromOrganization $applicantFromOrganization): bool
    {
        $roles = ["admin"];
        return in_array($user->role, $roles)
            ? true
            : false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ApplicantFromOrganization $applicantFromOrganization): bool
    {
        $roles = ["admin"];
        return in_array($user->role, $roles)
            ? true
            : false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ApplicantFromOrganization $applicantFromOrganization): bool
    {
        $roles = ["admin"];
        return in_array($user->role, $roles)
            ? true
            : false;
    }
}

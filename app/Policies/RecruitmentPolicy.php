<?php

namespace App\Policies;

use App\Recruitment;
use App\User;
use App\Farm;

use Illuminate\Auth\Access\HandlesAuthorization;

class RecruitmentPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the recruitment.
     *
     * @param  \App\User  $user
     * @param  \App\Recruitment  $recruitment
     * @return mixed
     */
    public function view(User $user, Recruitment $recruitment)
    {
        //
    }

    /**
     * Determine whether the user can create recruitments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the recruitment.
     *
     * @param  \App\User  $user
     * @param  \App\Recruitment  $recruitment
     * @return mixed
     */
    public function update(User $user, Recruitment $recruitment)
    {
         return $recruitment->isEditable($user->id);
    }

    /**
     * Determine whether the user can delete the recruitment.
     *
     * @param  \App\User  $user
     * @param  \App\Recruitment  $recruitment
     * @return mixed
     */
    public function delete(User $user, Recruitment $recruitment)
    {
        return $recruitment->isEditable($user->id);
    }
}

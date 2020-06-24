<?php

namespace App\Policies;

use App\Keyword;
use App\User;
use App\Recruitment;
use Illuminate\Auth\Access\HandlesAuthorization;

class KeywordPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any keywords.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the keyword.
     *
     * @param  \App\User  $user
     * @param  \App\Keyword  $keyword
     * @return mixed
     */
    public function view(User $user, Keyword $keyword, Recruitment $recruitment)
    {
        return $keyword->isEditable($recruitment->id);
    }

    /**
     * Determine whether the user can create keywords.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the keyword.
     *
     * @param  \App\User  $user
     * @param  \App\Keyword  $keyword
     * @return mixed
     */
    public function update(User $user, Keyword $keyword)
    {
        return $keyword->isEditable($recruitment->id);
    }

    /**
     * Determine whether the user can delete the keyword.
     *
     * @param  \App\User  $user
     * @param  \App\Keyword  $keyword
     * @return mixed
     */
    public function delete(User $user, Keyword $keyword)
    {
        //
    }

    /**
     * Determine whether the user can restore the keyword.
     *
     * @param  \App\User  $user
     * @param  \App\Keyword  $keyword
     * @return mixed
     */
    public function restore(User $user, Keyword $keyword)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the keyword.
     *
     * @param  \App\User  $user
     * @param  \App\Keyword  $keyword
     * @return mixed
     */
    public function forceDelete(User $user, Keyword $keyword)
    {
        return $keyword->isEditable($recruitment->id);
    }
}

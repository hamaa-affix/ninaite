<?php

namespace App\Policies;

use App\Farm;
use App\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class FarmPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the farm.
     *
     * @param  \App\User  $user
     * @param  \App\Farm  $farm
     * @return mixed
     */
    public function update(User $user, Farm $farm)
    {
        return $farm->isEditable($user->id);

    }

    /**
     * Determine whether the user can delete the farm.
     *
     * @param  \App\User  $user
     * @param  \App\Farm  $farm
     * @return mixed
     */
    public function delete(User $user, Farm $farm)
    {
        //中間テーブルに紐付いているuserとfarmを指定しreturnする
        //return $farm->users()->where('users.id', $user->id)->first() != null;
        return $farm->isEditable($user->id);
    }
}

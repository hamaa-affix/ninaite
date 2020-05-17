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
     * Determine whether the user can view any farms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the farm.
     *
     * @param  \App\User  $user
     * @param  \App\Farm  $farm
     * @return mixed
     */
    public function view(User $user, Farm $farm)
    {
         
    }

    /**
     * Determine whether the user can create farms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        
    }

    /**
     * Determine whether the user can update the farm.
     *
     * @param  \App\User  $user
     * @param  \App\Farm  $farm
     * @return mixed
     */
    public function update(User $user, Farm $farm)
    {
        //中間テーブルに紐付いているuserとfarmを指定しreturnする
        return $farm->users()->where('users.id', $user->id)->first() != null;
         

        
        // foreach ($farm->users() as $farm_user) {
        //     if ($farm_user->id === $user->id) {
        //         return true;
        //     }
        // }
        // return false;
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
         return $farm->users()->where('users.id', $user->id)->first() != null;
    }

    /**
     * Determine whether the user can restore the farm.
     *
     * @param  \App\User  $user
     * @param  \App\Farm  $farm
     * @return mixed
     */
    public function restore(User $user, Farm $farm)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the farm.
     *
     * @param  \App\User  $user
     * @param  \App\Farm  $farm
     * @return mixed
     */
    public function forceDelete(User $user, Farm $farm)
    {
        //
    }
}

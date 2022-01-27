<?php

namespace App\Policies;

use App\Models\Practice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PracticePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $Practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Practice $Practice)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $Practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Practice $Practice)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $Practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Practice $Practice)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice $Practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Practice $Practice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Practice  $Practice
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Practice $Practice)
    {
        //
    }

    public function publish(User $user, Practice $practice){
        if ($user->can("moderator") && $practice->userHasOpinion($user)) {
            return true;
        }
        return false;
    }
    public function modify(User $user, Practice $practice){
        if ($user->can("moderator") || $practice->isMyPractice($user)) {
            return true;
        }
        return false;
    }

}

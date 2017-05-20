<?php

namespace Corp\Policies;

use Corp\User;

use Illuminate\Auth\Access\HandlesAuthorization;



class MenuPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function save(User $user)
    {
        return $user->canDo('add_menus');
    }

    public function edit(User $user)
    {
        return $user->canDo('edit_menus');
    }

     public function delete(User $user, \Corp\Menu $menu)
    {
        return ($user->canDo('delete_menus') && $user->id == $menu->user_id);
    }

    
}

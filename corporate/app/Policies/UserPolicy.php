<?php

namespace Corp\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Corp\User;

class UserPolicy
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
	
	public function create(User $user)
    {
		return $user->can('edit_users');
    }
    
    public function edit(User $user)
    {
		return $user->can('edit_users');
    }
}

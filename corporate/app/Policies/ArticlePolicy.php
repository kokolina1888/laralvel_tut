<?php

namespace Corp\Policies;

use Corp\User;
use Illuminate\Auth\Access\HandlesAuthorization;



class ArticlePolicy
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
        return $user->canDo('add_articles');
    }

    public function edit(User $user)
    {
        return $user->canDo('edit_articles');
    }
}

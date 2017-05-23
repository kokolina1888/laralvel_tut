<?php

namespace Corp\Policies;

use Corp\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Corp\Portfolio;

class PortfolioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function save(User $user)
        {
            return $user->canDo('add_portfolios');
        }

        public function edit(User $user)
        {
            return $user->canDo('edit_portfolios');
        }

        public function destroy(User $user, Portfolio $portfolio)
        {
            return ($user->canDo('delete_portfolios') && $user->id == $portfolio->user_id);
        }

}

<?php 

namespace Sim\Listeners;


use Carbon\Carbon;
use Sim\User;

class UpdateLastLoginOnLogin 
{
	public function handle($auth)
	{

	$user =	$auth->user;
	$user->last_login_at = Carbon::now();
	$user->save();		
	}
}
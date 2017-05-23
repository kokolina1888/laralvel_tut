<?php

namespace Corp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password', 'login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('Corp\Article');
    }
    
    public function portfolios()
    {
        return $this->hasMany('Corp\Portfolio');
    }


    public function roles()
    {
        return $this->belongsToMany('Corp\Role', 'role_user');
    }

    public function canDo($perms, $require = TRUE){
        $check = false;

        if(is_array($perms)){

         foreach ($perms as $permName) {

            $permName = $this->canDo($permName);
            if(!$permName){
                if(!$require){

                    $check = true;
                } elseif($require){

                    $check = false;

                    break;
                }
            } elseif($permName){

                $check = true;
            }
        }

    } else {
        foreach ($this->roles as $role) {

            foreach($role->permissions as $permission){

                if(str_is($perms, $permission->name))

                    $check = true;
            }
        }

    }

    return $check;
}

public function hasRole($name, $require = false)
{
    if (is_array($name)) {
        foreach ($name as $roleName) {
            $hasRole = $this->hasRole($roleName);

            if ($hasRole && !$require) {
                return true;
            } elseif (!$hasRole && $require) {
                return false;
            }
        }
        return $require;
    } else {
        foreach ($this->roles as $role) {
            if ($role->name == $name) {
                return true;
            }
        }
    }

    return false;
}

}

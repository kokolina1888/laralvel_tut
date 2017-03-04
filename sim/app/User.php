<?php

namespace Sim;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laracasts\Presenter\PresentableTrait;


class User extends Authenticatable
{
    use Notifiable;
    use PresentableTrait;
   
  protected $presenter = 'Sim\Presenters\UserPresenter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $dates = ['last_login_at'];  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($value){

        $this->attributes['password'] = bcrypt($value);
        
    }


    public function posts(){
        return $this->hasMany('Sim\Post');
    }
}

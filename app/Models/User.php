<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role'); //basiclally saying that the user belogs to many roles
                                                // ps: needs to do the same for the Role.php but in reverse 'App\User'
                                                //So the User can have many roles and The Role can have any users
    }

    public function hasAnyRoles($roles)
    {
        //in the current user check there roles relationshp and if there are any roles in 'name'
        if ($this->roles()->whereIn('name',$roles)->first()) { //whereIn : Mathodynamical function :-> The whereIn method verifies that a given
                                                    //column's value is contained within the given array
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        //in the current user check there roles relationshp and if there are any roles in 'name'
        if ($this->roles()->where('name',$role)->first()) { //whereIn : if we are passing an array :Mathodynamical function :-> The whereIn method verifies that a given
                                                    //column's value is contained within the given array
            return true;
        }
        return false;
    }
}

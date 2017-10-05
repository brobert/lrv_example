<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'secondName', 'surName', 'role', 'gender'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fullName() {
        return sprintf('%s %s', $this->name, $this->surName);
    }

//     public $full_name = sprintf('%s %s', $this->name, $this->surName );
}

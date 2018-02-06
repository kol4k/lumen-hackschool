<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'biodata_id', 'email', 'nis', 'jabatan', 'avatar',
        'password', 'token_api'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token_api'
    ];

    /**
    * Function call relation users
    */
    public function cBiodata()
    {
        return $this->hasOne('App\Biodata', 'id');
    }

    /**
    * Functionn belongs relations pivot
    */
    public function bKelas()
    {
        return $this->belongsToMany('App\Kelas');
    }

    /*
    * Functionn belongs relations pivot
    */
    public function bPelajaran()
    {
        return $this->belongsToMany('App\Pelajaran');
    }
}

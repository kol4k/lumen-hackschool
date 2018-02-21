<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
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
     * JWT Options Model
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
    * Function call relation users
    */
    public function bBiodata()
    {
        return $this->belongsToMany('App\Biodata');
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

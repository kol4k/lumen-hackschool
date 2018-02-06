<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    /**
     * Table
     */
    protected $table = 'biodatas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'ttl', 'alamat', 'jenis_kelamin',
        'telephone', 'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];
    
    /**
     * Function return relation users
     */
    public function rUsers()
    {
        return $this->belongsTo('App\User','id');
    }
}

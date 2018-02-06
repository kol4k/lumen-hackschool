<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /**
     * Table
     */
    protected $table = 'kelas';

    /**
     * Primary Key
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama'
    ];

    /**
    * Functionn belongs relations user
    */
    public function bUser()
    {
        return $this->belongsToMany('App\User');
    }

    // /**
    //  * Function return relation dataSiswa
    //  */
    // public function dataSiswa()
    // {
    //     return $this->belongsTo('App\Model\DataSiswa', 'id_siswa');
    // }
}

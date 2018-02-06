<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    /**
     * Table
     */
    protected $table = 'pelajaran';

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

    // /**
    //  * Function call relation materi
    //  */
    // public function materi()
    // {
    //     return $this->hasMany('App\Model\Materi', 'id_materi');
    // }

    // /**
    //  * Function call relation ujianOnline
    //  */
    // public function ujianOnline()
    // {
    //     return $this->hasOne('App\Model\UjianOnline', 'id_ujian');
    // }

    // /**
    //  * Function return relation dataGuru
    //  */
    // public function dataGuru()
    // {
    //     return $this->belongsToMany('App\Model\DataGuru', 'pelajaran');
    // }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    /**
     * Table
     */
    protected $table = 'ujian';

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
        'kode_ujian', 'waktu_mulai', 'waktu_selesai',
        'status', 'tipe', 'pelajaran'
    ];

    // /**
    //  * Function call relation materi
    //  */
    // public function materi()
    // {
    //     return $this->hasMany('App\Model\Materi', 'id_materi');
    // }

    // /**
    //  * Function call relation pelajaran
    //  */
    // public function users()
    // {
    //     return $this->hasOne('App\Model\Pelajaran', 'id_pelajaran');
    // }

    // /**
    //  * Function call relation tipeUjian
    //  */
    // public function tipeUjian()
    // {
    //     return $this->hasOne('App\TipeUjian', 'id_tipe');
    // }

    // /**
    //  * Function return relation nilai
    //  */
    // public function nilai()
    // {
    //     return $this->belongsTo('App\Model\Nilai', 'id_nilai');
    // }
}

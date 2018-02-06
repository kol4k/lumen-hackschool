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
}

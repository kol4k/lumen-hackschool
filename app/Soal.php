<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    /**
     * Table
     */
    protected $table = 'soal';

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
        'soal', 'pelajaran_id', 'gambar_soal',
        'a', 'b', 'c', 'd', 'e', 'jawaban'
    ];

    /**
     * Function return relation soal
     */
    public function rSoal()
    {
        return $this->belongsTo('App\Pelajaran');
    }
}

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

    /**
     * Function call relation materi
     */
    public function cSoal()
    {
        return $this->hasMany('App\Soal');
    }
}

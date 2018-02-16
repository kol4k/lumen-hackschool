<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    /**
     * Table
     */
    protected $table = 'nilai';

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
        'user', 'ujian', 'nilai'
    ];
}

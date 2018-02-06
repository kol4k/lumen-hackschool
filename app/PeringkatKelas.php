<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PeringkatKelas extends Model
{
    /**
     * Table
     */
    protected $table = 'peringkat_kelas';

    /**
     * Primary Key
     */
    protected $primaryKey = 'id_peringkat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kelas'
    ];
}

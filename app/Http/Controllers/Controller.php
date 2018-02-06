<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Check Jabatan
     * @param $user and $jabatan
     * @return response
     */
     public function checkJabatan($user,$jabatan)
     {
         // Select User
         if ($jabatan == 'Guru') {
             $jabatan = User::find($user);
             $res['jabatan'] = ['akses' => 'Guru','Pelajaran' => $jabatan->bPelajaran[0]->nama];
         } else if ($jabatan == 'Siswa') {
             $jabatan = User::find($user);
             $res['jabatan'] = ['akses' => 'Siswa','Kelas' => $jabatan->bKelas[0]->nama];
         } else if ($jabatan == 'Administrator') {
             $res['jabatan'] = ['akses' => 'Administrator'];
         } else {
             $res['jabatan'] = ['akses' => 'Tamu'];
         }
        //  $res['jabatan'] = 'test';
         return $res['jabatan'];
     }
}

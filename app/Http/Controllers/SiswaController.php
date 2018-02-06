<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ujian;
use App\Pelajaran;
use App\Soal;
use App\DataSiswa;

class SiswaController extends Controller
{
    /**
     * Select Soal Controller
     * When user success clicked will retrive callback as soal
     * @return response
     */
    public function getSoal($kode)
    {   
        $query = Ujian::where('kode_ujian',$kode)->get();

        if ($query) {
            $qPelajaran = Pelajaran::find($query[0]->pelajaran_id);
            $res['success'] = true;
            $res['message'] = $qPelajaran->cSoal;
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to find!';
            return response($res);
        }    
    }

    /**
     * Login Controller
     * When user success login will retrive callback as api_token
     * @return response
     */
    public function processLogin(Request $request)
    {
        $hasher = app()->make('hash');
        
        $username = $request->input('nis');
        $email = $request->input('email');
        $password = $request->input('password');
        
        $login = User::where('email', $email)->first();

        if (!$login) {
            $res['success'] = false;
            $res['message'] = 'Your email or password incorrect!';
            return response($res,403);
        } else {
            if ($hasher->check($password,$login->password)) {
                $api_token = sha1(time());
                $create_token = User::where('id', $login->id)->update(['token_api' => $api_token]);
                if ($create_token) {
                    $res['success'] = true;
                    $res['api_token'] = $api_token;
                    $res['user'] = [
                        'email' => $login->email,
                        'nis' => (int)$login->nis,
                        'detail' => $login->cBiodata,
                        'jabatan' => $this->checkJabatan($login->id, $login->jabatan),
                    ];
                    return response($res,200);
                }
            } else {
                $res['success'] = true;
                $res['message'] = 'Your email or password incorrect!';
                return response($res,403);
            }
        }
    }

    /**
    * Test Controller
    */
    public function get_user(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        if ($user) {
              $res['success'] = true;
              $res['message'] = $user;
        
              return response($res);
        }else{
          $res['success'] = false;
          $res['message'] = 'Cannot find user!';
        
          return response($res);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Ujian;
use App\Nilai;
use App\Pelajaran;
use App\Soal;
use App\DataSiswa;

class SiswaController extends Controller
{
    /**
     * All Ujian Controller
     * When user success clicked will retrive callback as ujian
     * @return response
     */
    public function getListUjian()
    {   
        $query = Ujian::all();

        if ($query) {
            foreach($query as $no => $v) {
                $qPelajaran = Pelajaran::find($query[$no]->pelajaran_id);
                $res['message'][$no] = [
                    'kode_ujian' => $query[$no]->kode_ujian,
                    'pelajaran' => $qPelajaran->nama,
                    'tipe' => $query[$no]->tipe,
                    'waktu_mulai' => $this->formatDate($query[$no]->waktu_mulai),
                    'waktu_selesai' => $this->formatDate($query[$no]->waktu_selesai),
                    'status' => $query[$no]->status
                ];
            }
            $res['success'] = true;
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to find!';
            return response($res);
        }    
    }

    /**
     * get List Laporan Nilai
     */
    public function listNilai()
    {
        $user = Auth::user()->id;
        $data = Nilai::where('user', 3)->get();

        foreach($data as $no => $val) {
            $qUjian[$no] = Ujian::find($data[$no]['ujian']);
            $qPelajaran[$no] = Pelajaran::find($qUjian[$no]['pelajaran_id']);            
            $res['nilai'][$no] = [
                'pelajaran' => $qPelajaran[$no]['nama'],                                
                'kode_ujian' => $qUjian[$no]['kode_ujian'],
                'nilai' => $data[$no]['nilai'],
                'tipe' => $qUjian[$no]['tipe'],
                'waktu' => $this->formatDate($data[$no]['created_at']),      
            ];
        }
        return response($res);
    }

    /**
     * get Rank Class
     * When user success clicked will retrive callback as data
     * @return response
     */
    public function rankUjian($id)
    {
        $dUser = array();
        $data = Nilai::where('ujian', $id)->orderBy('nilai', 'desc')->take('5')->get();
        if($data) {
            foreach($data as $no => $val) {
                $qUser[$no] = User::find($data[$no]['user']);
                $dUser[$no] = [
                    'id_user' => (int)$data[$no]['user'],
                    'id_ujian' => (int)$data[$no]['ujian'],
                    'ujian' => [
                        'nilai' => (int)$data[$no]['nilai']
                    ],
                    'user' => [
                        'nama' => $qUser[$no]->bBiodata[0]['nama'],
                        'kelas' => $qUser[$no]->bKelas[0]['nama'],
                        'photo' => $qUser[$no]->bBiodata[0]['nama'][0]
                    ],
                ];
            }
        }
        return $dUser;
    }

    /**
     * Check user is already played
     * @param int $user
     * @param int $ujian
     * @return $data
     */
    public function isUserAlreadyPlayed($user, $ujian)
    {
        $data = Nilai::where('user', $user)
                    ->where('ujian', $ujian)
                    ->first();
        $isPlayed = Array();
        if($data) {
            $isPlayed = [
                'already_played' => true,
                'nilai' => $data['nilai']
            ];
        } else {
            $isPlayed = [
                'already_played' => false,
                'nilai' => null
            ];
        }
        return $isPlayed;
    }

    /**
     * Check if date Ujian expired.
     * @param char $selesai
     * @param char $mulai
     * @param int $ujian
     * @return $res['is']['pesan'] 
     */
    public function isUjianOK($mulai, $selesai, $ujian = null)
    {
        $isPlayed = $this->isUserAlreadyPlayed(Auth::user()->id,$ujian);

        if($isPlayed['already_played'] == true) {
            $isOK = 'SELESAI';
        } else if($mulai > $this->now()) {
            $isOK = 'BELUM MULAI';                
        } else if($selesai < $this->now()) {
            $isOK = 'SELESAI';                
        } else {
            $isOK = null;
        }
        return $isOK;
    }

    /**
     * Select Ujian Controller
     * When user success clicked will retrive callback as ujian
     * @return response
     */
    public function getUjian($code)
    {   
        $query = Ujian::where('kode_ujian', $code)->get();
        $isAlreadyPlayed = $this->isUserAlreadyPlayed(Auth::user()->id,$query[0]->id);

        if ($query) {
            $qPelajaran = Pelajaran::find($query[0]->pelajaran_id);
            $res['is'] = $isAlreadyPlayed;
            $res['is']['pesan'] = $this->isUjianOK($query[0]->waktu_mulai, $query[0]->waktu_selesai, $query[0]->id);            
            $res['message'] = [
                'id' => $query[0]->id,
                'kode_ujian' => $query[0]->kode_ujian,
                'pelajaran' => $qPelajaran->nama,
                'tipe' => $query[0]->tipe,
                'waktu_mulai' => $query[0]->waktu_mulai,
                'waktu_selesai' => $query[0]->waktu_selesai,
                'status' => $query[0]->status,
            ];
            $res['success'] = true;
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to find!';
            return response($res);
        }    
    }
    
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
     * Input Nilai Controller
     * When user success input will retrive callback as nilai
     * @return response
     */
    public function inputNilai(Request $request)
    {   
        $user = Auth::user()->id;
        $ujian = $request->ujian;
        $nilai = $request->nilai;

        $query = Nilai::create([
            'user' => $user,
            'ujian' => $ujian,
            'nilai' => $nilai
        ]);

        if ($query) {
            $res['success'] = true;
            $res['message'] = $query;
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to find!';
            return response($res);
        }    
    }
}

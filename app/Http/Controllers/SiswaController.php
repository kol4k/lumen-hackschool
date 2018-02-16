<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * get Rank Class
     * When user success clicked will retrive callback as data
     * @return response
     */
    public function rankUjian($id)
    {
        $data = Nilai::where('ujian', $id)->get();
        // $qUser = User::find($data[0]->user);
        $qUser = User::where('id', function () use ($query) {
            $query->orWhere(1)->get();
        });
        return $data;
    }

    /**
     * Select Ujian Controller
     * When user success clicked will retrive callback as ujian
     * @return response
     */
    public function getUjian($code)
    {   
        $query = Ujian::where('kode_ujian', $code)->get();

        if ($query) {
            $qPelajaran = Pelajaran::find($query[0]->pelajaran_id);
            $res['message'] = [
                'id' => $query[0]->id,
                'kode_ujian' => $query[0]->kode_ujian,
                'pelajaran' => $qPelajaran->nama,
                'tipe' => $query[0]->tipe,
                'waktu_mulai' => $query[0]->waktu_mulai,
                'waktu_selesai' => $query[0]->waktu_selesai,
                'status' => $query[0]->status
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
        $user = $request->user;
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

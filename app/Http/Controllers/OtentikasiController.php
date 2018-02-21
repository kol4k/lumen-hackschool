<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\User;
use App\DataSiswa;
use App\DataGuru;

class OtentikasiController extends Controller
{
    /**
    * @var \Tymon\JWTAuth\JWTAuth
    */
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
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
        
        try {

            if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
                return response()->json(['credential_errors'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }
        
        $login = User::where('email', $email)->first();
        $token = compact('token');
        $res['api_token'] = $token['token'];
        $res['user'] = [
            'id' => $login->id,
            'email' => $login->email,
            'nis' => (int)$login->nis,
            'detail' => $login->bBiodata[0],
            'jabatan' => $this->checkJabatan($login->id, $login->jabatan),
        ];

        return response()->json($res);


        // $login = User::where('email', $email)->first();

        // if (!$login) {
        //     $res['success'] = false;
        //     $res['message'] = 'Your email or password incorrect!';
        //     return response($res,403);
        // } else {
        //     if ($hasher->check($password,$login->password)) {
        //         $api_token = sha1(time());
        //         $create_token = User::where('id', $login->id)->update(['token_api' => $api_token]);
        //         if ($create_token) {
        //             $res['success'] = true;
        //             $res['api_token'] = $api_token;
        //             $res['user'] = [
        //                 'id' => $login->id,
        //                 'email' => $login->email,
        //                 'nis' => (int)$login->nis,
        //                 'detail' => $login->bBiodata[0],
        //                 'jabatan' => $this->checkJabatan($login->id, $login->jabatan),
        //             ];
        //             return response($res,200);
        //         }
        //     } else {
        //         $res['success'] = true;
        //         $res['message'] = 'Your email or password incorrect!';
        //         return response($res,403);
        //     }
        // }
    }

    /**
     * Register Controller
     * When user success login will retrive callback as api_token
     * @return response
     */
    public function processRegister(Request $request)
    {
        $hasher = app()->make('hash');
        
        $username = $request->input('nis');
        $email = $request->input('email');
        $password = $hasher->make($request->input('password'));

        $register = User::create([
            'nis' => $username,
            'email' => $email,
            'password' => $password,
        ]);

        if ($register) {
            $res['success'] = true;
            $res['message'] = 'Success register!';
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to register!';
            return response($res);
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

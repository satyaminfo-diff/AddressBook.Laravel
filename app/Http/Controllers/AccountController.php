<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AccountController extends Controller
{
    public function login(Request $request)
    {
         $results  = DB::table('users')->select('user_id')
            ->where('email_id', $request->email_id)
            ->where('password', $request->password)
            ->get();
        if(count($results)>0){
            $res = [
                'IsSuccess'=>1,
                'msg'=>'Successfully logged-in',
                'data' => $results[0]
             ];
        } else {
            $res = [
                'IsSuccess'=>0,
                'msg'=>'Invalid username or password'
             ];
        }
        return response()->json($res);
    }
    public function RegisterUser(Request $request)
    {
        $results_email = DB::table('users')->select('user_id')->where('email_id', $request->email_id)->get();
        if(count($results_email)>0){
                $res = [
                    'IsSuccess'=>0,
                    'msg'=>'Email ID already exists!'
                 ];
            }
            else
            {
            DB::table('users')->insert([
                    [
                    'email_id' => $request->email_id,
                    'first_name'=> $request->first_name, 
                    'last_name' =>$request->last_name,
                    'password'  => $request->password
                    ]
                ]);
                $results_login = DB::select('select user_id from users where email_id="'. $request->email_id .'" and password="'. $request->password.'"');
                if(count($results_login)>0){
                    $res = [
                        'IsSuccess'=>1,
                        'msg'=>'Registered successfully',
                        'data' => $results_login[0]
                     ];
                } else {
                    $res = [
                        'IsSuccess'=>0,
                        'msg'=>'something went wrong!'
                     ];
                }
            }
        return response()->json($res);
    }
}

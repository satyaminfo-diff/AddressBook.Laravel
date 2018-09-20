<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AddressBookController extends Controller
{
    //
    public function GetAddressBookList(Request $request)
    {
        try{
            $results = DB::table('address_books')->select('address_book_id','user_id','first_name','last_name','email_id','contact_no','is_active')->where('user_id', $request->user_id)->get();
            $res = [
                'IsSuccess'=>1,
                'msg'=>'Success',
                'data' => $results
             ];
        }
        catch(exception $e)
        {
            $res = [
                'IsSuccess'=>0,
                'msg'=>$e
             ];
        }
        return response()->json($res);
    }

    public function AddAddressBook(Request $request)
    {
        try
        {
            if($request->address_book_id !=0)
            {
                $results_contact_no = DB::table('address_books')
                ->select('address_book_id')
                ->where('contact_no', $request->contact_no)
                ->where('user_id', $request->user_id)
                ->where('address_book_id','<>', $request->address_book_id)
                ->get();

                if(count($results_contact_no)>0){
                    $res = [
                        'IsSuccess'=>0,
                        'msg'=>'Address with Contact No. already exists!'
                ];
                } else {
                    $results_email = DB::table('address_books')
                    ->select('address_book_id')
                    ->where('email_id', $request->email_id)
                    ->where('user_id', $request->user_id)
                    ->where('address_book_id','<>', $request->address_book_id)
                    ->get();

                    if(count($results_email)>0){
                            $res = [
                                'IsSuccess'=>0,
                                'msg'=>'Address with Email ID already exists!'
                        ];
                    }
                    else
                    {
                    DB::table('address_books')
                    ->where(['address_book_id' => $request->address_book_id])
                    ->update([
                        'email_id' => $request->email_id,
                        'first_name'=> $request->first_name, 
                        'last_name' =>$request->last_name,
                        'is_active'  => $request->is_active,
                        'contact_no' => $request->contact_no,
                    ]);
                    $res = [
                        'IsSuccess'=>1,
                        'msg'=>'Address Book updated successfully',
                    ];
                }
             }
            }
            else
            {
            // NEW ADD
                $results_contact_no = DB::table('address_books')
                ->select('address_book_id')
                ->where('contact_no', $request->contact_no)
                ->where('user_id', $request->user_id)
                ->get();
                if(count($results_contact_no)>0){
                    $res = [
                        'IsSuccess'=>0,
                        'msg'=>'Address with Contact No. already exists!'
                ];
                } else {
                        $results_email = DB::table('address_books')
                        ->select('address_book_id')
                        ->where('email_id', $request->email_id)
                        ->where('user_id', $request->user_id)
                        ->get();

                    if(count($results_email)>0){
                            $res = [
                                'IsSuccess'=>0,
                                'msg'=>'Address with Email ID already exists!'
                        ];
                    }
                    else
                    {
                    DB::table('address_books')->insert([
                        [
                        'user_id' => $request->user_id,
                        'email_id' => $request->email_id,
                        'first_name'=> $request->first_name, 
                        'last_name' =>$request->last_name,
                        'is_active'  => $request->is_active,
                        'contact_no' => $request->contact_no,
                        ]
                    ]);
                    $res = [
                        'IsSuccess'=>1,
                        'msg'=>'Address Book added successfully',
                    ];
                }
             }
            }
        }
        catch(exception $e)
        {
            $res = [
                'IsSuccess'=>0,
                'msg'=>$e
             ];
        }
       
         return response()->json($res);
    }
    public function GetAddressBookById(Request $request)
    {
        try{
            $results = DB::table('address_books')->select('address_book_id','user_id','first_name','last_name','email_id','contact_no','is_active')->where('address_book_id', $request->address_book_id)->get();
            $res = [
                'IsSuccess'=>1,
                'msg'=>'Success',
                'data' => $results[0]
             ];
        }
        catch(exception $e)
        {
            $res = [
                'IsSuccess'=>0,
                'msg'=>$e
             ];
        }
        return response()->json($res);
    }

    public function DeleteAddressBookById(Request $request)
    {
        try {
            DB::table('address_books')->where('address_book_id', '=', $request->address_book_id)->delete();
            $results = DB::table('address_books')->select('address_book_id','user_id','first_name','last_name','email_id','contact_no')->where('user_id', $request->user_id)->get();

            $res = [
                'IsSuccess'=>1,
                'msg'=>'Deleted successfully',
                'data' => $results
             ];
        }
        catch(exception $e)
        {
            $res = [
                'IsSuccess'=>0,
                'msg'=>$e
             ];
        }
        return response()->json($res);
    }
}

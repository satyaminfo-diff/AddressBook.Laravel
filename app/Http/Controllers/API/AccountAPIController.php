<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\userRequestValidate;
use App\Http\Controllers\AppBaseController;

class AccountAPIController extends AppBaseController
{
    public function login(Request $request)
    {
        $check_email=User::where('email',$request->email);
        if($check_email->count()>0){
            
            $check_password=$check_email->first();
            $password=Crypt::decrypt($check_password->password);
            if($password==$request->password)
            {
                return $this->sendSuccess($check_password,"Login successdully!");
            }

            return $this->sendError("User password not valid!",200);
        }
        else
        {
            return $this->sendError("User email not found!",200);
        }
        
    }
    
    public function RegisterUser(userRequestValidate $request)
    {
        $input=$request->all();
        $input['password']=Crypt::encrypt($request->password);
        $result=User::create($input);
        return $this->sendSuccess($result,"User registration successdully!");
    }
}

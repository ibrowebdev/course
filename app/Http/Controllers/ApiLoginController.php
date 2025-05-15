<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiLoginController extends Controller
{
    public function login(){
        $validator = Validator::make(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }else{

            $user = User::where('email', request('email'))->first();
           
            if(!$user || !Hash::check(request('password'), $user->password)){
                return response()->json(['valErrors' => 'No user records found Or Details does not match!!']);
            }else{
                    $token = $user->createToken(request('email'));
                    return response()->json(['token' => $token->plainTextToken]);
                   
            }
        }
    }
}

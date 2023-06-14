<?php

namespace App\Http\Controllers;

use App\Http\Resources\userResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**************************login**************************************/

    public function login(Request $request){

        $credentials = $request->validate([
           'password' => 'required',
           'email'=>['required','email'],
            'remember'=>'boolean'
        ]);
        $remember = $credentials['remember'] ?? false ;
        unset($credentials['remember']);

        if(!Auth::attempt($credentials  , $remember)){
            return response([
                'message'=>'Email or password is in correct !'
            ] , '422');
        }

        $user  = Auth::user();
        if(!$user->isAdmin){
            Auth::logout();
            return response([
                'message' => 'You don\'t have permission to authentication as admin '
            ],'403');
        }

        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' =>new userResource($user),
            'token'=>$token
        ]);

    }//end of login

    /**************************logout**************************************/

    public function logout(){
        $user  = Auth::user();
        $user->currentAccessToken()->delete();
        return response('' , 204);
    }//end of logout

    /**************************getUser**************************************/
    public  function getUser(Request $request){
         return new userResource($request->user());
    }// end of getUser

}

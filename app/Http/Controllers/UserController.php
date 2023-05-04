<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
   function get(Request $req){

        try {
            $users = UserResource::collection(User::all());
            return response()->json([
                "users" => $users,
                "msg"   => "get_success",
                "status"=> 1

            ]);

        } catch (\Exception $e) {
            return response()->json([
                "status" => 0,
                "msg"    => "get_failed",
                "err"    => $e->getMessage()
            ],500);
        }
        
   }

   function getDetail(Request $req,$id){

    try {
        
        $user = User::find($id);
        return response()->json([
            "user" => $user,
            "msg"   => "get_success",
            "status"=> 1

        ]);

    } catch (\Exception $e) {
        return response()->json([
            "status" => 0,
            "msg"    => "get_failed",
            "err"    => $e->getMessage()
        ],500);
    }
    
}
}

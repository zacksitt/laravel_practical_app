<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;

class AuthController extends Controller
{
    public function create(Request $req){

        try{
            
            $req->validate([
                'name'      => 'required|string',
                'email'     => 'required|string|unique:users,email',
                'phone'     => 'string|unique:users,phone',
                'password'  => 'required|string'
            ]);

            $response = $this->registerUser($req);

            if($response && $response["status"] === 1){

                return view("register.register-success");
            }else{
                return view("register.register-fail",["message" => $response["err"]]);
            }
        } catch (\Exception $e) {
            return view("register.register-fail",["message" => $e->getMessage()]);
        }
    }

    public function register(Request $req){

        $req->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|unique:users,email',
            'phone'     => 'string|unique:users,phone',
            'password'  => 'required|string'
        ]);
        
        try {
            
            $userResult = $this->registerUser($req);
            return response()->json($userResult);

        } catch (\Exception $e) {
            
            return response()->json([
                'status'    => 0,
                "err"       => $e->getMessage(),
                'msg'       => "register_failed"
            ]);
        }
        
    }

    function registerUser(Request $req){

        try {
            $user = User::create([
                "name"          => $req->name,
                "phone"         => $req->phone,
                "gender"        => $req->gender,
                "date_of_birth" => $req->date_of_birth,
                "email"         => $req->email,
                "password"      => Hash::make($req->password),
                "created_at"    => \Carbon\Carbon::now(),
                "updated_at"    => \Carbon\Carbon::now()
            ]);
            
            $welcomeMsg = "Welcome to service";
            Mail::to($req->email)->send(new Welcome($req->email,$welcomeMsg));
            return array("status" => 1,"msg" => "register_success");

        } catch (\Exception $e) {
            return array("status" => "0","msg" => "register_failed","err" => $e->getMessage());
        }
        
    }
    
    public function login(Request $req)
    {
        $req->validate([
            'email'     => 'required|string',
            'password'  => 'required|string'
        ]);
        try{
        
            $user = User::where('email', $req->email)->first();
            if (! $user) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User not found.',
                ]);
            }

            if (! Hash::check($req->password, $user->password)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Invalid credentials',
                ]);
            }

            return response()->json([
                'status'    => 1,
                'msg'       => "login_success",
                'user'      => $user,
                'token'     => $user->createToken('User-Token')->plainTextToken,
            ]);
        
        } catch (\Exception $e) {

            return response()->json([
                "status" => 0,
                "msg"    => "login_failed",
                "err"    => $e->getMessage()

            ],500);
        }

        
    }
}

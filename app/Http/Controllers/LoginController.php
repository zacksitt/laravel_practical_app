<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;

class LoginController extends Controller
{
    public function register(Request $req){

        $req->validate([
            'name'      => 'required|string',
            'email'     => 'required|string|unique:users,email',
            'password'  => 'required|string'
        ]);
        
        try {
            
            $user = User::create([
                "name"          => $req->name,
                "phone"         => $req->phone,
                "gender"        => $req->gender,
                "date_of_birth" => $req->date_of_birth,
                "email"         => $req->email,
                "password"      => Hash::make($req->newPassword),
                "created_at"    => \Carbon\Carbon::now(),
                "updated_at"    => \Carbon\Carbon::now()
            ]);

            $welcomeMsg = "Welcome to service";
            Mail::to($req->email)->send(new Welcome($req->email,$welcomeMsg));

        } catch (\Exception $e) {
            return view("register-fail");
        }
        return view("register-success");
    }

    public function login(Request $request)
    {
        if (! $request->email) {
            return response()->json([
                'status' => 422,
                'message' => 'email is required',
            ]);
        }

        if (strlen($request->email) < 6) {
            return response()->json([
                'status' => 422,
                'message' => 'email is invalid',
            ]);
        }

        if (! $request->password) {
            return response()->json([
                'status' => 422,
                'message' => 'password is required',
            ]);
        }
        if (strlen($request->password) < 8) {
            return response()->json([
                'status' => 422,
                'message' => 'password is invalid',
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return response()->json([
                'status' => 404,
                'message' => 'Model not found.',
            ]);
        }

        if (! Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 404,
                'message' => 'Invalid credentials',
            ]);
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('User-Token')->plainTextToken,
        ]);
    }
}

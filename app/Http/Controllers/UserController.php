<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->model = new User();
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = $this->model->query()->where("email", $request->email)->first();


        if (is_null($user) || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "error" => "Email or Password Invalid!"
            ], 401);
        }

        $jwtToken = JWT::encode(
            [
                "email" => $request->email
            ],
            env("SECRET_KEY")
        );

        return response()->json([
            "access_token" => $jwtToken
        ]);
    }
}
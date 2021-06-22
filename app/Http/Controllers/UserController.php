<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\EloquentRepositoryInterface;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /** @var UserRepository */
    protected EloquentRepositoryInterface $repository;
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = $this->repository->login($request->email);


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
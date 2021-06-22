<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class Authenticator
{
    public function handle(Request $request, Closure $next)
    {
        try {
            if (!($request->hasHeader('Authorization'))) {
                throw new Exception();
            }
            $authorization = $request->header('Authorization');
            $token = str_replace("Bearer ", "", $authorization);
            $authData = JWT::decode($token, env("SECRET_KEY"), ["HS256"]);

            $user = User::where('email', $authData->email)->first();

            if (is_null($user)) {
                throw new Exception();
            }

            return $next($request);
        } catch (Exception $e) {
            return response()->json([
                "error" => "Not Authorized"
            ], 401);
        }
    }
}
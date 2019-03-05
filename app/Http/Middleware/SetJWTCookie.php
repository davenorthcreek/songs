<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;


class SetJWTCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $valid = false;
        $user = $request->user();
        if ($user) {
            $token = $user->jwt_token;
            try {
                $user2 = JWTAuth::authenticate($token);
                if ($user->id != $user2->id) {
                    $valid = false;
                } else {
                    $valid = true;
                }
            } catch (JWTException $jwte) {
                Log::debug($jwte);
                $valid = false;
            }
            if (!$valid) {
                $token = JWTAuth::fromUser($user);
                Log::debug("setting jwt token");
                Log::debug($token);
                $user->jwt_token = $token;
                $user->save();
            }

            Cookie::queue('active_token', $token);

        }
        return $next($request);
    }
}

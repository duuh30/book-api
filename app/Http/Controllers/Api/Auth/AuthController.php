<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\CreateTokenException;
use App\Exceptions\InvalidCredentialsException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Traits\Conditionable;

class AuthController extends Controller
{
    use Conditionable;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $this->unless(Auth::attempt($credentials), function() {
             throw new InvalidCredentialsException();
        });

        $this->unless($token = Auth::user()->createToken("api_auth_token"), function() {
           throw new CreateTokenException();
        });

        return response()->json([
            'error' => false,
            'data' => [
                'accessToken' => $token->plainTextToken,
            ]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'token revoked.',
        ]);
    }
}

<?php

namespace App\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{
    public function render()
    {
        return response()->json([
            "message" => "invalid credentials.",
        ], 401);
    }
}

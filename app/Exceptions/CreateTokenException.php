<?php

namespace App\Exceptions;

use Exception;

class CreateTokenException extends Exception
{
    public function render()
    {
        return response()->json([
            "message" => "error when create access token.",
        ], 401);
    }
}

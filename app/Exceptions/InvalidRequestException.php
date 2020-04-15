<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class InvalidRequestException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request) {
        if ($request->expectsJson()) {
            return response()->json(['msg' => $this->message], $this->code);
        }
        return view('pages.error', ['msg'=>$this->message]);
    }
}

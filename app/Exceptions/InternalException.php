<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class InternalException extends Exception
{
    protected $msgForUser;

    public function __construct($message = "", $code = 0, Throwable $previous = null, $msgForUser='系统内部错误')
    {
        parent::__construct($message, $code, $previous);
        $this->msgForUser = $msgForUser;
    }

    public function render($request) {
        if ($request->expectsJson()) {
            return response()->json(['msg' => $this->msgForUser], $this->code);
        }
        return view('pages.error', ['msg'=>$this->msgForUser]);
    }
}

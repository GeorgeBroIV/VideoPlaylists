<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\View\View;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     * at_return View
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception->getMessage() == "CSRF token mismatch.") {
            $message = $exception->getMessage();
// TODO Add CSRF token mismatch error handling for expired pages
// https://stackoverflow.com/questions/49864923/page-expired-exception-in-laravel
            if(Auth()->user()) {
                return redirect()->route('home', compact('message'));
            } else {
                return redirect()->action('Auth\LoginController@login')->with('status', $message);
            }
        } else {
// TODO Figure this out
            return parent::render($request, $exception);
        }
    }
}

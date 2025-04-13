<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Customize the exception rendering.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        // Check for specific exceptions and customize the response
        if ($exception instanceof HttpException) {
            // Custom response for HttpException
            return response()->view('errors.' . $exception->getStatusCode(), [], $exception->getStatusCode());
        }

        // Handle ValidationException
        if ($exception instanceof ValidationException) {
            return response()->json([
                'errors' => $exception->errors(),
            ], 422);
        }

        // Default behavior
        return parent::render($request, $exception);
    }
}


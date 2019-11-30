<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof MethodNotAllowedHttpException && $request->ajax()) {
            return response()->json([
                'errors' => [
                    'ids' => [
                        0 => 'You are not authorized to perform the action.'
                    ],
                ]
            ], 405);
        }

        if ($exception instanceof ModelNotFoundException && $request->ajax()) {
            return response()->json([
                'errors' => [
                    'ids' => [
                        0 => 'The selected value is invalid.'
                    ],
                ]
            ], 404);
        }

        if ($exception instanceof QueryException && $request->ajax()) {
            return response()->json([
                'errors' => [
                    'ids' => [
                        0 => 'The selected value is invalid.'
                    ],
                ]
            ], 404);
        }

        return parent::render($request, $exception);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
      $this->renderable(function (NotFoundHttpException $e, Request $request) {
            // Render the custom 404 page for frontend routes
            if ($request->is('frontend/*')) {
                return response()->view('frontend.pages.404', [], 404);
            }

            // Fallback to the default 404 view
            return response()->view('errors.404', [], 404);
        });
    }
  
}

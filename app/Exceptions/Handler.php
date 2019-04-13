<?php

namespace BukApi\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use \Illuminate\Database\QueryException;

use BukApi\Traits\ApiResponser;
use BukApi\Constants\RequestCode;
use BukApi\Constants\RequestMessage;

class Handler extends ExceptionHandler
{
    use ApiResponser;
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
        if($exception instanceof ValidationException){
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        if($exception instanceof ModelNotFoundException){
            $model = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse(RequestMessage::MODEL_NOT_FOUND_EXCEPTION_BEGIN.$model.RequestMessage::NOT_FOUND_END, 
                                        RequestCode::NOT_FOUND);
        }

        if($exception instanceof NotFoundHttpException){
            return $this->errorResponse(RequestMessage::URL_NOT_FOUND, RequestCode::NOT_FOUND);
        }

        if($exception instanceof MethodNotAllowedHttpException){
            return $this->errorResponse(RequestMessage::METHOD_NOT_ALLOWED, RequestCode::METHOD_NOT_ALLOWED);
        }

        if($exception instanceof HttpException){
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if($exception instanceof QueryException){
            $code=$exception->errorInfo[1];

            //If code is for Duplicate entry
            if($code==RequestCode::DUPLICATED_ENTRY){
                return $this->errorResponse(RequestMessage::DUPLICATED_RESOURCE, RequestCode::CONFLICT);
            }
        }

        if(config('app.debug'))
            return parent::render($request, $exception);
        
        return $this->errorResponse(RequestMessage::INTERNAL_SERVER_ERROR, RequestCode::INTERNAL_SERVER_ERROR);
    }

      /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        return $this->errorResponse($errors, RequestCode::VALIDATION_EXCEPTION);
    }
}

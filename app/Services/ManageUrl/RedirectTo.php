<?php

namespace App\Services\ManageUrl;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Services\ManageUrl\RedirectRoute;

class RedirectTo extends RedirectRoute
{
    /**
     * The handle submission request.
     *
     * @var string
     */
    private $handle_submission;

    /**
     * The request method.
     *
     * @var string
     */
    private $method;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->user = Auth::user();
        $this->handle_submission = request('handle_submission');
        $this->method = request()->method();
    }

    /**
     * The redirect route.
     *
     * @param  string $name
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    public function route($name, $parameter = null)
    {
        switch ($this->method) {
            case 'POST':
                return $this->handlePostRequest($name, $parameter)
                    ->with('A new record has been added.', 'success');
                break;

            case 'PUT':
                return $this->handlePutRequest($name, $parameter)
                    ->with('The changes have been saved.', 'success');
                break;

            case 'DELETE':
                return $this->handleDeleteRequest($name);
                break;
        }
    }

    /**
     * Redirect after a post request.
     *
     * @param  string $routeName
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    private function handlePostRequest($routeName, $parameter)
    {
        switch ($this->handle_submission) {
            case 'do_and_show':
                return $this->toShow($routeName, $parameter);
                break;

            case 'do_and_repeat':
                return back();
                break;
        }
    }

    /**
     * Redirect after a put/patch request.
     *
     * @param  string $routeName
     * @param  \App\Model $parameter
     * @return \Illuminate\Http\Response
     */
    private function handlePutRequest($routeName, $parameter)
    {
        switch ($this->handle_submission) {
            case 'do_and_show':
                return $this->toShow($routeName, $parameter);
                break;

            case 'do_and_repeat':
                return $this->toEdit($routeName, $parameter);
                break;
        }
    }

    /**
     * Redirect after a delete request.
     *
     * @param  string $routeName
     * @return mixed
     */
    private function handleDeleteRequest($routeName)
    {
        if(request()->ajax()) {
            return response([
                'message' => 'The record has been deleted.',
            ]);
        } else {
            return $this->toIndex($routeName)
                ->with('The record has been deleted.', 'success');
        }
    }
}

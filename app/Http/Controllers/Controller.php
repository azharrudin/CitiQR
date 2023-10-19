<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    /**
     * Show the success notification after user registration
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function success_register()
    {
        return view('success_register');
    }
}

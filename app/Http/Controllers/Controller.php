<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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
        QrCode::generate('Make me into a QrCode!', '../public/qrcode/qrcode.svg');
        return view('success_register');
    }
}

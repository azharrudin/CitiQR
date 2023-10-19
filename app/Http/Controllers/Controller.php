<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Ramsey\Uuid\Uuid;
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
        $uuid = Uuid::uuid4()->toString();
        return QrCode::format('png')->size(250)->generate($uuid, '../public/qrcode/'.$uuid.'.png');
        return view('success_register');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Yajra\DataTables\DataTables;
use Illuminate\Database\QueryException;
use Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x = Event::select("*")->get();
        return DataTables::of($x)->addColumn("action", function ($c) {
            return "<button class='btn btn-success'  onclick='update(" . $c->id . ")'><i class='bi bi-check2-square'></i></button>&nbsp;<button class='btn btn-warning'  onclick='window.location.href = \"/api/event/getqr?id=$c->uuid\"' ><i class='bi bi-eye'></i></button>";
        })->addColumn("attended_status", function ($f) {
            return $f->status == 0 ? "NOT ATTENDED" : "ATTENDED";
        })->make(true);
    }

    /**
     * generate QR based on UUID
     */
    public function generateqr(Request $request)
    {
        $data = $request->id;
        // quick and simple:
        echo '<img src="' . (new QRCode)->render($data) . '" alt="QR Code" />';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $uuid = Uuid::uuid4()->toString();
        QrCode::format('png')->size(250)->generate($uuid, '../public/qrcode/'.$uuid.'.svg');
        $data = [
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'uuid' => $uuid,
        ];

        Mail::send('email.qr', $data, function ($message) use ($request) {
            $message->to($request->email, 'Recipient Name')->subject('Welcome to Our Application');
        });
        try {
            Event::create([
                "fullname" => $request->fullname,
                "phone" => $request->phone,
                "email" => $request->email,
                "city" => $request->city,
                "uuid" => $uuid,
                "status" => 0
            ]);
            return response()->json(array(
                "status" => "OK",
                "data" => [
                    "fullname" => $request->fullname,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "city" => $request->city,
                    "status" => 0
                ]
            ), 200);
        } catch (QueryException $e) {
            // return  $request->validate([
            //     'phone' => 'required|unique:events,phone',
            //     'email' => 'required|email|unique:events,email',
            // ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $obj = Event::find($request->id);
        $obj->update(array(
            "status" => 1
        ));
        return response()->json(array(
            "status" => "OK",
            "data" => [
                "fullname" => $request->fullname,
                "phone" => $request->phone,
                "email" => $request->email,
                "city" => $request->city,
                "status" => 1
            ]
        ), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}

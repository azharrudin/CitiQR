<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x = Event::select("*")->get();
        return DataTables::of($x)->addColumn("action", function ($c) {
            return "<button class='btn btn-danger'><i class='bi bi-oke' onclick='deleteItem(".$c->id.")'></i></button>";
        })->addColumn("attended_status", function ($f) {
            return $f->status == 0 ? "NOT ATTENDED" : "ATTENDED";
        })->make(true);
    }

    /**
     * Register new customer
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Event::create([
            "fullname" => $request->fullname,
            "phone" => $request->phone,
            "email" => $request->email,
            "city" => $request->city,
            "uuid" => Uuid::uuid4()->toString(),
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
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}

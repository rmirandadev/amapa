<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('agency.event.index');
    }

    public function show($slug)
    {
        $event = Event::whereSlug($slug)->first();
        return view('agency.event.show',compact('event'));
    }
}

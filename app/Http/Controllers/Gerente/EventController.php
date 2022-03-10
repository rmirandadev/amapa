<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Support\Str;

class EventController extends Controller
{

    public function index()
    {
        return view('admin.event.index');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.show',compact('event'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(EventRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        Event::create($data);
        return redirect()->route('event.index')->withToastSuccess('Evento adicionado!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.event.edit',compact('event'));
    }

    public function update(EventRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        Event::findOrFail($id)->update($data);
        return redirect()->route('event.index')->withToastSuccess('Evento atualizado!');
    }


    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Evento deletado!');
    }
}

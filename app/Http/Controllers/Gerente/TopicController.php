<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Models\Topic;

class TopicController extends Controller
{

    public function index()
    {
        return view('admin.topic.index');
    }

    public function create()
    {
        return view('admin.topic.create');
    }

    public function store(TopicRequest $request)
    {
        $data = $request->all();
        $data['name'] = ucfirst($request->name);
        Topic::create($data);
        return redirect()->route('topic.index')->withToastSuccess('Tópico adicionado!');
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('admin.topic.edit',compact('topic'));
    }

    public function update(TopicRequest $request, $id)
    {
        $data = $request->all();
        $data['name'] = ucfirst($request->name);
        Topic::findOrFail($id)->update($data);
        return redirect()->route('topic.index')->withToastSuccess('Tópico atualizado!');
    }


    public function destroy($id)
    {
        Topic::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Tópico deletado!');
    }
}

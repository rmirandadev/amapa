<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;

class VideoController extends Controller
{

    public function index()
    {
        return view('admin.video.index');
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(VideoRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Video::create($data);
        return redirect()->route('video.index')->withToastSuccess('Video adicionado!');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.video.edit',compact('video'));
    }

    public function update(VideoRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Video::findOrFail($id)->update($data);
        return redirect()->route('video.index')->withToastSuccess('Video atualizado!');
    }


    public function destroy($id)
    {
        Video::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Video deletado!');
    }
}

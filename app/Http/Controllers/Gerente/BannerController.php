<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public $folder = 'banners';

    public function index()
    {
        return view('admin.banner.index');
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(BannerRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        if($request->hasFile('image')) {
            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $banner_name = Str::slug($request->title) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $banner_name);
            $data['image'] = $banner_name;
        }

        Banner::create($data);
        return redirect()->route('banner.index')->withToastSuccess('Banner adicionado!');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit',compact('banner'));
    }

    public function update(BannerRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        if($request->hasFile('image')) {
            $file = Banner::findOrFail($id);
            Storage::delete('banners/' . $file->image);

            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $banner_name = Str::slug($request->title) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $banner_name);
            $data = $request->all();
            $data['image'] = $banner_name;
        }

        Banner::findOrFail($id)->update($data);
        return redirect()->route('banner.index')->withToastSuccess('Banner atualizado!');
    }

    public function destroy($id)
    {
        $file = Banner::findOrFail($id);
        $file->delete();
        Storage::delete('banners/'.$file->image);
        return redirect()->back()->withToastSuccess('Banner deletado!');
    }
}

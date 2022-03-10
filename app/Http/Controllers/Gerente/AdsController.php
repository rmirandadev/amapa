<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdsRequest;
use App\Models\Ads;
use App\Models\Local;
use App\Models\Plataform;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdsController extends Controller
{
    public $folder = 'ads';

    public function getAdsLocal($id)
    {
        $locals = Local::wherePlataformId($id)->pluck('name','id');
        return $locals;
    }

    public function index()
    {
        return view('admin.ads.index');
    }

    public function create()
    {
        $plataforms = Plataform::orderBy('name')->pluck('name','id');
        $plataformList = Plataform::orderBy('name')->get();
        $locals = [];
        return view('admin.ads.create',compact('plataforms','plataformList','locals'));
    }

    public function store(AdsRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        if($request->hasFile('image')) {
            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $ads_name = Str::slug($request->name) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $ads_name);
            $data['image'] = $ads_name;
        }

        Ads::create($data);
        return redirect()->route('ads.index')->withToastSuccess('Ads adicionado!');
    }

    public function edit($id)
    {
        $plataforms = Plataform::orderBy('name')->pluck('name','id');
        $plataformList = Plataform::orderBy('name')->get();
        $ads = Ads::findOrFail($id);
        $plataform = Plataform::whereId($ads->plataform_id)->first();
        $locals = Local::orderBy('name')
            ->WhereHas('plataform', function($q) use ($plataform){
                $q->where('id', '=', $plataform->id);
            })->pluck('name','id');

        return view('admin.ads.edit',compact('ads','plataforms','locals','plataformList'));
    }

    public function update(AdsRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        if($request->hasFile('image')) {
            $file = Ads::findOrFail($id);
            Storage::delete('ads/' . $file->image);

            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $ads_name = Str::slug($request->name) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $ads_name);
            $data = $request->all();
            $data['image'] = $ads_name;
        }

        Ads::findOrFail($id)->update($data);
        return redirect()->route('ads.index')->withToastSuccess('Ads atualizado!');
    }

    public function destroy($id)
    {
        $file = Ads::findOrFail($id);
        $file->delete();
        Storage::delete('ads/'.$file->image);
        return redirect()->back()->withToastSuccess('Ads deletado!');
    }
}

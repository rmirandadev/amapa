<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public $folder = 'programs';

    public function index()
    {
        return view('admin.program.index');
    }

    public function create()
    {
        return view('admin.program.create');
    }

    public function store(ProgramRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        if($request->hasFile('image')) {
            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $program_name = Str::slug($request->name) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $program_name);
            $data['image'] = $program_name;
        }

        Program::create($data);
        return redirect()->route('program.index')->withToastSuccess('Programa adicionado!');
    }

    public function edit(Program $program)
    {
        return view('admin.program.edit',compact('program'));
    }

    public function update(ProgramRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        if($request->hasFile('image')) {
            $file = Program::findOrFail($id);
            Storage::delete('programs/' . $file->image);

            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $program_name = Str::slug($request->name) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $program_name);
            $data = $request->all();
            $data['image'] = $program_name;
        }

        Program::findOrFail($id)->update($data);
        return redirect()->route('program.index')->withToastSuccess('Programa atualizado!');
    }

    public function destroy($id)
    {
        $file = Program::findOrFail($id);
        $file->delete();
        Storage::delete('programs/'.$file->image);
        return redirect()->back()->withToastSuccess('Programa deletado!');
    }
}

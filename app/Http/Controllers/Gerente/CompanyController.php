<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{

    public function index()
    {
        return view('admin.company.index');
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(CompanyRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Company::create($data);
        return redirect()->route('company.index')->withToastSuccess('Órgão adicionado!');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.edit',compact('company'));
    }

    public function update(CompanyRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Company::findOrFail($id)->update($data);
        return redirect()->route('company.index')->withToastSuccess('Órgão atualizado!');
    }


    public function destroy($id)
    {
        Company::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Órgão deletado!');
    }
}

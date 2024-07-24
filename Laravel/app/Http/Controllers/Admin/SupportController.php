<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController{
    public function index(Support $support){
        //Cria a variavel $support e injeta o que tem no Support nela.

        $supports = $support->all();
        
        return view('admin/supports/index', compact('supports'));
    }

    public function show(string|int $id){
        //Support::find($id);
        //Support::where('id', $id)-first();
        if(!$support = Support::find($id)){
            return back();
        }

        return view('admin/supports/show', compact('support'));
    }

    public function create(){
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request, Support $support){
        //pega apenas os dados validados
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
    }

    public function edit(Support $support, String | int $id){

        if(!$support = $support->where('id', $id)->first()){
            return back();
        }
        return view('admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, Support $support, String $id){
        //Recupera o item pelo id
        if(!$support = $support->find($id)){
            return back();
        }

        $support->update($request->only([
            'subject',
            'body'
        ]));
        
        return redirect()->route('supports.index');
    }
    public function destroy(String|int $id){
        if(!$support = Support::find($id)){
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController{
    public function __construct(protected SupportService $service){}

    public function index(Request $request)
    {
        //Cria a variavel $support e injeta o que tem no Support nela.

        $supports = $this->service->getAll($request->filter);
        
        return view('admin/supports/index', compact('supports'));
    }

    public function show(string|int $id)
    {
        //Support::find($id);
        //Support::where('id', $id)-first();
        if(!$support = $this->service->findOne($id)){
            return back();
        }

        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupportRequest $request, Support $support){
        //pega apenas os dados validados
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
    }

    public function edit(Support $support, String | int $id)
    {

        //if(!$support = $support->where('id', $id)->first()){
        if(!$support = $this->service->findOne($id)){
            return back();
        }
        return view('admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, Support $support, String $id)
    {
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
    public function destroy(String $id)
    {   
        //Não precisa achar o ID nesse caso, por que caso seja passado um ID inválido ele vai cair em uma exception
        //if(!$support = Support::find($id)){
        //    return back();
        //}

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
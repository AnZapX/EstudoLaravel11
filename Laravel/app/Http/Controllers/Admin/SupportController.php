<?php

namespace App\Http\Controllers\Admin;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController{
    public function index(Support $support){
        //Cria a variavel $support e injeta o que tem no Support nela.

        $supports = $support->all();
        

        return view('admin/supports/index', compact('supports'));
    }

    public function create(){
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support){
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
        
    }
}
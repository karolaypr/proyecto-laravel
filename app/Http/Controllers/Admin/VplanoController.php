<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vplano;
use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;


class VplanoController extends Controller

{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $vplanos = Vplano::orderBy('name','asc')->paginate();

        return view('admin.vplanos.index', compact('vplanos', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.vplanos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $vplano = new Vplano();

        $vplano->name = $request->name;
        $vplano->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $vplano->archivo=$archivo->getClientOriginalName();

        }

        $vplano->save();
        return redirect()->route('admin.vplanos.index');
    }

    public function show(Vplano $vplano)
    {
        return view('admin.vplanos.show', compact('vplano'));
    }
    
    public function edit(Vplano $vplano)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.vplanos.edit', compact('vplano','clientes'));
    }

    public function update(Request $request, Vplano $vplano)
    {
        $request->validate([
            'name'=>'required'
        ]);
        

        $vplano->name = $request->name;
        $vplano->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $vplano->archivo=$archivo->getClientOriginalName();

        }

        $vplano->save();
        return redirect()->route('admin.vplanos.index');
    }
   
    public function destroy(Vplano $vplano)
    {
        $vplano->delete();
        return redirect()->route('admin.vplanos.index')->with('eliminar','ok');
    }
}

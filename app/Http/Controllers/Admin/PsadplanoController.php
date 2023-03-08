<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Psadplano;
use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;


class PsadplanoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $psadplanos = Psadplano::orderBy('name','asc')->paginate();

        return view('admin.psadplanos.index', compact('psadplanos', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.psadplanos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $psadplano = new Psadplano();

        $psadplano->name = $request->name;
        $psadplano->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $psadplano->archivo=$archivo->getClientOriginalName();

        }

        $psadplano->save();
        return redirect()->route('admin.psadplanos.index');
    }

    public function show(Psadplano $psadplano)
    {
        return view('admin.psadplanos.show', compact('psadplano'));
    }

    public function edit(Psadplano $psadplano)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.psadplanos.edit', compact('psadplano','clientes'));
    }

    public function update(Request $request, Psadplano $psadplano)
    {
        $request->validate([
            'name'=>'required'
        ]);
        

        $psadplano->name = $request->name;
        $psadplano->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $psadplano->archivo=$archivo->getClientOriginalName();

        }

        $psadplano->save();
        return redirect()->route('admin.psadplanos.index');
    }
   
    public function destroy(Psadplano $psadplano)
    {
        $psadplano->delete();
        return redirect()->route('admin.psadplanos.index')->with('eliminar','ok');
    }
}

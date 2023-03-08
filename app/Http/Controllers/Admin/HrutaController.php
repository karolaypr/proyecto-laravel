<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Hruta;
use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;


class HrutaController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $hrutas = Hruta::orderBy('name','asc')->paginate();

        return view('admin.hrutas.index', compact('hrutas', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.hrutas.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $hruta = new Hruta();

        $hruta->name = $request->name;
        $hruta->cliente_id = $request->cliente_id;
        $hruta->fecha = $request->fecha;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $hruta->archivo=$archivo->getClientOriginalName();

        }

        $hruta->save();
        return redirect()->route('admin.hrutas.index');
    }

    public function show(Hruta $hruta)
    {
        return view('admin.hrutas.show', compact('hruta'));
    }

    public function edit(Hruta $hruta)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.hrutas.edit', compact('hruta','clientes'));
    }

    public function update(Request $request, Hruta $hruta)
    {
        $request->validate([
            'name'=>'required'
        ]);
        

        $hruta->name = $request->name;
        $hruta->cliente_id = $request->cliente_id;
        $hruta->fecha = $request->fecha;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $hruta->archivo=$archivo->getClientOriginalName();

        }

        $hruta->save();
        return redirect()->route('admin.hrutas.index');
    }
   
    public function destroy(Hruta $hruta)
    {
        $hruta->delete();
        return redirect()->route('admin.hrutas.index')->with('eliminar','ok');
    }
}

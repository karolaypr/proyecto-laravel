<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;


class ProyectoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $proyectos = Proyecto::orderBy('name','asc')->paginate();

        return view('admin.proyectos.index', compact('proyectos', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.proyectos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $proyecto = new Proyecto();

        $proyecto->name = $request->name;
        $proyecto->fecha = $request->fecha;
        $proyecto->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $proyecto->archivo=$archivo->getClientOriginalName();

        }
        $proyecto->save();
        return redirect()->route('admin.proyectos.index');
    }

    public function show(Proyecto $proyecto)
    {
        return view('admin.proyectos.show', compact('proyecto'));
    }

    public function edit(Proyecto $proyecto)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.proyectos.edit', compact('proyecto','clientes'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
             $request->validate([
            'name'=>'required'
        ]);
        
        $proyecto->name = $request->name;
        $proyecto->fecha = $request->fecha;
        $proyecto->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $proyecto->archivo=$archivo->getClientOriginalName();

        }

        $proyecto->save();
        return redirect()->route('admin.proyectos.index');
    }
   
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        return redirect()->route('admin.proyectos.index')->with('eliminar','ok');
    }
}

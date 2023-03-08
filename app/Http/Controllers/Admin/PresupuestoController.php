<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presupuesto;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;


class PresupuestoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $presupuestos = Presupuesto::orderBy('name','asc')->paginate();

        return view('admin.presupuestos.index', compact('presupuestos', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.presupuestos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $presupuesto = new Presupuesto();

        $presupuesto->name = $request->name;
        $presupuesto->fecha = $request->fecha;
        $presupuesto->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $presupuesto->archivo=$archivo->getClientOriginalName();

        }
        $presupuesto->save();
        return redirect()->route('admin.presupuestos.index');
    }

    public function show(Presupuesto $presupuesto)
    {
        return view('admin.presupuestos.show', compact('presupuesto'));
    }

    public function edit(Presupuesto $presupuesto)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.presupuestos.edit', compact('presupuesto','clientes'));
    }

    public function update(Request $request, Presupuesto $presupuesto)
    {
             $request->validate([
            'name'=>'required'
        ]);
        
        $presupuesto->name = $request->name;
        $presupuesto->fecha = $request->fecha;
        $presupuesto->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $presupuesto->archivo=$archivo->getClientOriginalName();

        }

        $presupuesto->save();
        return redirect()->route('admin.presupuestos.index');
    }
   
    public function destroy(Presupuesto $presupuesto)
    {
        $presupuesto->delete();
        return redirect()->route('admin.presupuestos.index')->with('eliminar','ok');
    }
}

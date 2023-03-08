<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contrato;
use App\Models\Cliente;

class ContratoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $contratos = Contrato::orderBy('name','asc')->paginate();

        return view('admin.contratos.index', compact('contratos', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.contratos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $contrato = new Contrato();

        $contrato->name = $request->name;
        $contrato->fecha = $request->fecha;
        $contrato->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $contrato->archivo=$archivo->getClientOriginalName();

        }

        $contrato->save();
        return redirect()->route('admin.contratos.index');
    }

    public function show(Contrato $contrato)
    {
        return view('admin.contratos.show', compact('contrato'));
    }

    public function edit(Contrato $contrato)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.contratos.edit', compact('contrato','clientes'));
    }

    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $contrato->name = $request->name;
        $contrato->fecha = $request->fecha;
        $contrato->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $contrato->archivo=$archivo->getClientOriginalName();

        }

        $contrato->save();
        return redirect()->route('admin.contratos.index');
    }
   
    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('admin.contratos.index')->with('eliminar','ok');
    }
}

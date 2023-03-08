<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cd;
use App\Models\Cliente;


class CdController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $cds = Cd::orderBy('name','asc')->paginate();

        return view('admin.cds.index', compact('cds', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.cds.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $cd = new Cd();

        $cd->name = $request->name;
        $cd->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $cd->archivo=$archivo->getClientOriginalName();

        }
        $cd->save();
        return redirect()->route('admin.cds.index');
    }

    public function show(Cd $cd)
    {
        return view('admin.cds.show', compact('cd'));
    }

    public function edit(Cd $cd)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.cds.edit', compact('cd','clientes'));
    }

    public function update(Request $request, Cd $cd)
    {
             $request->validate([
            'name'=>'required'
        ]);
        
        $cd->name = $request->name;
        $cd->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $cd->archivo=$archivo->getClientOriginalName();

        }

        $cd->save();
        return redirect()->route('admin.cds.index');
    }
   
    public function destroy(Cd $cd)
    {
        $cd->delete();
        return redirect()->route('admin.cds.index')->with('eliminar','ok');
    }
}

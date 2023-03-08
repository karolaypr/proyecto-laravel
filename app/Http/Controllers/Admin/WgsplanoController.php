<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wgsplano;
use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;


class WgsplanoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $wgsplanos = Wgsplano::orderBy('name','asc')->paginate();

        return view('admin.wgsplanos.index', compact('wgsplanos', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.wgsplanos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $wgsplano = new Wgsplano();

        $wgsplano->name = $request->name;
        $wgsplano->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $wgsplano->archivo=$archivo->getClientOriginalName();

        }

        $wgsplano->save();
        return redirect()->route('admin.wgsplanos.index');
    }

    public function show(Wgsplano $wgsplano)
    {
        return view('admin.wgsplanos.show', compact('wgsplano'));
    }

    public function edit(Wgsplano $wgsplano)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.wgsplanos.edit', compact('wgsplano','clientes'));
    }

    public function update(Request $request, Wgsplano $wgsplano)
    {
        $request->validate([
            'name'=>'required'
        ]);
        

        $wgsplano->name = $request->name;
        $wgsplano->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $wgsplano->archivo=$archivo->getClientOriginalName();

        }

        $wgsplano->save();
        return redirect()->route('admin.wgsplanos.index');
    }
   
    public function destroy(Wgsplano $wgsplano)
    {
        $wgsplano->delete();
        return redirect()->route('admin.wgsplanos.index')->with('eliminar','ok');
    }
}

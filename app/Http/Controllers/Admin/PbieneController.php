<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pbiene;
use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;


class PbieneController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $pbienes = Pbiene::orderBy('name','asc')->paginate();

        return view('admin.pbienes.index', compact('pbienes', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.pbienes.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $pbiene = new Pbiene();

        $pbiene->name = $request->name;
        $pbiene->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $pbiene->archivo=$archivo->getClientOriginalName();

        }

        $pbiene->save();
        return redirect()->route('admin.pbienes.index');
    }

    public function show(Pbiene $pbiene)
    {
        return view('admin.pbienes.show', compact('pbiene'));
    }

    public function edit(Pbiene $pbiene)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.pbienes.edit', compact('pbiene','clientes'));
    }

    public function update(Request $request, Pbiene $pbiene)
    {
        $request->validate([
            'name'=>'required'
        ]);
        

        $pbiene->name = $request->name;
        $pbiene->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $pbiene->archivo=$archivo->getClientOriginalName();

        }

        $pbiene->save();
        return redirect()->route('admin.pbienes.index');
    }
   
    public function destroy(Pbiene $pbiene)
    {
        $pbiene->delete();
        return redirect()->route('admin.pbienes.index')->with('eliminar','ok');
    }
}

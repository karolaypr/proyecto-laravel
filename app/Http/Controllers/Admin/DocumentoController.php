<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Documento;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;


class DocumentoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $documentos = Documento::orderBy('name','asc')->paginate();

        return view('admin.documentos.index', compact('documentos', 'clientes'));  
    }


    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.documentos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $documento = new Documento();

        $documento->name = $request->name;
        $documento->fecha = $request->fecha;
        $documento->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $documento->archivo=$archivo->getClientOriginalName();

        }
       
        $documento->save();
        return redirect()->route('admin.documentos.index');
    }

    public function show(Documento $documento)
    {
        return view('admin.documentos.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.documentos.edit', compact('documento','clientes'));
    }

    public function update(Request $request, Documento $documento)
    {
             $request->validate([
            'name'=>'required'
        ]);
        
        $documento->name = $request->name;
        $documento->fecha = $request->fecha;
        $documento->cliente_id = $request->cliente_id;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $documento->archivo=$archivo->getClientOriginalName();

        }

        $documento->save();
        return redirect()->route('admin.documentos.index');
    }
   
    public function destroy(Documento $documento)
    {
        $url = str_replace('archivos', 'public', $documento->archivo);
        Storage::delete($url);
        $documento->delete();
        return redirect()->route('admin.documentos.index')->with('eliminar','ok');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ficha;
use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;


class FichaController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $fichas = Ficha::orderBy('name','asc')->paginate();

        return view('admin.fichas.index', compact('fichas', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.fichas.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $ficha = new Ficha();

        $ficha->name = $request->name;
        $ficha->cliente_id = $request->cliente_id;
        $ficha->fecha = $request->fecha;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $ficha->archivo=$archivo->getClientOriginalName();

        }

        $ficha->save();
        return redirect()->route('admin.fichas.index');
    }

    public function show(Ficha $ficha)
    {
        return view('admin.fichas.show', compact('ficha'));
    }

    public function edit(Ficha $ficha)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.fichas.edit', compact('ficha','clientes'));
    }

    public function update(Request $request, Ficha $ficha)
    {
        $request->validate([
            'name'=>'required'
        ]);
        

        $ficha->name = $request->name;
        $ficha->cliente_id = $request->cliente_id;
        $ficha->fecha = $request->fecha;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $ficha->archivo=$archivo->getClientOriginalName();

        }

        $ficha->save();
        return redirect()->route('admin.fichas.index');
    }
   
    public function destroy(Ficha $ficha)
    {
        $ficha->delete();
        return redirect()->route('admin.fichas.index')->with('eliminar','ok');
    }
}

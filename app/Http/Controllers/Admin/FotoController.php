<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Foto;
use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;


class FotoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $fotos = Foto::orderBy('cliente_id','asc')->paginate();

        return view('admin.fotos.index', compact('fotos', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.fotos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $foto = new Foto();

        $foto->name = $request->name;
        $foto->cliente_id = $request->cliente_id;

        if ($request->hasFile('avatar'))
        {
            $foto->avatar = $request->file('avatar')->store('public');
        }

        $foto->save();
        return redirect()->route('admin.fotos.index');
    }

    public function show(Foto $foto)
    {
        return view('admin.fotos.show', compact('foto'));
    }

    public function edit(Foto $foto)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.fotos.edit', compact('foto','clientes'));
    }

    public function update(Request $request, Foto $foto)
    {
        $request->validate([
            'name'=>'required'
        ]);
        

        $foto->name = $request->name;
        $foto->cliente_id = $request->cliente_id;

        if ($request->hasFile('avatar'))
        {
            $foto->avatar = $request->file('avatar')->store('public');
        }

        $foto->save();
        return redirect()->route('admin.fotos.index');
    }
   
    public function destroy(Foto $foto)
    {
        $url = str_replace('storage', 'public', $foto->avatar);
        Storage::delete($url);

        $foto->delete();
        return redirect()->route('admin.fotos.index')->with('eliminar','ok');
    }
}

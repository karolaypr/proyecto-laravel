<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pago;
use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;


class PagoController extends Controller
{
    public function index()
    {
        $clientes = Cliente::pluck('name','id');
        $pagos = Pago::orderBy('name','asc')->paginate();

        return view('admin.pagos.index', compact('pagos', 'clientes'));  
    }

    public function create(){
        $clientes = Cliente::pluck('name','id');
        return view('admin.pagos.create', compact('clientes'));   
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $pago = new Pago();

        $pago->name = $request->name;
        $pago->cliente_id = $request->cliente_id;
        $pago->fecha = $request->fecha;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $pago->archivo=$archivo->getClientOriginalName();

        }

        $pago->save();
        return redirect()->route('admin.pagos.index');
    }

    public function show(Pago $pago)
    {
        return view('admin.pagos.show', compact('pago'));
    }

    public function edit(Pago $pago)
    {
        $clientes = Cliente::pluck('name','id');

        return view('admin.pagos.edit', compact('pago','clientes'));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'name'=>'required'
        ]);
        

        $pago->name = $request->name;
        $pago->cliente_id = $request->cliente_id;
        $pago->fecha = $request->fecha;

        if($request->hasFile('archivo')){
            $archivo=$request->file('archivo');
            $archivo->move(public_path().'/archivos/',$archivo->getClientOriginalName());
            $pago->archivo=$archivo->getClientOriginalName();

        }

        $pago->save();
        return redirect()->route('admin.pagos.index');
    }
   
    public function destroy(Pago $pago)
    {
        $pago->delete();
        return redirect()->route('admin.pagos.index')->with('eliminar','ok');;
    }
}

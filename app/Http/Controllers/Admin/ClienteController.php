<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Documento;
use App\Models\Contrato;
use App\Models\Wgsplano;
use App\Models\Psadplano;
use App\Models\Pbiene;
Use App\Models\Vplano;
Use App\Models\Ficha;
Use App\Models\Cd;
Use App\Models\Pago;
Use App\Models\Hruta;
Use App\Models\Proyecto;
Use App\Models\Presupuesto;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreClienteRequest;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('name','asc')->paginate();

        return view('admin.clientes.index', compact('clientes'));  
    }

    
    public function create()
    {
       /* para crear un formulario*/
       return view('admin.clientes.create');
    }

    //Guardar información que se almacena al crear un nuevo cliente
    //El request para recuperar lo que se envia del formulario
    public function store(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        
        $cliente = new Cliente();

        $cliente->name = $request->name;
        $cliente->dni = $request->dni;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        if ($request->hasFile('avatar'))
        {
            $cliente->avatar = $request->file('avatar')->store('public');
        }
        $cliente->sector = $request->sector;
        $cliente->estado = $request->estado; 
        $cliente->ruta = $request->ruta;           
        
        
        $cliente->save();
        return redirect()->route('admin.clientes.index');
    }

    
    public function show(Cliente $cliente)
    {
        $documentos = Documento::pluck('name','id');
        $psadplanos = Psadplano::pluck('name','id');
        $wgsplanos = Wgsplano::pluck('name','id');
        $pbienes = Pbiene::pluck('name','id');
        $vplanos = Vplano::pluck('name','id');
        $proyectos = Proyecto::pluck('name','id');
        $presupuestos = Presupuesto::pluck('name','id');
        $fichas = Ficha::pluck('name','id');
        $hrutas = Hruta::pluck('name','id');
        $contratos = Contrato::pluck('name','id');
        $pagos = Pago::pluck('name','id');
        Cliente::orderBy('name','asc')->paginate();
        
  
        return view('admin.clientes.show', compact('cliente', 'documentos','psadplanos','wgsplanos','pbienes','vplanos','proyectos','presupuestos','fichas','hrutas','contratos','pagos')); 
    }
    
    
    public function edit(Cliente $cliente)
    {
        return view('admin.clientes.edit', compact('cliente'));
    }

    
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $cliente->name = $request->name;
        $cliente->dni = $request->dni;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->sector = $request->sector;
        $cliente->estado = $request->estado;
        $cliente->ruta = $request->ruta; 

        if ($request->hasFile('avatar'))
        {
            $cliente->avatar = $request->file('avatar')->store('public');
        }

        $cliente->save();
        return redirect()->route('admin.clientes.index', $cliente);
    }
   
    public function destroy(Cliente $cliente)
    {
        $url = str_replace('storage', 'public', $cliente->avatar);
        Storage::delete($url);
        
        $cliente->delete();
        return redirect()->route('admin.clientes.index')->with('eliminar','ok');
    }
}

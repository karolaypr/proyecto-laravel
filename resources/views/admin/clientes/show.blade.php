@extends('adminlte::page')

@section('title', 'Corporación Carranza Gutierrez')

@section('content_header')
       
@stop

@section('css')
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('content')
<br>
<div class="card">
    <div class="card-body">
        <h4>Cliente: {{$cliente->name}} </h4>
            <a class="btn btn-link">
                <i class="ace-icon fa fa-address-card"></i>
            </a>{{$cliente->dni}}<br>

            <a href="#" class="btn btn-link">
                <i class="ace-icon fa fa-map-marker-alt"></i>
            </a>{{$cliente->direccion}}<br>
            
            <a href="#" class="btn btn-link">
                <i class="ace-icon fa fa-phone-alt"></i>
            </a>{{$cliente->telefono}}<br>

            <a href="#" class="btn btn-link">
                <i class="ace-icon fa fa-at"></i>
            </a>{{$cliente->email}}<br>

            <a href="#" class="btn btn-link">
                <i class="ace-icon fa fa-globe"></i>
                <a href="{{$cliente->ruta}}" target="_blank">{{$cliente->ruta}}</a>    
            </a>
            <form action ="{{route('admin.clientes.index', $cliente)}}">
                <button type="submit" class="btn-light btn-md">
                    <i class="fas fa-arrow-circle-left"></i> Volver
                </button>
                <button class="btn-light"><a href="#doc">Documentos</a></button>
                <button class="btn-light"><a href="#psad">PSAD56</a></button>
                <button class="btn-light"><a href="#wgs">WGS84</a></button>
                <button class="btn-light"><a href="#bienes">Planos BN</a></button>
                <button class="btn-light"><a href="#visac">Visación</a></button>
                <button class="btn-light"><a href="#proyect">Proyectos</a></button>
                <button class="btn-light"><a href="#pres">Presupuestos</a></button>
                <button class="btn-light"><a href="#fich">Fichas</a></button>
                <button class="btn-light"><a href="#hoja">Hoja de rutas</a></button>
                <button class="btn-light"><a href="#contrato">Contratos</a></button>
                <button class="btn-light"><a href="#pago">Pagos</a></button>
                <button class="btn-light"><a href="#foto">Fotos</a></button>
            </form>
    </div>
</div>

<!--Documentos--> 
<div class="card">   
    <div class="card-body">
        <div><h4 name="doc">Documentos</h4></div><br>
        <table id="documentos" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL ARCHIVO</th>                        
                    <th>ARCHIVO</th>    
                    <th>FECHA</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
        <tbody>
            @foreach ($cliente->documentos as $c)                     
                <tr>
                    <td>{{$c->name}}</td>
                    <td><a href="../../archivos/{{$c->archivo}}" target="_blank">ver archivo</a></td>
                    <td>{{$c->fecha}}</td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.documentos.edit', $c)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.documentos.destroy', $c)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Planos PSAD54-->
<div class="card">
    <div class="card-body">
        <div><h4 name="psad">Planos PSAD56</h4></div><br>
        <table id="psad" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL PLANO</th>                        
                    <th>ARCHIVO</th> 
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
        <tbody>
            @foreach ($cliente->psadplanos as $c4)                     
                <tr>
                    <td>{{$c4->name}}</td>
                    <td><a href="../../archivos/{{$c4->archivo}}" target="_blank">ver archivo</a></td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.psadplanos.edit', $c4)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.psadplanos.destroy', $c4)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!-- Planos wgs-->
<div class="card">
    <div class="card-body">
        <div><h4 name="wgs">Planos WGS</h4></div><br>
        <table id="wgs" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL PLANO</th>                        
                    <th>ARCHIVO</th> 
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
        <tbody>
            @foreach ($cliente->wgsplanos as $p)                     
                <tr>
                    <td>{{$p->name}}</td>
                    <td><a href="../../archivos/{{$p->archivo}}" target="_blank">ver archivo</a></td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.psadplanos.edit', $p)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.psadplanos.destroy', $p)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Planos bienes nacionales-->
<div class="card">
    <div class="card-body">
        <div><h4 name="bienes">Planos Bienes Nacionales</h4></div><br>
        <table id="bienes" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL PLANO</th>                        
                    <th>ARCHIVO</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
        <tbody>
            @foreach ($cliente->pbienes as $bp)                     
                <tr>
                    <td>{{$bp->name}}</td>
                    <td><a href="../../archivos/{{$bp->archivo}}" target="_blank">ver archivo</a></td>
                    <td>
                        <div class="container">
                            <div class="row">                    
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.pbienes.edit', $bp)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.pbienes.destroy', $bp)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Visacion de planos - -->
<div class="card">
    <div class="card-body">
        <div><h4 name="visac">Visación de Planos</h4></div><br>
        <table id="vp" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL PLANO</th>                        
                    <th>ARCHIVO</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente->vplanos as $vplano)
                <tr>
                    <td>{{$vplano->name}}</td>
                    <td><a href="../../archivos/{{$vplano->archivo}}" target="_blank">ver archivo</a></td>
                    <td>
                        <div class="container">
                            <div class="row">                    
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.vplanos.edit', $vplano)}}">
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.vplanos.destroy', $vplano)}}" class="formulario-eliminar" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Proyectos-->
<div class="card">
    <div class="card-body">
        <div><h4 name="proyect">Proyectos</h4></div><br>
        <table id="proyec" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL PROYECTO</th>                        
                    <th>ARCHIVO</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente->proyectos as $proyec)
                <tr>
                    <td>{{$proyec->name}}</td>
                    <td><a href="../../archivos/{{$proyec->archivo}}" target="_blank">ver archivo</a></td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.proyectos.edit', $proyec)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.proyectos.destroy', $proyec)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Presupuestos-->
<div class="card">
    <div class="card-body">
        <div><h4 name="pres">Presupuestos</h4></div><br>
        <table id="presupuesto" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL PRESUPUESTO</th>                        
                    <th>ARCHIVO</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente->presupuestos as $presupuesto)
                <tr>
                    <td>{{$presupuesto->name}}</td>
                    <td><a href="../../archivos/{{$presupuesto->archivo}}" target="_blank">ver archivo</a></td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.presupuestos.edit', $presupuesto)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.presupuestos.destroy', $presupuesto)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Fichas-->
<div class="card">
    <div class="card-body">
        <div><h4 name="fich">Fichas Tecnicas de Inspección</h4></div><br>
        <table id="ficha" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DE LA FICHA</th>                        
                    <th>ARCHIVO</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente->fichas as $ficha)
                <tr>
                    <td>{{$ficha->name}}</td>
                    <td><a href="../../archivos/{{$ficha->archivo}}" target="_blank">ver archivo</a></td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.fichas.edit', $ficha)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.fichas.destroy', $ficha)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Hoja de ruta-->
<div class="card">
    <div class="card-body">
        <div><h4 name="hoja">Hoja de Ruta</h4></div><br>
        <table id="hr" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DE LA HOJA DE RUTA</th>                        
                    <th>ARCHIVO</th>    
                    <th>FECHA</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
        <tbody>
            @foreach ($cliente->hrutas as $hr)                     
                <tr>
                    <td>{{$hr->name}}</td>
                    <td><a href="../../archivos/{{$hr->archivo}}" target="_blank">ver archivo</a></td>
                    <td>{{$hr->fecha}}</td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.hrutas.edit', $hr)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.hrutas.destroy', $hr)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Contrato-->    
<div class="card">
    <div class="card-body">
        <div><h4 name="con">Contratos</h4></div><br>
        <table id="contrato" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL CONTRATO</th>                        
                    <th>ARCHIVO</th>    
                    <th>FECHA</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
        <tbody>
            @foreach ($cliente->contratos as $con)                     
                <tr>
                    <td>{{$con->name}}</td>
                    <td><a href="../../archivos/{{$con->archivo}}" target="_blank">ver archivo</a></td>
                    <td>{{$con->fecha}}</td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.contratos.edit', $con)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.contratos.destroy', $con)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Pagos-->
<div class="card">
    <div class="card-body">
        <div><h4 name="pag">Pagos</h4></div><br>
        <table id="pago" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL PAGO</th>                        
                    <th>ARCHIVO</th>    
                    <th>FECHA</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>
        <tbody>
            @foreach ($cliente->pagos as $pago)                     
                <tr>
                    <td>{{$pago->name}}</td>
                    <td><a href="../../archivos/{{$pago->archivo}}" target="_blank">ver archivo</a></td>
                    <td>{{$pago->fecha}}</td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.pagos.edit', $pago)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.pagos.destroy', $pago)}}" class="formulario-eliminar" method="POST">
                                        <!--Llamar directiva method porque dentro de form no se puede usar el delete sino solo get y post-->
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-danger btn-md">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> <br>
</div>

<!--Fotos-->
<div class="card">
    <div class="card-body">
        <div class="right_col" role="main">
            <div>
                <h4 name="foto">Fotos</h4>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_content">      
                            <div class="row">
                                @foreach ($cliente->fotos as $foto)
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">                        
                                            <div class="container">
                                                <img width="100px" src="../../{{ Storage::url($foto->avatar) }}">
                                            </div>

                                            <div class="container">
                                                <div class="container"><div class="container">
                                                    <div class="row">
                                                        <div class=".col-md-4">
                                                            <form action ="{{route('admin.fotos.edit', $foto)}}">
                                                                <button type="submit" class="btn-primary btn-md"><i class="fas fa-edit"></i>
                                                                </button>
                                                            </form>
                                                        </div><br>   

                                                        <div class=".col-md-4">
                                                            <form action ="{{route('admin.fotos.destroy', $foto)}}" class="formulario-eliminar" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn-danger btn-md"><i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

        </div> <br>
    </div>
</div>

@endsection


@section('js')
<script src="assets/js/ace-extra.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#documentos').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#psad').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#wgs').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#contratos').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#bienes').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#vp').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#ficha').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#hr').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#cd').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#pago').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#proyecto').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script>
    $('#presupuesto').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
        "info": "Página _PAGE_ de _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar",
        "paginate": {
            'next': 'Siguiente',
            'previous': 'Anterior'
        }       
     }
    });
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Se eliminará definitivamente',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085D6',
                cancelButtonColor: '#D33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
            })
            
        });
    </script>
@endsection
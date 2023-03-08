@extends('adminlte::page')

@section('title', 'Corporación Carranza Gutierrez')

@section('css')
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
<!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />
    <link rel="stylesheet" href="assets/css/select2.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-editable.min.css" />
<!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

@stop

@section('content_header')
        <h3>Cliente: {{$documento->cliente->name}}</h3>
@stop

@section('content')
<div>
    <h1>Lista de Documentos</h1>   
</div>
<div class="card">    
    <div class="card-body">
        <table id="clientes" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr class="bg-info mb-3">    
                    <th>NOMBRE DEL ARCHIVO</th>                        
                    <th>ARCHIVO</th>    
                    <th>FECHA</th>
                    <th>ACCIONES</th>                     
                </tr>
            </thead>

            <tbody>
               
                <tr>
                    <td>{{$documento->name}}</td>
                    <td><a href="../archivos/{{$documento->archivo}}" target="_blank">ver archivo</a></td>
                    <td>{{$documento->fecha}}</td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.documentos.edit', $documento)}}">
                                        <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                        <button type="submit" class="btn-primary btn-md">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </form>
                                </div><br>
                                <div class=".col-md-6">
                                    <form action ="{{route('admin.documentos.destroy', $documento)}}" method="POST">
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
            </tbody>

        </table>
    </div>        
</div>

<div class="container">
    <div class="container">
    <div class="container">
    <div class="container">
        <div class="row">
        <div class=".col-md-6">
            <form action ="{{route('admin.documentos.index', $documento)}}">
                <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                <button type="submit" class="btn-secondary btn-md">
                    <i class="fas fa-arrow-circle-left"></i> Volver
                </button>
            </form> 
        </div>
        <div class=".col-md-6">
            <form action ="{{route('admin.documentos.edit', $documento)}}">
                <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                <button type="submit" class="btn-primary btn-md">
                    <i class="fas fa-edit"></i> Editar
                </button>
            </form>  
        </div>
        </div> 
    </div> 
    </div> 
    </div>
    </div> 
@endsection

@section('js')
<script src="assets/js/ace-extra.min.js"></script>
@endsection

@section('footer')    
    <footer class="main-footer">
        <strong>Copyright &copy;<a>Corporación Carranza Gutierrez</a></strong>
    </footer>
@stop
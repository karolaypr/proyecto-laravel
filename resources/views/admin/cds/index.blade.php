@extends('adminlte::page')

@section('title', 'Corporación Carranza Gutierrez')

@section('content_header')
        
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('content')
    
    <div>
        <h1>Lista de Cds</h1>
        
    </div>
    <div class="card">
        <br>
        <div class="col-sm-12 col-md-6">
            <form action ="{{route('admin.cds.create')}}">
                <button type="submit" class="btn btn-outline-info btn-md">Crear CD</button>
            </form>
        </div>
        <div class="card-body">
            <table id="clientes" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr class="bg-info mb-3">                        
                        <th>NOMBRE DEL CLIENTE</th>
                        <th>NOMBRE DEL CD</th>                        
                        <th>ARCHIVO</th>
                        <th>ACCIONES</th>                     
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cds as $cd)
                    <tr>
                        <td>{{$cd->cliente->name}}</td>
                        <td>{{$cd->name}}</td>
                        <td><a href="../archivos/{{$cd->archivo}}" target="_blank">ver archivo</a></td>
                        <td>
                            <div class="container">
                                <div class="row">
                                    <div class=".col-md-6">
                                        <form action ="{{route('admin.cds.edit', $cd)}}">
                                            <!--<button type="submit" class="btn-primary btn-sm">Editar</button>-->
                                            <button type="submit" class="btn-primary btn-md">
                                                <i class="fas fa-edit"></i> Editar
                                            </button>
                                        </form>
                                    </div><br>
                                    <div class=".col-md-6">
                                        <form action ="{{route('admin.cds.destroy', $cd)}}" class="formulario-eliminar" method="POST">
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
        </div>        
    </div>
@stop

@section('footer')    
    <footer class="main-footer">
        <strong>Copyright &copy;<a>Corporación Carranza Gutierrez</a></strong>
    </footer>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $('#clientes').DataTable({
            responsive: true,
            autoWidth: false,
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado, ingrese los datos correctamente",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
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

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
            'Eliminado',
            'El CD ha sido eliminado correctamente.',
            'success'
            )
        </script>
    @endif

    <script>
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro de eliminar el CD?',
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
@stop

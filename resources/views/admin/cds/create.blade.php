@extends('adminlte::page')

@section('title', 'Corporación Carranza Gutierrez')

@section('content_header')
    <h2>Crear un CD</h2>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! 'Form'::open(['route' => 'admin.cds.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <!--Esta directiva lo que hace es agregar un input oculto con un nombre llamado token y se encargarà de generar un token-->         
                @csrf

            <div class form-group>
                {!! Form::label('cliente_id', 'Elige el nombre del cliente: ') !!} 
                {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}          
            </div>
            <br>

            <div class form-group>
                {!! Form::label('name', 'Nombre del CD: ') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre del cd']) !!}
            
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>

            <div class form-group>
                <label for="exampleFormControlFile1">Archivo: </label>
                <input type="file" name="archivo" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <br>

            <br>

            {!! Form::submit('Crear CD', ['class' =>'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@stop
@section('footer')    
    <footer class="main-footer">
        <strong>Copyright &copy;<a>Corporación Carranza Gutierrez</a></strong>
    </footer>
@stop



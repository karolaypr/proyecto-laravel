@extends('adminlte::page')

@section('title','Editar planos bienes naciones')

@section('content_header')
    <h2>Editar un plano de bienes nacionales</h2>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($pbiene,['route' => ['admin.pbienes.update', $pbiene], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <!--Esta directiva lo que hace es agregar un input oculto con un nombre llamado token y se encargarà de generar un token-->         
            @csrf

        <div class form-group>
            {!! Form::label('cliente_id', 'Elige el nombre del cliente: ') !!} 
            {!! Form::select('cliente_id', $clientes,null, ['class' => 'form-control']) !!}          
        </div>
        <br>

        <div class form-group>
            {!! Form::label('name', 'Nombre del plano: ') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre del plano']) !!}
        
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <br>

        <div class form-group>
            <label >Archivo: </label>
            <input type="file" name="archivo" class="form-control-file" >
        </div>
        <br>


        <div class form-group>
            {!! Form::label('fecha', 'Fecha: ')!!}
            {!! Form::text('fecha', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la fecha AÑO-MES-DIA']) !!}
        </div>
        <br>

        <br>

        {!! Form::submit('Actualizar plano', ['class' =>'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>

@stop

@section('footer')    
    <footer class="main-footer">
        <strong>Copyright &copy;<a>Corporación Carranza Gutierrez</a></strong>
    </footer>
@stop

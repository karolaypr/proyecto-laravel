@extends('adminlte::page')

@section('title','Editar cliente')

@section('content_header')
    <h2>Editar un cliente</h2>
@stop

@section('content')
<div class="card">
    <div class="card-body" >
        {!! Form::model($cliente,['route' => ['admin.clientes.update', $cliente], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <!--Esta directiva lo que hace es agregar un input oculto con un nombre llamado token y se encargarà de generar un token-->
        @csrf

        <div class form-group>
            {!! Form::label('name', 'Nombres: ') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre completo']) !!}
        
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror

        </div>
        <br>

        <div class form-group>
            {!! Form::label('dni', 'DNI: ')!!}
            {!! Form::text('dni', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el DNI']) !!}
        </div>
        <br>

        <div class form-group>
            {!! Form::label('telefono', 'Celular: ')!!}
            {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el celular']) !!}
        </div>
        <br>

        <div class form-group>
            {!! Form::label('direccion', 'Dirección: ')!!}
            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el dirección']) !!}
        </div>
        <br>

        <div class form-group>
            {!! Form::label('sector', 'Sector: ')!!}
            {!! Form::text('sector', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el sector']) !!}
        </div>
        <br>

        <div class form-group>
            {!! Form::label('estado', 'Estado: ')!!}
            {!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el estado']) !!}
        </div>
        <br>

        <div class form-group>
            {!! Form::label('email', 'Correo: ')!!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el correo']) !!}
        </div>
        <br>

        <div class form-group>
            {!! Form::label('ruta', 'Ruta: ')!!}
            {!! Form::text('ruta', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la ruta']) !!}
        </div>
        <br>

        <div class form-group>
            <label for="exampleFormControlFile1">Foto: </label>
            <input type="file" name="avatar" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <br>


        {!! Form::submit('Actualizar cliente', ['class' =>'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>
</div>
@stop

@section('footer')    
    <footer class="main-footer">
        <strong>Copyright &copy;<a>Corporación Carranza Gutierrez</a></strong>
    </footer>
@stop
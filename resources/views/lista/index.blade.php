@extends('app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
</head>
<body>
@section('nav-items')
<li class="nav-item">
<a class="nav-link active" href="/">Pendientes</a>
</li>
<li class="nav-item">
<a class="nav-link " href="completadas">Completadas</a>
</li>
@endsection()

@section('formulario')
<div>
    <h1>Tareas Pendientes</h1>
    <form action="{{ route('listas') }}" method="POST">
        @csrf
        <p>Ingresar tarea:</p>
        <input style="border-radius: 5px; border-color: lightgray;" type="text" name="tarea">
        <br><br>
        @if (session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('tarea')
            <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <input class="mb-2" style="border-width: 1px;border-radius: 5px;background-color: #e7c27d;" type="submit" value="Agregar">
    </form>
</div>
@endsection()
@section('lista')
    <div>
        @foreach($listas as $lista)
        <ul class="mt-3" style="padding-left: 0;">
            <form action="{{ route('update',['id' => $lista->id])}}" method="POST">
                @method('PATCH')
                @csrf
                <li style="list-style: none;">       
                    <button id='a' name="{{$lista->id}}" value="{{$lista->id}}" style="width: 20px;height: 20px;border-radius: 50%; border-width: 1px; background-color: #a9daf5;">
                    </button>
                    {{$lista->name}}
                </li>
            </form>
        </ul>
        @endforeach
    </div>
@endsection()
</body>
</html>

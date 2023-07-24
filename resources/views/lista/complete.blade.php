@extends('app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas Completadas</title>
</head>
<body>
@section('nav-items')
<li class="nav-item">
<a class="nav-link" href="/">Pendientes</a>
</li>
<li>
<a class="nav-link active" href="/completadas">Completadas</a>
</li>
@endsection()
@section('formulario')
<h1 class="pb-2">Tareas Completadas</h1>
@if (session('success'))
    <h6 class="alert alert-success">{{session('success')}}</h6>
@endif
@endsection()
@section('lista')
<div>
    @foreach($completadas as $completada)
        <ul class="mt-3" style="padding-left: 0;">
            <form style="position: absolute;" action="{{ route('restore',['id' => $completada->id])}}" method="POST">
                @method('PATCH')
                @csrf       
                <button id='a'value="{{$completada->id}}" style="border-radius: 10%; border-width: 1px; background-color: #a9daf5;">
                Restaurar
                </button>
            </form>
            
            <li  style="list-style: none;padding-left: 100px;font-weight: 500;">
            <form style="position: absolute;padding-left: 150px;" action="{{ route('delete',['id' => $completada->id])}}" method="get">
                    @csrf       
                    <button id='a'value="{{$completada->id}}" style="border-radius: 10%; border-width: 1px; background-color: #bf4d28;">
                    Eliminar
                    </button>
                    </form>
                {{$completada->name}}
            </li>
            
        </ul>
    @endforeach
</div>
@endsection()
</body>
</html>
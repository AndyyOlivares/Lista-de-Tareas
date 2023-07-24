<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TAREAS;
use Illuminate\Http\Request;

class tareasController extends Controller
{
    //
    public function obtenerTarea(){
        $listas = TAREAS::all()->where('end',0);
        return view('lista.index',['listas'=> $listas]);
    }

    public function obtenerCompletadas(){
        $completadas = TAREAS::all()->where('end',1);
        return view('lista.complete',['completadas'=> $completadas]);
    }

    public function store(Request $request){
        $end = 0;
        $request -> validate([
            'tarea' => 'required'
        ]);
        $todo = new TAREAS;
        $nameTarea = $request->tarea;
        $todo->name = ucfirst($nameTarea);
        $todo->end = $end;
        $todo -> save();

        return redirect()->route('listas')->with('success','Tarea creada correctamente');

    }

    public function update($id){
        $todo = TAREAS::find($id);
        $end = 1;
        $todo->end = $end;
        $todo -> save();

        return redirect()->route('listas')->with('success','Tarea terminada correctamente');

    }

    public function restore($id){
        $todo = TAREAS::find($id);
        $end = 0;
        $todo->end = $end;
        $todo -> save();

        return redirect()->route('completadas')->with('success','Tarea restaurada correctamente');

    }

    public function delete($id){
        $todo = TAREAS::find($id);
        $todo -> delete();
        
        return redirect()->route('completadas')->with('success','Tarea eliminada correctamente');

    }
}


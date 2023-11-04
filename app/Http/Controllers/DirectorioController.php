<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    public function inicio(){
        $directorios = Directorio::all();
        return view('directorio', compact('directorios'));
    }

    public function crear(){
        return view('crearEntrada');
    }

    public function buscar(){
        return view('buscar');
    }

    public function guardar(Request $request){
        $directorio = new Directorio();
        $directorio->codigoEntrada = $request->codigoEntrada;
        $directorio->nombre = $request->nombre;
        $directorio->apellido = $request->apellido;
        $directorio->telefono = $request->telefono;
        $directorio->correo = $request->correo;
        $directorio->save();

        return redirect()->route('directorio.inicio');
    }

    public function buscarPost(Request $request){
        $correo = $request->correo;
        $directorio = Directorio::where('correo', $correo)->first();
        //return view('vercontactos', compact('directorio'));
        return $directorio;
    }
}

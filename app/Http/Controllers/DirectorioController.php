<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Directorio;
use App\Models\Contacto;
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
        if(!$directorio){
            return redirect()->route('directorio.inicio');
        }
        return redirect()->route('contacto.inicio', $directorio->codigoEntrada);
    }

    public function eliminar($codigoEntrada){
        $directorio = Directorio::find($codigoEntrada);
        return view('eliminar', compact('directorio'));
    }

    public function eliminarConfirmado($codigoEntrada){
        $contactos = Contacto::where('codigoEntrada', $codigoEntrada)->delete();
        $directorio = Directorio::find($codigoEntrada);
        $directorio->delete();
        return redirect()->route('directorio.inicio');
    }
}

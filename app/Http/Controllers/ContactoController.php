<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contacto;
use App\Models\Directorio;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function inicio($codigoEntrada){
        $directorio = Directorio::find($codigoEntrada);
        $contactos = Contacto::where('codigoEntrada',$codigoEntrada)->get();
        return view('vercontactos', compact('directorio', 'contactos'));
    }

    public function crear($codigoEntrada){
        return view('agregarcontacto', compact('codigoEntrada'));
    }

    public function guardar(Request $request, $codigoEntrada){
        $contacto = new Contacto();
        $contacto->codigoEntrada = $codigoEntrada;
        $contacto->nombre = $request->nombre;
        $contacto->apellido = $request->apellido;
        $contacto->telefono = $request->telefono;
        $contacto->save();
        return redirect()->route('contacto.inicio', $codigoEntrada);
    }

    public function eliminar($idContacto){
        $contacto = Contacto::find($idContacto);
        $contacto->delete();
        return redirect()->route('contacto.inicio', $contacto->codigoEntrada);
    }
}

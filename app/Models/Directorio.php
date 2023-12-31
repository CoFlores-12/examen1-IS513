<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    use HasFactory;
    public $table = 'directorio';
    public $timestamps = false;
    public $primaryKey = 'codigoEntrada';

    protected $fillable = [
        'codigoEntrada',
        'nombre',
        'apellido',
        'telefono',
        'correo'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpFiles extends Model
{
    protected $table = 'upload_xlsx';

    use HasFactory;

    protected $fillable = [
        'municipio',
        'colonia',
        'marca',
        'linea',
        'tipo',
        'modelo',
        'type_person',
        'sexo',
        'puertas',
        'vin',
        'placa',
        'color',
        'procedencia',
        'servicio',
        'adeudo',
        'propietarios',
        'status',
    ];
}

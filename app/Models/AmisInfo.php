<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmisInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'up_files_id',
        'poliza',
        'start_vig',
        'end_vig',
        'marca',
        'submarca',
        'modelo',
        'cancelable',
        'status',
    ];

}

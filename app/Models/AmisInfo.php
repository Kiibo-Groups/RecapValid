<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmisInfo extends Model
{
    protected $table = 'AmisInfo';

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


    function getReport($id)
    { 
        $info           = AmisInfo::where('up_files_id', $id)->first();
        $data           = [];
        
        $data[] = [
            'id' => $info->up_files_id,
            'poliza' => $info->poliza,
            'start_vig' => $info->start_vig,
            'end_vig' => $info->end_vig,
            'marca' => $info->marca,
            'submarca' => $info->submarca,
            'modelo' => $info->modelo,
            'cancelable' => $info->cancelable,
            'status' => $info->status
        ];

        return $data;
    }

    function getAllReport($data)
    {
        $res = UpFiles::where(function($query) use($data) {
            if($data['type'])
            {
                if ($data['type'] == 'all') {
                    $query->whereRaw('status',[0,1,2]);
                }

                if ($data['type'] == 'status_true') {
                    $query->where('status',2);
                }
                
                if ($data['type'] == 'status_false') {
                    $query->where('status',1);
                }
            }
        })->orderBy('id','ASC')->get();
   
        $allData = []; 

        foreach($res as $row)
        {
            $info   = AmisInfo::where('up_files_id', $row->id)->first();
           
            $allData[] = [
                'id' => $row->id,
                'municipio' => $row->municipio,
                'colonia' => $row->colonia,
                'marca' => $row->marca,
                'linea' => $row->linea,
                'tipo' => $row->tipo,
                'modelo' => $row->modelo,
                'vin'   => $row->vin,
                'poliza' => ($info) ? $info->poliza : 'undefined',
                'start_vig' => ($info) ? $info->start_vig : 'undefined',
                'end_vig' => ($info) ? $info->end_vig : 'undefined', 
                'submarca' => ($info) ? $info->submarca : 'undefined', 
                'cancelable' => ($info) ? $info->cancelable : 'undefined',
                'status' => ($info) ? $info->status : 'undefined'
            ];
        }
   
        return $allData;
    }
}
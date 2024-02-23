<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;

use App\Models\{UpFiles, AmisInfo};

class AllPolizasExport implements FromView,WithHeadings,WithTitle
{

    public $folder  = "upload_xlsx.";
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            'up_files_id',
            'poliza',
            'start_vig',
            'end_vig',
            'marca',
            'submarca',
            'modelo',
            'cancelable',
            'status'
        ];
    }
    
    public function title(): string
    {
        return 'Reporte de Polizas';
    }

    public function view(): view
    {
        $res = new AmisInfo;
        $Request = [
            'type' => $_POST['type'],
            'from' => $_POST['from'],
            'to'   => $_POST['to']
        ];
        
		return View($this->folder.'report_all', [
            'data' => $res->getAllReport($Request),
		]);
    }
}
<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Contracts\View\View;

use App\Models\{UpFiles, AmisInfo};

class PolizaExport implements FromView,WithHeadings,WithTitle
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
        return 'Reporte de ventas';
    }

    public function view(): view
    {
        $res = new AmisInfo;

       
		return View($this->folder.'report', [
            'data' => $res->getReport($_POST['id']),
		]);
    }
}

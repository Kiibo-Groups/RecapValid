<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\PolizaExport;
use App\Exports\AllPolizasExport;

use App\Models\{UpFiles, AmisInfo};

use Excel;
use Redirect;
use Auth;
class UPXLSXController extends Controller
{
    public $folder = "upload_xlsx.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View($this->folder.'index',[
			'data' 	=> UpFiles::orderBy('status','DESC')->paginate(100),
			'link' 	=> '/upload_xlsx/'
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View($this->folder.'add',[
			'data' 		=> new UpFiles,
			'form_url' 	=> '/upload_xlsx'
		]);
    }

     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $lims_vehicle_data = new UpFiles;
            $lims_vehicle_data->create($input);

            return redirect('/upload_xlsx')->with('message', 'Nuevo Elemento Agregado...');
        } catch (\Exception $th) {
            return redirect('/upload_xlsx')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_file()
    {
        return View($this->folder.'add_xlsx',[
			'data' 		=> new UpFiles,
			'form_url' 	=> '/upload_file_xlsx'
		]);
    }

    public function upload_file_xlsx(Request $request)
    {
        try {
            $data = $request->all();
            $array = Excel::toArray(new UpFiles, $data['file']);
            $i = 0;
            foreach ($array[0] as $key) {
                $i++;

                if($i > 1)
                {
                    if ($key[1] != null) {

                        $add    = new UpFiles;
                        $add->municipio = ($key[0] != null) ? $key[0] : 'undefined';
                        $add->colonia = ($key[1] != null) ? $key[1] : 'undefined';
                        $add->marca = ($key[2] != null) ? $key[2] : 'undefined';
                        $add->linea = ($key[3] != null) ? $key[3] : 'undefined';
                        $add->tipo = ($key[4] != null) ? $key[4] : 'undefined';
                        $add->modelo = ($key[5] != null) ? $key[5] : 0;
                        $add->type_person = ($key[6] != null) ? $key[6] : 'undefined';
                        $add->sexo = ($key[7] != null) ? $key[7] : 'undefined';
                        $add->puertas = ($key[8] != null) ? $key[8] : 0;
                        $add->vin = ($key[9] != null) ? $key[9] : 'undefined';
                        $add->placa = ($key[10] != null) ? $key[10] : 'undefined';
                        $add->color = ($key[11] != null) ? $key[11] : 'undefined';
                        $add->procedencia = ($key[12] != null) ? $key[12] : 'undefined';
                        $add->servicio = ($key[13] != null) ? $key[13] : 'undefined';
                        $add->adeudo = ($key[14] != null) ? $key[14] : 'undefined';
                        $add->propietarios = ($key[15] != null) ? $key[15] : 1;
                        $add->status = 0;

                        $add->save();
                    }
                }
            }
            return redirect('/upload_xlsx')->with('message', 'Nuevos Elementos Agregados...');
        } catch (\Exception $th) {
            return redirect('/upload_xlsx')->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View($this->folder.'edit',[
			'data' 		=> UpFiles::find($id),
			'form_url' 	=> '/upload_xlsx/'.$id
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();
            $lims_vehicle_data = UpFiles::find($id);
            $lims_vehicle_data->update($input);

            return redirect('/upload_xlsx')->with('message', 'Elemento Actualizado...');
        } catch (\Exception $th) {
            return redirect('/upload_xlsx')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        UpFiles::where('id',$id)->delete();
		return redirect('/upload_xlsx')->with('message','Elemento eliminado con éxito...');
    }

    /**
     * Cambio de status de la subcuenta.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $res 			= UpFiles::find($id);
		$res->status 	= $res->status == 0 ? 1 : 0;
		$res->save();

		return redirect('/upload_xlsx')->with('message','Estatus del Elemento actualizado con éxito...');
    }

    /**
     * Imprimir info individual
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download_info(Request $Request)
    {
        return Excel::download(new PolizaExport, 'poliza_'. $Request->get('id').'_.xlsx');
    }

    public function reports_filex()
    {
        return View($this->folder.'index_report',[
			'form_url' 	=> '/_reports_filex/'
		]);
    }

    public function _reports_filex(Request $Request)
    {
        
        // return response()->json([
        //     'date' => date('Y-m-d',strtotime($data['from'])),
        //     'data' => $data,
        //     'res' => $res
        // ]);

        return Excel::download(new AllPolizasExport, 'polizas_info_.xlsx');
    }

    /**
     * Busqueda de Info
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllFilex()
    {
        $municipios = UpFiles::distinct(['municipio'])->get(['municipio']);
        $colonias = UpFiles::distinct(['colonia'])->get(['colonia']);

        return response()->json([
            'municipios' => $municipios,
            'colonias'   => $colonias
        ]);
    }

    public function FilexSerach(Request $Request){

        $search = $Request->get('search');
 
        $UpFiles = UpFiles::where(function($query) use($search){
            $query->whereRaw('lower(vin) like "%' . strtolower($search) . '%"');
        })->limit(100)->orderBy('status','DESC')->get();

        $req = '';
        $ths = [];
        foreach ($UpFiles as $key => $row) {
            
            $req .= '<tr>';
            $req .= '<th>'.$row->id.'</th>';
            $req .= '<td>'.$row->municipio.'</td>';
            $req .= '<td>'.$row->colonia.'</td>'; 
            $req .= '<td>'.$row->vin.'</td>';
            $req .= '<td>'.$row->placa.'</td>';
            $req .= '<td>'.$row->adeudo.'</td>'; 

            if ($row->status == 0){
                $req .= '<td><span class="badge bg-label-danger me-1">Sin consultar</span></td>';
            }elseif($row->status == 1){
                $req .= '<td><span class="badge bg-label-warning me-1">Sin información</span></td>';
            }elseif($row->status == 2){
                $req .= '<td><span class="badge bg-label-success me-1">Data Lista</span></td>';
            }
            
            $req .= '</td>
                <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="'.Asset('/upload_xlsx/' . $row->id . "/edit").'" >
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>';

                        if($row->status == 2){
                            $req .= '<form method="post" action="upload_xlsx/download_info" class="col-12">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <button class="dropdown-item">
                                <input type="hidden" name="id" value="'.$row->id.'">
                                <i class="bx bx-download me-1"></i> Descargar Info
                            </button>
                            </form>';
                        }     

            $req .= '<a class="dropdown-item" href="'.Asset("/upload_xlsx/delete/" . $row->id).'">
                    <i class="bx bx-trash me-1"></i> Delete
                </a>';
            $req .= '</div></div></td>';

            $req .= '</tr>';


            $ths[] = $req;

            $req = '';
        }
          
        return response()->json([
            'data' => $ths
        ]);
    }

    public function FilexSearchCats(Request $Request) {

        $municipio = ($Request->get('municipio')) ? $Request->get('municipio') : 'null';
        $colonia  = ($Request->get('colonia')) ? $Request->get('colonia') : 'null';

        $UpFiles = UpFiles::where(function($query) use($municipio, $colonia){
            if ($municipio != 'null') {
                $query->whereRaw('lower(municipio) like "%' . strtolower($municipio) . '%"');
            }

            if ($colonia != 'null') {
                $query->whereRaw('lower(colonia) like "%' . strtolower($colonia) . '%"');
            }
        })->orderBy('status','DESC')->paginate(100);

        // return response()->json([
		// 	'data' 	=> $UpFiles,
		// 	'link' 	=> '/upload_xlsx/'
		// ]);

        return View($this->folder.'index',[
			'data' 	=> $UpFiles,
			'link' 	=> '/upload_xlsx/',
            'municipio' => $municipio,
            'colonia' => $colonia
		]);
    }
}
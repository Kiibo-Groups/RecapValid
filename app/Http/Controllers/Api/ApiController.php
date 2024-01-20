<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Exports\MetaExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use JWTAuth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use DB;
use Validator;
use Redirect;
use Excel;;

use App\Models\{User, UpFiles, AmisInfo};

class ApiController extends Controller {

    public function __construct()
    {
        $this->middleware('authApi:api', ['except' => ['welcome' ,'getToken', 'chkToken']]);
    }

    public function getToken()
    {
        try {
            $token = new User;
            return response()->json([
                'token' => $token->GenToken(),
                'message' => 'success_token_created',
                'status' => "OK",
                "code" => 200
            ]);
        } catch (\Exception $th) {
			return response()->json(['status' => 'ERROR','code' => 500, 'message' => $th->getMessage()], 500);
		}

    }

    public function welcome()
	{ 
		try {
            return response()->json([
                'message' => "Welcome to API",
                'status' => "OK",
                "code" => 200
            ]);
        } catch (\Exception $th) {
			return response()->json(['status' => 'ERROR','code' => 500, 'message' => $th->getMessage()], 500);
		}
	}

    public function getFilesXlsx(Request $request)
    {
        try {
            $skip = ($request->get('skip')) ? $request->get('skip') : 0; // Start Limit
            $take = ($request->get('take')) ? $request->get('take') : 100; // End Limite

            return response()->json([
                'data' => UpFiles::skip($skip)->take($take)->orderBy('id','ASC')->get(),
                'message' => "success_data",
                'status' => "OK",
                "code" => 200
            ]);
        } catch (\Exception $th) {
			return response()->json(['status' => 'ERROR','code' => 500, 'message' => $th->getMessage()], 500);
		}
    }

    public function chkToken($srl_number, $token)
    {

        try {
            $url = "https://polizasvigentes.amis.com.mx/polizasvigentes/selectService/byNoSerieJson/".$srl_number."/captcha/".$token;
            $max      = 0;

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec ($ch);
            $info = curl_getinfo($ch);
            $http_result = $info ['http_code'];
            curl_close ($ch);
 
            $request = json_decode($output, true);
 
            if (isset($request['message'])) {
                return response()->json([
                    'data' => [],
                    'message' => $request['message'],
                    'status' => "FALSE",
                    "code" => 400
                ]);
            }else {
                if (count($request['result'][0]['records']) > 0) { // Tenemos respuesta
                    $vin    = UpFiles::where('vin',$srl_number)->first();
                    // Cambiamos su Status de vin validado
                    if (isset($vin->id)) {
                        $vin->status = 2; // Consultado y con data
                        $vin->save();
                    }

                    // Registramos la informacion
                    $amisInfo = [
                        'up_files_id' => $vin->id,
                        'poliza' => $request['result'][0]['records'][0]['1P&oacute;liza'],
                        'start_vig' => $request['result'][0]['records'][0]['3INICIO DE VIGENCIA'],
                        'end_vig' => $request['result'][0]['records'][0]['4FIN DE VIGENCIA'],
                        'marca' => $request['result'][0]['records'][0]['5MARCA'],
                        'submarca' => $request['result'][0]['records'][0]['6SUBMARCA'],
                        'modelo' => $request['result'][0]['records'][0]['7A&ntilde;o Modelo'],
                        'cancelable' => $request['result'][0]['records'][0]['8CANCELABLE'],
                        'status' => 1
                    ];
                    $lims_amis_new = new AmisInfo;
                    $lims_amis_new->create($amisInfo);

                    return response()->json([
                        'data' => $request['result'][0]['records'],
                        'message' => "success_data",
                        'status' => "OK",
                        "code" => 400
                    ]);
                }else {
                    $vin    = UpFiles::where('vin',$srl_number)->first();
                    // Cambiamos su Status de vin validado
                    if (isset($vin->id)) {
                        $vin->status = 1; // 1 Sin Informacion
                        $vin->save();
                    }
                    
                    return response()->json([
                        'data' => [],
                        'message' => $request['result'][1]['message'],
                        'status' => "FALSE",
                        "code" => 400
                    ]);
                }
            }

        } catch (\Exception $th) {
			return response()->json(['status' => 'ERROR','code' => 500, 'message' => $th->getMessage()], 500);
		}
    }

    public function chkVIN(Request $request)
    {
        try {
            $id_vin = $request->get('id_vin');
            $vin    = UpFiles::find($id_vin);
            // Cambiamos su Status de vin validado
            if (isset($vin->id)) {
                $vin->status = 1;
                $vin->save();
            }

            // Validamos si contiene informacion

            return response()->json([
                'data' => UpFiles::skip($skip)->take($take)->orderBy('id','ASC')->get(),
                'message' => "success_data",
                'status' => "OK",
                "code" => 200
            ]);
        } catch (\Exception $th) {
			return response()->json(['status' => 'ERROR','code' => 500, 'message' => $th->getMessage()], 500);
		}
    }

}
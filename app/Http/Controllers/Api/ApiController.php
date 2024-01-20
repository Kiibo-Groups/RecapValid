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

use App\Models\{User, UpFiles};

class ApiController extends Controller {

    
    public function __construct()
    {
        $this->middleware('authApi:api', ['except' => ['welcome' ,'getToken']]);
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

}
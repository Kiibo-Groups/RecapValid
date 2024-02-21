<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\{User};
use Auth;
use DB;
use Validator;
use Redirect;
class AdminController extends Controller
{
    public $folder = "./";
    
	/*
	|------------------------------------------------------------------
	|Funciones de SuperAdmin
	|------------------------------------------------------------------
	*/
	public function index()
	{ 
		if (!auth()->guard()->user()) {
			return Redirect::to('/login');
		}else {
			$admin = new User; 
			return View($this->folder.'dashboard.home',[
				'form_url' => Asset('/dash')
			]);    
		}
	}

	/*
	|------------------------------------------------------------------
	|Homepage, Dashboard
	|------------------------------------------------------------------
	*/
	public function home()
	{
		$admin = new User; 

		return response()->json([
			'form_url' => Asset('/dash'),
			'overview' => $admin->overview()
		]);

		return View($this->folder.'dashboard.home',[
			'form_url' => Asset('/dash')
		]); 
	}

	/*
	|------------------------------------------------------------------
	|Account Settings
	|------------------------------------------------------------------
	*/
	public function account()
	{
		$admin = User::find(1); 

		return View($this->folder.'dashboard.account',[
			'data' 	=> $admin,
			'form_url' => Asset('/update_account')
		]); 
	}

	public function update_account(Request $request)
	{
		try {
            $input = $request->all();
		
			if ($input['new_pass'] != null) {		
				$input['password'] = Hash::make($input['new_pass']);
				$input['shw_password'] = $input['new_pass'];
			}
		
			$lims_account_data = User::find(auth()->user()->id);
            $lims_account_data->update($input);

            return redirect('/account')->with('message', 'Cuenta Actualizada ...');
        } catch (\Exception $th) {
            return redirect('/account')->with('error', $th->getMessage());
        }
	}

	/*
	|------------------------------------------------------------------
	|conexiones
	|------------------------------------------------------------------
	*/
	public function conns()
	{
		$admin = User::find(1); 

		return View($this->folder.'dashboard.conns',[
			'data' 	=> $admin,
			'form_url' => Asset('/update_conns')
		]); 
	}

	/*
	|------------------------------------------------------------------
	|Logout
	|------------------------------------------------------------------
	*/
	public function logout()
	{
		auth()->guard()->logout();

		return Redirect::to('/login')->with('message', 'Ha cerrado sesión con éxito !');
	}
}

<?php namespace App\Http\Controllers\api;

use App\Http\Requests;
use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use Auth;

use App\Models\Events;
use DB;
use Validator;
use Redirect; 
class ApiController extends Controller {


    public function GetEvents()
	{
		$evts = Events::orderBy('created_at','DESC')->get();
		return response()->json(['data' => $evts]);
	}


}
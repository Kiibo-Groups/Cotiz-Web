<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Requests;
use App\Models\Services;

use DB;
use Auth;
use Redirect;

class RequestsController extends Controller
{

    public $folder = 'admin.';

    public function index(Request $request){
        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        $even = $request->filter_even;
        $requests = Requests::with(['service','user']);

        if(!is_null($status)) {
            $requests = $requests->where('status','=', $status);
        }

        if($search) {
            $requests = $requests->orWhereHas('service', function ($q) use ($search) {
                $q->where('title', "like",'%'.$search.'%');
            })
            ->orWhereHas('user', function ($q) use ($search) {
                $q->where('name','like','%'.$search.'%');
            });
        }

        if(!is_null($from)) {
            $requests = $requests->where('created_at','>=',$from)
            ->where('created_at','<=',$even);
        }


        $requests = $requests->paginate(10);

        return view($this->folder.'requests.index', [
            'requests'=> $requests,
            'search'=> $search,
            'status'=>$status
        ]);

    }

    public function edit(Request $request, $id){

        $request->validate([
            'status'=>'required'
        ]);

        $input = $request->all();
        $requests_data = Requests::find($id);

        $requests_data->update($input);

        return redirect(env('admin').'/request')->with('message', 'Solicitud actualizado con éxito ...');

    }

    public function delete($id){

        $res = Requests::find($id);
		$res->delete();

		return redirect(env('admin').'/request')->with('message','Solicitud eliminado con éxito.');

    }
}

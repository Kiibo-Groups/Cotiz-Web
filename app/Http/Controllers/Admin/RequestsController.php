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
        $filter = $request->filter_status;

        $requests = Requests::with(['service','user'])
            ->where(function (Builder $query) use ($search) {
                return $query->whereHas('service', function ($q) use ($search) {
                    $q->where('title', "like",'%'.$search.'%');
                });
            })
            ->orWhere(function (Builder $query) use ($search) {
                return $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', "like",'%'.$search.'%');
                });
            })
            ->paginate(10);

        return view($this->folder.'requests.index', [
            'requests'=> $requests,
            'search'=> $search
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

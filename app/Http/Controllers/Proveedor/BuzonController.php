<?php

namespace App\Http\Controllers\Proveedor;

use App\Models\Rfc;
use App\Models\Buzon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BuzonController extends Controller
{
    public $folder = "proveedor.";
    public function index(Request $request){


        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        $even = $request->filter_even;

        $requests = Buzon::where('prove_id', auth()->user()->idempresa)->orderBy("id", "desc");

        if($search) {
           // $requests = $requests->orWhereHas('admin', function ($q) use ($search) {
           //     $q->where('name', "like",'%'.$search.'%');
           // })
            $requests = $requests->whereRaw('LOWER(descripcion) LIKE(?)','%'.$search.'%');

        }

        if(!is_null($from)) {
            $requests = $requests->where('created_at','>=',$from)
            ->where('created_at','<=',$even);
        }
        $requests = $requests->paginate(10);

        return view($this->folder.'buzon.index', [
            'requests'=> $requests,
            'search'=> $search,
            'status'=>$status,
            'solicitud'=> 'Empresas'
        ]);

    }


    public function show(){


        $user = auth()->user()->id;
        $userid = auth()->user()->idempresa;
        $origen = 'proveedor';
        $providers = Rfc::where('id', $userid)->where('status', 0)->get();

        return view($this->folder.'buzon.add', [
            'data'      => new Buzon,
            'providers' => $providers,
            'origen'    => $origen,
            'user'      => 1,
        ]);

    }


    public function create(Request $request)
    {

        $input         = $request->all();
        $requests_data = new Buzon;

             if($request->file('documento'))
        {

            $filename   = time().rand(111,699).'.' .$request->file('documento')->getClientOriginalExtension();
            $input['documento']->move("assets/documento/buzon", $filename);
            $input['documento'] = $filename;
        }

        $requests_data->create($input);

        Session::flash('mensaje','Buzón Cargado ...');
        Session::flash('class', 'success');
        return redirect(env('user').'/buzon');

    }



}

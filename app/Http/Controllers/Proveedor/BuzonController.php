<?php

namespace App\Http\Controllers\Proveedor;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Admin;
use App\Models\Buzon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Notifications\Buzon as NotificationsBuzon;

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
            $requests = $requests->whereBetween('fecha',[$from,$even]);
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

        $request->validate([

            'documento'=>'file|max:3048',

        ]);



        $salida = 'Cotiz';
        $user = User::where('id', 82)->first();



        $input         = $request->all();
        $requests_data = new Buzon;

             if($request->file('documento'))
        {

            $filename   = time().rand(111,699).'.' .$request->file('documento')->getClientOriginalExtension();
            $input['documento']->move("public/assets/documento/buzon", $filename);
            $input['documento'] = $filename;
        }

        $input['fecha'] = Carbon::now();
        $requests_data->create($input);
        $from       =  User::where('idempresa', $request->prove_id )->value('email');

        $para       =  Admin::find(1)->email;

        $asunto     =   'Tienes un nuevo Buzón  de cotiiz';
        $mensaje    =   "Tienes un mensaje de empresa accede al sistema Cotiiz<br />";
        $cabeceras = 'From: '.  $from  . "\r\n";

        $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($para, $asunto, utf8_encode($mensaje), $cabeceras);



        Session::flash('mensaje','Buzón Cargado ...');
        Session::flash('class', 'success');
        return redirect(env('user').'/buzon');

    }



}

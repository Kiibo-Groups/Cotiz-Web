<?php

namespace App\Http\Controllers\Empresa;

use App\Models\User;
use App\Models\Admin;
use App\Models\Requests;
use App\Models\Serviciover;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class solicitudController extends Controller
{
    public $folder = "empresa.";

    public function index(Request $request)
    {

        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        $even = $request->filter_even;
        //$from = Carbon::parse($request->input('filter_from'));
       // $even = Carbon::parse($request->input('filter_even'))->addDay();



        $requests = Requests::where('solicitud', 1)->where('proveedor', auth()->user()->idempresa)->orderBy("status", "asc")->with(['service','user']);

        //$requests = Requests::where('solicitud', 1)->where('proveedor', auth()->user()->idempresa)->orderBy("status", "asc");

        if ($requests) {
            $requests = $requests;
        } else {
            $requests = 0;
        }


        if(!is_null($status)) {
            $requests = $requests->where('status','=', $status);
        }

        if($search) {
            $requests = $requests->whereRaw('LOWER(description) LIKE(?)','%'.$search.'%');
            ;
            // ->orWhereHas('user', function ($q) use ($search) {
            //     $q->where('name','like','%'.$search.'%');
            // });
        }

        if(!is_null($from)) {
            //$from = Carbon::parse($request->input('filter_from'));
            $requests = $requests->whereBetween('fecha',[$from,$even]);
        }


        $requests = $requests->paginate(10);

        return view($this->folder.'servicios.indexempresa', [
            'requests'=> $requests,
            'search'=> $search,
            'status'=>$status,
            'solicitud'=> 'Empresa'
        ]);

    }

    public function indexPrueba(Request $request)
    {

        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        //$even = $request->filter_even;


        //$from = Carbon::parse($request->input('filter_from'));
        $even = Carbon::parse($request->input('filter_even'))->addDay();


        $requests = Requests::where('solicitud', 2)->where('proveedor', auth()->user()->id)->orderBy("status", "asc")->with(['service','user']);



        if ($requests) {
            $requests = $requests;
        } else {
            $requests = 0;
        }


        if(!is_null($status)) {
            $requests = $requests->where('status','=', $status);
        }

        if($search) {
            $requests = $requests->whereRaw('LOWER(description) LIKE(?)','%'.$search.'%');
            ;
            // ->orWhereHas('user', function ($q) use ($search) {
            //     $q->where('name','like','%'.$search.'%');
            // });
        }

        if(!is_null($from)) {
            $from = Carbon::parse($request->input('filter_from'));
            $requests = $requests->whereBetween('created_at',[$from,$even]);
        }


        $requests = $requests->paginate(10);

        return view($this->folder.'servicios.indexempresaprueba', [
            'requests'=> $requests,
            'search'=> $search,
            'status'=>$status,
            'solicitud'=> 'Empresa'
        ]);

    }









    public function indexVer($id){

        return view($this->folder.'servicios.indexver', [
            'servicios' => Serviciover::where('servicio_id', $id)->orderBy("id", "Desc")->get(),
            'admin' => auth()->guard('admin')->user(),
            'id' => $id
        ]);

    }


    public function indexVerPrueba($id){

        return view($this->folder.'servicios.indexverprueba', [
            'servicios' => Serviciover::where('servicio_id', $id)->orderBy("id", "Desc")->get(),
            'admin' => auth()->guard('admin')->user(),
            'id' => $id
        ]);

    }


    public function AddindexVer($id)
    {

        if (auth()->user() == null) {
            $user = auth()->guard('admin')->user()->id;
            $origen = 'admin';
        } else {
            $user = auth()->user()->id;
            $origen = 'usuario';
        }


        return view($this->folder.'servicios.add', [
            'form_url' => Asset(env('user').'/empresa/Addservicios'),
            'data' => new Serviciover,
            'array' => [],
            'id' => $id,
            'user' => $user,
            'origen' => $origen
        ]);
    }

    public function Addservicios(Request $request)
    {


        $resp = $request->validate([
            'documento'=>'required|max:3048',

        ]);

        $id = $request->servicio_id;
        $input         = $request->all();
        $requests_data = new Serviciover;



        if($request->file('documento'))
        {

            $filename   = time().rand(111,699).'.' .$request->file('documento')->getClientOriginalExtension();
            $input['documento']->move("public/assets/documento/servicios", $filename);
            $input['documento'] = $filename;
        }

        $requests_data->create($input);


        $para       =  Admin::find(1)->email;

        $from       =  Auth::user()->email;

        $asunto     =   'Tienes un nuevo mensaje  de cotiiz';
        $mensaje    =   "Tienes un mensaje de empresa accede al sistema Cotiiz<br />";
        $cabeceras = 'From: '.  $from  . "\r\n";

        $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($para, $asunto, utf8_encode($mensaje), $cabeceras);

        Session::flash('mensaje','Documento Cargado ...');
        Session::flash('class', 'success');
        return redirect(env('user').'/empresa/servicios/ver/'.$id);

    }


    public function usuarios()
    {
        return view($this->folder.'users.index', [
            'data' => User::where('idempresa', auth()->user()->idempresa)->get()
        ]);
    }

    public function VerUsuarioEmpresa($id)
    {
        return view($this->folder.'users.formVerEmpresa', [
            'data' => User::find($id),
            'form_url' => Asset(env('user').'/users/update'),
            'ver' => 0 //0 permiso ver
        ]);
    }




}

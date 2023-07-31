<?php

namespace App\Http\Controllers\Proveedor;

use App\Models\User;
use App\Models\Requests;
use App\Models\Serviciover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class solicitudController extends Controller
{
    public $folder = "proveedor.";

    public function index(Request $request)
    {

        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        $even = $request->filter_even;

        $requests = Requests::where('solicitud', 3)->where('proveedor', auth()->user()->idempresa)->orderBy("status", "asc");



        if ($requests) {
            $requests = $requests;
        } else {
            $requests = 0;
        }


        if(!is_null($status)) {
            $requests = $requests->where('status','=', $status);
        }
        //whereRaw('LOWER(title) LIKE(?)','%'.$search.'%');
        if($search) {
            $requests = $requests->whereRaw('LOWER(description) LIKE(?)','%'.$search.'%');

        }

        if(!is_null($from)) {
            $requests = $requests->where('created_at','>=',$from)
            ->where('created_at','<=',$even);
        }


        $requests = $requests->paginate(10);

        return view($this->folder.'servicios.indexproveedor', [
            'requests'=> $requests,
            'search'=> $search,
            'status'=>$status,
            'solicitud'=> 'Proveedores'
        ]);

    }

    public function indexVer($id){

        return view($this->folder.'servicios.indexver', [
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
            'form_url' => Asset(env('user').'/Addservicios'),
            'data' => new Serviciover,
            'array' => [],
            'id' => $id,
            'user' => $user,
            'origen' => $origen
        ]);
    }

    public function Addservicios(Request $request)
    {

        $id = $request->servicio_id;
        $input         = $request->all();
        $requests_data = new Serviciover;

        //$user_data     = User::find($request->user_id);
        //$service_data  = Services::find($request->services_id);
        // $provider_data = Rfc::find($service_data->provider_id);


        // $notification           = new Notifications;
        // $notification->of_user  = $request->user_id;
        // $notification->for_user = $provider_data->id;
        // $notification->message  = 'El cliente '.$user_data->name.' ha solicitado el servicio '.$service_data->title;
        // $notification->save();

        if($request->file('documento'))
        {

            $filename   = time().rand(111,699).'.' .$request->file('documento')->getClientOriginalExtension();
            $input['documento']->move("public/assets/documento/servicios", $filename);
            $input['documento'] = $filename;
        }

        $requests_data->create($input);

        Session::flash('mensaje','Documento Cargado ...');
        Session::flash('class', 'success');
        return redirect(env('user').'/servicios/ver/'.$id);

    }

    public function usuarios()
    {

        return view($this->folder.'users.indexProveedores', [
            'data' => User::where('idempresa', auth()->user()->idempresa)->get()
        ]);
    }


    public function VerUsuarioProveedor($id)
    {
        return view($this->folder.'users.formVerProveedor', [
            'data' => User::find($id),
            'form_url' => Asset(env('user').'/users/update'),
            'ver' => 0 //0 permiso ver
        ]);
    }









}

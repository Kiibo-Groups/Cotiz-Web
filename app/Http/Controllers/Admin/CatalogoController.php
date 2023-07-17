<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Requests;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogoController extends Controller
{
    public $folder = "admin.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $search = $request->search;
        $status = $request->filter_status;

        $data = Services::where('type','employe')->with(['provider']);

        if(!is_null($status)) {
            $data = $data->where('status','=', $status);
        }

        if($search) {
            $data = $data->whereRaw('LOWER(title) LIKE(?)','%'.$search.'%');
        }

        $data = $data->paginate(10);



        return view($this->folder.'services.index', [
            'services' => $data,
            'search' => $search,
            'status' => $status,

        ]);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $search = $request->search;
        $status = $request->filter_status;

        $data = Services::where('type','service')->with(['provider']);

        if(!is_null($status)) {
            $data = $data->where('status','=', $status);
        }

        if($search) {
            $data = $data->whereRaw('LOWER(title) LIKE(?)','%'.$search.'%');
        }

        $data = $data->paginate(10);



        return view($this->folder.'services.indexservicio', [
            'services' => $data,
            'search' => $search,
            'status' => $status,

        ]);
    }


    public function enviarSolicitud($id){

            $user          = auth()->guard('admin')->user()->id;
            $origen        = 'admin';
            $service_data  = Services::find($id);



        return view($this->folder.'services.enviar', [
            'form_url' => Asset(env('admin').'/enviar/create'),
            'data' => new Request,
            'array' => [],
            'id' => $id,
            'user' => $user,
            'prove' => $service_data->provider_id,

        ]);

    }

    public function storeRequestSolicitud(Request $request){
       // dd($request);


        $input = $request->all();
        $requests_data = new Requests;

        $user_data     = User::find($request->user_id);
        $service_data  = Services::find($request->services_id);
        $provider_data = Rfc::find($service_data->provider_id);


        // $notification           = new Notifications;
        // $notification->of_user  = $request->user_id;
        // $notification->for_user = $provider_data->id;
        // $notification->message  = 'El cliente '.$user_data->name.' ha solicitado el servicio '.$service_data->title;
        // $notification->save();

        if($request->file('document'))
        {
            $filename   = time().rand(111,699).'.' .$request->file('document')->getClientOriginalExtension();
            $input['document']->move("assets/documents/users", $filename);
            $input['document'] = $filename;
        }

        $requests_data->create($input);
        return redirect(env('admin').'/servicios/proveedores')->with('message', 'Solicitud Enviada');
        //return redirect()->route('servicios.show')->with('message', 'Solicitud Enviada');

    }






}

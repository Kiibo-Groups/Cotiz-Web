<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Admin;
use App\Models\Requests;
use App\Models\Services;
use App\Models\Serviciover;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SolicitudesController extends Controller
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
        $from = $request->filter_from;
        $even = $request->filter_even;
        $requests = Requests::where('solicitud', 1)->orderBy("status", "asc")->with('prueba');
        //whereIn('role', [1, 3])

        //dd($requests);
        if(!is_null($status)) {
            $requests = $requests->where('status','=', $status);
        }

        if($search) {
            $requests = $requests->whereRaw('LOWER(description) LIKE(?)','%'.$search.'%')

             ->orwhereRaw('LOWER(nomprove) LIKE(?)','%'.$search.'%');
        }

        if(!is_null($from)) {
            $requests = $requests->whereBetween('fecha',[$from,$even]);
        }


        $requests = $requests->paginate(10);



        return view($this->folder.'requests.indexempresa', [
            'requests'=> $requests,
            'search'=> $search,
            'status'=>$status,
            'solicitud'=> 'Empresas'
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
        $from = $request->filter_from;
        $even = $request->filter_even;
        $requests = Requests::where('solicitud', 3)->orderBy("status", "asc")->with(['user']);

        //dd($requests);

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
        }

        if(!is_null($from)) {
            $requests = $requests->whereBetween('fecha',[$from,$even]);
        }


        $requests = $requests->paginate(10);



        return view($this->folder.'requests.indexproveedor', [
            'requests'=> $requests,
            'search'=> $search,
            'status'=>$status,
            'solicitud'=> 'Proveedores'
        ]);

    }

    public function indexVer($id){

        return view($this->folder.'requests.indexver', [
            'servicios' => Serviciover::where('servicio_id', $id)->orderBy("id", "Desc")->get(),
            'admin' => auth()->guard('admin')->user(),
            'id' => $id,
            'request' => Requests::where('id', $id)->orderBy("id", "Desc")->first()
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


        return view($this->folder.'requests.add', [
            'form_url' => Asset(env('admin').'/Addservicios'),
            'data' => new Serviciover,
            'array' => [],
            'id' => $id,
            'user' => $user,
            'origen' => $origen
        ]);
    }

    public function Addservicios(Request $request)
    {

        $id            = $request->servicio_id;
        $input         = $request->all();
        $requests_data = new Serviciover;



        if($request->file('documento'))
        {

            $filename   = time().rand(111,699).'.' .$request->file('documento')->getClientOriginalExtension();
            $input['documento']->move("public/assets/documento/servicios", $filename);
            $input['documento'] = $filename;
        }

        $requests_data->create($input);

        $servicio_id = $request->servicio_id;
        $res        = Requests::where('id', $servicio_id)->value('usuario');

        $para       =  User::where('id', $res )->value('email');

        $from       =  Admin::find(1)->email;

        $asunto     =   'Tienes un nuevo mensaje  de cotiiz';
        $mensaje    =   "Tienes un mensaje de empresa accede al sistema Cotiiz<br />";
        $cabeceras = 'From: '.  $from  . "\r\n";

        $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($para, $asunto, utf8_encode($mensaje), $cabeceras);



        Session::flash('mensaje','Documento Cargado ...');
        Session::flash('class', 'success');
        return redirect(env('admin').'/servicios/ver/'.$id);
        //return back();

        //return redirect()->route('serviciosVer')->with('message', 'Solicitud Enviada');
    }


}

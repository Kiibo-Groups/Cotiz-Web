<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Admin;
use App\Models\Requests;
use App\Models\Services;
use App\Models\Referencia;
use App\Models\Certificado;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
            $data = $data->whereRaw('LOWER(carrera) LIKE(?)','%'.$search.'%')
            ->orwhereRaw('LOWER(especialidad) LIKE(?)','%'.$search.'%');
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
        //dd($request);

       $request->validate([

        'document'=>'file|max:3048',

    ]);
        $input = $request->all();
        $requests_data = new Requests;

        $user_data     = User::find($request->user_id);
        $service_data  = Services::find($request->services_id);
        $provider_data = Rfc::find($service_data->provider_id);


        if($request->file('document'))
        {
            $filename   = time().rand(111,699).'.' .$request->file('document')->getClientOriginalExtension();
            $input['document']->move("public/assets/documents/users", $filename);
            $input['document'] = $filename;
        }
        $input['fecha'] = Carbon::now();
        $requests_data->create($input);


        $para       =  User::where('idempresa', $request->proveedor )->value('email');

        $asunto     =   'Tienes un nueva Cotización  de cotiz';
        $mensaje    =   "Tienes un mensaje de empresa accede al sistema Cotiz<br />";
        $cabeceras = 'From: '. Admin::find(1)->email. "\r\n";

        $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($para, $asunto, utf8_encode($mensaje), $cabeceras);



        return redirect(env('admin').'/servicios/proveedores')->with('message', 'Solicitud Enviada');
        //return redirect()->route('servicios.show')->with('message', 'Solicitud Enviada');

    }

    public function ver($id)
    {


        return view($this->folder . 'services.ver', [
            'data' => Services::find($id),
            'referencia'  => Referencia::where('servi_id', $id)->orderBy('referencia', 'desc')->get(),
            'certificado' => Certificado::where('servi_id', $id)->get(),

        ]);
    }

    public function statusServicios($id)
    {
        $res = Services::find($id);

		$res->status = ($res->status == 0) ? 1 : 0;
        $res->save();
        Session::flash('mensaje','Elemento Editado con éxito!');
        Session::flash('class', 'success');
        return back();

		//return redirect(env('admin').'/empresas')->with('message','Elemento Editado con éxito.');
    }






}

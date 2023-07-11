<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rfc;
use App\Models\User;
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
        $requests = Requests::where('solicitud', 1)->orderBy("status", "asc")->with(['service','user']);

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

        // return response()->json([
        //     'user' => Auth::user(),
        //     'requests'=> $requests,
        //     'search'=> $search,
        //     'status'=>$status
        // ]);

        return view($this->folder.'requests.indexprueba', [
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
        $requests = Requests::where('solicitud', 3)->orderBy("status", "asc")->with(['service','user']);

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

        // return response()->json([
        //     'user' => Auth::user(),
        //     'requests'=> $requests,
        //     'search'=> $search,
        //     'status'=>$status
        // ]);

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
       // dd($request);
        $id = $request->servicio_id;
        $input         = $request->all();
        $requests_data = new Serviciover;

        // $user_data     = User::find($request->user_id);
        // $service_data  = Services::find($request->services_id);
        // $provider_data = Rfc::find($service_data->provider_id);


        // $notification           = new Notifications;
        // $notification->of_user  = $request->user_id;
        // $notification->for_user = $provider_data->id;
        // $notification->message  = 'El cliente '.$user_data->name.' ha solicitado el servicio '.$service_data->title;
        // $notification->save();

        if($request->file('documento'))
        {

            $filename   = time().rand(111,699).'.' .$request->file('documento')->getClientOriginalExtension();
            $input['documento']->move("assets/documento/servicios", $filename);
            $input['documento'] = $filename;
        }

        $requests_data->create($input);

        Session::flash('mensaje','Documento Cargado ...');
        Session::flash('class', 'success');
        return redirect(env('admin').'/servicios/ver/'.$id);
        //return back();

        //return redirect()->route('serviciosVer')->with('message', 'Solicitud Enviada');
    }


}

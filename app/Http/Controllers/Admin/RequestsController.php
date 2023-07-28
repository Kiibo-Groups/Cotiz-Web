<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Redirect;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Admin;
use App\Models\Requests;
use App\Models\Services;
use App\Models\Providers;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;

class RequestsController extends Controller
{

    public $folder = 'admin.';

    public function index(Request $request){

        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        $even = $request->filter_even;
        $requests = Requests::where('solicitud', 2)->orderBy("status", "asc")->with(['service','user']);



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
            'solicitud'=> "Prueba"
        ]);

    }




    public function show(Request $request){

        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        $even = $request->filter_even;
        $requests = Requests::where('solicitud', 2)->orderBy("status", "asc")->with(['service','user']);

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

        return view($this->folder.'requests.index', [
            'requests'=> $requests,
            'search'=> $search,
            'status'=>$status,
            'solicitud'=> 2
        ]);


    }


    public function edit(Request $request, $id){


        $id_admin = auth('admin')->user()->id;
        $request->validate([
            'status'=>'required'
        ]);

        $input         = $request->all();
        //dd($input);

        $admin         = Admin::find($id_admin);
        $requests_data = Requests::find($request->id);
        $service_data  = Services::find($requests_data->services_id);
        //$provider_data = Rfc::find($service_data->proveedor);

        $user_data = User::find($requests_data->user_id);
        $msg =  'Solicitud actualizado con éxito ...';

        // if ($input['status'] == 5) {
        //     $amountServ    = $service_data->price;
        //     $cashBackUser  = $user_data->cashback;
        //     $cashBackAdmin = $admin->cashback;
        //     $typeCashB     = $admin->type_cashb;

        //     $newCash;
        //     if ($typeCashB === 1) { // en %
        //         $newCash = ($amountServ * $cashBackAdmin) / 100;
        //     }else { // Valor Fijo
        //         $newCash = $cashBackAdmin;
        //     }

        //     $cashBackUser = $cashBackUser + $newCash;
        //     $user_data->cashback = $cashBackUser;
        //     $user_data->save();

        //     $msg = "Solicitud actualizada, y CashBack aplicado.";

        //     // Agregamos el cashBack si es necesario
        //     // return response()->json([
        //     //     'amountServ' => $service_data->price,
        //     //     'cashbackUser' => $cashBackUser,
        //     //     'cashbackAdmin' => $cashBackAdmin,
        //     //     'typeCashB' => $typeCashB,
        //     //     'newCash' => $newCash
        //     // ]);
        // }


        // Notificamos
        $notification = new Notifications;
        $notification->of_user = (int)$requests_data->proveedor;
        $notification->for_user = 1;
        $notification->message = 'El Administrador ha respondido tu solicitud al servicio '.$requests_data->nombre;
        $notification->save();


        $requests_data->update($input);

        //return redirect(env('admin').'/request')->with('message', $msg);

        Session::flash('mensaje',$msg);
        Session::flash('class', 'success');
        return back();


    }

    public function delete($id){

        $res = Requests::find($id);
		$res->delete();

		return redirect(env('admin').'/request')->with('message','Solicitud eliminado con éxito.');

    }
}

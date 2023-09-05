<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Admin;
use App\Models\Buzon;
use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BuzonController extends Controller
{
    public $folder = "admin.";
    public function index(Request $request)
    {

        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        $even = $request->filter_even;
        $requests = Buzon::orderBy("id", "desc")->with(['admin', 'proveedor']);

        if ($search) {
            $requests = $requests->orWhereHas('admin', function ($q) use ($search) {
                $q->where('name', "like", '%' . $search . '%');
            })
                ->orWhereHas('proveedor', function ($q) use ($search) {
                    $q->where('nombre', 'like', '%' . $search . '%');
                });
        }

        if (!is_null($from)) {
            $requests = $requests->whereBetween('fecha',[$from,$even]);
        }
        $requests = $requests->paginate(10);
        return view($this->folder . 'buzon.index', [
            'requests' => $requests,
            'search' => $search,
            'status' => $status,
            'solicitud' => 'Empresas'
        ]);
    }

    public function show()
    {


        $user = auth()->guard('admin')->user()->id;
        $origen = 'admin';
        $providers = Rfc::where('rol', 2)->where('status', 0)->get();

        return view($this->folder . 'buzon.add', [
            'data'      => new Buzon,
            'providers' => $providers,
            'origen'    => $origen,
            'user'      => $user,
        ]);
    }


    public function create(Request $request)
    {

        $request->validate([

            'documento' => 'file|max:3048',

        ]);


        $input         = $request->all();
        $requests_data = new Buzon;

        if ($request->file('documento')) {

            $filename   = time() . rand(111, 699) . '.' . $request->file('documento')->getClientOriginalExtension();
            $input['documento']->move("public/assets/documento/buzon", $filename);
            $input['documento'] = $filename;
        }
        $input['fecha'] = Carbon::now();
        $requests_data->create($input);

        $para       =  User::where('idempresa', $request->prove_id )->value('email');

        $from       =  Admin::find(1)->email;

        $asunto     =   'Tienes un nuevo Buzón  de cotiiz';
        $mensaje    =   "Tienes un mensaje de empresa accede al sistema Cotiiz<br />";
        $cabeceras = 'From: '.  $from  . "\r\n";

        $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($para, $asunto, utf8_encode($mensaje), $cabeceras);

        Session::flash('mensaje', 'Buzón Cargado ...');
        Session::flash('class', 'success');
        return redirect(env('admin') . '/buzon');
    }
}

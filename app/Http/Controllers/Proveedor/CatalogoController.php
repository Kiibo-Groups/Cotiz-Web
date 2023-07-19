<?php

namespace App\Http\Controllers\Proveedor;

use App\Models\Rfc;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogoController extends Controller
{
    public $folder = "proveedor.";

    public function index(Request $request)
    {


        $search = $request->search;
        $status = $request->filter_status;

        $data = Services::where('provider_id',auth()->user()->idempresa);

        if(!is_null($status)) {
            $data = $data->where('status','=', $status);
        }

        if($search) {
            $data = $data->whereRaw('LOWER(title) LIKE(?)','%'.$search.'%');
        }

        $data = $data->paginate(10);



        return view($this->folder.'catalogo.index', [
            'services' => $data,
            'search' => $search,
            'status' => $status,

        ]);
    }

    public function show(){


        $providers = Rfc::where('id', auth()->user()->idempresa)->where('status', 0)->get();

        return view($this->folder.'catalogo.add', [
            'data' => new Services,
            'providers' => $providers
        ]);


    }

    public function storeService(Request $request){

        $request->validate([
            'type'=>'required',
            'title'=>'required',
            'description'=>'required',
            'logo'=>'required',
            'status'=>'required'
        ]);

        $input = $request->all();
        $services_data = new Services;


        if(isset($input['logo']))
        {

            $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension();
            $input['logo']->move("assets/img/logos/", $filename);
            $input['logo'] = $filename;
        }

        $services_data->create($input);

        return redirect(env('user').'/catalogo')->with('message', 'Servicio agregado con éxito ...');

    }


    public function edit($id){

        $providers = Rfc::where('id', auth()->user()->idempresa)->where('status', 0)->get();

        return view($this->folder.'catalogo.edit', [
            'data' => Services::find($id),
            'providers' => $providers,
            'form_url' => Asset(env('user').'/catalogo/update')
        ]);

    }

    public function updateService(Request $request){

        $request->validate([
            'provider_id'=>'required',
            'type'=>'required',
            'title'=>'required',
            'description'=>'required',
            'status'=>'required'
        ]);

        $input = $request->all();
        $services_data = Services::find($request->get('id'));

        if(isset($input['logo']))
        {

            @unlink("assets/img/logos/".$services_data->logo);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension();
            $input['logo']->move("assets/img/logos/", $filename);
            $input['logo'] = $filename;
        }

        $services_data->update($input);

        return redirect(env('user').'/catalogo')->with('message', 'Servicio actualizado con éxito ...');

    }


}

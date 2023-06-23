<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Services;
use App\Models\Providers;

use DB;
use Auth;
use Redirect;

class ServicesController extends Controller
{
    public $folder = "admin.";

    public function index(Request $request){

        $search = $request->search;
        $status = $request->filter_status;

        $data = Services::with(['provider']);

        if(!is_null($status)) {
            $data = $data->where('status','=', $status);
        }

        if($search) {
            $data = $data->where('title','like','%'.$search.'%')
                        ->orWhereHas('provider', function ($q) use ($search) {
                            $q->where('name','like','%'.$search.'%');
                        });
        }

        $data = $data->paginate(10);

        

        return view($this->folder.'services.index', [
            'services' => $data,
            'search' => $search,
            'status' => $status,

        ]);

    }

    public function store(Request $request){


             $request->validate([
                'provider_id'=>'required',
                'type'=>'required',
                'title'=>'required',
                'description'=>'required',
                'logo'=>'required',
                'price'=>'required',
                'status'=>'required'
            ]);

            $input = $request->all();
            $services_data = new Services;

            if(isset($input['logo']))
            {
                // Eliminamos la anterior
                // unlink("public/profile/img/banner/".$input['img']);

                $path = env('APP_DEBUG') ? '' : 'public/';

                // Agregamos el nuevo
                $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension();
                $input['logo']->move($path."assets/img/logos/", $filename);
                $input['logo'] = $filename;
            }

            $services_data->create($input);

            return redirect(env('admin').'/services')->with('message', 'Servicio agregado con éxito ...');

    }

    public function show(){

        $providers = Providers::get();

        return view($this->folder.'services.add', [
            'data' => new Services,
            'providers' => $providers
        ]);


    }

    public function edit($id){

        $providers = Providers::get();

        return view($this->folder.'services.edit', [
            'data' => Services::find($id),
            'providers' => $providers,
            'form_url' => Asset(env('admin').'/services/update')
        ]);

    }

    public function update(Request $request, $id){

        $request->validate([
            'provider_id'=>'required',
            'type'=>'required',
            'title'=>'required',
            'description'=>'required',
            'price' => 'required',
            'status'=>'required'
        ]);

        $input = $request->all();
        $services_data = Services::find($request->get('id'));

        if(isset($input['logo']))
        {
            // Eliminamos la anterior
            $path = env('APP_DEBUG') ? '' : 'public/';
            @unlink($path."assets/img/logos/".$services_data->logo);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension();
            $input['logo']->move($path."assets/img/logos/", $filename);
            $input['logo'] = $filename;
        }

        $services_data->update($input);

        return redirect(env('admin').'/services')->with('message', 'Servicio actualizado con éxito ...');

    }

    public function delete($id){

        $res = Services::find($id);
        $path = env('APP_DEBUG') ? '' : 'public/';
		@unlink($path."assets/img/logos/".$res->logo);
		$res->delete();

		return redirect(env('admin').'/services')->with('message','Servicio eliminado con éxito.');

    }
}

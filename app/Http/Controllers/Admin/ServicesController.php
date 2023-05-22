<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Services;
use App\Models\Providers;

use DB;
use Auth;
use Redirect;

class ServicesController extends Controller
{
    public $folder = "admin.";

    public function index(){

        $data = Services::with(['provider'])->get();

        

        return view($this->folder.'services.index', [ 
            'services' => $data,
        
        ]);

    }

    public function store(Request $request){

        try {
            $input = $request->all();
            $services_data = new Services;
    
            if(isset($input['logo']))
            {
                // Eliminamos la anterior
                // unlink("public/profile/img/banner/".$input['img']);
    
                // Agregamos el nuevo
                $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension(); 
                $input['logo']->move("assets/img/logos/", $filename);   
                $input['logo'] = $filename;   
            }
    
            $services_data->create($input);
            
            return redirect(env('admin').'/services')->with('message', 'Servicio agregado con éxito ...');
        } catch (\Exception $th) {
        return Redirect::to(env('admin').'/services/add')->with('error', 'Ha ocurrido un problema al intentar crear el servicio, '.$th->getMessage());
        }
        
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

        $input = $request->all();
        $services_data = Services::find($request->get('id'));

        if(isset($input['logo']))
        {
            // Eliminamos la anterior
            @unlink("assets/img/logos/".$services_data->logo);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension(); 
            $input['logo']->move("assets/img/logos/", $filename);   
            $input['logo'] = $filename;   
        }

        $services_data->update($input);
        
        return redirect(env('admin').'/services')->with('message', 'Servicio actualizado con éxito ...');

    }

    public function delete($id){

        $res = Services::find($id);
 
		@unlink("public/assets/img/logos/".$res->logo);
		$res->delete();

		return redirect(env('admin').'/services')->with('message','Servicio eliminado con éxito.');

    }
}

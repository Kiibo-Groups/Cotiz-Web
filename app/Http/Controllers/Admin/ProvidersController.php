<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Providers;

use DB;
use Auth;
use Redirect;

class ProvidersController extends Controller
{

    public $folder = "admin.";

    public function index(){

        $data = Providers::get();

        return view($this->folder.'providers.index', [ 
            'providers' => $data,
        
        ]); 

    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $providers_data = new Providers;
    
            if(isset($input['logo']))
            {
                // Eliminamos la anterior
                // unlink("public/profile/img/banner/".$input['img']);
    
                // Agregamos el nuevo
                $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension(); 
                $input['logo']->move("assets/img/logos/", $filename);   
                $input['logo'] = $filename;   
            }
    
            $providers_data->create($input);
            
            return redirect(env('admin').'/providers')->with('message', 'Proveedor agregado con éxito ...');
        } catch (\Exception $th) {
        return Redirect::to(env('admin').'/providers/add')->with('error', 'Ha ocurrido un problema al intentar crear el proveedor, '.$th->getMessage());
        }
    }

    public function show($id)
    {
        return view($this->folder.'providers.add', [ 
            'data' => new Providers
        ]); 
    }

    public function edit($id){

        return view($this->folder.'providers.edit', [ 
            'data' => Providers::find($id),
            'form_url' => Asset(env('admin').'/providers/update')
        ]); 
        
    }

    public function delete($id){

        $res = Providers::find($id);
 
		@unlink("assets/img/logos/".$res->logo);
		$res->delete();

		return redirect(env('admin').'/providers')->with('message','Proveedor eliminado con éxito.');
        
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $providers_data = Providers::find($request->get('id'));

        if(isset($input['logo']))
        {
            // Eliminamos la anterior
            @unlink("assets/img/logos/".$providers_data->logo);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension(); 
            $input['logo']->move("assets/img/logos/", $filename);   
            $input['logo'] = $filename;   
        }

        $providers_data->update($input);
        
        return redirect(env('admin').'/providers')->with('message', 'Proveedor actualizado con éxito ...');
    }
}

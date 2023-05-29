<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Providers;
use App\Models\Services;

use DB;
use Auth;
use Redirect;

class ProvidersController extends Controller
{

    public $folder = "admin.";

    public function index(Request $request){

        $search = $request->search;

        $data = Providers::where('name','like','%'.$search.'%')->paginate(10);

        return view($this->folder.'providers.index', [
            'providers' => $data,
            'search' => $search

        ]);

    }

    public function store(Request $request)
    {
            $request->validate([
                'name'=>'required',
                'address'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'country'=>'required',
                'logo'=>'required'
            ]);

            $input = $request->all();
            $providers_data = new Providers;

            if(isset($input['logo']))
            {
                // Eliminamos la anterior
                // unlink("public/profile/img/banner/".$input['img']);

                // Agregamos el nuevo
                $path = env('APP_DEBUG') ? '' : 'public/';
                $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension();
                $input['logo']->move($path."assets/img/logos/", $filename);
                $input['logo'] = $filename;
            }

            $providers_data->create($input);

            return redirect(env('admin').'/providers')->with('message', 'Proveedor agregado con éxito ...');

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
        $services = Services::where('provider_id',$id)->count();
        if($services > 0) {
            return redirect(env('admin').'/providers')->with('error','No puede eliminar el proveedor porque tiene servicios relacionados al mismo.');
        }
        $path = env('APP_DEBUG') ? '' : 'public/';
		@unlink($path."assets/img/logos/".$res->logo);
		$res->delete();

		return redirect(env('admin').'/providers')->with('message','Proveedor eliminado con éxito.');

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'country'=>'required',
        ]);

        $input = $request->all();
        $providers_data = Providers::find($request->get('id'));

        if(isset($input['logo']))
        {
            // Eliminamos la anterior
            $path = env('APP_DEBUG') ? '' : 'public/';
            @unlink($path."assets/img/logos/".$providers_data->logo);

            // Agregamos el nuevo
            $path = env('APP_DEBUG') ? '' : 'public/';
            $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension();
            $input['logo']->move($path."assets/img/logos/", $filename);
            $input['logo'] = $filename;
        }

        $providers_data->update($input);

        return redirect(env('admin').'/providers')->with('message', 'Proveedor actualizado con éxito ...');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Providers;
use App\Models\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use DB;
use Auth;
use Redirect;

class ProvidersController extends Controller
{

    public $folder = "admin.";

    public function index(Request $request){

        $search = $request->search;
        $status = $request->filter_status;

        $data = Providers::with(['user']);

        if(!is_null($status)) {
            $data = $data->whereHas('user', function ($q) use ($status) {
                $q->where('status','=',$status);
            });
        }

        if($search) {
            $data = $data->where('name','like','%'.$search.'%');
        }

        $data = $data->paginate(10);

        return view($this->folder.'providers.index', [
            'providers' => $data,
            'search' => $search,
            'status' => $status

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
            $user_provider = new User;
            $user_provider->name = $request->name;
            $user_provider->email = $request->email;
            $user_provider->password = Hash::make($request->password);
            $user_provider->shw_password = $request->password;
            $user_provider->address = $request->address;
            $user_provider->phone = $request->phone;
            $user_provider->country = $request->country;
            $user_provider->pic_profile = time().rand(111,699).'.'.$request->logo->getClientOriginalExtension();
            $user_provider->role = 2;
            $user_provider->status = $request->status;
            $user_provider->save();

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

            $user = User::where('name','=',$request->name)->get()->first();
            $providers_data->user_id = $user->id;
            $providers_data->save();
            $providers_data->update($input);

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
        $user = User::where('name',$res->name)->get()->first();
        $user->delete();
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
            'status'=>'required',
            'password'=>'required'
        ]);

        $input = $request->all();
        $providers_data = Providers::find($request->get('id'));
        $user_provider_data = User::find($providers_data->user_id);
        $user_provider_data->name = $request->name;
        $user_provider_data->email = $request->email;
        $user_provider_data->password = Hash::make($request->password);
        $user_provider_data->shw_password = $request->password;
        $user_provider_data->address = $request->address;
        $user_provider_data->phone = $request->phone;
        $user_provider_data->country = $request->country;
        $user_provider_data->pic_profile = $request->logo;
        $user_provider_data->status = $request->status;
        $user_provider_data->update();

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

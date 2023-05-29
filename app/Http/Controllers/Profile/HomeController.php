<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\AppUsers;
use App\Models\Events;
use App\Models\EventsConfirms;
use App\Models\Services;
use App\Models\Providers;
use App\Models\Requests;

use DB;
use Redirect;
use Auth;
class HomeController extends Controller
{
    private $folder = 'account.';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user   = Auth::user();
        $services = Services::paginate(10);
        if(Auth::user()->role == 2){

            $provider = Providers::where('user_id',$user->id)->first();
            if(!is_null($provider)) {
                $services_provider = Services::where('provider_id',$provider->id)->paginate(10);

                return view('admin.services.index', [
                    'user' => Auth::user(),
                    'services' => $services_provider,
                    'search' => ''
                ]);
            }

        }

        return view($this->folder.'home', [
            'user' => Auth::user(),
            'services' => $services
        ]);
    }

    public function createService(){

        $user = Auth::user();

        $providers = Providers::where('user_id',$user->id)->get();

        return view('admin.services.add', [
            'data' => new Services,
            'providers' => $providers
        ]);
    }

    public function storeService(Request $request){

        $request->validate([
            'type'=>'required',
            'title'=>'required',
            'description'=>'required',
            'logo'=>'required'
        ]);

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

        return redirect(env('user').'/services')->with('message', 'Servicio agregado con éxito ...');

    }

    public function editService($id){

        $user = Auth::user();

        $providers = Providers::where('user_id',$user->id)->get();

        return view('admin.services.edit', [
            'data' => Services::find($id),
            'providers' => $providers
        ]);

    }

    public function updateService(Request $request){

        $request->validate([
            'provider_id'=>'required',
            'type'=>'required',
            'title'=>'required',
            'description'=>'required'
        ]);

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

        return redirect(env('user').'/services')->with('message', 'Servicio actualizado con éxito ...');

    }

    public function deleteService($id){

        $res = Services::find($id);

		@unlink("public/assets/img/logos/".$res->logo);
		$res->delete();

		return redirect(env('user').'/services')->with('message','Servicio eliminado con éxito.');

    }

    public function storeRequest(Request $request){
        $request->validate([
            'description'=>'required'
        ]);

        $input = $request->all();
        $requests_data = new Requests;

        $requests_data->create($input);

        return redirect()->route('home')->with('message', 'Solicitud Enviada');

    }

    public function listRequest(Request $request){
        $user = Auth::user()->id;
        $search = $request->search;
        $status = $request->filter_status;

        if(Auth::user()->role == 2){
            $provider = Providers::where('user_id',$user)->first();
            $services = Services::where('provider_id',$provider->id)->get()->pluck('id');
            $requests_user = Requests::whereIn('service_id',$services)
                                ->with(['service']);
        }else {
            $requests_user = Requests::where('user_id','like','%'.$user.'%')
                ->with(['service']);
        }

        if(!is_null($status)) {
            $requests_user = $requests_user->where('status','=', $status);
        }

        if($search) {
            $requests_user = $requests_user->whereHas('service', function ($q) use ($search) {
                    $q->where('title', "like",'%'.$search.'%');
                });
        }

        $requests_user = $requests_user->paginate(10);

        return view('admin.requests.index', [
            'requests'=> $requests_user,
            'search' => $search
        ]);
    }

    public function editRequest(Request $request, $id){

        $request->validate([
            'status'=>'required'
        ]);

        $input = $request->all();
        $requests_data = Requests::find($id);

        $requests_data->update($input);

        return redirect(env('user').'/request')->with('message', 'Solicitud actualizada con éxito ...');

    }

    public function deleteRequest($id){

        $res = Requests::find($id);
		$res->delete();

		return redirect(env('user').'/request')->with('message','Solicitud eliminada con éxito.');

    }

    public function input_code(Request $request,$id) {

        $input  = [];

        try {
            $request->validate([
                'code' =>'required|min:8',
            ]);

            $code = $request->code;
            $code = str_replace(" ", "", $code);
            $code = str_replace("\"", "", $code);
            $code = str_replace("'", "", $code);
            $code = str_replace("\n", "", $code);
            $code = str_replace("\r", "", $code);
            $code = str_replace("\t", "", $code);
            $code = str_replace("\"", "", $code);
            $code = str_replace("'", "", $code);
            $code = str_replace("\n", "", $code);
            $code = str_replace("\r", "", $code);
            $code = str_replace("\t", "", $code);


            $evnt = Events::find($id);

            if ($evnt) {

                if ($evnt->code == $code) {
                    $lims_data_eventsconfirm = new EventsConfirms;

                    $input['user_id']     = Auth::user()->id;
                    $input['events_id']    = $id;
                    $input['code']        = $code;

                    $lims_data_eventsconfirm->create($input);

                    return redirect('/home')->with('message', 'Código liberado...');
                }else {
                    return Redirect::to('/home')->with('error', 'El código no coincide con ningun evento programado.');
                }
            }
        } catch (\Exception $th) {
            return Redirect::to('/home')->with('error', 'Ha ocurrido un problema al intentar ingresar el código, '.$th->getMessage());
        }

    }

    public function activeEvent($id) {

        try {
            $evnt = Events::find($id);

            if ($evnt) {

                $lims_data_eventsconfirm = new EventsConfirms;

                $input['user_id']     = Auth::user()->id;
                $input['events_id']    = $id;
                $input['code']        = 'free';

                $lims_data_eventsconfirm->create($input);

                return redirect('/home')->with('message', 'Evento confirmado...');
            } else {
                return Redirect::to('/home')->with('error', 'El evento al que intentas asistir no existe.');
            }
        } catch (\Exception $th) {
            return Redirect::to('/home')->with('error', 'Ha ocurrido un problema al intentar confirmar el evento, '.$th->getMessage());
        }
    }

    /**
     * Settings the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function settings()
    {
        return view($this->folder.'settings');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->pic_profile;
        $input = $request->except('pic_profile');
        $lims_profile_data = AppUsers::findOrFail($id);

        //
        if ($image) {
            // Verificamos si ya tenia una imagen anterior
            if ($lims_profile_data->pic_profile != NULL) {
                @unlink('public/profile/img/'.$lims_profile_data->pic_profile);
            }

            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date("Ymdhis");
            $imageName = $imageName . '.' . $ext;
            $image->move('public/profile/img/', $imageName);
            $input['pic_profile'] = $imageName;
        }

        if (isset($input['page_settings']) && $input['page_settings'] == 1) {
            if (isset($input['newpassword']) && $input['newpassword'] != '') {
                if ($input['password'] == $lims_profile_data['shw_password']) {

                    if ($input['newpassword'] == $input['renewpassword']) { // Vemos si escribiio bien
                        $input['shw_password'] = $input['newpassword'];
                        $input['password'] = bcrypt($input['newpassword']);
                    }else {
                        return redirect('settings')->with('error', 'Las contraseñas no coinciden, Por favor verifica la información');
                    }

                }else {
                    return redirect('settings')->with('error', 'Las contraseñas no coinciden, Por favor verifica la información');
                }
            }else {
                if ($input['password'] == $lims_profile_data['shw_password']) {
                    $input['shw_password'] = $input['password'];
                    $input['password'] = bcrypt($input['password']);
                }else {
                    return redirect('settings')->with('error', 'Las contraseñas no coinciden, Por favor verifica la información');
                }
            }
        }
        // return response()->json(['data' => $lims_profile_data ,'req' => $input]);
        $lims_profile_data->update($input);

        return redirect('settings')->with('message', 'Cuenta actualizada  actualizada con éxito...');
    }
}

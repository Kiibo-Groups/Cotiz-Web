<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StatisticsHelper;
use App\Models\AppUsers;
use App\Models\Events;
use App\Models\EventsConfirms;
use App\Models\Services;
use App\Models\Providers;
use App\Models\Requests;
use App\Models\Notifications;
use App\Models\User;
use App\Mail\CotizMail;
use Illuminate\Support\Facades\Mail;
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
    public function index(Request $request)
    {
        $user   = Auth::user();
        $services = Services::where('status',1)->paginate(10);
        $search = $request->search;
        $status = '2';
        if(Auth::user()->role == 2){

            $user   = Auth::user();

            $provider = Providers::where('user_id',$user->id)->first();
            $services = Services::where('provider_id',$provider->id)->count();
            $servidesId = Services::where('provider_id',$provider->id)->get()->pluck('id');
            $requests = Requests::whereIn('service_id',$servidesId)->count();

            $statistics = json_encode([
                'services' => StatisticsHelper::statisticsCountModel(Services::class, function ($query) use ($provider) {
                    $query->where('provider_id', $provider->id);
                }),
                'request' => StatisticsHelper::statisticsCountModel(Requests::class, function ($query) use ($servidesId) {
                    $query->whereIn('service_id', $servidesId);
                })
            ]);

            return View('admin.dashboard.homeProviders',[
                'services' => $services,
                'requests' => $requests,
                'months' => $statistics
            ]);
        }else {
            return view($this->folder.'home', [
                'user' => Auth::user(),
                'services' => $services,
                'status' => $status,
            ]);
        }

    }

    public function indexService(Request $request)
    {
        $user   = Auth::user();
        $services = Services::where('status',1)->paginate(10);
        $search = $request->search;
        $status = '2';
        if(Auth::user()->role == 2){

            $status = $request->status;
            $provider = Providers::where('user_id',$user->id)->first();
            if(!is_null($provider)) {
                $services_provider = Services::where('provider_id',$provider->id);

                if(!is_null($status)){
                    $services_provider = $services_provider->orWhere('status','=', $status);
                }

                if($search){
                    $services_provider = $services_provider->orWhere('title','like','%'.$search.'%');
                }

                $services_provider = $services_provider->paginate(10);

                return view('admin.services.index', [
                    'user' => Auth::user(),
                    'services' => $services_provider,
                    'search' => $search,
                    'status' => $status
                ]);
            }

        }

        return view($this->folder.'home', [
            'user' => Auth::user(),
            'services' => $services,
            'status' => $status,
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
            'logo'=>'required',
            'status'=>'required'
        ]);

        $input = $request->all();
        $services_data = new Services;


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
            'description'=>'required',
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

        return redirect(env('user').'/services')->with('message', 'Servicio actualizado con éxito ...');

    }

    public function deleteService($id){

        $res = Services::find($id);
        $path = env('APP_DEBUG') ? '' : 'public/';
		@unlink($path."assets/img/logos/".$res->logo);
		$res->delete();

		return redirect(env('user').'/services')->with('message','Servicio eliminado con éxito.');

    }

    public function storeRequest(Request $request){
        $request->validate([
            'description'=>'required'
        ]);

        $input = $request->all();
        $requests_data = new Requests;

        $user_data = User::find($request->user_id);
        $service_data = Services::find($request->service_id);
        $provider_data = Providers::find($service_data->provider_id);

        $notification = new Notifications;
        $notification->of_user = $request->user_id;
        $notification->for_user = $provider_data->user_id;
        $notification->message = 'El cliente '.$user_data->name.' ha solicitado el servicio '.$service_data->title;
        $notification->save();

        if($request->file('document'))
        {

            // Agregamos el nuevo
            $path = env('APP_DEBUG') ? '' : 'public/';
            $filename   = time().rand(111,699).'.' .$request->file('document')->getClientOriginalExtension();
            $input['document']->move($path."assets/documents/users", $filename);
            $input['document'] = $filename;
        }

        $requests_data->create($input);

        return redirect()->route('home')->with('message', 'Solicitud Enviada');

    }

    public function listRequest(Request $request){
        $user = Auth::user()->id;
        $search = $request->search;
        $status = $request->filter_status;
        $from = $request->filter_from;
        $even = $request->filter_even;

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

        if(!is_null($from)) {
            $requests_user = $requests_user->where('created_at','>=',$from)
            ->where('created_at','<=',$even);
        }

        $requests_user = $requests_user->paginate(10);

        return view('admin.requests.index', [
            'requests'=> $requests_user,
            'search' => $search,
            'status' => $status
        ]);
    }

    public function editRequest(Request $request, $id){

        $request->validate([
            'status'=>'required'
        ]);

        $input = $request->all();
        $requests_data = Requests::find($id);

        $requests_data->update($input);

        $user = User::find($requests_data->user_id);

        $userName = $user->name;

        if ($requests_data->status == 1) {
            $message = 'La solicitud ha sido aprobada con éxito.';
            $title = 'Solicitud Aprobada - Cotiz';
        } else {
            $message = 'La solicitud ha sido rechazada.';
            $title = 'Solicitud Rechazada - Cotiz';
        }

        $service_data = Services::find($requests_data->service_id);
        $provider_data = Providers::find($service_data->provider_id);

        $notification = new Notifications;
        $notification->of_user = $provider_data->user_id;
        $notification->for_user = $requests_data->user_id;
        $notification->message = 'El Proveedor ha respondido tu solicitud al servicio '.$service_data->title.' del proveedor '.$provider_data->name;
        $notification->save();
        $requests_data->update($input);


        Mail::to($user->email)->send(new CotizMail($userName, $title, $message));


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
            $path = env('APP_DEBUG') ? '' : 'public/';
            if ($lims_profile_data->pic_profile != NULL) {
                @unlink($path.'assets/profile/img/'.$lims_profile_data->pic_profile);
            }

            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date("Ymdhis");
            $imageName = $imageName . '.' . $ext;

            $image->move($path.'assets/profile/img/', $imageName);
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

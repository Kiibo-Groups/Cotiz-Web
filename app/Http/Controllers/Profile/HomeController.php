<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\AppUsers;
use App\Models\Events;
use App\Models\EventsConfirms;

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
        $eventsMens = Events::withCount(['EventsConfirms'])->where('level','<=',Auth::user()->level)->where('status',1)->get();
        $eventsSups = Events::withCount(['EventsConfirms'])->where('level','>',Auth::user()->level)->where('status',1)->get();
        $user   = Auth::user();
       

        return view($this->folder.'home', [ 
            'user' => Auth::user(),
            'eventsMens' => $eventsMens,
            'eventsSups' => $eventsSups
        ]); 
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

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\AppUsers;
use DB;
use Auth;
class HomeController extends Controller
{
    private $folder = './account/';
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
        return view($this->folder.'home');
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
                @unlink('/profile/img/'.$lims_profile_data->pic_profile);
            }

            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date("Ymdhis");
            $imageName = $imageName . '.' . $ext;
            $image->move('/profile/img/', $imageName);
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

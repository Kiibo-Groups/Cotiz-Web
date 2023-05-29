<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Models\Admin;
use App\Models\AppUsers;
use App\Models\UserAddress;

use DB;
use Auth;
use Redirect;
class UsersController extends Controller
{
    public $folder = "admin.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->folder.'users.index', [
            'data' => AppUsers::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->except('password');
            $lims_appusers_data = new AppUsers;

            if(isset($input['img']))
            {
                // Agregamos el nuevo
                $path = env('APP_DEBUG') ? '' : 'public/';
                $filename   = time().rand(111,699).'.' .$input['img']->getClientOriginalExtension();
                $input['img']->move($path."assets/profile/img/", $filename);
                $input['pic_profile'] = $filename;
            }

            $input['password'] = Hash::make($request->get('password'));
            $input['shw_password'] = $request->get('password');

            $lims_appusers_data->create($input);

            return redirect(env('admin').'/users')->with('message', 'Usuario agregado con éxito ...');
           } catch (\Exception $th) {
            return Redirect::to(env('admin').'/users/add')->with('error', 'Ha ocurrido un problema al intentar crear el elemento, '.$th->getMessage());
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view($this->folder.'users.add', [
            'data' => new AppUsers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->folder.'users.edit', [
            'data' => AppUsers::find($id),
            'form_url' => Asset(env('admin').'/users/update')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $lims_users_data = AppUsers::find($request->get('id'));

        if(isset($input['img']))
        {
            // Eliminamos la anterior
            $path = env('APP_DEBUG') ? '' : 'public/';
            @unlink($path."assets/profile/img/".$lims_users_data->pic_profile);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['img']->getClientOriginalExtension();
            $input['img']->move($path."assets/profile/img/", $filename);
            $input['pic_profile'] = $filename;
        }

        $lims_users_data->update($input);

        return redirect(env('admin').'/users')->with('message', 'Usuario actualizado con éxito ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res = AppUsers::find($id);

        // Eliminamos el logotipo
        $path = env('APP_DEBUG') ? '' : 'public/';
		@unlink($path."assets/profile/img/".$res->pic_profile);

        // Eliminamos al usuario mismo
        $res->delete();

		return redirect(env('admin').'/users')->with('message','Elemento eliminado con éxito.');
    }

    /**
     * Change the Status specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $res = AppUsers::find($id);

		$res->status = ($res->status == 0) ? 1 : 0;
        $res->save();

		return redirect(env('admin').'/users')->with('message','Elemento eliminado con éxito.');
    }
}

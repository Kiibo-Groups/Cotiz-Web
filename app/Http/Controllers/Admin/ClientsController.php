<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Clients; 
use App\Models\ClientsInfo;

use DB;
use Auth;
use Redirect;
class ClientsController extends Controller
{
    public $folder = "admin.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Clients::get();  
        
        return view($this->folder.'clients.index', [ 
            'data' => $data,
            'info' => ClientsInfo::first()
        ]); 
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
            $input = $request->all();
            $lims_clients_data = new Clients;
    
            if(isset($input['imagen']))
            {
                // Eliminamos la anterior
                // unlink("public/profile/img/banner/".$input['img']);
    
                // Agregamos el nuevo
                $filename   = time().rand(111,699).'.' .$input['imagen']->getClientOriginalExtension(); 
                $input['imagen']->move("public/assets/img/brands/", $filename);   
                $input['imagen'] = $filename;   
            }
    
            $lims_clients_data->create($input);
            
            return redirect(env('admin').'/clients')->with('message', 'Cliente agregado con éxito ...');
        } catch (\Exception $th) {
        return Redirect::to(env('admin').'/clients/add')->with('error', 'Ha ocurrido un problema al intentar crear el elemento, '.$th->getMessage());
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
        return view($this->folder.'clients.add', [ 
            'data' => new Clients
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
        return view($this->folder.'clients.edit', [ 
            'data' => Clients::find($id),
            'form_url' => Asset(env('admin').'/clients/update')
        ]); 
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
        $input = $request->all();
        $lims_clients_data = Clients::find($request->get('id'));

        if(isset($input['imagen']))
        {
            // Eliminamos la anterior
            @unlink("public/assets/img/brands/".$lims_clients_data->imagen);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['imagen']->getClientOriginalExtension(); 
            $input['imagen']->move("public/assets/img/brands/", $filename);   
            $input['imagen'] = $filename;   
        }

        $lims_clients_data->update($input);
        
        return redirect(env('admin').'/clients')->with('message', 'Elemento actualizado con éxito ...');
    }

    public function updateInfo(Request $request)
    {
        $input = $request->all();
        $lims_clients_data = ClientsInfo::find($request->get('id'));
        $lims_clients_data->update($input);
        
        return redirect(env('admin').'/clients')->with('message', 'Elemento actualizado con éxito ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res = Clients::find($id);
 
		@unlink("public/assets/img/brands/".$res->imagen);
		$res->delete();

		return redirect(env('admin').'/clients')->with('message','Elemento eliminado con éxito.');
    }

    /**
     * Change the Status specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $res = Clients::find($id);
 
		$res->status = ($res->status == 0) ? 1 : 0;
        $res->save();
        
		return redirect(env('admin').'/clients')->with('message','Elemento eliminado con éxito.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Banners;

use DB;
use Auth;
use Redirect;
class BannersController extends Controller
{
    
    public $folder = "admin.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banners::get();  
        
        return view($this->folder.'banner.index', [ 
            'data' => $data
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
        $lims_banners_data = new Banners;

        if(isset($input['img']))
        {
            // Eliminamos la anterior
            // unlink("public/profile/img/banner/".$input['img']);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['img']->getClientOriginalExtension(); 
            $input['img']->move("public/profile/img/banner/", $filename);   
            $input['img'] = $filename;   
        }

        $lims_banners_data->create($input);
        
        return redirect(env('admin').'/banners')->with('message', 'Banner agregado con éxito ...');
       } catch (\Exception $th) {
        return Redirect::to(env('admin').'/banners/add')->with('error', 'Ha ocurrido un problema al intentar crear el elemento, '.$th->getMessage());
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
        return view($this->folder.'banner.add', [ 
            'data' => new Banners
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
        return view($this->folder.'banner.edit', [ 
            'data' => Banners::find($id),
            'form_url' => Asset(env('admin').'/banners/update')
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
        $lims_banners_data = Banners::find($request->get('id'));

        if(isset($input['img']))
        {
            // Eliminamos la anterior
            unlink("public/profile/img/banner/".$lims_banners_data->img);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['img']->getClientOriginalExtension(); 
            $input['img']->move("public/profile/img/banner/", $filename);   
            $input['img'] = $filename;   
        }

        $lims_banners_data->update($input);
        
        return redirect(env('admin').'/banners')->with('message', 'Elemento actualizado con éxito ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res = Banners::find($id);
 
		@unlink("public/profile/img/banner/".$res->img);
		$res->delete();

		return redirect(env('admin').'/banners')->with('message','Elemento eliminado con éxito.');
    }

    /**
     * Change the Status specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $res = Banners::find($id);
 
		$res->status = ($res->status == 0) ? 1 : 0;
        $res->save();
        
		return redirect(env('admin').'/banners')->with('message','Elemento eliminado con éxito.');
    }
}

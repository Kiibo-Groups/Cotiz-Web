<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Mentors;

use DB;
use Auth;
use Redirect;
class MentorsController extends Controller
{
    public $folder = "admin.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mentors::Orderby('id','desc')->get();  
        
        return view($this->folder.'mentors.index', [ 
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
        $lims_mentors_data = new Mentors;

        if(isset($input['img']))
        { 

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['img']->getClientOriginalExtension(); 
            $input['img']->move("public/assets/img/mentors/", $filename);   
            $input['img'] = $filename;   
        }

        $lims_mentors_data->create($input);
        
        return redirect(env('admin').'/mentors')->with('message', 'Evento agregado con éxito ...');
       } catch (\Exception $th) {
        return Redirect::to(env('admin').'/mentors/add')->with('error', 'Ha ocurrido un problema al intentar crear el elemento, '.$th->getMessage());
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
        return view($this->folder.'mentors.add', [ 
            'data' => new Mentors
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
        return view($this->folder.'mentors.edit', [ 
            'data' => Mentors::find($id),
            'form_url' => Asset(env('admin').'/mentors/update')
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
        $lims_mentors_data = Mentors::find($request->get('id'));

        if(isset($input['img']))
        {
            // Eliminamos la anterior
            unlink("public/assets/img/mentors/".$lims_mentors_data->img);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['img']->getClientOriginalExtension(); 
            $input['img']->move("public/assets/img/mentors/", $filename);   
            $input['img'] = $filename;   
        }

        $lims_mentors_data->update($input);
        
        return redirect(env('admin').'/mentors')->with('message', 'Elemento actualizado con éxito ...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $res = Mentors::find($id);
 
		@unlink("public/assets/img/mentors/".$res->img);
		$res->delete();

		return redirect(env('admin').'/mentors')->with('message','Elemento eliminado con éxito.');
    }

    /**
     * Change the Status specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $res = Mentors::find($id);
 
		$res->status = ($res->status == 0) ? 1 : 0;
        $res->save();
        
		return redirect(env('admin').'/mentors')->with('message','Elemento eliminado con éxito.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Sections;


use DB;
use Auth;
use Redirect;
class SectionsController extends Controller
{
    public $folder = "admin.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sections::where('section',1)->first();  
        
        return view($this->folder.'sections.initial', [ 
            'data' => (isset($data->id)) ? $data : new Sections
        ]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seccion_about()
    {
        $data = Sections::where('section',2)->first();  
        
        return view($this->folder.'sections.about', [ 
            'data' => (isset($data->id)) ? $data : new Sections
        ]); 
    }

    public function seccion_beneficts()
    {
        $data = Sections::where('section',6)->first();  
        
        return view($this->folder.'sections.beneficts', [ 
            'data' => (isset($data->id)) ? $data : new Sections
        ]); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function seccion_advisers()
    {
        $data = Sections::where('section',3)->first();  
        
        return view($this->folder.'sections.advisers', [ 
            'data' => (isset($data->id)) ? $data : new Sections
        ]); 
    }
 
    public function seccion_mentors()
    {
        $data = Sections::where('section',4)->first();  
        
        return view($this->folder.'sections.mentors', [ 
            'data' => (isset($data->id)) ? $data : new Sections
        ]); 
    }
    
    public function seccion_schedule_meeting()
    {
        $data = Sections::where('section',5)->first();  
        
        return view($this->folder.'sections.schedule_meeting', [ 
            'data' => (isset($data->id)) ? $data : new Sections
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateInit(Request $request)
    {
        $input = $request->all();
        $section_data = Sections::where('section',$request->get('section'))->first();

        if ($section_data) {
            $lims_section_data = Sections::find($section_data->id);
        
            if(isset($input['video']))
            {
                // Eliminamos la anterior
                @unlink("public/assets/videos/".$lims_section_data->pic_1);

                // Agregamos el nuevo
                $filename   = time().rand(111,699).'.' .$input['video']->getClientOriginalExtension(); 
                $input['video']->move("public/assets/videos/", $filename);   
                $input['video'] = $filename;   
            }

            if(isset($input['pic_1']))
            {
                // Eliminamos la anterior
                @unlink("public/assets/img/photos/".$lims_section_data->pic_1);

                // Agregamos el nuevo
                $filename   = time().rand(111,699).'.' .$input['pic_1']->getClientOriginalExtension(); 
                $input['pic_1']->move("public/assets/img/photos/", $filename);   
                $input['pic_1'] = $filename;   
            }

            if(isset($input['pic_2']))
            {
                // Eliminamos la anterior
                @unlink("public/assets/img/photos/".$lims_section_data->pic_2);

                // Agregamos el nuevo
                $filename   = time().rand(111,699).'.' .$input['pic_2']->getClientOriginalExtension(); 
                $input['pic_2']->move("public/assets/img/photos/", $filename);   
                $input['pic_2'] = $filename;   
            }

            if(isset($input['pic_3']))
            {
                // Eliminamos la anterior
                @unlink("public/assets/img/photos/".$lims_section_data->pic_3);

                // Agregamos el nuevo
                $filename   = time().rand(111,699).'.' .$input['pic_3']->getClientOriginalExtension(); 
                $input['pic_3']->move("public/assets/img/photos/", $filename);   
                $input['pic_3'] = $filename;   
            }

            $lims_section_data->update($input);
            
            switch ($request->get('section')) {
                case '1':
                    return redirect(env('admin').'/seccion_initial')->with('message', 'Elemento actualizado con éxito ...');
                    break;
                case '2':
                    return redirect(env('admin').'/seccion_about')->with('message', 'Elemento actualizado con éxito ...');
                    break;
                case '3':
                    return redirect(env('admin').'/seccion_advisers')->with('message', 'Elemento actualizado con éxito ...');
                    break;
                case '4':
                    return redirect(env('admin').'/seccion_mentors')->with('message', 'Elemento actualizado con éxito ...');
                    break;
                case '5':
                    return redirect(env('admin').'/seccion_schedule_meeting')->with('message', 'Elemento actualizado con éxito ...');
                    break;
                case '6':
                    return redirect(env('admin').'/seccion_beneficts')->with('message', 'Elemento actualizado con éxito ...');
                    break;
                default:
                    return redirect(env('admin').'/seccion_initial')->with('message', 'Elemento actualizado con éxito ...');
                    break;
            }
        }else{ 
            return redirect(env('admin').'/seccion_initial')->with('error', 'Sección no encontrada...');
        }
    }
}

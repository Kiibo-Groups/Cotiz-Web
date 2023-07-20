<?php

namespace App\Http\Controllers\Proveedor;

use App\Models\Rfc;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogoController extends Controller
{
    public $folder = "proveedor.";

    public function index(Request $request)
    {


        $search = $request->search;
        $status = $request->filter_status;

        $data = Services::where('provider_id',auth()->user()->idempresa);

        if(!is_null($status)) {
            $data = $data->where('status','=', $status);
        }

        if($search) {
            $data = $data->whereRaw('LOWER(title) LIKE(?)','%'.$search.'%');
        }

        $data = $data->paginate(10);



        return view($this->folder.'catalogo.index', [
            'services' => $data,
            'search' => $search,
            'status' => $status,

        ]);
    }

    public function show(){


        $providers = Rfc::where('id', auth()->user()->idempresa)->where('status', 0)->first();

        return view($this->folder.'catalogo.add', [
            'data' => new Services,
            'providers' => $providers
        ]);


    }

    public function storeService(Request $request){
        //dd($request);
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

            $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension();
            $input['logo']->move("assets/img/logos/", $filename);
            $input['logo'] = $filename;
        }

        // -----------------Profesional
        if(isset($input['titulo1']))
        {

            $filename1   = time().rand(111,699).'.' .$input['titulo1']->getClientOriginalExtension();
            $input['titulo1']->move("assets/documento/profesionales/", $filename1);
            $input['titulo1'] = $filename1;
        }
        if(isset($input['titulo2']))
        {

            $titulo2   = time().rand(111,699).'.' .$input['titulo2']->getClientOriginalExtension();
            $input['titulo2']->move("assets/documento/profesionales/", $titulo2);
            $input['titulo2'] = $titulo2;
        }
        if(isset($input['cedula1']))
        {

            $cedula1   = time().rand(111,699).'.' .$input['cedula1']->getClientOriginalExtension();
            $input['cedula1']->move("assets/documento/profesionales/", $cedula1);
            $input['cedula1'] = $cedula1;
        }
        if(isset($input['cedula2']))
        {

            $cedula2   = time().rand(111,699).'.' .$input['cedula2']->getClientOriginalExtension();
            $input['cedula2']->move("assets/documento/profesionales/", $cedula2);
            $input['cedula2'] = $cedula2;
        }
        if(isset($input['cv']))
        {

            $cv   = time().rand(111,699).'.' .$input['cv']->getClientOriginalExtension();
            $input['cv']->move("assets/documento/profesionales/", $cv);
            $input['cv'] = $cv;
        }
        if(isset($input['fotoCredencial']))
        {

            $fotoCredencial   = time().rand(111,699).'.' .$input['fotoCredencial']->getClientOriginalExtension();
            $input['fotoCredencial']->move("assets/documento/profesionales/", $fotoCredencial);
            $input['fotoCredencial'] = $fotoCredencial;
        }
        if(isset($input['fotoCredencial2']))
        {

            $fotoCredencial2   = time().rand(111,699).'.' .$input['fotoCredencial2']->getClientOriginalExtension();
            $input['fotoCredencial2']->move("assets/documento/profesionales/", $fotoCredencial2);
            $input['fotoCredencial2'] = $fotoCredencial2;
        }
        if(isset($input['exitos']))
        {

            $exitos   = time().rand(111,699).'.' .$input['exitos']->getClientOriginalExtension();
            $input['exitos']->move("assets/documento/profesionales/", $exitos);
            $input['exitos'] = $exitos;
        }









        $services_data->create($input);

        return redirect(env('user').'/catalogo')->with('message', 'Servicio agregado con éxito ...');

    }


    public function edit($id){

        $providers = Rfc::where('id', auth()->user()->idempresa)->where('status', 0)->first();

        return view($this->folder.'catalogo.edit', [
            'data' => Services::find($id),
            'providers' => $providers,
            'form_url' => Asset(env('user').'/catalogo/update')
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

            @unlink("assets/img/logos/".$services_data->logo);

            // Agregamos el nuevo
            $filename   = time().rand(111,699).'.' .$input['logo']->getClientOriginalExtension();
            $input['logo']->move("assets/img/logos/", $filename);
            $input['logo'] = $filename;
        }

        $services_data->update($input);

        return redirect(env('user').'/catalogo')->with('message', 'Servicio actualizado con éxito ...');

    }

    public function ver($id){


        return view($this->folder.'catalogo.ver', [
            'data' => Services::find($id),

        ]);

    }

    public function verFilesEmpresa($id){

        // $arc  = Arbitraje::where('id', $id)->first();
         $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$id;
         //dd($rutaDeArchivo);
         return response()->download($rutaDeArchivo, $id);
     }

}

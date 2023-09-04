<?php

namespace App\Http\Controllers\Proveedor;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Services;
use App\Models\Providers;
use App\Models\Referencia;
use App\Models\Certificado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CatalogoController extends Controller
{
    public $folder = "proveedor.";

    public function index(Request $request)
    {


        $search = $request->search;
        $status = $request->filter_status;

        $data = Services::where('provider_id', auth()->user()->idempresa);

        if (!is_null($status)) {
            $data = $data->where('status', '=', $status);
        }

        if ($search) {
            $data = $data->whereRaw('LOWER(title) LIKE(?)', '%' . $search . '%');
        }

        $data = $data->paginate(10);



        return view($this->folder . 'catalogo.index', [
            'services' => $data,
            'search' => $search,
            'status' => $status,

        ]);
    }

    public function show()
    {


        $providers = Rfc::where('id', auth()->user()->idempresa)->first();

        return view($this->folder . 'catalogo.add', [
            'data' => new Services,
            'providers' => $providers
        ]);
    }

    public function storeService(Request $request)
    {

        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'logo' => 'required|max:3048',
            'status' => 'required',
            'titulo1'=>'max:3048',
            'titulo2'=>'max:3048',
            'cedula1'=>'max:3048',
            'cedula2'=>'max:3048',
            'cv'=>'max:3048',
            'fotoCredencial'=>'max:3048',
            'fotoCredencial2'=>'max:3048',
            'exitos'=>'max:3048',
        ]);



        $input = $request->all();
        $services_data = new Services;


        if (isset($input['logo'])) {

            $filename   = time() . rand(111, 699) . '.' . $input['logo']->getClientOriginalExtension();
            $input['logo']->move("public/assets/img/logos/", $filename);
            $input['logo'] = $filename;
        }

        // -----------------Profesional
        if (isset($input['titulo1'])) {

            $filename1   = time() . rand(111, 699) . '.' . $input['titulo1']->getClientOriginalExtension();
            $input['titulo1']->move("public/assets/documento/profesionales/", $filename1);
            $input['titulo1'] = $filename1;
        }
        if (isset($input['titulo2'])) {

            $titulo2   = time() . rand(111, 699) . '.' . $input['titulo2']->getClientOriginalExtension();
            $input['titulo2']->move("public/assets/documento/profesionales/", $titulo2);
            $input['titulo2'] = $titulo2;
        }
        if (isset($input['cedula1'])) {

            $cedula1   = time() . rand(111, 699) . '.' . $input['cedula1']->getClientOriginalExtension();
            $input['cedula1']->move("public/assets/documento/profesionales/", $cedula1);
            $input['cedula1'] = $cedula1;
        }
        if (isset($input['cedula2'])) {

            $cedula2   = time() . rand(111, 699) . '.' . $input['cedula2']->getClientOriginalExtension();
            $input['cedula2']->move("public/assets/documento/profesionales/", $cedula2);
            $input['cedula2'] = $cedula2;
        }
        if (isset($input['cv'])) {

            $cv   = time() . rand(111, 699) . '.' . $input['cv']->getClientOriginalExtension();
            $input['cv']->move("public/assets/documento/profesionales/", $cv);
            $input['cv'] = $cv;
        }
        if (isset($input['fotoCredencial'])) {

            $fotoCredencial   = time() . rand(111, 699) . '.' . $input['fotoCredencial']->getClientOriginalExtension();
            $input['fotoCredencial']->move("public/assets/documento/profesionales/", $fotoCredencial);
            $input['fotoCredencial'] = $fotoCredencial;
        }
        if (isset($input['fotoCredencial2'])) {

            $fotoCredencial2   = time() . rand(111, 699) . '.' . $input['fotoCredencial2']->getClientOriginalExtension();
            $input['fotoCredencial2']->move("public/assets/documento/profesionales/", $fotoCredencial2);
            $input['fotoCredencial2'] = $fotoCredencial2;
        }
        if (isset($input['exitos'])) {

            $exitos   = time() . rand(111, 699) . '.' . $input['exitos']->getClientOriginalExtension();
            $input['exitos']->move("public/assets/documento/profesionales/", $exitos);
            $input['exitos'] = $exitos;
        }









        $services_data->create($input);

        return redirect(env('user') . '/catalogo')->with('message', 'Servicio agregado con éxito ...');
    }


    public function edit($id)
    {

        $providers = Rfc::where('id', auth()->user()->idempresa)->where('status', 0)->first();

        return view($this->folder . 'catalogo.edit', [
            'data' => Services::find($id),
            'providers' => $providers,
            'form_url' => Asset(env('user') . '/catalogo/update')
        ]);
    }

    public function updateService(Request $request)
    {

        $request->validate([
            'provider_id' => 'required',
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'titulo1'=>'max:3048',
            'titulo2'=>'max:3048',
            'cedula1'=>'max:3048',
            'cedula2'=>'max:3048',
            'cv'=>'max:3048',
            'fotoCredencial'=>'max:3048',
            'fotoCredencial2'=>'max:3048',
            'exitos'=>'max:3048',
        ]);

        $input = $request->all();
        $services_data = Services::find($request->get('id'));

        if (isset($input['logo'])) {

            @unlink("assets/img/logos/" . $services_data->logo);

            // Agregamos el nuevo
            $filename   = time() . rand(111, 699) . '.' . $input['logo']->getClientOriginalExtension();
            $input['logo']->move("public/assets/img/logos/", $filename);
            $input['logo'] = $filename;
        }
        // -----------------Profesional
        if (isset($input['titulo1'])) {

            $filename1   = time() . rand(111, 699) . '.' . $input['titulo1']->getClientOriginalExtension();
            $input['titulo1']->move("public/assets/documento/profesionales/", $filename1);
            $input['titulo1'] = $filename1;
        }
        if (isset($input['titulo2'])) {

            $titulo2   = time() . rand(111, 699) . '.' . $input['titulo2']->getClientOriginalExtension();
            $input['titulo2']->move("public/assets/documento/profesionales/", $titulo2);
            $input['titulo2'] = $titulo2;
        }
        if (isset($input['cedula1'])) {

            $cedula1   = time() . rand(111, 699) . '.' . $input['cedula1']->getClientOriginalExtension();
            $input['cedula1']->move("public/assets/documento/profesionales/", $cedula1);
            $input['cedula1'] = $cedula1;
        }
        if (isset($input['cedula2'])) {

            $cedula2   = time() . rand(111, 699) . '.' . $input['cedula2']->getClientOriginalExtension();
            $input['cedula2']->move("public/assets/documento/profesionales/", $cedula2);
            $input['cedula2'] = $cedula2;
        }
        if (isset($input['cv'])) {

            $cv   = time() . rand(111, 699) . '.' . $input['cv']->getClientOriginalExtension();
            $input['cv']->move("public/assets/documento/profesionales/", $cv);
            $input['cv'] = $cv;
        }
        if (isset($input['fotoCredencial'])) {

            $fotoCredencial   = time() . rand(111, 699) . '.' . $input['fotoCredencial']->getClientOriginalExtension();
            $input['fotoCredencial']->move("public/assets/documento/profesionales/", $fotoCredencial);
            $input['fotoCredencial'] = $fotoCredencial;
        }
        if (isset($input['fotoCredencial2'])) {

            $fotoCredencial2   = time() . rand(111, 699) . '.' . $input['fotoCredencial2']->getClientOriginalExtension();
            $input['fotoCredencial2']->move("public/assets/documento/profesionales/", $fotoCredencial2);
            $input['fotoCredencial2'] = $fotoCredencial2;
        }
        if (isset($input['exitos'])) {

            $exitos   = time() . rand(111, 699) . '.' . $input['exitos']->getClientOriginalExtension();
            $input['exitos']->move("public/assets/documento/profesionales/", $exitos);
            $input['exitos'] = $exitos;
        }



        $services_data->update($input);

        return redirect(env('user') . '/catalogo')->with('message', 'Servicio actualizado con éxito ...');
    }

    public function ver($id)
    {


        return view($this->folder . 'catalogo.ver', [
            'data' => Services::find($id),
            'referencia'  => Referencia::where('servi_id', $id)->orderBy('referencia', 'desc')->get(),
            'certificado' => Certificado::where('servi_id', $id)->get(),

        ]);
    }

      public function verFilesEmpresa($id)
    {

        $fete = Services::where('id', $id)->value('titulo1');
        $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }




    public function verFilesEmpresa2($id)
    {

        $fete = Services::where('id', $id)->value('titulo2');
        $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }

    public function verFilesEmpresa3($id)
    {

        $fete = Services::where('id', $id)->value('cedula1');
        $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }


    public function verFilesEmpresa4($id)
    {

        $fete = Services::where('id', $id)->value('cedula2');
        $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }


    public function verFilesEmpresa5($id)
    {

        $fete = Services::where('id', $id)->value('cv');
        $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }


    public function verFilesEmpresa6($id)
    {

        $fete = Services::where('id', $id)->value('fotoCredencial');
        $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }


    public function verFilesEmpresa7($id)
    {

        $fete = Services::where('id', $id)->value('fotoCredencial2');
        $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }


    public function verFilesEmpresa8($id)
    {

        $fete = Services::where('id', $id)->value('exitos');
        $rutaDeArchivo = public_path().'/assets/documento/profesionales/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }




    public function AddReferencias($id)
    {


        $user = auth()->user()->id;
        $origen = 'usuario';



        return view($this->folder . 'catalogo.addreferencias', [

            'data' => new Referencia,

            'array' => [],
            'id' => $id,
            'user' => $user,
            'origen' => $origen
        ]);
    }



    public function storeServiceReferencias(Request $request)
    {
        //dd($request->servi_id);
        $input = $request->all();
        $services_data = new Referencia;

        $services_data->create($input);

        Session::flash('mensaje', 'Referencias Agregada ...');
        Session::flash('class', 'success');
        return redirect(env('user') . '/catalogo/ver/' . $request->servi_id);
    }




    public function AddCertificados($id)
    {


        $user = auth()->user()->id;
        $origen = 'usuario';



        return view($this->folder . 'catalogo.addcertificados', [

            'data' => new Referencia,

            'array' => [],
            'id' => $id,
            'user' => $user,
            'origen' => $origen
        ]);
    }



    public function storeServiceCertificados(Request $request)
    {

        $request->validate([

            'imagen'=>'required|max:3048',
        ]);

        $input = $request->all();
        $services_data = new Certificado();

        if (isset($input['imagen'])) {

            // Agregamos el nuevo
            $filename   = time() . rand(111, 699) . '.' . $input['imagen']->getClientOriginalExtension();
            $input['imagen']->move("public/assets/documento/certificados/", $filename);
            $input['imagen'] = $filename;
        }

        $services_data->create($input);


        Session::flash('mensaje', 'Certificado Agregado ...');
        Session::flash('class', 'success');
        return redirect(env('user') . '/catalogo/ver/' . $request->servi_id);
    }

    public function verFilesCertificados($id)
    {

           $fete = Certificado::where('id', $id)->value('imagen');
        $rutaDeArchivo = public_path().'/assets/documento/certificados/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }

    public function delete($id){

        $res = Services::find($id);
        $path = env('APP_DEBUG') ? '' : 'public/';
		@unlink($path."assets/img/logos/".$res->logo);
		$res->delete();

        Session::flash('mensaje','Elemento Eliminado con éxito!');
        Session::flash('class', 'success');
        return back();

    }
}

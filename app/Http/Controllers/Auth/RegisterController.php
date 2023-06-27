<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Providers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function create(){

        return view('auth.register');
    }
    public function createSeccion(){

        return view('auth.seccion');
    }
    public function createProveedor(){

        return view('auth.registerprove');
    }

    public function store(Request $request){

        $input = $request->all();
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:8|confirmed',

        ]);

        if(isset($input['fotoGafete']))
        {

            $fotoGafete   = time().rand(111,699).'.' .$input['fotoGafete']->getClientOriginalExtension();
            $input['fotoGafete']->move("assets/img/fotogafete/", $fotoGafete);
            $input['fotoGafete'] = $fotoGafete;
        }
        if(isset($input['fotoCredencial']))
        {
            $fotoCredencial   = time().rand(111,699).'.' .$input['fotoCredencial']->getClientOriginalExtension();
            $input['fotoCredencial']->move("assets/img/fotocredencial/", $fotoCredencial);
            $input['fotoCredencial'] = $fotoCredencial;
        }

        $user = new User;
        $user->company           = $request->empresa;
        $user->idempresa         = $request->empresaid;
        $user->rfc               = $request->rfc;
        $user->name              = $request->name;
        $user->last_name         = $request->apellidoPaterno. ' '. $request->apellidoMaterno;
        $user->job               = $request->puestoEmpresa;
        $user->areaEmpresa       = $request->areaEmpresa;
        $user->telefonoEmpresa   = $request->telefonoEmpresa;
        $user->phone             = $request->phone;
        $user->email             = $request->email;
        $user->address           = $request->direccionEmpresa;
        $user->password          = Hash::make($request->password);
        $user->shw_password      = $request->password;
        $user->fotoGafete        = $fotoGafete;
        $user->fotoCredencial    = $fotoCredencial;
        $user->role = 1;
        $user->status = 1; // Default status

        $user->save();
        //dd($user);
        // if($request->role == '2'){

        //     $user_data = User::where('name','like',$request->name)->get();

        //     $provider = new Providers;
        //     $provider->name = $user_data[0]->name;
        //     $provider->email = $user_data[0]->email;
        //     $provider->user_id = $user_data[0]->id;
        //     $provider->status = 0; // Default status
        //     $provider->save();
        // }

        //auth()->login($user); auto Login -  se quita por activacion por admin

        Session::flash('mensaje','Registro Exitoso - Pendiente de autorización!');
        Session::flash('class', 'success');
        return back();


    }


    public function buscarRfc(Request $request){
        $rfc  = $request->rfc;
        $rol  = $request->rol;
        $data = Rfc::where('rfc', $rfc)->where('status', 0)->where('rol', $rol)->first();
        if ($data) {
            $dataresul = [
                'id' => $data->id,
                'nombre' => $data->nombre,
                'rfc' => $data->rfc,
            ];

            return response()->json(['code' => 200, 'data' => $dataresul, 'message' => 'Se ha obtenido la siguiente información.']);
        } else {
            $dataresul = [
                'id' => 0,
                'nombre' => 0,
                'rfc' => 0,
            ];
            return response()->json(['code' => 200, 'data' => $dataresul, 'message' => 'Se ha obtenido la siguiente información.']);
        }

    }


    public function storeEmpresa(Request $request){

        $input = $request->all();
        $registro   =  new Rfc();

        if(isset($input['opinionPositiva']))
        {
            $opinionPositiva   = time().rand(111,699).'.' .$input['opinionPositiva']->getClientOriginalExtension();
            $input['opinionPositiva']->move("assets/img/empresa/", $opinionPositiva);
            $input['opinionPositiva'] = $opinionPositiva;
        }
        if(isset($input['infoBancaria']))
        {
            $infoBancaria   = time().rand(111,699).'.' .$input['infoBancaria']->getClientOriginalExtension();
            $input['infoBancaria']->move("assets/img/empresa/", $infoBancaria);
            $input['infoBancaria'] = $infoBancaria;
        }
        if(isset($input['constFiscal']))
        {
            $constFiscal   = time().rand(111,699).'.' .$input['constFiscal']->getClientOriginalExtension();
            $input['constFiscal']->move("assets/img/empresa/", $constFiscal);
            $input['constFiscal'] = $constFiscal;
        }
        if(isset($input['domicilioFiscal']))
        {
            $domicilioFiscal   = time().rand(111,699).'.' .$input['domicilioFiscal']->getClientOriginalExtension();
            $input['domicilioFiscal']->move("assets/img/empresa/", $domicilioFiscal);
            $input['domicilioFiscal'] = $domicilioFiscal;
        }

        // if(isset($input['numeroPlanta']))
        // {
        //     $numeroPlanta   = time().rand(111,699).'.' .$input['numeroPlanta']->getClientOriginalExtension();
        //     $input['numeroPlanta']->move("assets/img/empresa/", $numeroPlanta);
        //     $input['numeroPlanta'] = $numeroPlanta;
        // }


       $registro->opinionPositiva = $opinionPositiva;
       $registro->infoBancaria    = $infoBancaria;
       $registro->constFiscal     = $constFiscal;
       $registro->domicilioFiscal = $domicilioFiscal;
       $registro->numeroPlanta    = $request->numeroPlanta;
       $registro->rfc             = $request->rfc;
       $registro->nombre          = $request->nombre;
       $registro->calle           = $request->calle;
       $registro->numeroCalle     = $request->numeroCalle;
       $registro->colonia         = $request->colonia;
       $registro->cp              = $request->cp;
       $registro->municipio       = $request->municipio;
       $registro->delegación      = $request->delegación;
       $registro->estado          = $request->estado;
       $registro->pais            = $request->pais;
       $registro->actividadPPal   = $request->actividadPPal;
       $registro->save();


       $user = new User;
       $user->name                = $request->nombre;
       $user->email               = $request->email;
       $user->password            = Hash::make($request->password);
       $user->shw_password        = $request->password;
       $user->role = 3 ;
       $user->save();

       Session::flash('mensaje','Registro Exitoso!');
       Session::flash('class', 'success');
       return back();

    }


    public function storeProveedor(Request $request){



        $input = $request->all();
        $registro   =  new Rfc();

        if(isset($input['opinionPositiva']))
        {
            $opinionPositiva   = time().rand(111,699).'.' .$input['opinionPositiva']->getClientOriginalExtension();
            $input['opinionPositiva']->move("assets/img/empresa/", $opinionPositiva);
            $input['opinionPositiva'] = $opinionPositiva;
        }
        if(isset($input['infoBancaria']))
        {
            $infoBancaria   = time().rand(111,699).'.' .$input['infoBancaria']->getClientOriginalExtension();
            $input['infoBancaria']->move("assets/img/empresa/", $infoBancaria);
            $input['infoBancaria'] = $infoBancaria;
        }

        if(isset($input['constanciaPositiva']))
        {
            $constanciaPositiva   = time().rand(111,699).'.' .$input['constanciaPositiva']->getClientOriginalExtension();
            $input['constanciaPositiva']->move("assets/img/empresa/", $constanciaPositiva);
            $input['constanciaPositiva'] = $constanciaPositiva;
        }
        if(isset($input['cartaAceptacion']))
        {
            $cartaAceptacion   = time().rand(111,699).'.' .$input['cartaAceptacion']->getClientOriginalExtension();
            $input['cartaAceptacion']->move("assets/img/empresa/", $cartaAceptacion);
            $input['cartaAceptacion'] = $cartaAceptacion;
        }

        if(isset($input['listadoProductos']))
        {
            $listadoProductos   = time().rand(111,699).'.' .$input['listadoProductos']->getClientOriginalExtension();
            $input['listadoProductos']->move("assets/img/empresa/", $listadoProductos);
            $input['listadoProductos'] = $listadoProductos;
        }




       $registro->opinionPositiva     = $opinionPositiva;
       $registro->infoBancaria        = $infoBancaria;
       $registro->constanciaPositiva  = $constanciaPositiva;
       $registro->cartaAceptacion     = $cartaAceptacion;
       $registro->listadoProductos    = $listadoProductos;
       $registro->telefono            = $request->telefono;
       $registro->rfc                 = $request->rfc;
       $registro->nombre              = $request->nombre;
       $registro->calle               = $request->calle;
       $registro->numeroCalle         = $request->numeroCalle;
       $registro->colonia             = $request->colonia;
       $registro->cp                  = $request->cp;
       $registro->municipio           = $request->municipio;
       $registro->delegación          = $request->delegación;
       $registro->estado              = $request->estado;
       $registro->pais                = $request->pais;
       $registro->actividadPPal       = $request->actividadPPal;
       $registro->rol                 = 2;
       $registro->save();


       $user = new User;
       $user->name                = $request->nombre;
       $user->email               = $request->email;
       $user->password            = Hash::make($request->password);
       $user->shw_password        = $request->password;
       $user->role = 4 ;  // Rol =4 --> proveedores Empresa
       $user->save();

       Session::flash('mensaje','Registro Exitoso - Pendiente de autorización!');
       Session::flash('class', 'success');
       return back();

    }
}

<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;

use App\Models\Rfc;
use App\Models\User;
use App\Models\Admin;
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

            'email'   => 'required|string|email|unique:users',
            'password'=>'required|confirmed',

        ],
        [
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.'),
            Session::flash('class', 'danger'),
        ]);

        if(isset($input['fotoGafete']))
        {

            $fotoGafete   = time().rand(111,699).'.' .$input['fotoGafete']->getClientOriginalExtension();
            $input['fotoGafete']->move("public/assets/img/fotogafete/", $fotoGafete);
            $input['fotoGafete'] = $fotoGafete;
        }
        if(isset($input['fotoCredencial']))
        {
            $fotoCredencial   = time().rand(111,699).'.' .$input['fotoCredencial']->getClientOriginalExtension();
            $input['fotoCredencial']->move("public/assets/img/fotocredencial/", $fotoCredencial);
            $input['fotoCredencial'] = $fotoCredencial;
        }
        if(isset($input['fotoGafete2']))
        {

            $fotoGafete2   = time().rand(111,699).'.' .$input['fotoGafete2']->getClientOriginalExtension();
            $input['fotoGafete2']->move("public/assets/img/fotogafete/", $fotoGafete2);
            $input['fotoGafete2'] = $fotoGafete2;
        }
        if(isset($input['fotoCredencial2']))
        {
            $fotoCredencial2   = time().rand(111,699).'.' .$input['fotoCredencial2']->getClientOriginalExtension();
            $input['fotoCredencial2']->move("public/assets/img/fotocredencial/", $fotoCredencial2);
            $input['fotoCredencial2'] = $fotoCredencial2;
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
        $user->fotoGafete2       = $fotoGafete2;
        $user->fotoCredencial    = $fotoCredencial;
        $user->fotoCredencial2   = $fotoCredencial2;
        $user->role              = 1; //usuarios empleado de empresa
        $user->status            = 1; // Default status

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


        $para       =  Admin::find(1)->email;
        $asunto     =   'Tienes un nuevo registro de '.$request->name;
        $mensaje    =   "Tienes un mensaje de empresa accede al sistema Cotiz<br />";
        $cabeceras = 'From: '. $request->email . "\r\n";

        $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($para, $asunto, utf8_encode($mensaje), $cabeceras);

        $request->validate([
            'document'=>'required|max:3048',

        ]);


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

       $request->validate([

            'email'   => 'required|string|email|unique:users',
            'password'=>'required|confirmed',
            'opinionPositiva'=>'file|max:3048',
            'infoBancaria'=>'file|max:3048',
            'constFiscal'=>'file|max:3048',
            'domicilioFiscal'=>'file|max:3048',

        ]);

        $input = $request->all();
        $registro   =  new Rfc();

        if(isset($input['opinionPositiva']))
        {
            $opinionPositiva   = time().rand(111,699).'.' .$input['opinionPositiva']->getClientOriginalExtension();
            $input['opinionPositiva']->move("public/assets/img/empresa/", $opinionPositiva);
            $input['opinionPositiva'] = $opinionPositiva;
        }
        if(isset($input['infoBancaria']))
        {
            $infoBancaria   = time().rand(111,699).'.' .$input['infoBancaria']->getClientOriginalExtension();
            $input['infoBancaria']->move("public/assets/img/empresa/", $infoBancaria);
            $input['infoBancaria'] = $infoBancaria;
        }
        if(isset($input['constFiscal']))
        {
            $constFiscal   = time().rand(111,699).'.' .$input['constFiscal']->getClientOriginalExtension();
            $input['constFiscal']->move("public/assets/img/empresa/", $constFiscal);
            $input['constFiscal'] = $constFiscal;
        }
        if(isset($input['domicilioFiscal']))
        {
            $domicilioFiscal   = time().rand(111,699).'.' .$input['domicilioFiscal']->getClientOriginalExtension();
            $input['domicilioFiscal']->move("public/assets/img/empresa/", $domicilioFiscal);
            $input['domicilioFiscal'] = $domicilioFiscal;
        }

        // if(isset($input['numeroPlanta']))
        // {
        //     $numeroPlanta   = time().rand(111,699).'.' .$input['numeroPlanta']->getClientOriginalExtension();
        //     $input['numeroPlanta']->move("public/assets/img/empresa/", $numeroPlanta);
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
       $user->role                = 3 ; // Usuario empresa
       $user->idempresa           = $registro->id;
       $user->rfc                 = $registro->rfc;
       $user->save();


       $para       =  Admin::find(1)->email;
       $asunto     =   'Tienes un nuevo registro de '.$request->nombre;
       $mensaje    =   "Tienes un mensaje, accede al sistema Cotiz<br />";
       $cabeceras = 'From: '. $request->email . "\r\n";

       $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

       $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       mail($para, $asunto, utf8_encode($mensaje), $cabeceras);

       Session::flash('mensaje','Registro Exitoso!');
       Session::flash('class', 'success');
       return back();

    }


    public function storeProveedor(Request $request){


        $request->validate([

            'email'   => 'required|string|email|unique:users',
            'password'=>'required|confirmed',

        ]);



        $input = $request->all();
        $registro   =  new Rfc();

        if(isset($input['opinionPositiva']))
        {
            $opinionPositiva   = time().rand(111,699).'.' .$input['opinionPositiva']->getClientOriginalExtension();
            $input['opinionPositiva']->move("public/assets/img/empresa/", $opinionPositiva);
            $input['opinionPositiva'] = $opinionPositiva;
        }
        if(isset($input['infoBancaria']))
        {
            $infoBancaria   = time().rand(111,699).'.' .$input['infoBancaria']->getClientOriginalExtension();
            $input['infoBancaria']->move("public/assets/img/empresa/", $infoBancaria);
            $input['infoBancaria'] = $infoBancaria;
        }

        if(isset($input['constanciaPositiva']))
        {
            $constanciaPositiva   = time().rand(111,699).'.' .$input['constanciaPositiva']->getClientOriginalExtension();
            $input['constanciaPositiva']->move("public/assets/img/empresa/", $constanciaPositiva);
            $input['constanciaPositiva'] = $constanciaPositiva;
        }
        if(isset($input['cartaAceptacion']))
        {
            $cartaAceptacion   = time().rand(111,699).'.' .$input['cartaAceptacion']->getClientOriginalExtension();
            $input['cartaAceptacion']->move("public/assets/img/empresa/", $cartaAceptacion);
            $input['cartaAceptacion'] = $cartaAceptacion;
        }

        if(isset($input['listadoProductos']))
        {
            $listadoProductos   = time().rand(111,699).'.' .$input['listadoProductos']->getClientOriginalExtension();
            $input['listadoProductos']->move("public/assets/img/empresa/", $listadoProductos);
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
       $user->role                = 4 ;  // Rol =4 --> proveedores Empresa
       $user->idempresa         = $registro->id;
       $user->rfc               = $registro->rfc;
       $user->save();

       $para       =  Admin::find(1)->email;
       $asunto     =   'Tienes un nuevo registro de '.$request->nombre;
       $mensaje    =   "Tienes un mensaje, accede al sistema Cotiz<br />";
       $cabeceras = 'From: '. $request->email . "\r\n";

       $cabeceras .= 'MIME-Version: 1.0' . "\r\n";

       $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       mail($para, $asunto, utf8_encode($mensaje), $cabeceras);

       Session::flash('mensaje','Registro Exitoso - Pendiente de autorización!');
       Session::flash('class', 'success');
       return back();

    }



    public function storeProveedorUser(Request $request){

        $input = $request->all();
        $request->validate([

            'email'   => 'required|string|email|unique:users',
            'password'=>'required|confirmed',

        ],
        [
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.'),
            Session::flash('class', 'danger'),
        ]);

        if(isset($input['fotoGafete']))
        {

            $fotoGafete   = time().rand(111,699).'.' .$input['fotoGafete']->getClientOriginalExtension();
            $input['fotoGafete']->move("public/assets/img/fotogafete/", $fotoGafete);
            $input['fotoGafete'] = $fotoGafete;
        }
        if(isset($input['fotoCredencial']))
        {
            $fotoCredencial   = time().rand(111,699).'.' .$input['fotoCredencial']->getClientOriginalExtension();
            $input['fotoCredencial']->move("public/assets/img/fotocredencial/", $fotoCredencial);
            $input['fotoCredencial'] = $fotoCredencial;
        }


        if(isset($input['fotoGafete2']))
        {

            $fotoGafete2   = time().rand(111,699).'.' .$input['fotoGafete2']->getClientOriginalExtension();
            $input['fotoGafete2']->move("public/assets/img/fotogafete/", $fotoGafete2);
            $input['fotoGafete2'] = $fotoGafete2;
        }
        if(isset($input['fotoCredencial2']))
        {
            $fotoCredencial2   = time().rand(111,699).'.' .$input['fotoCredencial2']->getClientOriginalExtension();
            $input['fotoCredencial2']->move("public/assets/img/fotocredencial/", $fotoCredencial2);
            $input['fotoCredencial2'] = $fotoCredencial2;
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
        $user->fotoGafete2       = $fotoGafete2;
        $user->fotoCredencial    = $fotoCredencial;
        $user->fotoCredencial2    = $fotoCredencial2;
        $user->role              = 5; //Rol para usuarios Proveedor
        $user->status            = 1; // Default status

        $user->calle               = $request->calle;
        $user->numeroCalle         = $request->numeroCalle;
        $user->colonia             = $request->colonia;
        $user->cp                  = $request->cp;
        $user->municipio           = $request->municipio;
        $user->delegación          = $request->delegación;
        $user->estado              = $request->estado;
        $user->country             = $request->country;

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


    //----------------Usuario Prueba--------------

    public function storePrueba(Request $request){

        $input = $request->all();
        $request->validate([

            'email'   => 'required|string|email|unique:users',
            'password'=>'required|confirmed',

        ],
        [
            Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.'),
            Session::flash('class', 'danger'),
        ]);

        if(isset($input['fotoGafete']))
        {

            $fotoGafete   = time().rand(111,699).'.' .$input['fotoGafete']->getClientOriginalExtension();
            $input['fotoGafete']->move("public/assets/img/fotogafete/", $fotoGafete);
            $input['fotoGafete'] = $fotoGafete;
        }
        if(isset($input['fotoCredencial']))
        {
            $fotoCredencial   = time().rand(111,699).'.' .$input['fotoCredencial']->getClientOriginalExtension();
            $input['fotoCredencial']->move("public/assets/img/fotocredencial/", $fotoCredencial);
            $input['fotoCredencial'] = $fotoCredencial;
        }

        if(isset($input['fotoGafete2']))
        {

            $fotoGafete2   = time().rand(111,699).'.' .$input['fotoGafete2']->getClientOriginalExtension();
            $input['fotoGafete2']->move("public/assets/img/fotogafete/", $fotoGafete2);
            $input['fotoGafete2'] = $fotoGafete2;
        }
        if(isset($input['fotoCredencial2']))
        {
            $fotoCredencial2   = time().rand(111,699).'.' .$input['fotoCredencial2']->getClientOriginalExtension();
            $input['fotoCredencial2']->move("public/assets/img/fotocredencial/", $fotoCredencial2);
            $input['fotoCredencial2'] = $fotoCredencial2;
        }

        $user = new User;
        $user->company           = $request->idempresa;
        //$user->idempresa         = $request->idempresa;
        //$user->rfc               = $request->rfc;
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
        $user->fotoGafete2       = $fotoGafete2;
        $user->fotoCredencial    = $fotoCredencial;
        $user->fotoCredencial2    = $fotoCredencial2;
        $user->role              = 2; //usuarios empleado de empresa
        $user->status            = 1; // Default status

        $user->save();


        Session::flash('mensaje','Registro Exitoso - Pendiente de autorización!');
        Session::flash('class', 'success');
        return back();


    }
}

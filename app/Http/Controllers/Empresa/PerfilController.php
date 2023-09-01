<?php

namespace App\Http\Controllers\Empresa;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rfc;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Redirect;

class PerfilController extends Controller
{
    public $folder = "empresa.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::find(User::find(auth()->user()->id))->first();

        // return response()->json(['data' => auth()->guard('admin')->user()]);

        return view($this->folder . 'perfil.profile', [
            'data' => $data,
            'form_url'    => Asset(env('user') . '/empresa/perfil/editar'),
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
        dd('hol');
    }
    public function Actualizar(Request $request)
    {

        $input = $request->all();
        $request->validate(
            [

                //'email'   => 'required|string|email|unique:users',

                'fotoGafete' => 'file|max:3048',
                'fotoCredencial' => 'file|max:3048',
                'fotoGafete2' => 'file|max:3048',
                'fotoCredencial2' => 'file|max:3048',
                'opinionPositiva' => 'file|max:3048',

            ],
            [
                Session::flash('mensaje', 'Hubó un error, por favor, verifica la información.'),
                Session::flash('class', 'danger'),
            ]
        );

        if (isset($input['opinionPositiva'])) {
            $opinionPositiva   = time() . rand(111, 699) . '.' . $input['opinionPositiva']->getClientOriginalExtension();
            $input['opinionPositiva']->move("public/assets/img/empresa/", $opinionPositiva);
            $input['opinionPositiva'] = $opinionPositiva;
        }

        if (isset($input['fotoGafete'])) {

            $fotoGafete   = time() . rand(111, 699) . '.' . $input['fotoGafete']->getClientOriginalExtension();
            $input['fotoGafete']->move("public/assets/img/fotogafete/", $fotoGafete);
            $input['fotoGafete'] = $fotoGafete;
        }
        if (isset($input['fotoCredencial'])) {
            $fotoCredencial   = time() . rand(111, 699) . '.' . $input['fotoCredencial']->getClientOriginalExtension();
            $input['fotoCredencial']->move("public/assets/img/fotocredencial/", $fotoCredencial);
            $input['fotoCredencial'] = $fotoCredencial;
        }
        if (isset($input['fotoGafete2'])) {

            $fotoGafete2   = time() . rand(111, 699) . '.' . $input['fotoGafete2']->getClientOriginalExtension();
            $input['fotoGafete2']->move("public/assets/img/fotogafete/", $fotoGafete2);
            $input['fotoGafete2'] = $fotoGafete2;
        }
        if (isset($input['fotoCredencial2'])) {
            $fotoCredencial2   = time() . rand(111, 699) . '.' . $input['fotoCredencial2']->getClientOriginalExtension();
            $input['fotoCredencial2']->move("public/assets/img/fotocredencial/", $fotoCredencial2);
            $input['fotoCredencial2'] = $fotoCredencial2;
        }

        $user =  User::find($request->id);

        //$user->company           = $request->empresa;
        //$user->idempresa         = $request->empresaid;
        //$user->rfc               = $request->rfc;
        $user->name              = $request->name;
        $user->last_name         = $request->last_name;
        $user->job               = $request->job;
        $user->areaEmpresa       = $request->areaEmpresa;
        $user->telefonoEmpresa   = $request->telefonoEmpresa;
        $user->phone             = $request->phone;
        //$user->email             = $request->email;
        $user->address           = $request->address;

        //$user->fotoGafete        = $fotoGafete;
        //$user->fotoGafete2       = $fotoGafete2;
        //$user->fotoCredencial    = $fotoCredencial;
        //$user->fotoCredencial2   = $fotoCredencial2;
        if (isset($input['password'])) {
            $user->password          = Hash::make($request->password);
            $user->shw_password      = $request->password;
        }

        $user->save();

        if (isset($input['opinionPositiva'])) {
            $registro =  Rfc::find($user->idempresa);
            $registro->opinionPositiva = $opinionPositiva;
            $registro->save();
        }

        Session::flash('mensaje', 'Registro Exitoso ');
        Session::flash('class', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function subAccounts()
    {
        return view($this->folder . 'accounts.index', [
            'accounts' => User::where('idempresa', auth()->user()->idempresa)->get(),
            'admin' => auth()->user()
        ]);
    }

    public function EditsubAccounts($id)
    {
        $admin = User::find($id);

        return view($this->folder . 'accounts.add', [
            'form_url' => Asset(env('user') . '/empresa/EditsubAccount/' . $id),
            'data' => $admin,
            'array' => explode(",", $admin->perm)
        ]);
    }

    public function _EditsubAccount(Request $request, $id)
    {

        $data = $request->all();

        $add             = User::find($id);
        $add->name       = isset($data['name']) ? $data['name'] : null;

        $add->perm       = isset($data['perm']) ? implode(",", $data['perm']) : null;

        if (isset($data['password'])) {
            $add->password      = bcrypt($data['password']);
            $add->shw_password  = $data['password'];
        }

        $add->save();

        return redirect(env('user') . '/empresa/subAccounts')->with('message', 'Cuenta actualizada con éxito.');
    }
}

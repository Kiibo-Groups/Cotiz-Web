<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Redirect;
use Validator;
use Carbon\Carbon;
use App\Models\Rfc;
use App\Models\User;
use App\Models\Admin;
use App\Models\Requests;
use App\Models\Services;
use App\Models\Settings;
use App\Models\Providers;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;
use App\Helpers\StatisticsHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public $folder = "admin.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->guard('admin')->check()) {
            return redirect(env('Admin').'/dash');
        }else {
            return View('auth.login2',[
                'form_url' => Asset(env('admin').'/login')
            ]);
        }
    }

    /*
	|------------------------------------------------------------------
	|Login attempt,check username & password
	|------------------------------------------------------------------
	*/
	public function login(Request $request)
	{
		$username = $request->input('username');
        $password = $request->input('password');
        // return response()->json(['username' => $username, 'password' => $password]);

		if (auth()->guard('admin')->attempt(['username' => $username, 'password' => $password]))
		{
			return Redirect::to(env('admin').'/dash')->with('message', 'Bienvenido(a) ! Estás conectado ahora.');
		}
		else
		{
			return Redirect::to(env('admin').'/login')->with('error', 'username')->withInput(["message", "Credenciales incorrectas."]);
		}
	}

    /**
     * View profile admin to update
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $data = Admin::find(Admin::find(auth()->guard('admin')->user()->id))->first();

        // return response()->json(['data' => auth()->guard('admin')->user()]);

        return view($this->folder.'dashboard.profile', [
            'data' => $data,
            'form_url'	=> Asset(env('admin').'/profile'),
        ]);
    }
    /*
	|------------------------------------------------------------------
	|Homepage, Dashboard
	|------------------------------------------------------------------
	*/
	public function home()
	{


        $status    = auth('admin')->user()->status;

		//$providers = Providers::count();
        $services  = Services::count();
        $users     = Rfc::where('rol',1)->get()->count();
        $providers = Rfc::where('rol',2)->get()->count();
        $requests  = Requests::count();

        $statistics = json_encode([
            'providers' => StatisticsHelper::statisticsCountModel(Rfc::class, function ($query) {
                $query->where('rol', 2);
            }),
            'services' => StatisticsHelper::statisticsCountModel(Services::class),
            'users' => StatisticsHelper::statisticsCountModel(Rfc::class, function ($query) {
                $query->where('rol', 1);
            }),
            'request' => StatisticsHelper::statisticsCountModel(Requests::class)
        ]);

		return View($this->folder.'dashboard.home',[
            'providers' => $providers,
            'services' => $services,
            'users' => $users,
            'requests' => $requests,
            'months' => $statistics,
            'status' => $status
		]);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $data = Settings::find(1);

        return view($this->folder.'dashboard.setting', [
            'data' => $data,
            'form_url' => Asset(env('admin').'/settings'),
            'admin' => auth()->guard('admin')->user()
        ]);
    }

    public function settings_update(Request $request)
    {
        try {
            $input = $request->all();
            $lims_settings_data = Settings::find(1)->first();
            $lims_settings_data->update($input);

            return redirect(env('admin').'/settings')->with('message', 'Configuración actualizada con éxito ...');
        } catch (\Exception $th) {
            return redirect(env('admin').'/settings')->with('error', $th->getMessage());
        }
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
        $image = $request->logo;
        $input = $request->except('logo');
        $lims_profile_data = Admin::find(auth()->guard('admin')->user()->id)->first();

        if ($image) {
            // Verificamos si ya tenia una imagen anterior
            // if ($lims_profile_data->logo != NULL) {
            //     unlink('public/profile/img/logo/'.$lims_profile_data->logo);
            // }

            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = date("Ymdhis");
            $imageName = $imageName . '.' . $ext;
            $image->move('public/profile/img/logo', $imageName);

            $input['logo'] = $imageName;
        }

        if (isset($input['page_settings']) && $input['page_settings'] == 1) {
            if (isset($input['newPassword']) && $input['newPassword'] != '') {
                $input['shw_password'] = $input['newPassword'];
                $input['password'] = bcrypt($input['newPassword']);
            }else {
                $input['shw_password'] = $input['password'];
                $input['password'] = bcrypt($input['password']);
            }
        }

        $lims_profile_data->update($input);

        // return response()->json(['data' => $input,'admin' => $lims_profile_data]);
        return redirect(env('admin').'/profile')->with('message', 'Cuenta actualizada  actualizada con éxito...');
    }


    /**
     * Gestion de SubCuentas de administración
     *
     * @return \Illuminate\Http\Response
     */
    public function subAccounts()
    {
        return view($this->folder.'accounts.index', [
            'accounts' => Admin::get(),
            'admin' => auth()->guard('admin')->user()
        ]);
    }

    public function AddsubAccounts()
    {
        return view($this->folder.'accounts.add', [
            'form_url' => Asset(env('admin').'/AddsubAccount'),
            'data' => new Admin,
            'array' => []
        ]);
    }

    public function AddsubAccount(Request $request)
    {
        $admin = new Admin;

        if($admin->validate($request->all(),'add'))
		{
			return redirect::back()->withErrors($data->validate($request->all(),'add'))->withInput();
			exit;
		}

        $new = $admin->addNew($request->all(),'add');
        return redirect(env('admin').'/subAccounts')->with('message', 'Cuenta agregada con éxito...');
    }

    public function EditsubAccounts($id)
    {
        $admin = Admin::find($id);

        return view($this->folder.'accounts.add', [
            'form_url' => Asset(env('admin').'/EditsubAccount/'.$id),
            'data' => $admin,
            'array' => explode(",", $admin->perm)
        ]);
    }

    public function _EditsubAccount(Request $Request, $id)
    {
        $data = new Admin;

		if($data->validate($Request->all(),$id))
		{
			return redirect::back()->withErrors($data->validate($Request->all(),$id))->withInput();
			exit;
		}

		$data->addNew($Request->all(),$id);

		return redirect(env('admin').'/subAccounts')->with('message','Cuenta actualizada con éxito.');
    }

    public function StatussubAccounts($id)
    {
        $res 			= Admin::find($id);
		$res->status 	= $res->status == 0 ? 1 : 0;
		$res->save();

		return redirect(env('admin').'/subAccounts')->with('message','Status Updated Successfully.');
    }

    /*
	|------------------------------------------------------------------
	|Logout
	|------------------------------------------------------------------
	*/
	public function logout()
	{
		auth()->guard('admin')->logout();

		return Redirect::to(env('admin').'/login')->with('message', 'Logout Successfully !');
	}

       /*
	|------------------------------------------------------------------
	|Empresas
	|------------------------------------------------------------------
	*/

    public function indexEmpresas()
    {
        return view($this->folder.'empresa.index', [
            'requests' => Rfc::where('rol', 1)->orderBy('status', 'desc')->paginate(10)
        ]);
    }

    public function verEmpresasUsuarios($id){

        return view($this->folder.'empresa.usuarios', [
            'data' => User::where('idempresa', $id)->get(),
            'empresa' => Rfc::where('id', $id)->value('nombre')
        ]);

    }
  
  	    public function CashbackEmpresas($id)
    {
        $admin = Rfc::find($id);

        return view($this->folder.'empresa.addcash', [
            'form_url' => Asset(env('admin').'/register/empresas/usuarios/cashback'),
            'data' => $admin,

        ]);
    }

    public function CashbackEmpresasEdict(Request $request)
    {

        $res = Rfc::find($request->id);

		$res->cashback = $request->cashback;
        $res->save();
        return Redirect::to(env('admin').'/empresas')->with('message', 'Elemento Registrado con éxito!');
     
        //return back();


    }

  
    public function EmpresasAgregar()
    {


        $user = auth()->guard('admin')->user()->id;
        $origen = 'admin';
        $providers = Rfc::where('rol', 2)->where('status', 0)->get();

        return view($this->folder . 'empresa.add', [
            'data'      => new Rfc,
            'providers' => $providers,
            'origen'    => $origen,
            'user'      => $user,
        ]);
    }


    public function EmpresasUsuarioAgregar()
    {


        $user = auth()->guard('admin')->user()->id;
        $origen = 'admin';
        $empresas = Rfc::where('rol', 1)->get();

        return view($this->folder . 'empresa.addusuario', [
            'data'      => new Rfc,
            'empresas' => $empresas,
            'origen'    => $origen,
            'user'      => $user,
        ]);
    }





    public function statusEmpresas($id)
    {
        $res = Rfc::find($id);

		$res->status = ($res->status == 0) ? 1 : 0;
        $res->save();
        Session::flash('mensaje','Elemento Editado con éxito!');
        Session::flash('class', 'success');
        return back();

		//return redirect(env('admin').'/empresas')->with('message','Elemento Editado con éxito.');
    }

    public function verEmpresas($id)
    {
        return view($this->folder.'empresa.edit', [
            'data' => Rfc::find($id),
            'form_url' => Asset(env('admin').'/users/update')
        ]);
    }

    public function verFilesEmpresa($id){

       // $arc  = Arbitraje::where('id', $id)->first();
        $rutaDeArchivo = public_path().'/assets/img/empresa/' .$id;
        //dd($rutaDeArchivo);
        return response()->download($rutaDeArchivo, $id);
    }
    public function verFilesGafete($id){

         $fete = User::where('id', $id)->value('fotoGafete');
         $rutaDeArchivo = public_path().'/assets/img/fotogafete/' .$fete;
         return response()->download($rutaDeArchivo, $fete);
     }
      public function verFilesGafete2($id){

        $fete = User::where('id', $id)->value('fotoGafete2');
        $rutaDeArchivo = public_path().'/assets/img/fotogafete/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }

     public function verFilesfotoCredencial($id){
        $fete = User::where('id', $id)->value('fotoCredencial');
        $rutaDeArchivo = public_path().'/assets/img/fotocredencial/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }
    public function verFilesfotoCredencial2($id){
        $fete = User::where('id', $id)->value('fotoCredencial2');
        $rutaDeArchivo = public_path().'/assets/img/fotocredencial/' .$fete;
        return response()->download($rutaDeArchivo, $fete);
    }

    /*
	|------------------------------------------------------------------
	|Empresas - Proveedores
	|------------------------------------------------------------------
	*/

    public function indexEmpresasProveedores()
    {
        return view($this->folder.'empresa_proveedor.index', [
            'requests' => Rfc::where('rol', 2)->orderBy('status', 'desc')->paginate(10)
        ]);
    }

    public function verEmpresasproveedores($id)
    {
        return view($this->folder.'empresa_proveedor.edit', [
            'data' => Rfc::find($id),
            'form_url' => Asset(env('admin').'/users/update')
        ]);
    }

    public function statusEmpresasProveedores($id)
    {
        $res = Rfc::find($id);

		$res->status = ($res->status == 0) ? 1 : 0;
        $res->save();

        Session::flash('mensaje','Elemento Editado con éxito!');
        Session::flash('class', 'success');
        return back();

		//return redirect(env('admin').'/empresas/proveedores')->with('message','Elemento Editado con éxito.');
    }

    public function verEmpresasproveedoresUsuarios($id){

        return view($this->folder.'empresa_proveedor.usuarios', [
            'data' => User::where('idempresa', $id)->get(),
            'empresa' => Rfc::where('id', $id)->value('nombre')
        ]);

    }




}

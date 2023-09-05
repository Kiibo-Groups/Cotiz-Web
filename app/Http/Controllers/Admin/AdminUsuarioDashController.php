<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Redirect;
use App\Models\Rfc;


use App\Models\User;
use App\Models\Admin;
use App\Models\AppUsers;
use App\Models\Providers;
use App\Models\UserAddress;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUsuarioDashController extends Controller
{
    public $folder = "admin.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // return view($this->folder.'users.indexPrueba', [
        //     'data' => User::where('role', 2)->get()
        // ]);


        $search = $request->search;
        $empresa = $request->filter_empresa;

        $requests = User::where('role', 2);


        if($search) {
            $requests = $requests->whereRaw('LOWER(name) LIKE(?)','%'.$search.'%')
                                ->orwhereRaw('LOWER(last_name) LIKE(?)','%'.$search.'%');

        }

        if(!is_null($empresa)) {
            $requests = $requests->whereRaw('LOWER(company) LIKE(?)','%'.$empresa.'%');
        }

        $requests = $requests->paginate(10);

        return view($this->folder.'users.indexPrueba', [
            'data'=> $requests,
            'search'=> $search,
            'empresa'=>$empresa,
            'empresas'=> User::where('role', 2)->where('company', '!=', null)->get('company')
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        // return view($this->folder.'users.indexProveedores', [
        //     'data' => User::whereIn('role', [4, 5])->get()
        // ]);


        $search = $request->search;
        $empresa = $request->filter_empresa;

        $requests = User::whereIn('role', [4,5]);


        if($search) {
            $requests = $requests->whereRaw('LOWER(name) LIKE(?)','%'.$search.'%')
                                ->orwhereRaw('LOWER(last_name) LIKE(?)','%'.$search.'%');

        }

        if(!is_null($empresa)) {
            $requests = $requests->where('idempresa',$empresa);
        }

        $requests = $requests->paginate(10);

        return view($this->folder.'users.indexProveedores', [
            'data'=> $requests,
            'search'=> $search,
            'empresa'=>$empresa,
            'empresas'=> Rfc::where('rol', 2)->get()
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
        dd('ajeeea');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

    }

    /**
     * Change the Status specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {

    }
}

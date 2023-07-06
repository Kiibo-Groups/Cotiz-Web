<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogoController extends Controller
{
    public $folder = "admin.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $search = $request->search;
        $status = $request->filter_status;

        $data = Services::where('type','employe')->with(['provider']);

        if(!is_null($status)) {
            $data = $data->where('status','=', $status);
        }

        if($search) {
            $data = $data->where('title','like','%'.$search.'%')
                        ->orWhereHas('provider', function ($q) use ($search) {
                            $q->where('name','like','%'.$search.'%');
                        });
        }

        $data = $data->paginate(10);



        return view($this->folder.'services.index', [
            'services' => $data,
            'search' => $search,
            'status' => $status,

        ]);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        $search = $request->search;
        $status = $request->filter_status;

        $data = Services::where('type','service')->with(['provider']);

        if(!is_null($status)) {
            $data = $data->where('status','=', $status);
        }

        if($search) {
            $data = $data->where('title','like','%'.$search.'%')
                        ->orWhereHas('provider', function ($q) use ($search) {
                            $q->where('name','like','%'.$search.'%');
                        });
        }

        $data = $data->paginate(10);



        return view($this->folder.'services.index', [
            'services' => $data,
            'search' => $search,
            'status' => $status,

        ]);
    }






}

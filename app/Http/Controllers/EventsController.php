<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Comments;
use App\Models\Events;
use App\Models\AppUsers;

use DB;
use Auth;
use Redirect;

class EventsController extends Controller
{
    private $folder = "pages.events";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // withCount('comments')->with(['comments'])->
        $evts = Events::orderBy('created_at','DESC')->get();

        // return response()->json([ 
        //     'data' => $evts
        // ]);

        return view($this->folder.'.index', [
            'data' => $evts
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function uniqueEvt($id)
    {
        $evts = Events::withCount('comments')->with(['comments'])->where('id',$id)->orderBy('id','DESC')->first();

        if (isset($evts->comments)) {
            // Incorporamos al usuario dentro de cada comentario
            $users = $evts->comments;
            $user  = [];
            foreach ($users as $key => $value) {
                $user = AppUsers::find($value->user_id);
                $users[$key]->user = collect($user)->except(['password','shw_password','level','status','updated_at','created_at']);
            }
        }

        $admin          = Admin::find(1);   

        $similarEvents  = Events::withCount('comments')->with(['comments'])->where('id','!=',$id)->orderBy('id','DESC')->limit(2)->get();
 
        // return response()->json([ 
        //     'admin' => $admin,
        //     'similarEvents' => $similarEvents,
        //     'data' => $evts
        // ]);

        return view($this->folder.'.event',[
            'admin' => $admin,
            'similarEvents' => $similarEvents,
            'data' => $evts
        ]);
    }

    /**
     * Add Comment Event POST.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function comment(Request $request, $id)
    {
        
        try {
            $input = $request->all();
            $input['events_id'] = $id;
            $input['user_id']   = Auth::user()->id; 
            $input['rating']    = 0;
            $input['status']    = 0;
    
            $lims_comments_data = new Comments;
    
            $lims_comments_data->create($input);
           
            return redirect('/event/'.$id.'#comments')->with('message', 'Gracias por tu comentario...');
        } catch (\Exception $th) {
        return Redirect::to('/event/'.$id)->with('error', 'Ha ocurrido un problema al intentar crear el elemento, '.$th->getMessage());
        }
    }
}

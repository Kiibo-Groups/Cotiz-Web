<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use App\Models\Admin;
use App\Models\AppUsers;
use App\Models\Banners;
use App\Models\Comments;
use App\Models\Events;
use App\Models\EventsConfirms;
use App\Models\Providers;
use App\Models\Sections;
use App\Models\Services;
use App\Models\Settings;
use App\Models\User;
use App\Models\Mentors;

use DB;
use Auth;
use Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /* public function index()
    {

        return redirect('/home');

    } */

    public function input_code(Request $request,$id) {

        $input  = [];

        try {
            $request->validate([
                'code' =>'required|min:8',
            ]);

            $code = $request->code;
            $code = str_replace(" ", "", $code);
            $code = str_replace("\"", "", $code);
            $code = str_replace("'", "", $code);
            $code = str_replace("\n", "", $code);
            $code = str_replace("\r", "", $code);
            $code = str_replace("\t", "", $code);
            $code = str_replace("\"", "", $code);
            $code = str_replace("'", "", $code);
            $code = str_replace("\n", "", $code);
            $code = str_replace("\r", "", $code);
            $code = str_replace("\t", "", $code);


            $evnt = Events::find($id);
            if ($evnt) {
                $lims_data_eventsconfirm = new EventsConfirms;

                $input->user_id     = $this->session->user;
                $input->event_id    = $id;
                $input->code        = $code;

                $lims_data_eventsconfirm->create($input);

                return redirect('/home')->with('message', 'Código liberado...');
            }
        } catch (\Exception $th) {
            return Redirect::to('/home')->with('error', 'Ha ocurrido un problema al intentar ingresar el código, '.$th->getMessage());
        }

    }

    public function contact()
    {
        $admin              = Admin::find(1);
        return view('pages.contact', [
            'admin' => $admin,
        ]);
    }

    public function _contact(Request $request)
    {

        $errorMSG = "";

        if (empty($request->get("name"))) {
            $errorMSG = "El nombre es requerido";
        } else {
            $name = $request->get("name");
        }

        if (empty($request->get("surname"))) {
            $errorMSG = "Los Apellidos son requeridos";
        } else {
            $surname = $request->get("surname");
        }

        if (empty($request->get("email"))) {
            $errorMSG = "El Email es requerido";
        } else {
            $email = $request->get("email");
        }

        if (empty($request->get("department"))) {
            $errorMSG = "El departmento es requerido";
        } else {
            $department = $request->get("department");
        }

        if (empty($request->get("message"))) {
            $errorMSG = "El mensaje es requerido";
        } else {
            $message = $request->get("message");
        }

        $EmailTo = Admin::find(1)->shw_email;
        $Subject = "Nuevo mensaje de la página de Engine.mx";

        // prepare email body text
        $Body = "";
        $Body .= "Name: ";
        $Body .= $name;
        $Body .= "\n";

        $Body .= "surname: ";
        $Body .= $surname;
        $Body .= "\n";

        $Body .= "Email: ";
        $Body .= $email;
        $Body .= "\n";

        $Body .= "department: ";
        $Body .= $department;
        $Body .= "\n";

        $Body .= "Message: ";
        $Body .= $message;
        $Body .= "\n";

        // send email
        $success = mail($EmailTo, $Subject, $Body, "From:".$email);

        // redirect to success page
        if ($success && $errorMSG == ""){
            return redirect('/contact#contact')->with('message', 'Mensaje enviado con éxito...');
        }else{
            if($errorMSG == ""){
                return redirect('/contact#contact')->with('error', 'Algo ha ocurrido mal, por favor intente de nuevo mas tarde...');
            } else {
                return redirect('/contact#contact')->with('message', $errorMSG);
            }
        }

    }


    public function call_advice()
    {
        $admin     = Admin::find(1);
        $mentors   = Mentors::where('status',1)->get();
        $text_m    = Sections::where('section',4)->first();

        return view('pages.call_advice', [
            'admin'     => $admin,
            'mentors'   => $mentors,
            'text_m'    => $text_m
        ]);
    }

    public function _call_advice(Request $request)
    {
        $errorMSG = "";

            if (empty($request->get("name"))) {
                $errorMSG = "El nombre es requerido";
            } else {
                $name = $request->get("name");
            }

            if (empty($request->get("email"))) {
                $errorMSG = "El Email es requerido";
            } else {
                $email = $request->get("email");
            }

            if (empty($request->get("date"))) {
                $errorMSG = "La fecha es requerida";
            } else {
                $date = $request->get("date");
            }

            if (empty($request->get("message"))) {
                $errorMSG = "El mensaje es requerido";
            } else {
                $message = $request->get("message");
            }



        $EmailTo = Mentors::find($request->get('mentor_id'))->email;
        $Subject = "Agendación de fecha - Engine.mx";

        // prepare email body text
        $Body = "";
        $Body .= "Nombre: ";
        $Body .= $name;
        $Body .= "\n";

        $Body .= "Email: ";
        $Body .= $email;
        $Body .= "\n";

        $Body .= "Fecha: ";
        $Body .= $date;
        $Body .= "\n";

        $Body .= "Mensaje: ";
        $Body .= $message;
        $Body .= "\n";

        // send email
        $success = mail($EmailTo, $Subject, $Body, "From:".$email);

        // redirect to success page
        if ($success && $errorMSG == ""){
            return redirect('/call_advice#list_mentors')->with('message', 'Mensaje enviado con éxito...');
        }else{
            if($errorMSG == ""){
                return redirect('/call_advice#list_mentors')->with('error', 'Algo ha ocurrido mal, por favor intente de nuevo mas tarde...');
            } else {
                return redirect('/call_advice#list_mentors')->with('message', $errorMSG);
            }
        }
    }
}

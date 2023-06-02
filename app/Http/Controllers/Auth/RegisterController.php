<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Providers;

use Auth;
use Hash;

class RegisterController extends Controller
{
    public function create(){

        return view('auth.register');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:8|confirmed',
            'role'=>'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->shw_password = $request->password;
        $user->role = $request->role;
        $user->save();

        if($request->role == '2'){

            $user_data = User::where('name','like',$request->name)->get();

            $provider = new Providers;
            $provider->name = $user_data[0]->name;
            $provider->email = $user_data[0]->email;
            $provider->user_id = $user_data[0]->id;
            $provider->status = 0; // Default status
            $provider->save();
        }

        auth()->login($user);

        return redirect()->to('/home');


    }
}

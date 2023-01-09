<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login.login');
    }

    public function dashboard(){
        return view('layout.plantilla');
    }

    public function verificalogin(Request $request){
        // return dd($request->all());
        $data=request()->validate([
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese contraseña',
        ]);
        if(Auth::attempt($data))
        {
            $con='ok';
        }
        $name=$request->get('name');
        $query=User::where('name','=',$name)->get();
        if($query->count()!=0){
            $hashp=$query[0]->password;
            $password=$request->get('password');
            if(password_verify($password,$hashp)){
                return redirect()->route('dashboard');
            }
            else{
                return back()->widthErrors(['password'=>'Contraseña no valida'])->widthInput(request(['name','password']));
            }
        }else{
            return back()->withErrors(['name'=>'Usuario no válido']) -> 
            withInput(request(['name']));
        }
    }

    public function profile()
    {
        $user = Auth::user();
        return view('login.profile',compact('user'));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}

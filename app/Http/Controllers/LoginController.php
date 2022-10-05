<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function showLoginAdministrador(){
        if(Auth::guard('administrador')->check()) return redirect(RouteServiceProvider::ADMINISTRADOR_INDEX);
        return view('login::administrador.index');
    }

    public function postLoginAdministrador(Request $request){

        $credentials = $request->only('login', 'senha');

        $validator = Validator::make($credentials,  [
            'login' => 'required',
            'senha' => 'required',
        ],
        [
            'required' => 'Campo :attribute é obrigatório'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $checkCredentials = $this->isValid(Administrador::class, $credentials);

        if(!$checkCredentials['success']){
            return redirect()->back()->withErrors([
                'credentials' => 'Credenciais inválidas. Verifique usuário e senha e tente novamente.'
            ]);
        }

        Auth::guard('administrador')->login($checkCredentials['authUser']);
        return redirect(RouteServiceProvider::ADMINISTRADOR_INDEX);
    }

    public function logoutAdministrador(Request $request){
        Auth::guard('administrador')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.administrador');
    }

    function isValid($model, $credentials){
        $keys = array_keys($credentials);

        $authUser = $model::where($keys[0], $credentials[$keys[0]])->first();

        if(isset($authUser->id) && Hash::check($credentials[$keys[1]], $authUser->senha)){
            return [
                'success' => true,
                'authUser' => $authUser
            ];
        }

        return [
            'success' => false
        ];
    }
}

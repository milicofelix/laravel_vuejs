<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $error = '';

        if($request->get('error') == 1) {
            $error = 'Usuário e ou senha não existe';
        }

        if($request->get('error') == 2) {
            $error = 'Necessario realizar login para ter acesso a página';
        }
        return view('site.login', ['title' => 'Login', 'error' => $error]);
    }
    public function login(Request $request) {
        // $login = $request->all();
        // $data = User::all()->first();

         //regras de validação
         $rules = [
            'user' => 'email',
            'password' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'user.email' => 'O campo usuário (e-mail) é obrigatório',
            'password.required' => 'O campo senha é obrigatório'
        ];

        //se não passar no validate
        $request->validate($rules, $feedback);

         //recuperamos os parâmetros do formulário
         $email = $request->get('user');
         $password = $request->get('password');

         //iniciar o Model User
         $user_obj = new User();

         $user = $user_obj->where('email', $email)
                     ->where('password', $password)
                     ->get()
                     ->first();
 
         if(isset($user->name)) {
 
             session_start();
             $_SESSION['name'] = $user->name;
             $_SESSION['email'] = $user->email;
 
             return redirect()->route('app.clients');
         } else {
             return redirect()->route('site.login', ['error' => 1]);
         }
    }

    public function logoff() {
        session_destroy();
        return redirect()->route('site.index');
    }
}

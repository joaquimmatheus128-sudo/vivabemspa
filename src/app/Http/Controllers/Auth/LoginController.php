<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
// Exibir tela de login
public function index()
{
    return view('auth.login');
}

    // Realizar login
    public function login(Request $request)
    {
        // 1 - Validar dados
        $dados = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Informe seu e-mail.',
            'email.email' => 'Informe um e-mail válido.',
            'password.required' => 'Informe sua senha.',
        ]);

        // Procura o utilizador pelo e-mail e status ativo
        $usuario = \App\Models\Usuario::where('email_usuario', $dados['email'])
                                      ->where('status_usuario', 'ATIVO')
                                      ->first();

        // Verifica se o utilizador existe e se a senha confere (texto plano)
        if ($usuario && $dados['password'] === $usuario->senha_usuario) {

            // Faz o login manual no sistema
            Auth::login($usuario);

            // Segurança: cria uma nova sessão
            $request->session()->regenerate();

            // Redireciona para o dashboard
            return redirect()->intended(route('admin.dashboard'));
        }

        // 3 - Login inválido
        return back()
            ->withErrors([
                'email' => 'E-mail ou senha incorretos.',
            ])
            ->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Logout realizado com sucesso.');
    }
}
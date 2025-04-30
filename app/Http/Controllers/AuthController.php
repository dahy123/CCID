<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
 
    public function login()
    {
        // User::create([
        //     "name"=> "dahy",
        //     "email"=> "dahyoldon@gmail.com",
        //     "password"=> bcrypt("Rdo$2005"),
        // ]);

        return view('auth.login');
    }

    public function toLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redirige vers le tableau de bord
        }else {
            return back()->with('error', 'Les informations de connexion sont incorrectes.');
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth/login');
    }
}
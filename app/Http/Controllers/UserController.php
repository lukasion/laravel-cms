<?php

namespace App\Http\Controllers;

    use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginForm(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            return view('user.logout', compact('user'));
        } else {
            $login   = $request->login ?? '';

            return view('user.login', compact('login'));
        }
    }

    public function login(Request $request)
    {
        $userObj = new User();
        $user    = $userObj->getBy($request->login);
        $login   = $request->login ?? '';

        if ($user && Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            return redirect(route('index'))
                ->with('info', 'Du har logget på systemet.');
        } else {
            return view('user.login', compact('login'));
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            
            return redirect(route('index'))
                ->with('info', 'Du har logget ut av systemet.');
        } else {
            $user = Auth::user();
            
            return view('user.logout', compact('user'));
        }
    }
}

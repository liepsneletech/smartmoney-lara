<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class UserController extends Controller
{
    public function showLogin()
    {
        $pageTitle = 'Prisijungimas';
        $accounts = Account::all();
        return view('back.login', compact('accounts', 'pageTitle'));
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate(
            [
                'email' => ['required'],
                'password' => ['required']
            ],
            [
                'email.required' => 'El. pašto laukelis yra privalomas!',
                'password.required' => 'Slaptažodžio laukelis yra privalomas!',
            ]
        );

        if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return redirect()->route('show-accounts');
        } else {
            return redirect()->back()->with('error-login', 'Neteisingas el.paštas arba slaptažodis!');
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('show-login')->with('success-logout', 'Sėkmingai atsijungėte.');
    }
}
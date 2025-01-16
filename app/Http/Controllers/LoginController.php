<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt(['username' => $request->get('username'), 'password' => 'password'])) {
            $request->session()->regenerate();

            return redirect()->intended(route('index'));
        }

        session()->flash('flash', ['type' => 'error', 'message' => 'Unable to log in.']);

        return redirect()->route('index');
    }
}

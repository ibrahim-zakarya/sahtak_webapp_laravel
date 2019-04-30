<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReCaptchataTestFormRequest;
use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create() {
        return view('registration.create');
    }

    public function store(ReCaptchataTestFormRequest $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'age' => 'required',
            'phone' => 'required',
            'gender' => 'required'
        ]);

        $user = User::create(\request(['name', 'email', 'password', 'gender', 'age', 'phone']));

        auth()->login($user);

        return redirect()->home();
    }
}

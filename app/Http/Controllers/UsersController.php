<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(User $users)
    {
        $users = $users->all();
        return view('dashboard.users', compact('users'));
    }

    public function delete(User $user) {

        $user = $user->delete();
    }

    public function update(User $user) {

        $data = request()->all();
//        dd($data["is_admin"]);
        if ($data["is_admin"] == "true") {
            $user->is_admin = true;
            $user->save();
        } else {
            $user->is_admin = false;
            $user->save();
        }


//        return redirect()->back();
    }

}

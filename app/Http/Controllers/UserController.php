<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Administrators;
use App\Models\AdminUnits;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $users = User::where('user_role', '!=','administrator')->get();
        return view('/users',[
            'users' => $users
        ]);
    }

    public function edit($slug)
    {
        $users = User::where('slug', $slug)->first();
        return view('/user_edit', [
            'users' => $users
        ]);
    }

    public function update_role(Request $request, $slug)
    {
        Validator::make($request->all(), [
            'user_role' => 'required',
        ])->validate();

        $users = User::where('slug', $slug)->first();
        $users->update($request->all());

        return redirect('/users')->with('success', 'Category Updated Successfully');
    }
}

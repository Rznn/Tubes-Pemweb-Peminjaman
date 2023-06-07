<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\AdminUnits;
use app\models\User;

class AdminUnitController extends Controller
{
    public function admin_unit_index()
    {
        $users = User::with(['user_roles' => function($q)
        {
            $q->where('user_role', 'admin_unit');
        }])->get();

        return view('admin_unit_dashboard', [
            'users' => $users,
        ]);
    }

}

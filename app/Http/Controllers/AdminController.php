<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Items;
use App\Models\Categories;
use App\Models\Lists;

class AdminController extends Controller
{
    public function admin_index()
    {
        $users = User::where('user_role', 'administrator')->get();
        $itemCount = Items::count();
        $categoryCount = Categories::count();
        $listCount = Lists::count();

        return view('admin_dashboard', [
            'users' => $users,
            'item_count' => $itemCount,
            'category_count' => $categoryCount,
            'list_count' => $listCount
        ]);
    }
}

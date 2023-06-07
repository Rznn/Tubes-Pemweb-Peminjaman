<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use App\Models\Categories;
use App\Models\Units;
use App\Models\AdminUnits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        $items = Items::all();
        $items = Items::with('categories', 'units', 'admin_units');
        return view('items', [
            'items' => $items
        ]);
    }

    public function add()
    {
        $categories = Categories::all();
        $units = Units::all();
        $admin_units = AdminUnits::all();

        return view('item_add', [
            'categories' => $categories,
            'units' => $units,
            'admin_units' => $admin_units
        ]);
    }

    public function store(Request $request)
    {
        Items::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'category_id' => $request->id,
            'unit_id' => $request->id,
            'description' => $request->description,
            'photo' => $request->photo,
            'admin_unit_id' => $request->id,
        ]);
        return redirect('items')->with('success', 'Items Added Succesfully');
    }
}

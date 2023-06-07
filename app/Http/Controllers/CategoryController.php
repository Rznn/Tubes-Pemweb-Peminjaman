<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categories;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories', [
            'categories' => $categories
        ]);
    }

    public function add()
    {
        return view('category_add');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:categories',
        ])->validate();

        Categories::create($request->all());
        return redirect('categories')->with('success', 'Category Added Successfully');
    }

    public function edit($slug)
    {
        $categories = Categories::where('slug', $slug)->first();
        return view('category_edit', [
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $slug)
    {
        Validator::make($request->all(), [
            'name' => 'required|unique:categories',
        ])->validate();

        $categories = Categories::where('slug', $slug)->first();
        $categories->slug = null;
        $categories->update($request->all());

        return redirect('categories')->with('success', 'Category Updated Successfully');
    }

    public function delete($slug)
    {
        $categories = Categories::where('slug',$slug)->first();

        return view('category_delete', [
            'categories' => $categories
        ]);
    }

    public function destroy($slug)
    {
        $categories = Categories::where('slug',$slug)->first();
        $categories->delete();

        return redirect('categories')->with('success', 'Category Deleted Successfully');
    }

    public function deleted_categories()
    {
        $deletedcategories = Categories::onlyTrashed()->get();
        return view('category_deleted_list', [
            'deletedcategories' => $deletedcategories
        ]);
    }

    public function restore($slug)
    {
        $categories = Categories::withTrashed()->where('slug',$slug)->first();
        $categories->restore();
        return back()->with('success', 'Category Restored Successfully');
    }
}

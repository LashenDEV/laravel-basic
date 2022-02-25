<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function allCat()
    {
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function addCat(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ],
            ['category_name.required' => 'Please Input Category Name'],
            ['category_name.max' => 'Category Must Contain Less Than 255 Characters']
        );

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Category Inserted Successfully');
    }


    public function Edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function Update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }
}

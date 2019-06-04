<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function addCategory(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->description = $data['description'];
            $category->slug = $data['slug']; 
            $category->save();
            return redirect('/admin/view-categories')->with('success_message', 'Category added successfully!');
        }
        return view('admin.categories.add_category');
    }


    public function viewCategories()
    {
        $categories = Category::all();
        return view('admin.categories.view_categories', compact('categories'));
    }
}

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
            $category->parent_id = $data['parent_id'];
            $category->name = $data['category_name'];
            $category->description = $data['description'];
            $category->slug = $data['slug']; 
            $category->save();
            return redirect('/admin/view-categories')->with('success_message', 'Category added successfully!');
        }

        $levels = Category::where('parent_id', 0)->get();

        return view('admin.categories.add_category', compact('levels'));
    }


    public function viewCategories()
    {
        $categories = Category::all();
        return view('admin.categories.view_categories', compact('categories'));
    }


    public function editCategory(Request $request, $id = null) 
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $category = Category::where('id', $id)->update([
                'parent_id' => $data['parent_id'], 
                'name' => $data['category_name'], 
                'description' => $data['description'], 
                'slug' => $data['slug']
            ]); 
            return redirect('/admin/view-categories')->with('success_message', 'Category updated successfully!');
        }

        $categoryDetails = Category::where('id', $id)->first();
        $levels = Category::where('parent_id', 0)->get();

        return view('admin.categories.edit_category', compact('categoryDetails', 'levels'));
    }




    public function deleteCategory($id = null) 
    {
        Category::where('id', $id)->delete();
        return back()->with('success_message', 'Category deleted Successfully!');
    }
}

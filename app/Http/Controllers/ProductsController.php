<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function addProduct(Request $request) 
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (empty($data['category_id'])) {
                return back()->with('error_message', 'Under category is missing!');
            }

            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->name = $data['product_name'];
            $product->slug = $data['product_slug'];
            $product->code = $data['product_code'];
            $product->details = $data['product_details'];
            $product->price = $data['product_price'];
            if (!empty($data['description'])) {
                $product->description = $data['description'];
            } else {
                $product->description = '';
            }
            $product->description = $data['product_description'];
            $product->operating_system = $data['operating_system'];
            $product->quantity = $data['product_quantity'];
            $product->image = '';
            if (!empty($data['yesButton'])) {
                $product->featured = 1;
            } else {
                $product->featured = 0;
            }
            $product->save();
            return back()->with('success_message', 'Product has been added successfully!');
        }

        $categories =  Category::where('parent_id', 0)->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" .$cat->id. "'>" . $cat->name . "</option>";
            $sub_categories = Category::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value='" .$sub_cat->id. "'>&nbsp; --&nbsp;" .$sub_cat->name. "</option>";
            }
        }

        return view('admin.products.add_product', compact('categories_dropdown'));
    }    


}

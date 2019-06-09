<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;

class ProductsController extends Controller
{
    public function addProduct(Request $request) 
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
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
            
            //Upload image
            if ($request->hasFile('image')) {
                $image_tmp = Input::file('image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999). '.' .$extension;
                    $large_image_path = 'images/backend_images/products/large/'.$filename;
                    $medium_image_path = 'images/backend_images/products/medium/'.$filename;
                    $small_image_path = 'images/backend_images/products/small/'.$filename;
                    
                    //Resize images
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600, 600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300, 300)->save($small_image_path);

                    //Store image name in products table
                    $product->image = $filename;

                }
            }

            if (!empty($data['yesButton'])) {
                $product->featured = 1;
            } else {
                $product->featured = 0;
            }
            $product->save();
            return redirect('/admin/view-products')->with('success_message', 'Product has been added successfully!');
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


    public function viewProducts()
    {
        $products = Product::orderBy('id','DESC')->get();
        // $products = json_decode(json_encode($products));
        foreach ($products as $key => $val) {
            $category_name = Category::where(['id' => $val->category_id])->first();
            $products[$key]->category_name = $category_name['name'];
        }
        // echo "<pre>"; print_r($products); die;
        return view('admin.products.view_products', compact('products'));
    }


}

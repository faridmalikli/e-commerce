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

        // Categories drop down start
        $categories =  Category::where('parent_id', 0)->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='" .$cat->id. "'>" . $cat->name . "</option>";
            $sub_categories = Category::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat) {
                $categories_dropdown .= "<option value='" .$sub_cat->id. "'>&nbsp; --&nbsp;" .$sub_cat->name. "</option>";
            }
        }
        // Categories drop down end

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



    public function editProduct(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if (empty($data['category_id'])) {
                return back()->with('error_message', 'Under category is missing!');
            }

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
                }
            } elseif (!empty($data['current_image'])){
                $filename = data['current_image'];
            } else {
                $filename = '';
            }


            Product::where('id', $id)->update([
                'category_id' => $data['category_id'],
                'name' => $data['product_name'],
                'slug' => $data['product_slug'],
                'code' => $data['product_code'],
                'details' => $data['product_details'],
                'price' => $data['product_price'],
                'description' => $data['product_description'],
                'operating_system' => $data['operating_system'],
                'quantity' => $data['product_quantity'],
                'image' => $filename
            ]);
            return back()->with('success_message', 'Product has been updated successfully!');
        }

        // Get product details
        $productDetails = Product::where('id', $id)->first();

        // Categories drop down start
        $categories =  Category::where('parent_id', 0)->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            if ($cat->id == $productDetails->category_id) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $categories_dropdown .= "<option value='" .$cat->id. "' " .$selected. ">" .$cat->name. "</option>";
            $sub_categories = Category::where('parent_id', $cat->id)->get();
            foreach ($sub_categories as $sub_cat) {
                if ($sub_cat->id == $productDetails->category_id) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                $categories_dropdown .= "<option value='" .$sub_cat->id. "' " .$selected. ">&nbsp; --&nbsp;" .$sub_cat->name. "</option>";
            }
        }
        // Categories drop down end

        return view('admin.products.edit_product', compact('categories_dropdown', 'productDetails'));
    }

    

    public function deleteProductImage($id = null) 
    {
        Product::where('id', $id)->update(['image' => '']);
        return back()->with('success_message', 'Product Image has been deleted successfully!');
    }


    public function deleteProduct($id = null)
    {
        Product::where('id', $id)->delete();
        return back()->with('success_message', 'Product has been deleted successfully!');
    }

}

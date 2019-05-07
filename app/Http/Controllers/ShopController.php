<?php

namespace App\Http\Controllers;

use App\Product;

use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->category);
            })->take(12);
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = "Featured";
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } elseif (request()->sort == 'latest') {
            $products = $products->orderBy('id', 'desc')->paginate($pagination);
        } elseif (request()->sort == 'oldest') {
            $products = $products->orderBy('id')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }
        


        return view('shop', compact('products', 'categories', 'categoryName'));
    }



    /**
     * Display the specified resource.
     * 
     * @param string slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $relatedProduct = Product::where('slug', '!=', $slug)->mightAlsoLike()->get();

        return view('product', compact('product', 'relatedProduct'));
    }

}















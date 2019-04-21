<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(12)->get();

        return view('shop', compact('products'));
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















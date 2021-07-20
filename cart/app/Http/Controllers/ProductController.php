<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; //import

use App\Models\Product; //import

class ProductController extends Controller
{
    public function store() {
        $r=request(); //request means received the form data by method get or post
        $image=$r->file('product-image');
        $image->move('images', $image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([
            'name'=>$r->productName,
            'description'=>$r->description,
            'price'=>$r->price,
            'image'=>$imageName,
            'quantity'=>$r->quantity,
            'categoryID'=>$r->categoryID,
        ]);
        Return redirect()->route('viewProduct'); //after insert redirect to view category
    }

    public function view() {
        $product=Product::all(); // apply SQL select * from categories
        Return view('showProduct')->with('products', $product); //filename
    }

    public function viewAll() {
        $product=Product::all(); // apply SQL select * from categories
        Return view('products')->with('products', $product); //filename
    }

    public function searchProduct() {
        $r=request();
        $keyword=$r->keyword;
        $result=DB::table('products')
        ->where('products.name', 'like', '%'.$keyword.'%') //select * from product where name like '%keyword%'
        ->orwhere('products.description', 'like', '%' .$keyword. '%') //select * from product where description like '%keyword%'
        ->get();

        Return view('products')->with('products', $result);
    }
}

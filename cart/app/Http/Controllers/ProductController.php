<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; //import

use App\Models\Product; //import

use Session;

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
        Session::flash('success', "Product added!");
        Return redirect()->route('viewProduct'); //after inserting redirect to view product
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

    public function edit($id) {
        $product=Product::all()->where('id', $id); //select * from products where id='$id'
        Return view('editProduct')->with('products', $product);
    }

    public function update() {
        $r=request();
        $product=Product::find($r->id); //retrive the record based on id
        
        if ($r->file('product-image')!='') {
            $image=$r->file('product-image');
            $image->move('images', $image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $product->image=$imageName; //update product table record
        }

        $product->name=$r->productName;
        $product->description=$r->description;
        $product->price=$r->price;
        $product->quantity=$r->quantity;
        $product->categoryID=$r->categoryID;
        $product->save();
        Session::flash('success', "Product updated successful!");

        Return redirect()->route('viewProduct'); //after updating redirect to view product
    }
}

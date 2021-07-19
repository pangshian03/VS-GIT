<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; //import

use App\Models\Product; //import

class ProductController extends Controller
{
    public function store() {
        $r=request(); //request means received the form data by method get or post
        $addProduct=Product::create([
            'name'=>$r->productName,
            'description'=>$r->description,
            'price'=>$r->price,
            'image'=>'',
            'quantity'=>$r->quantity,
            'categoryID'=>$r->categoryID
        ]);
        Return redirect()->route('viewCategory'); //after insert redirect to view category
    }
}

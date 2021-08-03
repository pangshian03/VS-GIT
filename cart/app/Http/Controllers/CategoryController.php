<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB; //import

use App\Models\Category; //import

class CategoryController extends Controller {
    public function store() {
        $r=request(); //request means received the form data by method get or post
        $addCategory=Category::create([
            'id'=>$r->categoryID,   //'id' is database field name, categoryID is HTML inout name
            'name'=>$r->categoryName,
        ]);
        Return redirect()->route('viewCategory'); //after insert redirect to view category
    }

    public function view() {
        $category=Category::all(); // apply SQL select * from categories
        Return view('showCategory')->with('categories', $category); //filename
    }

    public function index() {
        $category=Category::all(); // apply SQL select * from categories
        Return view('insertCategory')->with('categories', $category); //filename
    }
}
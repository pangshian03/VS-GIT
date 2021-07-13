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
            'name'=>$r->categoryName
        ]);
        Return view('insertCategory');
    }
}
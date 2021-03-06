@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            </br></br></br>
            <h3>Create New Product</h3>
            <form method="POST" , action="{{route('addProduct')}}" enctype="multipart/form-data">
                @CSRF 
                <!--same category name and id only save one time-->
                <div class="form-group">
                    <label for="Category name">Name</label>
                    <input type="text" class="form-control" id="productName" name="productName">
                </div>
                <div class="form-group">
                    <label for="Category description">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="form-group">
                    <label for="Category price">Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="Category image">Image</label>
                    <input type="file" class="form-control" id="product-image" name="product-image">
                </div>
                <div class="form-group">
                    <label for="Category quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="0">
                </div>
                <div class="form-group">
                    <label for="Category ID">Category</label>
                    <select name="categoryID" id="categoryID" class="form-control">
                        @foreach($categoryID as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </br></br></br>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

@endsection
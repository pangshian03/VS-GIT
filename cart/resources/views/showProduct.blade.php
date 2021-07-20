@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-12">
            </br></br></br>
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Product List</h2>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new">
                                <i class="fa fa-plus"></i>
                                Add New
                            </button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td width="10%">
                                <img src="{{asset('images/')}}/{{$product->image}}" width="100" alt=""
                                    class="img-fluid">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->categoryID}}</td>
                            <td>
                                <a class="edit" title="Edit" data-toggle="tooltip">
                                    <i class="material-icons">Edit</i>
                                </a>
                                <a class="delete" title="Delete" data-toggle="tooltip">
                                    <i class="material-icons">Delete</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </br></br></br>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>

@endsection
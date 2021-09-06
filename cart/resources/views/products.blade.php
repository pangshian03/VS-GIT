@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-sm-4">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="card-text">{{$product->description}}</p>
                <a href="{{ route('viewDetail',['id'=>$product->id]) }}">
                    <img src="{{asset('images/')}}/{{$product->image}}" class="img-fluid" alt="">
                </a>
                <div class="card-heading">RM {{$product->price}}</div>
                <a href="{{ route('viewDetail',['id'=>$product->id]) }}">
                    <button class="btn btn-danger btn-xs">Add to cart</button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
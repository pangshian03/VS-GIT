@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            </br></br></br>
            <h3>Create New Category</h3>
            <form method="POST" , action="{{route('addCategory')}}">
                @CSRF
                <!--same category name and id only save one time-->
                <div class="form-group">
                    <label for="Category ID">Category ID</label>
                    <input type="text" class="form-control" id="categoryID">
                </div>

                <div class="form-group">
                    <label for="Category name">Name</label>
                    <input type="text" class="form-control" id="categoryName">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </br></br></br>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

@endsection
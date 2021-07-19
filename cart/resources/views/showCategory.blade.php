@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            </br></br></br>
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Category List</h2>
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
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
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
        <div class="col-sm-3"></div>
    </div>
</div>

@endsection
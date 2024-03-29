@extends('layouts.admin')


@section('content')

<a href ="{{url('add-category')}}" style="hover:pointer;"><button class="btn btn-block">+ Add Category</button></a>

    <div class="card">
        <div class="card-header bg-info">
            <h1>Category Page</h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                    
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                               <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="w-25" alt="Image here">
                            </td>
                            <td>
                                <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div> 
    </div>
    
@endsection
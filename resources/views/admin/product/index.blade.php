@extends('layouts.admin')


@section('content')

<a href ="{{url('add-product')}}" style="hover:pointer;"><button class="btn btn-block">+ Add product</button></a>

    <div class="card">
        <div class="card-header">
            <h1>Product Page</h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                    
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->description}}</td>
                            <td><del class="text-danger"><p class="text-danger">{{$item->original_price}}</p><del></td>
                            <td>{{$item->selling_price}}</td>
                            <td>
                                <img src="{{asset('assets/uploads/products/'.$item->image)}}" class="w-25" alt="Image here">
                            </td>
                            <td>
                                <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>

        </div> 
    </div>
    
@endsection
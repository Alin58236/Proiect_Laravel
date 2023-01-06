@extends('layouts.admin')

@section('content')
    
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="row">
                

                <div class="col-md-6 mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="{{$products->name}}" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" value="{{$products->slug}}" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description</label>
                    <textarea name="small_description" rows="3"  class="form-control">{{$products->small_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="3"  class="form-control">{{$products->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Original Price</label>
                    <input type="number" class="form-control" value="{{$products->original_price}}" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Selling Price</label>
                    <input type="number" class="form-control" value="{{$products->selling_price}}" name="selling_price">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" value="{{$products->qty}}" name="qty">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{$products->status ? 'checked' : ''}} name="status">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{$products->trending ? 'checked' : ''}} name="trending">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" value="{{$products->meta_title}}" name="meta_title">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3"  class="form-control">{{$products->meta_keywords}}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3"  class="form-control">{{$products->meta_description}}</textarea>
                </div>
                @if ($products->image)
                    <img src="{{asset('assets/uploads/products/'.$products->image) }}" alt="">
                @endif
                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            
        </form>

    </div>
</div>

@endsection
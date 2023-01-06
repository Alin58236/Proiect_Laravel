@extends('layouts.front')

@section('title')
    Cart
@endsection

@section('content')

    <div class="container my-5">
        <div class="card shadow product_data">
            <div class="card-body">
                @foreach ($cartitems as $item)

                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" alt="Image here">
                        </div>
                        <div class="col-md-2">
                            <h6>{{$item->products->name}}</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>$ {{$item->products->selling_price}}</h6>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</h3>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection



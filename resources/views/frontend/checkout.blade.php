@extends('layouts.front')

@section('title')
   Checkout
@endsection

@section('content')



    <div class="container mt-5">
        <form action="{{url('place-order')}}" method="POST">
             {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for=""> First Name </label>
                                <input type="text" class="form-control" name="fname" value=" {{Auth::user()->fname}} " placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Last Name </label>
                                <input type="text" class="form-control" name="lname" value=" {{Auth::user()->lname}} " placeholder="Enter Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Email </label>
                                <input type="text" class="form-control" name="email" value=" {{Auth::user()->email}} " placeholder="Enter Email">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Phone </label>
                                <input type="text" class="form-control" name="phone" value=" {{Auth::user()->phone}} " placeholder="Enter Number">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Address 1 </label>
                                <input type="text" class="form-control" name="address1" value=" {{Auth::user()->address1}} " placeholder="Enter Address 1">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Address 2 </label>
                                <input type="text" class="form-control" name="address2" value=" {{Auth::user()->address2}} " placeholder="Enter Address 2">
                            </div>
                            <div class="col-md-6">
                                <label for=""> City </label>
                                <input type="text" class="form-control" name="city" value=" {{Auth::user()->city}} " placeholder="Enter City">
                            </div>
                            <div class="col-md-6">
                                <label for=""> State </label>
                                <input type="text" class="form-control" name="state" value=" {{Auth::user()->state}} " placeholder="Enter State">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Country </label>
                                <input type="text" class="form-control" name="country" value=" {{Auth::user()->country}} " placeholder="Enter Country">
                            </div>
                            <div class="col-md-6">
                                <label for=""> Zip Code </label>
                                <input type="text" class="form-control" name="zipcode" value=" {{Auth::user()->zipcode}} " placeholder="Enter Zip Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                @foreach ($cartitems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->prod_qty}}</td>
                                        <td>{{$item->products->selling_price}}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>



@endsection


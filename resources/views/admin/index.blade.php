@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')


                <div class="card">
                    <div class="card-header bg-info">
                        <h4>Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking No.</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($item->created_at))}}</td>
                                        <td>{{ $item->tracking_no}}</td>
                                        <td>{{ $item->total_price}}</td>
                                        <td>{{ $item->status== '0' ? 'pending' : 'complete'}}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

@endsection
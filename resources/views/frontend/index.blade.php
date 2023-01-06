@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')

    @include('layouts.inc.slider')
    
    
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    
                    @foreach ($featured_products as $prod)

                        <div class="item">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/'.$prod->image)}}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{$prod->name}}</h5>
                                    <small class="float-left">{{$prod->selling_price}} RON</small>
                                    
                                </div>
                            </div>
                        </div>
                
                    @endforeach
                </div>
                
                
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Categories</h2>
                <div class="owl-carousel featured-category owl-theme">
                    
                    @foreach ($trending_category as $cate)

                        <div class="item">
                            <a href="{{url('view-category/'.$cate->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/'.$cate->image)}}" alt="Category Image">
                                <div class="card-body">
                                    <h5>{{$cate->name}}</h5>
                                    <small >{{$cate->description}}</small> 
                                </div>
                            </div>
                        </a>
                        </div>
                
                    @endforeach
                </div>
                
                
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
    loop:true,
    margin:2,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:7
        }
    }
})
    </script>
    <script>
        $('.featured-category').owlCarousel({
    loop:true,
    margin:2,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
    </script>
@endsection
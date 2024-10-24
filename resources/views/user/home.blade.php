@extends('user.layout')

@section('latest')
    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                        <form action="{{ url('search') }}" method="get">
                            <input type="text" name="key" value="{{ old('key') }}" class="form-control">
                            <button type="submit" class="btn btn-info mt-2">Search</button>
                        </form>
                    </div>
                </div>
                @foreach ($products as $product)
                    <div class="col-md-3">
                        <div class="product-item">
                            <a href="{{ url("/products/$product->id") }}"><img src="{{ asset("storage/$product->image") }}"
                                    alt=""></a>
                            <div class="down-content">
                                <a href="{{ url("products/$product->id") }}">
                                    <h4>{{ $product->name }}</h4>
                                </a>
                                <h6>{{ $product->price }}$</h6>

                                {{-- <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (24)</span> --}}
                                @auth
                                    <form action="{{ url("addToFav/$product->id") }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-wight" style="cursor: pointer; background: none;">

                                            @if ($product->isFavorite())
                                                <div class="fa-solid fa-heart fa-xl text-danger"></div>
                                            @else
                                                <div class="fa-solid fa-heart fa-xl text-secondary"></div>
                                                @endif
                                        </button>
                    
                    </form>
                @endauth
            </div>
            <div class="d-flex justify-content-between">

                @auth
                    <form action="{{ url("addToCart/$product->id") }}" method="post">
                        @csrf
                        <input type="number" name="qty" value="1" style="width: 100px">
                        <button type="submit" class="bg-success" style="cursor: pointer"><i
                                class="fa-solid fa-cart-plus text-light"></i></button>
                    </form>
                @endauth
                <br />
                <form action="{{ url("addToWishlist/$product->id") }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary" style="cursor: pointer,"><i
                            class="fa-regular fa-heart"></i></button>
                </form>
            </div>

        </div>
    </div>
    @endforeach


    </div>
    </div>
    </div>
@endsection

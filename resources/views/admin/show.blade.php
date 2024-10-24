@extends('admin.layout');
@section('content')

  @if (session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
  @endif
    
<br /><br />
  name: {{ $product->name}}<br />
  desc: {{ $product->desc}}<br />
  price: {{ $product->price}}$<br />
  quantity: {{ $product->quantity}}<br />
  category: {{ $product->category->name}}
  <hr />
  <img src="{{asset("storage/$product->image")}}" width="100px" height="100px" alt="" srcset="">
@endsection
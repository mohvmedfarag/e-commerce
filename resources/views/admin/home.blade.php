@extends('admin.layout');
@section('content')
<div class="table-responsive">
  @if (session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
  @endif
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>@lang('message.name')</th>
                <th>@lang('message.price')</th>
                <th>@lang('message.image')</th>
                <th>@lang('message.quantity')</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
      <tbody>
        @foreach ($products as $product)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td>{{$product->name}}</td>
            <td class="text-right"> {{$product->price}}$ </td>
            <td class="text-right font-weight-medium"> <img src="{{asset("storage/$product->image")}}" alt=""> </td>
            <td class="text-right font-weight-medium"> {{$product->quantity}} </td>
            <td>
              <h1>
                  <a class="btn btn-info" href="{{url("products/show/$product->id")}}" >@lang('message.show')</a>
              </h1>
          </td>
            <td>
                <form action="{{url("products/$product->id")}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">@lang('message.delete')</button>
                </form>
            </td>
            <td>
                <h1>
                    <a class="btn btn-success" href="{{url("products/edit/$product->id")}}" >@lang('message.edit')</a>
                </h1>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{-- {{ $products->links() }} --}}
  </div>
@endsection
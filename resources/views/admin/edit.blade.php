@extends('admin.layout');
@section('content')

<form method="POST" action="{{route('update', $product->id)}}" enctype="multipart/form-data">

    @csrf
    @method('PUT')
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" value="{{ $product->name }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
      @error('name')
        {{$message}}
      @enderror
      <br />
    
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" value="{{ $product->desc }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc"></textarea>
        @error('desc')
        {{$message}}
      @enderror
      <br />
      
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
        @error('price')
        {{$message}}
      @enderror
      <br />
      
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
        @error('quantity')
        {{$message}}
      @enderror

      <br />
        <label for="exampleInputEmail1">product image</label>
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        @error('image')
        {{$message}}
      @enderror
      <img src="{{asset("storage/$product->image")}}" width="80px" height="80px" alt="" srcset="">
      <br />
      <label for="exampleInputEmail1">product category</label>: 
      <select name="category_id" id="">
        <option value="{{$product->category_id}}">{{$product->category->name}}</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    @error('category_id')
        {{$message}}
      @enderror
    <br /> <br />
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
    

  @endsection
@extends('admin.layout');
@section('content')

<form method="POST" action="{{url('products')}}" enctype="multipart/form-data">

    @csrf
    
      <label for="exampleInputEmail1">product Name</label>
      <input type="text" name="name" value="{{ old('name') }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
      @error('name')
        {{$message}}
      @enderror
      <br />
    
        <label for="exampleInputEmail1">product desc</label>
        <textarea type="text" name="desc" value="{{ old('desc') }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter desc"></textarea>
        @error('desc')
        {{$message}}
      @enderror
      <br />
      
        <label for="exampleInputEmail1">product Price</label>
        <input type="number" name="price" value="{{ old('price') }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price">
        @error('price')
        {{$message}}
      @enderror
      <br />
      
        <label for="exampleInputEmail1">product quantity</label>
        <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity">
        @error('quantity')
        {{$message}}
      @enderror

      <br />
        <label for="exampleInputEmail1">product image</label>
        <input type="file" name="image" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter image">
        @error('image')
        {{$message}}
      @enderror
      <br />
      <label for="exampleInputEmail1">product category</label>: 
      <select name="category_id" id="">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    @error('category_id')
        {{$message}}
      @enderror
    <br /> <br />
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    

  @endsection
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>




    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div>
            <a class="navbar-brand text-danger" href="{{url("")}}">Logo</a>
          </div>
            
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" width="100px">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url("")}}">Home</a>
                    </li>
                    
                    
                    {{-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> --}}
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
      @if (! $cart)
        There is no cart available!
      @else
      @foreach ($cart as $id=>$product)
      <div class="row d-flex justify-content-between">

        <div class="card" style="width: 20rem;">
          <img src="{{asset("storage/{$product['image']}")}}" width="300px" class="card-img-top" alt="...">
        </div>
        <div class="" style="width: 50rem;">
          <div class="">
            <h5 class="">{{$product['name']}}</h5>
            <h5 class="">Price: {{$product['price']}}$</h5>
            <h5 class="">Quantity: {{$product['qty']}}</h5>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
          </div>
        </div>
      </div>
      <hr />
      @endforeach
      <form action="{{url('makeOrder')}}" method="post">
        @csrf
        <button type="submit">Make Order</button>
      </form>
      @endif
      

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>

<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html"><h2>@lang("message.e-commerce")</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">@lang("message.home")
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{url('myCart')}}">@lang("message.myCart")</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('wishlist')}}">@lang("message.wishlist")</a>
            </li>
            
            @if (session()->has("lang") and session()->get("lang") == "ar")
            <li class="nav-item">
              <a class="nav-link" href="{{url("change/en")}}">English</a>
            </li>
            @else
            <li class="nav-item">
              <a class="nav-link" href="{{url("change/ar")}}">العربية</a>
            </li>
            @endif
            @guest
              
            <li class="nav-item">
              <a class="nav-link" href="{{url("dashboard")}}">@lang("message.login")</a>
            </li>
            @endguest
            @auth
              
            <li class="nav-item">
              <a class="nav-link" href="{{url("dashboard")}}">@lang("message.logout")</a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
  </header>
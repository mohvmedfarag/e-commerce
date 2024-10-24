<!DOCTYPE html>
<html lang="{{__("message.lang")}}">

  @include('user.head')

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    @include('user.header')

    <!-- Banner Starts Here -->
    @include('user.slider')

    <!-- latest products -->
    {{-- @include('user.latest') --}}
    @yield('latest')

    {{-- @include('user.body') --}}

    
    @include('user.footer')


    
    @include('user.scripts')

  </body>

</html>

@include('admin.head')
  <body>
    <div class="container-scroller">

      @include('admin.banner')

      @include('admin.sidebar')
      
      <div class="container-fluid page-body-wrapper">

        @include('admin.nav')
        
        <div class="main-panel">
          <div class="content-wrapper">

            {{-- @include('admin.body') --}}
            @yield('content')

          </div>
          <!-- content-wrapper ends -->

          @include('admin.footer')


        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
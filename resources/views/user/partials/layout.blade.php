@include('user.partials.header')

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

    <!-- Header -->
   @include('user.partials.nav')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
      
        @yield('content1')
      
    
@include('user.partials.footer')
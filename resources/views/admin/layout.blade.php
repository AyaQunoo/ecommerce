
@include('admin.header')
<body>
  <div class="container-scroller">
   @include('admin.banner')
    <!-- partial:partials/_sidebar.html -->
    @include("admin.sidebar")
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      @include("admin.nav")
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('body')
           
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
   @include("admin.footer")
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@include("admin.scripts")
</body>

</html>
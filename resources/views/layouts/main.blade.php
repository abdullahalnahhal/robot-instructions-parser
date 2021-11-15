<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
  <div class="container-scroller">
    @include('layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

    @include('layouts.foot')
</body>

</html>

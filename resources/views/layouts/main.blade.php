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

            @if($errors->any())
                @foreach ( $errors->all() as $error)
                <div class="alert alert-danger mt-5" role="alert">
                    <div class='row'>
                        {{ __($error) }}
                    </div>
                </div>
                @endforeach
            @endif

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

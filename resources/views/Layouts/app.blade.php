<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/logos/dataset-leaf.png')}}">
  <title>
    Plants Dataset
  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="{{asset('assets/fontawesome/css/all.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
  <link href="{{asset('assets/fontawesome/css/brands.css')}}" rel="stylesheet">
  <link href="{{asset('assets/fontawesome/css/solid.css')}}" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/css/soft-ui-dashboard.css')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{asset('assets/css/modified-dashboard.css')}}" rel="stylesheet" />
  <!-- Tags Input -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- International Tel Input -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.8/css/intlTelInput.css">
  <!-- AOS - Animate On Scroll -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  
  <style>
    /* Custom CSS for making the col-9 scrollable */
    .col-9 .card {
      height: 580px;
    }
    
    .col-9 .card-body {
      height: 500px; /* Set a desired height for the scrollable area */
      overflow-y: auto;
    }

    .col-9 .card-body .card {
      height: 420px;
    }

    .col-lg-12 .card-body .card {
      height: 500px;
    }

    .col-lg-12 .card-body .card .btn {
      padding: 10px 20px;
    }
  </style>
</head>

<body class="offline-doc">
  
  @yield('auth')

  @yield('guest')

  @if(session()->has('success'))
  <div x-data="{ show: true}"
      x-init="setTimeout(() => show = false, 4000)"
      x-show="show"
      class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
    <p class="m-0">{{ session('success')}}</p>
  </div>
  @endif 

  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  {{-- <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script> --}}
  <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <!-- Tags Input -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- International Tel Input -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.8/js/intlTelInput.min.js"></script>
  
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/soft-ui-dashboard.min.js?v=1.0.6')}}"></script>
  <!-- AOS - Animate On Scroll -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- Google Drive Oauth2 -->
  <script src="{{asset('assets/js/script.js')}}"></script>
</body>

<script>
  const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
    utilsScript :
      "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
  });
</script>

{{-- <script>
  function viewFile(fileUrlWithDatasetId) {
    // Split fileUrlWithDatasetId to get fileUrl and datasetId
    const [fileUrl, datasetId] = fileUrlWithDatasetId.split(', ');

    // Update the 'src' attribute of the image with the clicked fileUrl
    document.getElementById('image').src = fileUrl;

    // Set the selectedDatasetId to the datasetId of the clicked file
    selectedDatasetId = datasetId;

    // Set the form action dynamically based on the datasetId
    const form = document.getElementById('updateForm');
    const baseUrl = "{{ url('/view-project/update-label/') }}"; // Set the base URL for the action
    form.action = baseUrl + selectedDatasetId;

    // Toggle classes for col-9 and col-3
    const col3Div = document.getElementById('col3Div');

    // Check if the col3Div is hidden before toggling visibility
    if (col3Div.classList.contains('d-none')) {
        const col9Div = document.getElementById('col9Div');
        col9Div.classList.toggle('col-lg-12');
        col3Div.classList.toggle('d-none');
    }
  }


  function closeView() {
    // Reset the 'src' attribute of the image
    document.getElementById('image').src = '';

    // Toggle classes for col-9 and col-3
    const col9Div = document.getElementById('col9Div');
    const col3Div = document.getElementById('col3Div');

    col9Div.classList.toggle('col-lg-12');
    col3Div.classList.toggle('d-none');
  }
</script> --}}

{{-- Add People Action or Collaboration --}}
@yield('scripts')

</html>
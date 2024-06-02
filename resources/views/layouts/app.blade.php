<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pempek Elly | Aneka Olahan Ikan</title>
  <link href="assets/landing/img/gallery/home.png" rel="icon">
  <link href="assets/landing/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="../assets/css/style-orange.min.css" />
  <link rel="stylesheet" href="../assets/libs/apexcharts/dist/apexcharts.css" />

  
</head>

<body>

  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">

  @include('layouts.dashboard.sidebar')


  <div class="body-wrapper">

    @include('layouts.dashboard.header')

    
    <div class="container-fluid">
    @yield('content')

  </div>
  </div>



    </div>



    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/aos.js"></script>
  </body>
  
  </html>
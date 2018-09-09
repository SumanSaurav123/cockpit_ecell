<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Cockpit | KIIT ECELL</title>
  <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('css/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendors/css/vendor.bundle.base.css')}}" />
    <link rel="stylesheet" href="{{asset('css/vendors/css/vendor.bundle.addons.css')}}" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    
    <link rel="shortcut icon" href="./images/favicon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
  <div class="container-scroller">
    
    @include('Cockpit/inc.NavPage')
    
    @yield('dashboard')

    @include

    @yield('content')
    
    @include('Cockpit/inc.FooterPage')

</html>
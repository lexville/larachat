<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/css/bootstrap-material-design.min.css">
        <link rel="stylesheet" href="/css/ripples.min.css">
        <link rel="stylesheet" href="/css/sweetalert.css" />
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
        @include('includes.header')
        <div class="container">
            @yield('content')
        </div>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/sweetalert.min.js"></script>
        <script src="/js/ripples.min.js"></script>
        <script src="/js/material.min.js"></script>
        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
            });
            @if (Session::has('sweet_alert.alert'))
              swal({
                  text: "{!! Session::get('sweet_alert.text') !!}",
                  title: "{!! Session::get('sweet_alert.title') !!}",
                  timer: 1800,
                  type: "{!! Session::get('sweet_alert.type') !!}",
                  showConfirmButton: "{!! Session::get('sweet_alert.showConfirmButton') !!}",
                  confirmButtonText: "{!! Session::get('sweet_alert.confirmButtonText') !!}",
                  confirmButtonColor: "#AEDEF4"
              });
            @endif
        </script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DustinHoang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="{{asset('client/img/favicon.ico')}}" rel="icoasset()">

    <!-- Google Web Fonts -->
    <link rel=" preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('client/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('client/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('client/css/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet">

{{--    <style>--}}
{{--        .nav-item nav-link active{--}}
{{--            --}}
{{--        }--}}
{{--    </style>--}}
</head>

<body>
<!-- Topbar Start -->
@include('client.layout.topbar')
<!-- Topbar End -->


<!-- Navbar Start -->
@include('client.layout.navbar')
<!-- Navbar End -->


<!-- Carousel Start -->
@yield('content')
<!-- Vendor End -->


<!-- Footer Start -->
@include('client.layout.footer')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('client/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('client/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('client/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('client/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('client/js/main.js')}}"></script>
<script src="{{asset('client/js/custom.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('script')
</body>

</html>

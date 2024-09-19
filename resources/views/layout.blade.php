<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Estate Listing</title>

    <style>




    </style>


    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/agentModal.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/createListing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/listingsSection.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/singleListing.css')}}">

    <script src="https://unpkg.com/htmx.org@2.0.2"
            integrity="sha384-Y7hw+L/jvKeWIRRkqWYfPcvVxHzVzn5REgzbawhxAuQGwX1XWe70vji+VSeHOThJ"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>


</head>
<div id="htmxerrors"></div>
<body style=" display: flex; flex-direction: column;justify-content: center;align-items: center;">


<header>
    <a href="{{route('real-estates.index')}}">
        <img src="{{asset('assets/img/LOGO-02 3.png')}}" alt="">
    </a>
</header>



@yield('index')

@yield('add-listing')
@yield('singleListing')
@include('components.agentmodal')



@if(session()->has('alert_error'))
    <script>
        Swal.fire({
                icon: 'error',
                showConfirmButton: false,
                timer: 1800,
                text: '{{session()->get('alert_error')}}',
            },
        )
    </script>
    @php
        session()->forget('alert_error');
    @endphp
@endif
@if(session()->has('alert_success'))
    <script>
        Swal.fire({
                icon: 'success',
                showConfirmButton: false,
                timer: 1800,
                text: '{{session()->get('alert_success')}}',
            },
        )
    </script>
    @php
        session()->forget('alert_success');
    @endphp
@endif


@if(request()->routeIs('real-estates.index'))

    <script src="{{asset('assets/js/dropdown.js')}}"></script>
    <script src="{{asset('assets/js/searchSelection.js')}}"></script>


@endif



@if(request()->routeIs('real-estates.create'))
    <script src="{{asset('assets/js/listingValidation.js')}}"></script>
    <script src="{{asset('assets/js/agentdropdow.js')}}"></script>
    <script src="{{asset('assets/js/listingSaveOnRefresh.js')}}"></script>
@endif
<script src="{{asset('assets/js/custom-htmx.js')}}"></script>

@if(request()->routeIs('real-estates.show'))
<script src="{{asset('assets/js/slider.js')}}"></script>
@endif

@if(!request()->routeIs('real-estates.show'))
<script src="{{asset('assets/js/imageUpload.js')}}"></script>
<script src="{{asset('assets/js/agentModal.js')}}"></script>
@endif


</body>

</html>
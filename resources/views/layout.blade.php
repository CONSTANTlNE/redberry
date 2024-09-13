<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Estate Listing</title>

    <style>

        * {
            box-sizing: border-box;
        }

        html {
            max-width: 1920px;

        }

        header {
            width: 80%;
            margin-top: 32px;
            margin-bottom: 77px;
        }

        label {
            cursor: pointer;
        }


        .top-buttons-wrapper {
            height: 47px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .listing-button {
            all: unset;
            background: #F93B1D;
            border: 1px #F93B1D;
            color: white;
            border-radius: 10px;
            padding: 10px 16px 10px 16px;
            cursor: pointer;
        }

        .agent-button {
            border-radius: 10px;
            color: #F93B1D;
            border: 1px solid #F93B1D;
            background: white;
            padding: 10px 16px 10px 16px;
            cursor: pointer;
        }

        .listing-button:hover {
            border-radius: 10px;
            background: #DF3014;
        }

        .agent-button:hover {
            border-radius: 10px;
            border: 1px solid #F93B1D;
            background: #F93B1D;
            color: #FFF;
        }

        /*Listing Grid */


        .listing-section {
            margin-top: 32px;
            display: flex;
            max-width: 1596px;
            padding-bottom: 300px;
            align-items: center;
            align-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .listing-item {
            display: flex;
            width: 384px;
            flex-direction: column;
            align-items: flex-start;
            flex-shrink: 0;
            box-shadow: 5px 5px 12px 0 rgba(2, 21, 38, 0.08);
        }

        .listing-item img {
            height: 307px;
            align-self: stretch;
            border-radius: 14px 14px 0 0;
            background: lightgray 50% / cover no-repeat;
        }

    </style>

    <link rel="stylesheet" href="{{asset('assets/css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/agentModal.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/createListing.css')}}">
    <script src="https://unpkg.com/htmx.org@2.0.2" integrity="sha384-Y7hw+L/jvKeWIRRkqWYfPcvVxHzVzn5REgzbawhxAuQGwX1XWe70vji+VSeHOThJ" crossorigin="anonymous"></script>

</head>
<body style="display: flex; flex-direction: column;justify-content: center;align-items: center;">


<header>
    <a href="{{route('real-estates.index')}}">
    <img src="{{asset('assets/img/LOGO-02 3.png')}}" alt="">
    </a>
</header>




@yield('index')
@yield('add-listing')

@include('components.agentmodal')

@if(request()->routeIs('real-estates.index'))
<script src="{{asset('assets/js/dropdown.js')}}"></script>
<script src="{{asset('assets/js/searchSelection.js')}}"></script>
<script src="{{asset('assets/js/agentModal.js')}}"></script>
@endif
<script src="{{asset('assets/js/imageUpload.js')}}"></script>
<script src="{{asset('assets/js/listingValidation.js')}}"></script>


</body>
</html>
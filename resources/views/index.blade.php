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
    <link rel="stylesheet" href="{{asset('assets/css/createRealEstate.css')}}">

</head>
<body style="display: flex; flex-direction: column;justify-content: center;align-items: center;">


<header>
    <img src="{{asset('assets/img/LOGO-02 3.png')}}" alt="">
</header>

<main style="width: 80%;">
    <div>
        <div class="top-wrapper">
            <div class="select-wrapper">
                <button type="button" class="select-btn select-btn-color" id="region_dropdown_btn">
                    <span>რეგიონი</span>
                    <svg id="region_svg" class="arrow-svg arrow-toggle" xmlns="http://www.w3.org/2000/svg" width="14"
                         height="15" viewBox="0 0 14 15"
                         fill="none">
                        <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                              fill="#021526"/>
                    </svg>
                    <div class="region-dropdown hidden" id="region_dropdown">
                        <p class="dropdown-name">რეგიონის მიხედვით</p>
                        <div class="region-items">
                            @foreach($regions as $index => $region)
                                <div class="region">
                                    <input id="region{{$index}}" data-name="{{$region['name']}}"
                                           class="dropdown-checkbox regions-checkbox" value="{{$region['id']}}"
                                           type="checkbox">
                                    <label class="region-labels" for="region{{$index}}">{{$region['name']}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div style="margin-top:32px" class="select-btn-container">
                            <span id="select-region" class="select-price-btn">არჩევა</span>
                        </div>
                    </div>
                </button>
                {{--Price Range--}}
                <button type="button" class="select-btn select-btn-color inline-btn">
                    <span>საფასო კატეგორია</span>
                    <svg class="arrow-svg arrow-toggle inline-svg" xmlns="http://www.w3.org/2000/svg" width="14"
                         height="15" viewBox="0 0 14 15"
                         fill="none">
                        <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                              fill="#021526"/>
                    </svg>

                    <div class="inline-dropdown hidden">
                        <div class="price-range-wrapper">
                            <p class="dropdown-name">ფასის მიხედვით</p>
                            <div class="range">
                                <div class="range-box">
                                    <input type="text" class="range-input" placeholder="დან">
                                    <span>₾</span>
                                </div>
                                <div class="range-box">
                                    <input type="text" class="range-input" placeholder="მდე">
                                    <span>₾</span>
                                </div>
                            </div>

                            <div class="prices">
                                <div class="price-list">
                                    <p style="margin-bottom: 16px">მინ. ფასი</p>
                                    <p class="min-price">50,000 ₾</p>
                                    <p class="min-price">100,000 ₾</p>
                                    <p class="min-price">150,000 ₾</p>
                                    <p class="min-price">200,000 ₾</p>
                                    <p class="min-price">300,000 ₾</p>
                                </div>
                                <div class="price-list">
                                    <p style="margin-bottom: 16px">მაქს. ფასი</p>
                                    <p class="min-price">50,000 ₾</p>
                                    <p class="min-price">100,000 ₾</p>
                                    <p class="min-price">150,000 ₾</p>
                                    <p class="min-price">200,000 ₾</p>
                                    <p class="min-price">300,000 ₾</p>

                                </div>
                            </div>

                            <div class="select-btn-container">
                                <span class="select-price-btn">არჩევა</span>
                            </div>
                        </div>
                    </div>
                </button>
                {{--area Range--}}
                <button type="button" class="select-btn select-btn-color inline-btn">
                    <span>ფართობი</span>
                    <svg class="arrow-svg arrow-toggle inline-svg" xmlns="http://www.w3.org/2000/svg" width="14"
                         height="15" viewBox="0 0 14 15"
                         fill="none">
                        <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                              fill="#021526"/>
                    </svg>

                    <div class="inline-dropdown hidden">
                        <div class="price-range-wrapper">
                            <p class="dropdown-name">ფართობის მიხედვით</p>
                            <div class="range">
                                <div class="range-box">
                                    <input type="text" class="range-input" placeholder="დან">
                                    <span>მ<sup>2</sup></span>
                                </div>
                                <div class="range-box">
                                    <input type="text" class="range-input" placeholder="მდე">
                                    <span>მ<sup>2</sup></span>
                                </div>
                            </div>

                            <div class="prices">
                                <div class="price-list">
                                    <p style="margin-bottom: 16px">მინ. მ<sup>2</sup></p>
                                    <p class="min-price">50,000 მ<sup>2</sup></p>
                                    <p class="min-price">100,000 მ<sup>2</sup></p>
                                    <p class="min-price">150,000 მ<sup>2</sup></p>
                                    <p class="min-price">200,000 მ<sup>2</sup></p>
                                    <p class="min-price">300,000 მ<sup>2</sup></p>
                                </div>
                                <div class="price-list">
                                    <p style="margin-bottom: 16px">მაქს. მ<sup>2</sup></p>
                                    <p class="min-price">50,000 მ<sup>2</sup></p>
                                    <p class="min-price">100,000 მ<sup>2</sup></p>
                                    <p class="min-price">150,000 მ<sup>2</sup></p>
                                    <p class="min-price">200,000 მ<sup>2</sup></p>
                                    <p class="min-price">300,000 მ<sup>2</sup></p>

                                </div>
                            </div>

                            <div class="select-btn-container">
                                <span class="select-price-btn">არჩევა</span>
                            </div>
                        </div>
                    </div>
                </button>
                {{--Rooms--}}
                <button type="button" class="select-btn select-btn-color inline-btn">
                    <span>საძინებლების რაოდენობა</span>
                    <svg class="arrow-svg arrow-toggle inline-svg" xmlns="http://www.w3.org/2000/svg" width="14"
                         height="15" viewBox="0 0 14 15"
                         fill="none">
                        <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                              fill="#021526"/>
                    </svg>

                    <div class="inline-dropdown hidden">
                        <div class="price-range-wrapper">
                            <p class="dropdown-name">საძინებლების რაოდენობა</p>
                            <div class="range">
                                <div class="range-box">
                                    <input type="text" class="range-input" placeholder="დან">
                                    <span>₾</span>
                                </div>
                                <div class="range-box">
                                    <input type="text" class="range-input" placeholder="მდე">
                                    <span>₾</span>
                                </div>
                            </div>

                            <div class="prices">
                                <div class="price-list">
                                    <p style="margin-bottom: 16px">მინ. ფასი</p>
                                    <p class="min-price">50,000 ₾</p>
                                    <p class="min-price">100,000 ₾</p>
                                    <p class="min-price">150,000 ₾</p>
                                    <p class="min-price">200,000 ₾</p>
                                    <p class="min-price">300,000 ₾</p>
                                </div>
                                <div class="price-list">
                                    <p style="margin-bottom: 16px">მაქს. ფასი</p>
                                    <p class="min-price">50,000 ₾</p>
                                    <p class="min-price">100,000 ₾</p>
                                    <p class="min-price">150,000 ₾</p>
                                    <p class="min-price">200,000 ₾</p>
                                    <p class="min-price">300,000 ₾</p>

                                </div>
                            </div>

                            <div class="select-btn-container">
                                <span class="select-price-btn">არჩევა</span>
                            </div>
                        </div>
                    </div>
                </button>
            </div>

            <div class="top-buttons-wrapper">
                <button class="listing-button">+ ლისტინგის დამატება</button>
                <button id="agent-open-modal" class="agent-button">+ აგენტის დამატება</button>
            </div>
        </div>

        <form class="search-wrapper" action="">

            <div id="area-container" class="search-item-wrapper">
                <input id="area" type="hidden" value="" name="area">
                <div style="display: flex; align-items: center">
                    <span class="searchable" id="min_area">55 მ<sup>2</sup></span>
                    <span style="margin: 0 5px"> - </span>
                    <span class="searchable" id="max_area">70 მ<sup>2</sup></span>
                </div>
                <svg class="remove-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"
                     fill="none">
                    <path d="M10.5 4L3.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3.5 4L10.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </form>
    </div>

    <section class="listing-section">
        <div class="listing-item">
            <img src="{{asset('assets/img/listings/1.png')}}" alt="">
        </div>
    </section>
</main>


@include('components.agentmodal')


<script src="{{asset('assets/js/dropdown.js')}}"></script>
<script src="{{asset('assets/js/searchSelection.js')}}"></script>
<script src="{{asset('assets/js/agentModal.js')}}"></script>

</body>
</html>
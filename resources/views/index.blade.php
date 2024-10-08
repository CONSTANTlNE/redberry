@extends('layout')


@section('index')
    <main style="width: 80%;" id="index">
        <div>
            <div class="top-wrapper">

                <form
                        class="select-wrapper">
                    {{--Regions--}}
                    <div style="display: flex;flex-direction: column">
                        <button type="button" class="select-btn select-btn-color " id="region_dropdown_btn">
                            <span>რეგიონი</span>

                            <svg id="region_svg" class="arrow-svg arrow-toggle" xmlns="http://www.w3.org/2000/svg"
                                 width="14"
                                 height="15" viewBox="0 0 14 15"
                                 fill="none">
                                <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                                      fill="#021526"/>
                            </svg>

                        </button>
                        <div id="region-dropdown-container">
                            <div class="region-dropdown hidden" id="region_dropdown">
                                <p class="dropdown-name">რეგიონის მიხედვით</p>
                                <div class="region-items">
                                    @foreach($regions as $index => $region)
                                        <div class="region">
                                            <svg class="uncheckedsvg" xmlns="http://www.w3.org/2000/svg" width="20"
                                                 height="20" viewBox="0 0 20 20" fill="none">
                                                <rect x="0.5" y="0.5" width="19" height="19" rx="1.5" stroke="#DBDBDB"/>
                                            </svg>
                                            <svg style="display: none" class="chekedsvg"
                                                 xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20" fill="none">
                                                <rect width="20" height="20" rx="2" fill="#45A849"/>
                                                <path d="M15.4546 5.4541L8.57959 13.6359L5.45459 9.91691" stroke="white"
                                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <input style="display: none"
                                                   {{request()->region!=null && in_array($region['id'], request()->region) ? 'checked' : ''}} name="region[]"
                                                   id="region{{$index}}" data-name="{{$region['name']}}"
                                                   class="dropdown-checkbox regions-checkbox" value="{{$region['id']}}"
                                                   type="checkbox">
                                            <label class="region-labels"
                                                   for="region{{$index}}">{{$region['name']}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div style="margin-top:32px" class="select-btn-container">
                                    <button
                                            id="select-region" class="select-price-btn">
                                        არჩევა
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Price Range--}}
                    <div id="pricerangediv" style="display: flex;flex-direction: column">
                        <button type="button" class="select-btn select-btn-color inline-btn">
                            <span>საფასო კატეგორია</span>
                            <svg class="arrow-svg arrow-toggle inline-svg" xmlns="http://www.w3.org/2000/svg" width="14"
                                 height="15" viewBox="0 0 14 15"
                                 fill="none">
                                <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                                      fill="#021526"/>
                            </svg>
                        </button>
                        <div id="region-dropdown-container">
                            <div class="inline-dropdown hidden">
                                <div class="price-range-wrapper">
                                    <p class="dropdown-name">ფასის მიხედვით</p>
                                    <div class="range">
                                        <div class="range-box minrpricerange">
                                            <input style="border:none;outline: none;" type="text" name="minprice"
                                                   class="range-input"
                                                   placeholder="დან" {{request()->has('minprice') ? 'value='.request()->minprice : ''}} >
                                            <span>₾</span>
                                        </div>
                                        <div class="range-box maxpricerange">
                                            <input style="border:none;outline: none;" type="text" name="maxprice"
                                                   class="range-input"
                                                   placeholder="მდე" {{request()->has('maxprice') ? 'value='.request()->maxprice : ''}}>
                                            <span>₾</span>
                                        </div>
                                    </div>

                                    <div class="prices">
                                        <div class="price-list">
                                            <p class="rangecss" style="margin-bottom: 16px">მინ. ფასი</p>
                                            <p data-min-price="500" class="min-price">500 ₾</p>
                                            <p data-min-price="20000" class="min-price">20,000 ₾</p>
                                            <p data-min-price="30000" class="min-price">30,000 ₾</p>
                                            <p data-min-price="60000" class="min-price">60,000 ₾</p>
                                            <p data-min-price="100000" class="min-price">100,000 ₾</p>
                                        </div>
                                        <div class="price-list">
                                            <p class="rangecss" style="margin-bottom: 16px">მაქს. ფასი</p>
                                            <p data-max-price="2000" class="min-price">2 000 ₾</p>
                                            <p data-max-price="40000" class="min-price">40,000 ₾</p>
                                            <p data-max-price="60000" class="min-price">60,000 ₾</p>
                                            <p data-max-price="100000" class="min-price">100,000 ₾</p>
                                            <p data-max-price="250000" class="min-price">250,000 ₾</p>
                                        </div>
                                    </div>

                                    <div class="select-btn-container">
                                        <button id="pricerangesubmit" class="select-price-btn">არჩევა</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--area Range--}}
                    <div id="arearangediv" style="display: flex;flex-direction: column">
                        <button type="button" class="select-btn select-btn-color inline-btn">
                            <span>ფართობი</span>
                            <svg class="arrow-svg arrow-toggle inline-svg" xmlns="http://www.w3.org/2000/svg" width="14"
                                 height="15" viewBox="0 0 14 15"
                                 fill="none">
                                <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                                      fill="#021526"/>
                            </svg>
                        </button>
                        <div id="region-dropdown-container">
                            <div class="inline-dropdown hidden">
                                <div class="price-range-wrapper">
                                    <p class="dropdown-name">ფართობის მიხედვით</p>
                                    <div class="range">
                                        <div class="range-box minarearange">
                                            <input style="border:none; outline: none;" type="text"
                                                   {{request()->minarea!=null ? 'value='.request()->minarea : ''}} name="minarea"
                                                   class="range-input" placeholder="დან">
                                            <span>მ<sup>2</sup></span>
                                        </div>
                                        <div class="range-box maxarearange">
                                            <input style="border:none;outline: none;" type="text"
                                                   {{request()->maxarea!=null ? 'value='.request()->maxarea : ''}} name="maxarea"
                                                   class="range-input" placeholder="მდე">
                                            <span>მ<sup>2</sup></span>
                                        </div>
                                    </div>

                                    <div class="prices">
                                        <div class="price-list">
                                            <p class="rangecss" style="margin-bottom: 16px">მინ. მ<sup>2</sup></p>
                                            <p data-min-area="20" class="min-price">20 მ<sup>2</sup></p>
                                            <p data-min-area="50" class="min-price">50 მ<sup>2</sup></p>
                                            <p data-min-area="70" class="min-price">70 მ<sup>2</sup></p>
                                            <p data-min-area="80" class="min-price">80 მ<sup>2</sup></p>
                                            <p data-min-area="100" class="min-price">100 მ<sup>2</sup></p>
                                        </div>
                                        <div class="price-list">
                                            <p class="rangecss" style="margin-bottom: 16px">მაქს. მ<sup>2</sup></p>
                                            <p data-max-area="50" class="min-price">50 მ<sup>2</sup></p>
                                            <p data-max-area="70" class="min-price">70 მ<sup>2</sup></p>
                                            <p data-max-area="80" class="min-price">80 მ<sup>2</sup></p>
                                            <p data-max-area="100" class="min-price">100 მ<sup>2</sup></p>
                                            <p data-max-area="150" class="min-price">150 მ<sup>2</sup></p>

                                        </div>
                                    </div>

                                    <div class="select-btn-container">
                                        <button class="select-price-btn pricerangesubmit">არჩევა</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Rooms--}}
                    <div id="roomsdiv" style="display: flex;flex-direction: column">
                        <button type="button" class="select-btn select-btn-color inline-btn">
                            <span>საძინებლების რაოდენობა</span>
                            <svg class="arrow-svg arrow-toggle inline-svg" xmlns="http://www.w3.org/2000/svg" width="14"
                                 height="15" viewBox="0 0 14 15"
                                 fill="none">
                                <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                                      fill="#021526"/>
                            </svg>

                        </button>
                        <div id="region-dropdown-container">

                            <div class="inline-dropdown hidden">
                                <div class="price-range-wrapper">
                                    <p class="dropdown-name">საძინებლების რაოდენობა</p>
                                    <div style="width: 50px!important;" class="range">
                                        <div style="width: 50px!important;" class="range-box roomsbox">
                                            <input style="width: 30px!important;outline: none;border:none;"
                                                   {{request()->bedrooms!=null ? 'value='.request()->bedrooms : '' }}  type="text"
                                                   name="bedrooms" class="range-input">
                                        </div>
                                    </div>
                                    <div class="select-btn-container">
                                        <button class="select-price-btn roomsbtn">არჩევა</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="top-buttons-wrapper">
                    <a href="{{route('real-estates.create')}}" class="listing-button buttonstyle1">+ ლისტინგის
                        დამატება</a>
                    <button id="agent-open-modal" class="buttonstyle2">+ აგენტის დამატება</button>
                </div>

            </div>


            <form class="search-wrapper" action="">

                {{-- Regions--}}
                @if(request()->has('region'))
                    @foreach($regions as $region2)
                        @if(in_array($region2['id'],request()->region))
                            <div class="search-item-wrapper search-region">
                                <input id="region" type="hidden" value="{{$region2['id']}}" name="region">
                                <span class="searchable">{{$region2['name']}}</span>
                                <svg class="remove-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                     viewBox="0 0 14 15"
                                     fill="none">
                                    <path d="M10.5 4L3.5 11" stroke="#354451" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    <path d="M3.5 4L10.5 11" stroke="#354451" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                        @endif
                    @endforeach
                @endif
                {{-- PriceRange--}}
                @if((request()->maxprice!=null && request()->minprice!=null) || request()->minprice!=null || request()->maxprice!=null )
                    <div id="area-container" class="search-item-wrapper search-pricerange">

                        <div style="display: flex; align-items: center">

                            <span class="searchable">{{request()->minprice ? request()->minprice : 0}}<span>₾</span></span>
                            <span style="margin: 0 5px"> - </span>
                            <span class="searchable">{{request()->maxprice ? request()->maxprice : ' ... '}}<span>₾</span></span>


                        </div>

                        <svg class="remove-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                             viewBox="0 0 14 15"
                             fill="none">
                            <path d="M10.5 4L3.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.5 4L10.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                @endif
                {{-- AreaRange--}}
                @if((request()->minarea!=null && request()->maxarea!=null) || request()->minarea!=null || request()->maxarea!=null)
                    <div id="area-container" class="search-item-wrapper search-arearange">
                        <input id="area" type="hidden" value="" name="area">
                        <div style="display: flex; align-items: center">
                            <span class="searchable" id="min_area">{{request()->minarea ? request()->minarea : 0}} მ<sup>2</sup></span>
                            <input name="min_area" value="{{request()->minarea}}" type="hidden">
                            <span style="margin: 0 5px"> - </span>
                            <input name="max_area" value="{{request()->maxarea}}" type="hidden">
                            <span class="searchable" id="max_area">{{request()->maxarea ? request()->maxarea : ' ... ' }} მ<sup>2</sup></span>
                        </div>
                        <svg class="remove-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                             viewBox="0 0 14 15"
                             fill="none">
                            <path d="M10.5 4L3.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.5 4L10.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                @endif
                {{-- bedrooms--}}
                @if(request()->bedrooms!=null)
                    <div id="area-container" class="search-item-wrapper search-bedrooms">
                        <input id="area" type="hidden" value="" name="area">
                        <div style="display: flex; align-items: center">
                            <span class="searchable" id="bedrooms">{{request()->bedrooms}} </span>
                            <input name="bedrooms" value="{{request()->bedrooms}}" type="hidden">
                        </div>
                        <svg class="remove-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                             viewBox="0 0 14 15"
                             fill="none">
                            <path d="M10.5 4L3.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3.5 4L10.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                @endif

                @if(array_filter(request()->query()))
                    <a style="text-decoration: none;" href="{{route('real-estates.index')}}">
                        <span class="clear-text">გასუფთავება</span>
                    </a>
                @endif
            </form>

        </div>


        @if((request()->has('region') || request()->has('minarea') || request()->has('maxarea') || request()->has('minprice') || request()->has('maxprice')  || request()->has('bedrooms')  )   && count($filteredlistings)===0)
            <p class="errortext">აღნიშნული მონაცემებით განცხადება არ იძებნებაა</p>
        @else

            <section class="listing-section">

                @foreach($filteredlistings as $listing)

                    <div data-listing-id="{{$listing['id']}}" class="listing-item">
                        <a style="all: unset;cursor:pointer;width: 100%"
                           href="{{route('real-estates.show',['id'=>$listing['id']])}}">
                            <div class="listing-img-wrapper">
                                <img src="{{$listing['image']}}" alt="">
                                <span class="listing-type">{{$listing['is_rental']===1 ? 'ქირავდება' : 'იყიდება'}}</span>
                            </div>
                            <div class="listing-details-wrapper">
                                <div class="listing-address-price">
                                    @php
                                        $price = $listing['price'];
                                        $formated_price = number_format($price, 0, '.', ' ');
                                    @endphp
                                    <p style="margin-bottom: 7px" class="listing-price"><span>{{$formated_price}}</span>
                                        <span>₾</span></p>
                                    <div class="listing-address">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 20 20"
                                             fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M5.05025 4.05025C7.78392 1.31658 12.2161 1.31658 14.9497 4.05025C17.6834 6.78392 17.6834 11.2161 14.9497 13.9497L10 18.8995L5.05025 13.9497C2.31658 11.2161 2.31658 6.78392 5.05025 4.05025ZM10 11C11.1046 11 12 10.1046 12 9C12 7.89543 11.1046 7 10 7C8.89543 7 8 7.89543 8 9C8 10.1046 8.89543 11 10 11Z"
                                                  fill="#021526" fill-opacity="0.5"/>
                                        </svg>
                                        <span>{{$listing['city']['region']['name']}},</span>
                                        <span>{{$listing['address']}}</span>
                                    </div>
                                </div>

                                <div class="listing-data">
                                    <div class="listing-data-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none">
                                            <path d="M20.25 10.8141C19.7772 10.6065 19.2664 10.4996 18.75 10.5H5.25C4.73368 10.4995 4.22288 10.6063 3.75 10.8136C3.08166 11.1059 2.51294 11.5865 2.11336 12.1968C1.71377 12.8071 1.50064 13.5205 1.5 14.25V19.5C1.5 19.6989 1.57902 19.8897 1.71967 20.0303C1.86032 20.171 2.05109 20.25 2.25 20.25C2.44891 20.25 2.63968 20.171 2.78033 20.0303C2.92098 19.8897 3 19.6989 3 19.5V19.125C3.00122 19.0259 3.04112 18.9312 3.11118 18.8612C3.18124 18.7911 3.27592 18.7512 3.375 18.75H20.625C20.7241 18.7512 20.8188 18.7911 20.8888 18.8612C20.9589 18.9312 20.9988 19.0259 21 19.125V19.5C21 19.6989 21.079 19.8897 21.2197 20.0303C21.3603 20.171 21.5511 20.25 21.75 20.25C21.9489 20.25 22.1397 20.171 22.2803 20.0303C22.421 19.8897 22.5 19.6989 22.5 19.5V14.25C22.4993 13.5206 22.2861 12.8073 21.8865 12.1971C21.4869 11.5869 20.9183 11.1063 20.25 10.8141Z"
                                                  fill="#021526" fill-opacity="0.5"/>
                                            <path d="M17.625 3.75H6.375C5.67881 3.75 5.01113 4.02656 4.51884 4.51884C4.02656 5.01113 3.75 5.67881 3.75 6.375V9.75C3.75002 9.77906 3.75679 9.80771 3.76979 9.8337C3.78278 9.85969 3.80163 9.8823 3.82486 9.89976C3.84809 9.91721 3.87505 9.92903 3.90363 9.93428C3.93221 9.93953 3.96162 9.93806 3.98953 9.93C4.39897 9.81025 4.82341 9.74964 5.25 9.75H5.44828C5.49456 9.75029 5.53932 9.73346 5.57393 9.70274C5.60855 9.67202 5.63058 9.62958 5.63578 9.58359C5.67669 9.21712 5.85115 8.87856 6.12586 8.63256C6.40056 8.38656 6.75625 8.25037 7.125 8.25H9.75C10.119 8.25003 10.475 8.38606 10.75 8.63209C11.025 8.87812 11.1997 9.21688 11.2406 9.58359C11.2458 9.62958 11.2679 9.67202 11.3025 9.70274C11.3371 9.73346 11.3818 9.75029 11.4281 9.75H12.5747C12.621 9.75029 12.6657 9.73346 12.7003 9.70274C12.735 9.67202 12.757 9.62958 12.7622 9.58359C12.8031 9.21736 12.9773 8.87899 13.2517 8.63303C13.5261 8.38706 13.8815 8.25072 14.25 8.25H16.875C17.244 8.25003 17.6 8.38606 17.875 8.63209C18.15 8.87812 18.3247 9.21688 18.3656 9.58359C18.3708 9.62958 18.3929 9.67202 18.4275 9.70274C18.4621 9.73346 18.5068 9.75029 18.5531 9.75H18.75C19.1766 9.74979 19.6011 9.81057 20.0105 9.93047C20.0384 9.93854 20.0679 9.94 20.0965 9.93473C20.1251 9.92945 20.1521 9.91759 20.1753 9.90009C20.1986 9.88258 20.2174 9.8599 20.2304 9.83385C20.2433 9.8078 20.2501 9.7791 20.25 9.75V6.375C20.25 5.67881 19.9734 5.01113 19.4812 4.51884C18.9889 4.02656 18.3212 3.75 17.625 3.75Z"
                                                  fill="#021526" fill-opacity="0.5"/>
                                        </svg>
                                        <span class="data">{{$listing['bedrooms']}}</span>
                                    </div>
                                    <div class="listing-data-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 18 18"
                                             fill="none">
                                            <path d="M0 16C0 16.5304 0.210714 17.0391 0.585786 17.4142C0.960859 17.7893 1.46957 18 2 18H16C16.5304 18 17.0391 17.7893 17.4142 17.4142C17.7893 17.0391 18 16.5304 18 16V2C18 1.46957 17.7893 0.960859 17.4142 0.585786C17.0391 0.210714 16.5304 0 16 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V16ZM9 3H15V9H13V5H9V3ZM3 9H5V13H9V15H3V9Z"
                                                  fill="#021526" fill-opacity="0.5"/>
                                        </svg>
                                        <span class="data">{{$listing['area']}} მ   <sup>2</sup></span>

                                    </div>
                                    <div class="listing-data-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18"
                                             viewBox="0 0 16 18"
                                             fill="none">
                                            <path d="M7.01717 0.338139C6.80803 0.554674 6.69051 0.848379 6.69045 1.15465V4.14122H1.11507C0.819339 4.14122 0.535715 4.2629 0.326598 4.47948C0.117481 4.69607 0 4.98982 0 5.29612V9.91571C0 10.222 0.117481 10.5158 0.326598 10.7323C0.535715 10.9489 0.819339 11.0706 1.11507 11.0706H6.69045V18H8.9206V11.0706H12.859C13.0225 11.0705 13.1839 11.0333 13.3319 10.9614C13.4799 10.8896 13.6108 10.7849 13.7154 10.6548L15.8709 7.97548C15.9543 7.87172 16 7.74095 16 7.60591C16 7.47088 15.9543 7.34011 15.8709 7.23635L13.7154 4.55698C13.6108 4.42691 13.4799 4.32225 13.3319 4.2504C13.1839 4.17856 13.0225 4.14128 12.859 4.14122H8.9206V1.15465C8.92055 0.926271 8.85513 0.703031 8.7326 0.513154C8.61007 0.323278 8.43594 0.175289 8.23221 0.0878981C8.02849 0.000506892 7.80432 -0.0223635 7.58805 0.0221781C7.37178 0.0667197 7.17311 0.176673 7.01717 0.338139Z"
                                                  fill="#021526" fill-opacity="0.5"/>
                                        </svg>
                                        <span class="data">{{$listing['zip_code']}}</span>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </section>
        @endif


    </main>

    <script>

    </script>
@endsection


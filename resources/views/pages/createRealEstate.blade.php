@extends('layout')

@section('add-listing')

    {{--    @dd($cities)--}}

    <div class="create-real-estate-wrapper">
        <h1 class="firago-listing-heading">ლისტინგის დამატება</h1>

        <form id="listing-form" class="real-estate-form" action="{{route('real-estates.store')}}" method="post"
              enctype="multipart/form-data">
            @csrf
            <div class="real-estate-type-wrapper">
                <h3 class="helvetica-heading">გარიგების ტიპი</h3>

                <div style="display: flex;gap:50px">

                    <div style="display: flex;gap: 7px">
                        <svg style="display: none" class="sale_checked" width="17" height="17" viewBox="0 0 17 17"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8.5" cy="8.5" r="3.5" fill="#021526"/>
                            <circle cx="8.5" cy="8.5" r="8" stroke="#021526"/>
                        </svg>
                        <svg class="sale_unchecked" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                             viewBox="0 0 17 17" fill="none">
                            <circle cx="8.5" cy="8.5" r="8" stroke="#021526"/>
                        </svg>
                        <input style="display: none" name="is_rental" value="0" type="radio" id="sale-type">
                        <label class="radio-label" for="sale-type">იყიდება</label>
                    </div>

                    <div style="display: flex;gap: 7px">
                        <svg style="display: none" class="rental_checked" width="17" height="17" viewBox="0 0 17 17"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8.5" cy="8.5" r="3.5" fill="#021526"/>
                            <circle cx="8.5" cy="8.5" r="8" stroke="#021526"/>
                        </svg>
                        <svg class="rental_unchecked" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                             viewBox="0 0 17 17" fill="none">
                            <circle cx="8.5" cy="8.5" r="8" stroke="#021526"/>
                        </svg>
                        <input style="display: none" name="is_rental" value="1" type="radio" id="rent-type">
                        <label class="radio-label" for="rent-type">ქირავდება</label>
                    </div>

                </div>
                <div id="sale-type-validation" class="agent-validation-wrapper">

                </div>
            </div>
            <div class="real-estate-location-wrapper">
                <h3 class="helvetica-heading">მდებარეობა</h3>
                <div class="modal-input-wrapper">
                    <div class="modal-input">
                        <label class="label" for="address">მისამართი <sup>*</sup></label>
                        <input name="address" class="agent-input" id="address" type="text">
                        <div id="address-validation" class="agent-validation-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11"
                                 fill="none">
                                <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
                        </div>
                    </div>
                    <div class="modal-input">
                        <label class="label" for="zip_code">საფოსტო ინდექსი <sup>*</sup></label>
                        <input name="zip_code" class="agent-input" id="zip_code" type="text">
                        <div id="zip_code-validation" class="agent-validation-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11"
                                 fill="none">
                                <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <span class="agent-validation-info">მხოლოდ რიცხვები</span>
                        </div>
                    </div>

                </div>
                <div class="modal-input-wrapper">
                    <div class="modal-input">
                        <label class="label" for="region_id">რეგიონი</label>
                        <select
                                hx-get="{{route('htmx.cities')}}"
                                hx-trigger="change"
                                hx-target="#city_id"
                                name="region_id" class="agent-input" id="region_id">
                            <option value="">აირჩიეთ რეგიონი</option>
                            @foreach($regions as $region)
                                <option value="{{ $region['id'] }}">{{ $region['name'] }}</option>
                            @endforeach
                        </select>
                        <div id="region-validation" class="agent-validation-wrapper">

                        </div>
                    </div>
                    <div class="modal-input">
                        <label class="label" for="city_id">ქალაქი</label>
                        <select name="city_id" class="agent-input" id="city_id">
                            <option value="">აირჩიეთ ქალაქი</option>
                            @foreach($cities as $city)
                                <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                            @endforeach
                        </select>
                        <div id="city-validation" class="agent-validation-wrapper">

                        </div>
                    </div>

                </div>
            </div>

            <div class="real-estate-details-wrapper">
                <h3 class="helvetica-heading">ბინის დეტალები</h3>
                <div class="modal-input-wrapper">
                    <div class="modal-input">
                        <label class="label" for="price">ფასი</label>
                        <input name="price" class="agent-input" id="price" type="text">
                        <div id="price-validation" class="agent-validation-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11"
                                 fill="none">
                                <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <span class="agent-validation-info">მხოლოდ რიცხვები</span>
                        </div>
                    </div>
                    <div class="modal-input">
                        <label class="label" for="area">ფართობი</label>
                        <input name="area" class="agent-input" id="area" type="text">
                        <div id="area-validation" class="agent-validation-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11"
                                 fill="none">
                                <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <span class="agent-validation-info">მხოლოდ რიცხვები</span>
                        </div>
                    </div>

                </div>
                <div class="modal-input-wrapper">
                    <div class="modal-input">
                        <label class="label" for="bedrooms">საძინებლების რაოდენობა <sup>*</sup></label>
                        <input name="bedrooms" class="agent-input" id="bedrooms" type="text">
                        <div id="bedrooms-validation" class="agent-validation-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11"
                                 fill="none">
                                <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <span class="agent-validation-info">მხოლოდ რიცხვები</span>
                        </div>
                    </div>

                </div>

                <div class="modal-input-wrapper">
                    <div class="modal-input-full">
                        <label class="label" for="description">აღწერა <sup>*</sup></label>
                        <textarea name="description" class="listing-description" id="description"></textarea>
                        <div id="description-validation" class="agent-validation-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11"
                                 fill="none">
                                <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>

                            <span class="agent-validation-info">მინიმუმ ხუთი სიტყვა</span>
                        </div>
                    </div>

                </div>
                <div class="modal-input-photo">
                    <label id="agent-avatar-validation" class="label" for="firstname">ატვირთეთ ფოტო <sup>*</sup></label>
                    <div class="agent-photo-placeholder">

                        <div id="imagePreview">
                            <img id="uploadedImage" style="display:none;">

                            <svg id="agent-avatar-delete-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="11.5" fill="white" stroke="#021526"/>
                                <path d="M6.75 8.5H7.91667H17.25" stroke="#021526" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M16.0833 8.5V16.6667C16.0833 16.9761 15.9604 17.2728 15.7416 17.4916C15.5228 17.7104 15.2261 17.8333 14.9167 17.8333H9.08333C8.77391 17.8333 8.47717 17.7104 8.25838 17.4916C8.03958 17.2728 7.91667 16.9761 7.91667 16.6667V8.5M9.66667 8.5V7.33333C9.66667 7.02392 9.78958 6.72717 10.0084 6.50838C10.2272 6.28958 10.5239 6.16667 10.8333 6.16667H13.1667C13.4761 6.16667 13.7728 6.28958 13.9916 6.50838C14.2104 6.72717 14.3333 7.02392 14.3333 7.33333V8.5"
                                      stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.8333 11.4167V14.9167" stroke="#021526" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                                <path d="M13.1667 11.4167V14.9167" stroke="#021526" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <svg id="agent-avatar-upload-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                  stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 8V16" stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 12H16" stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>


            <div class="real-estate-agent-wrapper">
                <h3 class="helvetica-heading">აგენტი </h3>
                <div style="display: none" class="modal-input-wrapper">
                    <div class="modal-input">
                        <label class="label" for="agent_id">აირჩიე</label>
                        <select name="agent_id" class="agent-input" id="agent_id">
                            <option value="">აირჩიეთ აგენტი</option>
                            @foreach($agents as $agent)
                                <option  value="{{ $agent['id'] }}">{{ $agent['name'] }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                {{--Agents--}}
                <input id="agentinput" type="hidden"  name="agent_id" value="">
                <div style="display: flex;flex-direction: column">

                    <button style="cursor: pointer" type="button" class="agent-listing-btn " id="region_dropdown_btn">
                        <span class="agent-listing-class">აირჩიე აგენტი</span>

                        <svg id="region_svg" class="arrow-svg arrow-toggle" xmlns="http://www.w3.org/2000/svg"
                             width="14"
                             height="15" viewBox="0 0 14 15"
                             fill="none">
                            <path d="M10.0876 9.66215C10.3154 9.88996 10.6847 9.88996 10.9125 9.66215C11.1403 9.43435 11.1403 9.065 10.9125 8.8372L7.41252 5.3372C7.18471 5.10939 6.81537 5.10939 6.58756 5.3372L3.08756 8.8372C2.85976 9.065 2.85976 9.43435 3.08756 9.66215C3.31537 9.88996 3.68471 9.88996 3.91252 9.66215L7.00004 6.57463L10.0876 9.66215Z"
                                  fill="#021526"/>
                        </svg>

                    </button>
                    <div  id="region-dropdown-container">
                        <div class="options-dropdown hidden" id="region_dropdown">
                            <div class="add-agent-option" id="agent-open-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 8V16" stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8 12H16" stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                დაამატე აგენტი
                            </div>

                            @foreach($agents as $agent)
                                <div class="custom-option" data-agent-id="{{$agent['id']}}" >{{$agent['name']}}</div>
                            @endforeach
                        </div>
                        <div id="agent-validation" class="agent-validation-wrapper">

                        </div>
                    </div>
                </div>


            </div>

            <div class="real-estate-form-buttons">
                <div class="modal-buttons-wrapper">
                    <a style="text-decoration: none" href="{{route('real-estates.index')}}"  type="button" class="buttonstyle2">გაუქმება</a>
                    <button  class="buttonstyle1">დაამატე ლისტინგი</button>
                </div>
            </div>
            <input style="display: none" name="image" type="file" id="imageUpload">
        </form>

    </div>


    <script>
        // Custom Radio
        const sale_checked = document.querySelector('.sale_checked');
        const sale_unchecked = document.querySelector('.sale_unchecked');
        const rental_checked = document.querySelector('.rental_checked');
        const rental_unchecked = document.querySelector('.rental_unchecked');

        const rentradio = document.getElementById('rent-type')
        const saleradio = document.getElementById('sale-type')


        rentradio.addEventListener('click', () => {
            sale_checked.style.display = 'none'
            sale_unchecked.style.display = 'block'
            rental_checked.style.display = 'block'
            rental_unchecked.style.display = 'none'

        })


        saleradio.addEventListener('click', () => {
            sale_checked.style.display = 'block'
            sale_unchecked.style.display = 'none'
            rental_checked.style.display = 'none'
            rental_unchecked.style.display = 'block'

        })


    </script>

@endsection
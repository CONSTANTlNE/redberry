@extends('layout')

@section('add-listing')

{{--    @dd($cities)--}}

<div class="create-real-estate-wrapper">
<h1>ლისტინგის დამატება</h1>

    <form id="listing-form" class="real-estate-form" action="{{route('real-estates.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="real-estate-type-wrapper">
            <p>გარიგების ტიპი</p>

            <div>

                <input name="is_rental" type="radio" id="sale-type">
                <label for="sale-type">იყიდება</label>

                <input name="is_rental" type="radio" id="rent-type">
                <label for="rent-type">ქირავდება</label>
                <div id="sale-type-validation"  class="agent-validation-wrapper">

                </div>
            </div>
        </div>
        <div class="real-estate-location-wrapper">
            <p>მდებარეობა</p>
            <div class="modal-input-wrapper">
                <div class="modal-input">
                    <label class="label" for="address">მისამართი <sup>*</sup></label>
                    <input name="address" class="agent-input" id="address" type="text">
                    <div id="address-validation"  class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
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
                    <div id="zip_code-validation"  class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
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
                    <div id="region-validation"  class="agent-validation-wrapper">

                    </div>
                </div>
                <div class="modal-input">
                    <label class="label" for="city_id">ქალაქი</label>
                    <select  name="city_id" class="agent-input" id="city_id">
                        <option value="">აირჩიეთ ქალაქი</option>
                        @foreach($cities as $city)
                            <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                        @endforeach
                    </select>
                    <div id="city-validation"  class="agent-validation-wrapper">

                    </div>
                </div>

            </div>
        </div>

        <div class="real-estate-details-wrapper">
            <p>ბინის დეტალები</p>
            <div class="modal-input-wrapper">
                <div class="modal-input">
                    <label class="label" for="price">ფასი</label>
                    <input name="price" class="agent-input" id="price" type="text">
                    <div id="price-validation" class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
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
                    <div id="area-validation"  class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
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
                <div  class="agent-photo-placeholder">

                    <div id="imagePreview">
                        <img id="uploadedImage" style="display:none;">

                        <svg id="agent-avatar-delete-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="11.5" fill="white" stroke="#021526"/>
                            <path d="M6.75 8.5H7.91667H17.25" stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.0833 8.5V16.6667C16.0833 16.9761 15.9604 17.2728 15.7416 17.4916C15.5228 17.7104 15.2261 17.8333 14.9167 17.8333H9.08333C8.77391 17.8333 8.47717 17.7104 8.25838 17.4916C8.03958 17.2728 7.91667 16.9761 7.91667 16.6667V8.5M9.66667 8.5V7.33333C9.66667 7.02392 9.78958 6.72717 10.0084 6.50838C10.2272 6.28958 10.5239 6.16667 10.8333 6.16667H13.1667C13.4761 6.16667 13.7728 6.28958 13.9916 6.50838C14.2104 6.72717 14.3333 7.02392 14.3333 7.33333V8.5" stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.8333 11.4167V14.9167" stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.1667 11.4167V14.9167" stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
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
            <p>აგენტი</p>
            <div class="modal-input-wrapper">
                <div class="modal-input">
                    <label class="label" for="agent_id">აირჩიე</label>
                    <select name="agent_id" class="agent-input" id="agent_id">
                        <option value="">აირჩიეთ აგენტი</option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent['id'] }}">{{ $agent['name'] }}</option>
                        @endforeach
                    </select>
                    <div id="agent-validation"  class="agent-validation-wrapper">

                    </div>
                </div>
            </div>
        </div>

        <div class="real-estate-form-buttons">
            <div class="modal-buttons-wrapper">
                <button type="button" id="close-agent-modal" class="cancel-btn">გაუქმება</button>
                <button id="close-agent-modal" class="add-btn">დაამატე აგენტი</button>
            </div>
        </div>
        <input style="display: none" name="image" type="file" id="imageUpload">
    </form>

</div>

@endsection
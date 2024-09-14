@extends('layout')

@section('singleListing')

    <section class="single-listing-wrapper">
        <div class="single-top-wrapper">
            <div class="listing-image-wrapper">
                <img src="{{$listing['image']}}" alt="">
            </div>
            <div class="listing-date">

            </div>
        </div>

        <div class="listing-data-wrapper-single">

            <p class="listing-price-container"><span class="listing-price-placeholder">{{$listing['price']}} </span>
                <span>₾</span></p>

            <div class="listing-data">
                <div class="listing-data-wrapper2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M5.05025 4.05025C7.78392 1.31658 12.2161 1.31658 14.9497 4.05025C17.6834 6.78392 17.6834 11.2161 14.9497 13.9497L10 18.8995L5.05025 13.9497C2.31658 11.2161 2.31658 6.78392 5.05025 4.05025ZM10 11C11.1046 11 12 10.1046 12 9C12 7.89543 11.1046 7 10 7C8.89543 7 8 7.89543 8 9C8 10.1046 8.89543 11 10 11Z"
                              fill="#021526" fill-opacity="0.5"></path>
                    </svg>
                    <span>{{$listing['city']['region']['name']}},</span>
                    <span>{{$listing['address']}}</span>
                </div>
                <div class="listing-data-wrapper2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                        <rect width="22" height="22" transform="translate(0 0.5)" fill="white"/>
                        <path d="M3 17.6111C3 18.1121 3.19901 18.5925 3.55324 18.9468C3.90748 19.301 4.38792 19.5 4.88889 19.5H18.1111C18.6121 19.5 19.0925 19.301 19.4468 18.9468C19.801 18.5925 20 18.1121 20 17.6111V4.38889C20 3.88792 19.801 3.40748 19.4468 3.05324C19.0925 2.69901 18.6121 2.5 18.1111 2.5H4.88889C4.38792 2.5 3.90748 2.69901 3.55324 3.05324C3.19901 3.40748 3 3.88792 3 4.38889V17.6111ZM11.5 5.33333H17.1667V11H15.2778V7.22222H11.5V5.33333ZM5.83333 11H7.72222V14.7778H11.5V16.6667H5.83333V11Z"
                              fill="#808A93"/>
                    </svg>
                    <span class="data">ფართი {{$listing['area']}} მ   <sup>2</sup></span>
                </div>
                <div class="listing-data-wrapper2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23" viewBox="0 0 22 23" fill="none">
                        <path d="M18.5625 10.4129C18.1291 10.2226 17.6608 10.1246 17.1875 10.125H4.8125C4.3392 10.1245 3.87097 10.2224 3.4375 10.4125C2.82485 10.6804 2.30353 11.121 1.93724 11.6804C1.57096 12.2398 1.37559 12.8938 1.375 13.5625V18.375C1.375 18.5573 1.44743 18.7322 1.57636 18.8611C1.7053 18.9901 1.88016 19.0625 2.0625 19.0625C2.24484 19.0625 2.4197 18.9901 2.54864 18.8611C2.67757 18.7322 2.75 18.5573 2.75 18.375V18.0313C2.75111 17.9404 2.78769 17.8536 2.85191 17.7894C2.91614 17.7252 3.00293 17.6886 3.09375 17.6875H18.9062C18.9971 17.6886 19.0839 17.7252 19.1481 17.7894C19.2123 17.8536 19.2489 17.9404 19.25 18.0313V18.375C19.25 18.5573 19.3224 18.7322 19.4514 18.8611C19.5803 18.9901 19.7552 19.0625 19.9375 19.0625C20.1198 19.0625 20.2947 18.9901 20.4236 18.8611C20.5526 18.7322 20.625 18.5573 20.625 18.375V13.5625C20.6243 12.8939 20.4289 12.24 20.0626 11.6806C19.6964 11.1213 19.1751 10.6808 18.5625 10.4129Z"
                              fill="#808A93"/>
                        <path d="M16.1562 3.9375H5.84375C5.20557 3.9375 4.59353 4.19102 4.14227 4.64227C3.69102 5.09353 3.4375 5.70557 3.4375 6.34375V9.4375C3.43752 9.46413 3.44373 9.4904 3.45564 9.51422C3.46755 9.53805 3.48483 9.55878 3.50612 9.57478C3.52741 9.59078 3.55213 9.60161 3.57833 9.60642C3.60453 9.61123 3.63148 9.60989 3.65707 9.6025C4.03238 9.49273 4.42146 9.43717 4.8125 9.4375H4.99426C5.03668 9.43777 5.07771 9.42234 5.10944 9.39418C5.14117 9.36602 5.16136 9.32712 5.16613 9.28496C5.20363 8.94903 5.36356 8.63868 5.61537 8.41318C5.86718 8.18768 6.19323 8.06284 6.53125 8.0625H8.9375C9.27574 8.06253 9.60211 8.18722 9.85419 8.41275C10.1063 8.63828 10.2664 8.94881 10.3039 9.28496C10.3087 9.32712 10.3289 9.36602 10.3606 9.39418C10.3923 9.42234 10.4334 9.43777 10.4758 9.4375H11.5268C11.5692 9.43777 11.6102 9.42234 11.642 9.39418C11.6737 9.36602 11.6939 9.32712 11.6987 9.28496C11.7361 8.94925 11.8959 8.63908 12.1474 8.41361C12.399 8.18814 12.7247 8.06316 13.0625 8.0625H15.4688C15.807 8.06253 16.1334 8.18722 16.3854 8.41275C16.6375 8.63828 16.7976 8.94881 16.8352 9.28496C16.8399 9.32712 16.8601 9.36602 16.8919 9.39418C16.9236 9.42234 16.9646 9.43777 17.007 9.4375H17.1875C17.5786 9.43731 17.9676 9.49302 18.3429 9.60293C18.3686 9.61033 18.3955 9.61167 18.4218 9.60683C18.448 9.602 18.4727 9.59113 18.4941 9.57508C18.5154 9.55903 18.5326 9.53824 18.5445 9.51436C18.5564 9.49049 18.5625 9.46417 18.5625 9.4375V6.34375C18.5625 5.70557 18.309 5.09353 17.8577 4.64227C17.4065 4.19102 16.7944 3.9375 16.1562 3.9375Z"
                              fill="#808A93"/>
                    </svg>
                    <span class="data">საძინებელი {{$listing['bedrooms']}}</span>

                </div>
                <div class="listing-data-wrapper2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21" viewBox="0 0 18 21" fill="none">
                        <path d="M7.89431 0.394496C7.65904 0.64712 7.52683 0.989776 7.52676 1.34709V4.83142H1.25446C0.921756 4.83142 0.602679 4.97338 0.367423 5.22606C0.132166 5.47874 0 5.82146 0 6.1788V11.5683C0 11.9257 0.132166 12.2684 0.367423 12.5211C0.602679 12.7738 0.921756 12.9157 1.25446 12.9157H7.52676V21H10.0357V12.9157H14.4664C14.6503 12.9156 14.8319 12.8722 14.9984 12.7883C15.1649 12.7045 15.3122 12.5824 15.4298 12.4307L17.8547 9.30473C17.9486 9.18368 18 9.03111 18 8.87357C18 8.71602 17.9486 8.56346 17.8547 8.4424L15.4298 5.31648C15.3122 5.16473 15.1649 5.04263 14.9984 4.95881C14.8319 4.87498 14.6503 4.8315 14.4664 4.83142H10.0357V1.34709C10.0356 1.08065 9.96202 0.820203 9.82417 0.59868C9.68633 0.377157 9.49043 0.204504 9.26124 0.102548C9.03205 0.000591374 8.77986 -0.0260908 8.53656 0.0258744C8.29325 0.0778397 8.06975 0.206119 7.89431 0.394496Z"
                              fill="#021526" fill-opacity="0.5"/>
                    </svg>
                    <span class="data">საფოსტო ინდექსი {{$listing['zip_code']}}</span>
                </div>
                <p class="single-listing-description">
                    {{$listing['description']}}
                </p>

                <div class="listing-agent-wrapper">
                    <div class="agent-details-wrapper">
                        <img class="agent-avatar" src="{{$listing['agent']['avatar']}}" alt="">
                        <div class="listing-agent-name">
                            <span class="agent-name">{{$listing['agent']['name']}}</span>
                            <span class="someclass">აგენტი</span>
                        </div>
                    </div>
                    <div>
                        <div class="agent-emaill">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M9.84341e-05 2.15414C-1.95112e-05 2.16127 -3.14003e-05 2.16839 6.24258e-05 2.17551V10.8333C6.24258e-05 12.0266 0.980211 13 2.18186 13H13.8181C15.0198 13 15.9999 12.0266 15.9999 10.8333V2.1756C16 2.16841 16 2.16122 15.9999 2.15404C15.993 0.966489 15.0155 0 13.8181 0H2.18186C0.984418 0 0.00692812 0.966547 9.84341e-05 2.15414ZM1.53211 1.84452C1.65238 1.60833 1.89971 1.44444 2.18186 1.44444H13.8181C14.1003 1.44444 14.3476 1.60833 14.4679 1.84452L8 6.34064L1.53211 1.84452ZM14.5454 3.55381V10.8333C14.5454 11.2289 14.2165 11.5556 13.8181 11.5556H2.18186C1.78353 11.5556 1.4546 11.2289 1.4546 10.8333V3.55381L7.58294 7.81389C7.83335 7.98796 8.16665 7.98796 8.41706 7.81389L14.5454 3.55381Z"
                                      fill="#808A93"/>
                            </svg>
                            <a class="agent-email" href="">{{$listing['agent']['email']}}</a>
                        </div>
                        <div class="agent-tel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                 fill="none">
                                <path d="M9.08632 3.45996C9.69678 3.57906 10.2578 3.87762 10.6976 4.31742C11.1374 4.75722 11.436 5.31825 11.5551 5.92871M9.08632 0.959961C10.3546 1.10086 11.5373 1.66882 12.4402 2.57059C13.3431 3.47236 13.9126 4.65434 14.0551 5.92246M13.4301 10.91V12.785C13.4308 12.959 13.3951 13.1313 13.3254 13.2908C13.2557 13.4503 13.1534 13.5935 13.0251 13.7111C12.8969 13.8288 12.7454 13.9184 12.5805 13.9742C12.4157 14.0299 12.2409 14.0506 12.0676 14.035C10.1443 13.826 8.29695 13.1688 6.67382 12.1162C5.16372 11.1566 3.88341 9.87632 2.92382 8.36621C1.86756 6.73571 1.21022 4.87933 1.00507 2.94746C0.989455 2.77463 1.00999 2.60044 1.06539 2.43598C1.12078 2.27152 1.2098 2.12039 1.3268 1.99222C1.4438 1.86406 1.5862 1.76165 1.74494 1.69154C1.90368 1.62142 2.07529 1.58512 2.24882 1.58496H4.12382C4.42714 1.58198 4.72119 1.68939 4.95117 1.88717C5.18116 2.08495 5.33137 2.35962 5.37382 2.65996C5.45296 3.26 5.59973 3.84917 5.81132 4.41621C5.89541 4.63991 5.91361 4.88303 5.86376 5.11676C5.81392 5.35049 5.69811 5.56503 5.53007 5.73496L4.73632 6.52871C5.62605 8.09343 6.92161 9.38899 8.48632 10.2787L9.28007 9.48496C9.45 9.31692 9.66454 9.20112 9.89827 9.15127C10.132 9.10142 10.3751 9.11962 10.5988 9.20371C11.1659 9.41531 11.755 9.56207 12.3551 9.64121C12.6587 9.68404 12.9359 9.83697 13.1342 10.0709C13.3324 10.3048 13.4377 10.6034 13.4301 10.91Z"
                                      stroke="#808A93" stroke-width="1.5" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                            <a class="agent-mobile" href="">{{$listing['agent']['phone']}}</a>
                        </div>
                    </div>

                </div>

                <button id="opendeletemodal" class="delete-listing">ლისტინგის წაშლა</button>

            </div>


        </div>

    </section>

    <!-- Slider main container -->
    <div style="width: 80%;position: relative">
        <span id="swiperprev">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                <path d="M15.8839 24.6339C15.3957 25.122 14.6043 25.122 14.1161 24.6339L5.36612 15.8839C4.87796 15.3957 4.87796 14.6043 5.36612 14.1161L14.1161 5.36612C14.6043 4.87796 15.3957 4.87796 15.8839 5.36612C16.372 5.85427 16.372 6.64573 15.8839 7.13388L9.26777 13.75L23.75 13.75C24.4404 13.75 25 14.3096 25 15C25 15.6904 24.4404 16.25 23.75 16.25H9.26777L15.8839 22.8661C16.372 23.3543 16.372 24.1457 15.8839 24.6339Z"
                      fill="#021526"/>
            </svg>
        </span>
        <div style="width: 100%;margin-bottom: 50px!important" class="swiper">

            <div class="swiper-wrapper">

                @foreach($listings as $swiperlisting)

                    <div data-listing-id="{{$listing['id']}}" class="listing-item swiper-slide">
                        <a class="swiper-slide" style="all: unset;cursor:pointer"
                           href="{{route('real-estates.show',['id'=>$swiperlisting['id']])}}">
                            <div class="listing-img-wrapper">
                                <img src="{{$swiperlisting['image']}}" alt="">
                                <span class="listing-type">{{$swiperlisting['is_rental']===1 ? 'ქირავდება' : 'იყიდება'}}</span>
                            </div>
                            <div class="listing-details-wrapper">
                                <div class="listing-address-price">
                                    @php
                                        $price = $swiperlisting['price'];
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
                                        <span>{{$swiperlisting['city']['region']['name']}},</span>
                                        <span>{{$swiperlisting['address']}}</span>
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
                                        <span class="data">{{$swiperlisting['bedrooms']}}</span>
                                    </div>
                                    <div class="listing-data-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 18 18"
                                             fill="none">
                                            <path d="M0 16C0 16.5304 0.210714 17.0391 0.585786 17.4142C0.960859 17.7893 1.46957 18 2 18H16C16.5304 18 17.0391 17.7893 17.4142 17.4142C17.7893 17.0391 18 16.5304 18 16V2C18 1.46957 17.7893 0.960859 17.4142 0.585786C17.0391 0.210714 16.5304 0 16 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V16ZM9 3H15V9H13V5H9V3ZM3 9H5V13H9V15H3V9Z"
                                                  fill="#021526" fill-opacity="0.5"/>
                                        </svg>
                                        <span class="data">{{$swiperlisting['area']}} მ   <sup>2</sup></span>

                                    </div>
                                    <div class="listing-data-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18"
                                             viewBox="0 0 16 18"
                                             fill="none">
                                            <path d="M7.01717 0.338139C6.80803 0.554674 6.69051 0.848379 6.69045 1.15465V4.14122H1.11507C0.819339 4.14122 0.535715 4.2629 0.326598 4.47948C0.117481 4.69607 0 4.98982 0 5.29612V9.91571C0 10.222 0.117481 10.5158 0.326598 10.7323C0.535715 10.9489 0.819339 11.0706 1.11507 11.0706H6.69045V18H8.9206V11.0706H12.859C13.0225 11.0705 13.1839 11.0333 13.3319 10.9614C13.4799 10.8896 13.6108 10.7849 13.7154 10.6548L15.8709 7.97548C15.9543 7.87172 16 7.74095 16 7.60591C16 7.47088 15.9543 7.34011 15.8709 7.23635L13.7154 4.55698C13.6108 4.42691 13.4799 4.32225 13.3319 4.2504C13.1839 4.17856 13.0225 4.14128 12.859 4.14122H8.9206V1.15465C8.92055 0.926271 8.85513 0.703031 8.7326 0.513154C8.61007 0.323278 8.43594 0.175289 8.23221 0.0878981C8.02849 0.000506892 7.80432 -0.0223635 7.58805 0.0221781C7.37178 0.0667197 7.17311 0.176673 7.01717 0.338139Z"
                                                  fill="#021526" fill-opacity="0.5"/>
                                        </svg>
                                        <span class="data">{{$swiperlisting['zip_code']}}</span>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev">

            </div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
        <span id="swipernext">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
  <path d="M14.1161 5.36612C14.6043 4.87796 15.3957 4.87796 15.8839 5.36612L24.6339 14.1161C25.122 14.6043 25.122 15.3957 24.6339 15.8839L15.8839 24.6339C15.3957 25.122 14.6043 25.122 14.1161 24.6339C13.628 24.1457 13.628 23.3543 14.1161 22.8661L20.7322 16.25H6.25C5.55964 16.25 5 15.6904 5 15C5 14.3096 5.55964 13.75 6.25 13.75H20.7322L14.1161 7.13388C13.628 6.64573 13.628 5.85427 14.1161 5.36612Z"
        fill="#021526"/>
</svg>
    </span>
    </div>



    <dialog id="deletelistingmodal">
        <svg id="xsvg" xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 47 47" fill="none">
            <path d="M23.5011 23.4999L29.0401 29.0389M17.9622 29.0389L23.5011 23.4999L17.9622 29.0389ZM29.0401 17.9609L23.5011 23.4999L29.0401 17.9609ZM23.5011 23.4999L17.9622 17.9609L23.5011 23.4999Z" stroke="#2D3648" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <div class="deletemodalcontainer">
            <p class="deletetext">
                გსურთ წაშალოთ ლისტინგი?
            </p>

            <div class="deletebuttons">
                <button id="closemodal">გაუქმება</button>

                <form action="{{route('real-estates.delete')}}">
                    <input type="hidden" name="id" value="{{$listing['id']}}">
                <button id="confirmdelete">დადასტურება</button>
                </form>
            </div>
        </div>


    </dialog>


    <script>


        // SLIDER
        const next = document.getElementById('swipernext')
        const prev = document.getElementById('swiperprev')

        prev.addEventListener('click', () => {
            document.querySelector('.swiper-button-prev').click()
        })
        next.addEventListener('click', () => {
            document.querySelector('.swiper-button-next').click()
        })

        const swiper = new Swiper(".swiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            loop: true,

            scrollbar: {
                el: ".swiper-scrollbar",
                hide: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });





        // Delete Modal
        const deletelistingmodal = document.getElementById('deletelistingmodal')
        const opendeletemodal = document.getElementById('opendeletemodal')
        const closemodal = document.getElementById('closemodal')
        const xsvg = document.getElementById('xsvg')




        function getScrollbarWidth() {
            // Create a temporary div to measure scrollbar width
            const scrollDiv = document.createElement('div');
            scrollDiv.style.visibility = 'hidden';
            scrollDiv.style.overflow = 'scroll'; // Force scrollbar to appear
            scrollDiv.style.width = '50px';
            scrollDiv.style.height = '50px';
            document.body.appendChild(scrollDiv);
            const scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
            document.body.removeChild(scrollDiv);
            return scrollbarWidth;
        }

        function disableScroll() {
            const scrollbarWidth = getScrollbarWidth();
            document.body.style.position = 'fixed';
            document.body.style.top = `-${window.scrollY}px`;
            document.body.style.width = `calc(100% - ${scrollbarWidth}px)`;
        }

        function enableScroll() {
            const scrollY = document.body.style.top;
            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.width = '';
            window.scrollTo(0, parseInt(scrollY || '0') * -1);
        }


        opendeletemodal.addEventListener('click', () => {
            deletelistingmodal.showModal();
            disableScroll()
        })

        closemodal.addEventListener('click', () => {
            deletelistingmodal.close();
            enableScroll()
        })

        xsvg.addEventListener('click', () => {
            deletelistingmodal.close();
            enableScroll()
        })




    </script>

@endsection
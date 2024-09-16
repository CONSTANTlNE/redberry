<dialog id="agent-modal">
    <form id="agent-form" action="{{route('agents.create')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
            <p class="modal-title">აგენტის დამატება</p>
        </div>
        <div class="modal-body">
            <div class="modal-input-wrapper">
                <div class="modal-input">
                    <label class="label" for="agent-firstname">სახელი <sup>*</sup></label>
                    <input name="name" class="agent-input" id="agent-firstname" type="text">
                    <div id="agent-firstname-validation" class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
                    </div>
                </div>
                <div class="modal-input">
                    <label class="label" for="agent-surname">გვარი</label>
                    <input name="surname" class="agent-input" id="agent-surname" type="text">
                    <div id="agent-surname-validation"  class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
                    </div>
                </div>
            </div>
            <div class="modal-input-wrapper">
                <div class="modal-input">
                    <label class="label" for="agent-email">ელ-ფოსტა <sup>*</sup></label>
                    <input name="email" class="agent-input" id="agent-email" type="text">
                    <div id="agent-email-validation" class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                        <span class="agent-validation-info">გამოიყენეთ @redberry.ge ფოსტა</span>
                    </div>
                </div>
                <div class="modal-input">
                    <label class="label" for="agent-phone">ტელეფონის ნომერი</label>
                    <input name="phone" class="agent-input" id="agent-phone" type="text">
                    <div id="agent-phone-validation" class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="#021526" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები</span>
                    </div>
                </div>
            </div>
            <div class="modal-input-photo">
                <label {{request()->routeIs('real-estates.create') ? 'id=agent-avatar-validation2' : 'id=agent-avatar-validation' }}  class="label" for="firstname">ატვირთეთ ფოტო <sup>*</sup></label>
                <div  class="agent-photo-placeholder">


                    <div  {{request()->routeIs('real-estates.create') ? 'id=imagePreviewListing' : 'id=imagePreview' }}>
                        <img  {{request()->routeIs('real-estates.create') ? 'id=uploadedAgentImage' : 'id=uploadedImage' }}   style="display:none;">

                        <svg {{request()->routeIs('real-estates.create') ? 'id=agent-avatar-delete-icon-listing' : 'id=agent-avatar-delete-icon' }}   width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="11.5" fill="white" stroke="#021526"/>
                            <path d="M6.75 8.5H7.91667H17.25" stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.0833 8.5V16.6667C16.0833 16.9761 15.9604 17.2728 15.7416 17.4916C15.5228 17.7104 15.2261 17.8333 14.9167 17.8333H9.08333C8.77391 17.8333 8.47717 17.7104 8.25838 17.4916C8.03958 17.2728 7.91667 16.9761 7.91667 16.6667V8.5M9.66667 8.5V7.33333C9.66667 7.02392 9.78958 6.72717 10.0084 6.50838C10.2272 6.28958 10.5239 6.16667 10.8333 6.16667H13.1667C13.4761 6.16667 13.7728 6.28958 13.9916 6.50838C14.2104 6.72717 14.3333 7.02392 14.3333 7.33333V8.5" stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M10.8333 11.4167V14.9167" stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.1667 11.4167V14.9167" stroke="#021526" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>

                    <svg {{request()->routeIs('real-estates.create') ? 'id=agent-avatar-upload-icon-listing' : 'id=agent-avatar-upload-icon' }}   xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                              stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 8V16" stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8 12H16" stroke="#2D3648" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

            </div>


        </div>
        <div class="modal-footer">
            <div class="modal-buttons-wrapper">
                <button type="button" id="close-agent-modal" class="buttonstyle2">გაუქმება</button>
                <button id="close-agent-modal" class="buttonstyle1">დაამატე აგენტი</button>
            </div>
        </div>
        <input style="display: none" name="file" type="file" {{request()->routeIs('real-estates.create') ? 'id=imageUpload2': 'id=imageUpload' }}>

    </form>

</dialog>
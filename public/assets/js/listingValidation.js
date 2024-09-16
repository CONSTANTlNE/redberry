
const listingForm=document.getElementById('listing-form');
const addressInput=document.getElementById('address');
const zipCodeInput=document.getElementById('zip_code');
const regionSelect=document.getElementById('region_id');
const citySelect=document.getElementById('city_id');
const priceInput=document.getElementById('price');
const areaInput=document.getElementById('area');
const bedroomsInput=document.getElementById('bedrooms');
const descriptionInput=document.getElementById('description');
const agentSelect=document.getElementById('agentinput');




const addressValidation=document.getElementById('address-validation');
const zipCodeValidation=document.getElementById('zip_code-validation');
const regionValidation=document.getElementById('region-validation');
const cityValidation=document.getElementById('city-validation');
const priceValidation=document.getElementById('price-validation');
const areaValidation=document.getElementById('area-validation');
const bedroomsValidation=document.getElementById('bedrooms-validation');
const descriptionValidation=document.getElementById('description-validation');
const agentValidate=document.getElementById('agent-validation');
const typeValidation=document.getElementById('sale-type-validation');


function validateType(name) {
    const radios = document.getElementsByName(name);

    let isSelected = false;


    for (const radio of radios) {
        if (radio.checked) {
            isSelected = true;
            break;
        }
    }

    return isSelected;
}
function validateAddress(address) {
    return typeof address === 'string' && address.trim().length >= 2;
}
function validateZip(zip) {
    return /^\d{4,}$/.test(zip);
}
function validateRegion(region) {
    return region !== "" ;
}
function validateCity(city) {
    return city !== "" ;
}
function validatePrice(price) {
    return /^\d+(\.\d+)?$/.test(price);
}
function validateArea(area) {
    return /^\d+(\.\d+)?$/.test(area);
}
function validateBedrooms(bedrooms) {
    return /^\d{1,}$/.test(bedrooms);

}
function validateDescription(description) {
    const regex = /^(?:[^\s\d]+(?:\s+[^\s\d]+){4,})$/u;

    return regex.test(description.trim());
}
function agentValidation(agent) {
    return agent !== "" ;
}
function validateAvatar(avatar) {

    if(imageUpload.files.length > 0){

        return true
    }

    if (!avatar) {
        return false
    }

    // Validate type
    const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!validImageTypes.includes(avatar.type)) {
        return false
    }

    // Validate Size
    const fileSize = avatar.size / 1024 / 1024; // in MB
    if (fileSize > 1) {
        return false
    }

    return true;
}


listingForm.addEventListener('submit', (event) => {
    event.preventDefault();


    const addressValue=addressInput.value;
    const zipCodeValue=zipCodeInput.value;
    const regionValue=regionSelect.value;
    const cityValue=citySelect.value;
    const priceValue=priceInput.value;
    const areaValue=areaInput.value;
    const bedroomsValue=bedroomsInput.value;
    const descriptionValue=descriptionInput.value;
    const agentValue=agentSelect.value;
    avatar = imageUpload.files[0];

    let isValid2 = true;

    if(!validateType('is_rental')){

        typeValidation.innerHTML =
            `
                               <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                        <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                    <span class="agent-validation-info">გთხოვთ აირჩიოთ გარიგების ტიპი</span>
            `

        typeValidation.style.color = 'red';
        isValid2 = false;
    }else{
        typeValidation.innerHTML =""
    }
    if (!validateAddress(addressValue)) {
        addressValidation.innerHTML =
            `
            <div id="address-validation"  class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
                    </div>
    `;

        addressValidation.style.color = 'red';
        addressInput.style.borderColor = 'red';
        isValid2 = false;
    }
    else {

        addressValidation.innerHTML =
            `             
              <div id="address-validation"  class="agent-validation-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
                    </div>
            
            `
        addressValidation.style.color = 'green';
        addressInput.style.borderColor = 'green';

    }

    if (!validateZip(zipCodeValue)) {
        zipCodeValidation.innerHTML =
            `
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები, მინიმუმ 4 რიცხვი</span>
            `


        zipCodeValidation.style.color = 'red';
        zipCodeInput.style.borderColor = 'red';
        isValid2 = false;
    }
    else {
        zipCodeValidation.innerHTML =
            `
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები</span>
            `

        zipCodeValidation.style.color = 'green';
        zipCodeInput.style.borderColor = 'green';


    }

    if(!validateRegion(regionValue)){
        regionValidation.innerHTML =
            `
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">გთხოვთ აირჩიოთ რეგიონი</span>
            `

        regionValidation.style.color = 'red';
        regionSelect.style.borderColor = 'red';
        isValid2 = false;
    }
    else {

        regionValidation.innerHTML = ''

        regionSelect.style.borderColor = 'green';

    }

    if(!validateCity(cityValue)){
        cityValidation.innerHTML =
            `
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">გთხოვთ აირჩიოთ ქალაქი</span>
            `

        cityValidation.style.color = 'red';
        citySelect.style.borderColor = 'red';
        isValid2 = false;

    }
    else {

        cityValidation.innerHTML = ''

        citySelect.style.borderColor = 'green';
    }

    if(!validatePrice(priceValue)){

        priceValidation.innerHTML =
            `
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები, ათწილადის შემთხვევაში გამოყავით წერტილით</span>
            `

        priceValidation.style.color = 'red';
        priceInput.style.borderColor = 'red';
        isValid2 = false;

    }
    else {

        priceValidation.innerHTML =
            `
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები </span>
            `

        priceValidation.style.color = 'green';
        priceInput.style.borderColor = 'green';

    }

    if(!validateArea(areaValue)){
        areaValidation.innerHTML =
            `
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები, ათწილადის შემთხვევაში გამოყავით წერტილით</span>
            `

        areaValidation.style.color = 'red';
        areaInput.style.borderColor = 'red';


    }
    else{

        areaValidation.innerHTML =
            `
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები</span>
            `

        areaValidation.style.color = 'green';
        areaInput.style.borderColor = 'green';
    }

    if(!validateBedrooms(bedroomsValue)){

        bedroomsValidation.innerHTML =
            `
                     <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები</span>
            `

        bedroomsValidation.style.color = 'red';
        bedroomsInput.style.borderColor = 'red';
        isValid2 = false;

    }
    else {

        bedroomsValidation.innerHTML =
            `
                     <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მხოლოდ რიცხვები</span>
            `

        bedroomsValidation.style.color = 'green';
        bedroomsInput.style.borderColor = 'green';
    }

    if(!validateDescription(descriptionValue)){

        descriptionValidation.innerHTML =
            `
                 <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მინიმუმ ხუთი სიტყვა</span>
                    </div>
            `


        descriptionValidation.style.color = 'red';
        descriptionInput.style.borderColor = 'red';
        isValid2 = false;

    }
    else {

        descriptionValidation.innerHTML =
            `
                 <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">მინიმუმ ხუთი სიტყვა</span>
                    </div>
            `

        descriptionValidation.style.color = 'green';
        descriptionInput.style.borderColor = 'green';
    }

    if(!agentValidation(agentValue)){

        agentValidate.innerHTML =
            `
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>

                        <span class="agent-validation-info">გთხოვთ აირჩიოთ აგენტი</span>
            `


        agentValidate.style.color = 'red';
        agentSelect.style.borderColor = 'red';
        isValid2 = false;
    }
    else {
        agentValidate.innerHTML =''

        agentValidate.style.color = 'green';
        agentSelect.style.borderColor = 'green';


    }

    if (!validateAvatar(avatar)) {

        agent_avatar_validation.innerHTML = 'ფოტო სავადლებულოა, მოცულობა < 1MB, ფორმატი jpeg/png/gif/webp'
        agent_avatar_validation.style.color = 'red';

        isValid2 = false;
    }
    else {

        agent_avatar_validation.innerHTML =
            ` ატვირთეთ ფოტო <sup>*</sup>
            `
        agent_avatar_validation.style.color = 'green';

    }


    if (isValid2) {
        listingForm.submit();
    }


})







// Modal Functionality
const openAgentModal = document.getElementById('agent-open-modal');
const agentModal = document.getElementById('agent-modal');
const closeAgentModal = document.getElementById('close-agent-modal');


openAgentModal.addEventListener('click', () => {
    agentModal.showModal();


})

closeAgentModal.addEventListener('click', () => {

    agentModal.close();

    agentForm.reset()

})

document.addEventListener('click', (event) => {

    if (agentModal.open && event.target!==openAgentModal) {
        agentModal.close();
    }
});


// agent Form Validation

const agentForm = document.getElementById('agent-form');
const agent_phone_validation = document.getElementById('agent-phone-validation')
const agent_surname_validation = document.getElementById('agent-surname-validation')
const agent_email_validation = document.getElementById('agent-email-validation')
const agent_firstname_validation = document.getElementById('agent-firstname-validation')

const agent_phone_input = document.getElementById('agent-phone')
const agent_firstname_input = document.getElementById('agent-firstname')
const agent_email_input = document.getElementById('agent-email')
const agent_surname_input = document.getElementById('agent-surname')
const allInputs = agentForm.querySelectorAll('input');


function validatePhone(phone) {
    return /^5\d{8}$/.test(phone);
}

function validateEmail(email) {
    return /^[^\s@]+@redberry\.ge$/.test(email);
}

function validateName(name) {

    return typeof name === 'string' && name.trim().length >= 2;
}

function validateSurname(surname) {
    return typeof surname === 'string' && surname.trim().length >= 2;
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

    if(document.getElementById('uploadedImage').src.startsWith('data:image/')){

        return true
    }



    return true;
}

function validateAvatar2(avatar2) {
    console.log('fired')
    if(imageUpload2.files.length > 0){

        return true
    }

    if (!avatar2) {
        return false
    }

    // Validate type
    const validImageTypes2 = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!validImageTypes2.includes(avatar2.type)) {
        return false
    }

    // Validate Size
    const fileSize2 = avatar2.size / 1024 / 1024; // in MB
    if (fileSize2 > 1) {
        return false
    }

    return true;
}



agentForm.addEventListener('submit', (event) => {
    event.preventDefault();

    agent_phone_validation.textContent = '';
    agent_surname_validation.textContent = '';
    agent_email_validation.textContent = '';
    agent_firstname_validation.textContent = '';
    agent_avatar_validation.textContent = '';

    const phone = agent_phone_input.value;
    const surname = agent_surname_input.value;
    const email = agent_email_input.value;
    const firstname = agent_firstname_input.value;
     avatar = imageUpload.files[0];

    let isValid = true;

    if (!validatePhone(phone)) {
        agent_phone_validation.innerHTML =
            `
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="agent-validation-info">მხოლოდ რიცხვები,ფორმატი 5XXXXXXXX</span>
    `;

        agent_phone_input.style.borderColor = 'red';
        agent_phone_validation.style.color = 'red';
        isValid = false;
    } else {
        agent_phone_validation.innerHTML =
            `             
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <span class="agent-validation-info">მხოლოდ რიცხვები,ფორმატი 5XXXXXXXX</span>
            
            `

        agent_phone_input.style.borderColor = 'green';
        agent_phone_validation.style.color = 'green';

    }

    if (!validateSurname(surname)) {
        agent_surname_validation.innerHTML =

            `
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
    `;

        agent_surname_input.style.borderColor = 'red';
        agent_surname_validation.style.color = 'red';


        isValid = false;
    } else {
        agent_surname_validation.innerHTML =
            `             
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
            
            `
        agent_surname_input.style.borderColor = 'green';
        agent_surname_validation.style.color = 'green';



    }

    if (!validateEmail(email)) {
        agent_email_validation.innerHTML =

            `
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="agent-validation-info">გამოიყენეთ @redberry.ge ფოსტა</span>
    `;


        agent_email_validation.style.color = 'red';
        agent_email_input.style.borderColor = 'red';

        isValid = false;
    } else {
        agent_email_validation.innerHTML =
            `             
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <span class="agent-validation-info">გამოიყენეთ @redberry.ge ფოსტა</span>
            
            `
        agent_email_validation.style.color = 'green';
        agent_email_input.style.borderColor = 'green';



    }

    if (!validateName(firstname)) {
        agent_firstname_validation.innerHTML =

            `
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
    `;

        agent_firstname_input.style.borderColor = 'red';
        agent_firstname_validation.style.color = 'red';

        isValid = false;
    }
    else {
        agent_firstname_validation.innerHTML =
            `             
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
            
            `

        agent_firstname_input.style.borderColor = 'green';
        agent_firstname_validation.style.color = 'green';



    }




    if(imageUpload2){
        avatar2 = imageUpload2.files[0];

        if (!validateAvatar2(avatar2)) {
            console.log('false?')
            agent_avatar_validation2.innerHTML = 'ავატარი სავადლებულოა, მოცულობა < 1MB, ფორმატი jpeg/png/gif/webp'
            agent_avatar_validation2.style.color = 'red';

            isValid = false;
        }

        else {
            console.log('true?')
            agent_avatar_validation2.innerHTML =
                ` ატვირთეთ ფოტო <sup>*</sup>
            `
            agent_avatar_validation2.style.color = 'green';

        }
    } else {
        if (!validateAvatar(avatar)) {
console.log('fired from agent mondal')
            agent_avatar_validation.innerHTML = 'ფოტო სავადლებულოა, მოცულობა < 1MB, ფორმატი jpeg/png/gif/webp'
            agent_avatar_validation.style.color = 'red';

            isValid = false;
        }
        else {

            agent_avatar_validation.innerHTML =
                ` ატვირთეთ ფოტო <sup>*</sup>
            `
            agent_avatar_validation.style.color = 'green';

        }
    }




    if (isValid) {
        agentForm.submit();
    }

})

allInputs.forEach((input) => {
    input.addEventListener('input', (e) => {


        const phone = agent_phone_input.value;
        const surname = agent_surname_input.value;
        const email = agent_email_input.value;
        const firstname = agent_firstname_input.value;
        const avatar = imageUpload.files[0];

        let isValid = true;

        if (input === agent_phone_input) {
            if (!validatePhone(phone)) {
                agent_phone_validation.innerHTML =
                    `
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="agent-validation-info">ჩაწერეთ ვალიდური მონაცემები</span>
    `;

                agent_phone_input.style.borderColor = 'red';
                agent_phone_validation.style.color = 'red';
                isValid = false;
            } else {
                agent_phone_validation.innerHTML =
                    `             
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <span class="agent-validation-info">მხოლოდ რიცხვები</span>
            
            `

                agent_phone_input.style.borderColor = 'green';
                agent_phone_validation.style.color = 'green';
                isValid = true;
            }
        }

        if (input === agent_surname_input) {
            if (!validateSurname(surname)) {
                agent_surname_validation.innerHTML =

                    `
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="agent-validation-info">ჩაწერეთ ვალიდური მონაცემები</span>
    `;

                agent_surname_input.style.borderColor = 'red';
                agent_surname_validation.style.color = 'red';


                isValid = false;
            } else {
                agent_surname_validation.innerHTML =
                    `             
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
            
            `
                agent_surname_input.style.borderColor = 'green';
                agent_surname_validation.style.color = 'green';
                isValid = true;


            }

        }

        if (input === agent_email_input) {
            if (!validateEmail(email)) {
                agent_email_validation.innerHTML =

                    `
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="agent-validation-info">გამოიყენეთ @redberry.ge ფოსტა</span>
    `;


                agent_email_validation.style.color = 'red';
                agent_email_input.style.borderColor = 'red';

                isValid = false;
            } else {
                agent_email_validation.innerHTML =
                    `             
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <span class="agent-validation-info">გამოიყენეთ @redberry.ge ფოსტა</span>
            
            `
                agent_email_validation.style.color = 'green';
                agent_email_input.style.borderColor = 'green';
                isValid = true;


            }

        }

        if (input === agent_firstname_input) {
            if (!validateName(firstname)) {
                agent_firstname_validation.innerHTML =

                    `
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
            <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="red" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="agent-validation-info">ჩაწერეთ ვალიდური მონაცემები</span>
    `;

                agent_firstname_input.style.borderColor = 'red';
                agent_firstname_validation.style.color = 'red';

                isValid = false;
            } else {
                agent_firstname_validation.innerHTML =
                    `             
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                    <path d="M11 1.4082L4.125 9.59002L1 5.87101" stroke="green" stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <span class="agent-validation-info">მინიმუმ ორი სიმბოლო</span>
            
            `

                agent_firstname_input.style.borderColor = 'green';
                agent_firstname_validation.style.color = 'green';
                isValid = true;


            }

        }


    })
})



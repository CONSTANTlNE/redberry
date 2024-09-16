
// Upload and display image

const imageUpload = document.getElementById('imageUpload');

const uploadedImage = document.getElementById('uploadedImage');
const upload_icon = document.getElementById('agent-avatar-upload-icon')
const delete_icon = document.getElementById('agent-avatar-delete-icon')
const agent_avatar_validation = document.getElementById('agent-avatar-validation')

upload_icon.addEventListener('click', () => {

    imageUpload.click()


})



imageUpload.addEventListener('change', function (event) {
    const file = event.target.files[0]; // Get the selected file
    upload_icon.style.display = 'none'
    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            uploadedImage.src = e.target.result;
            uploadedImage.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }


    const avatar = imageUpload.files[0];

    if (!validateAvatar(avatar)) {

        agent_avatar_validation.innerHTML = 'ავატარი სავადლებულოა, მოცულობა < 1MB, ფორმატი jpeg/png/gif/webp'
        agent_avatar_validation.style.color = 'red';

        isValid = false;
    }
    else {

        agent_avatar_validation.innerHTML =
            ` ატვირთეთ ფოტო <sup>*</sup>
            `
        agent_avatar_validation.style.color = 'green';

    }


    setTimeout(function () {
        delete_icon.style.display = 'flex';
    }, 100);
});


// listen for delete icon
delete_icon.addEventListener('click', (e) => {
    delete_icon.style.display = 'none';
    uploadedImage.style.display = 'none';
    upload_icon.style.display = 'block'
    imageUpload.value = '';
    agent_avatar_validation.innerHTML = 'ფოტო სავადლებულოა, მოცულობა < 1MB, ფორმატი jpeg/png/gif/webp'
    agent_avatar_validation.style.color = 'red';
})









// ==================================  Upload For Agent Avatar in createlisting =========================




const imageUpload2 = document.getElementById('imageUpload2');

const uploadedImage2 = document.getElementById('uploadedAgentImage');
const upload_icon2 = document.getElementById('agent-avatar-upload-icon-listing')
const delete_icon2 = document.getElementById('agent-avatar-delete-icon-listing')
const agent_avatar_validation2 = document.getElementById('agent-avatar-validation2')



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

if(upload_icon2){


upload_icon2.addEventListener('click', () => {

    imageUpload2.click()


})



imageUpload2.addEventListener('change', function (event) {
    const file = event.target.files[0]; // Get the selected file
    upload_icon2.style.display = 'none'
    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            uploadedImage2.src = e.target.result;
            uploadedImage2.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }


    const avatar2 = imageUpload2.files[0];

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


    setTimeout(function () {
        delete_icon2.style.display = 'flex';
    }, 100);
});


// listen for delete icon
delete_icon2.addEventListener('click', (e) => {
    delete_icon2.style.display = 'none';
    uploadedImage2.style.display = 'none';
    upload_icon2.style.display = 'block'
    imageUpload2.value = '';
    agent_avatar_validation2.innerHTML = 'ფოტო სავადლებულოა, მოცულობა < 1MB, ფორმატი jpeg/png/gif/webp'
    agent_avatar_validation2.style.color = 'red';
})
}
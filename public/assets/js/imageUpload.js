
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


// Modal Functionality
const openAgentModal = document.getElementById('agent-open-modal');
const agentModal = document.getElementById('agent-modal');
const closeAgentModal = document.getElementById('close-agent-modal');

openAgentModal.addEventListener('click', () => {
    agentModal.showModal();
})

closeAgentModal.addEventListener('click', () => {
    agentModal.close();
})



// Upload and display image


const imageUpload = document.getElementById('imageUpload');
const uploadedImage = document.getElementById('uploadedImage');
const image_div = document.getElementById('image-div');
const upload_icon=document.getElementById('agent-avatar-upload-icon')
const delete_icon=document.getElementById('agent-avatar-delete-icon')
upload_icon.addEventListener('click',()=>{

    imageUpload.click()
    upload_icon.style.display='none'

})



// Listen for file selection
imageUpload.addEventListener('change', function(event) {
    const file = event.target.files[0]; // Get the selected file

    if (file) {
        const reader = new FileReader();

        // When the file is read, display it
        reader.onload = function(e) {

            uploadedImage.src = e.target.result; // Set the image source to the file content
            uploadedImage.style.display = 'block'; // Show the image
        };

        reader.readAsDataURL(file); // Read the file as a Data URL
    }


    setTimeout(function() {
        delete_icon.style.display = 'flex';
    }, 200);
});



// listen for delete icon
delete_icon.addEventListener('click',(e)=>{
    delete_icon.style.display = 'none';
    uploadedImage.style.display = 'none';
    upload_icon.style.display='block'

})


// agent Form Validation



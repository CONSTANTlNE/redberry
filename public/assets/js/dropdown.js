const regionDropdownBtn = document.getElementById('region_dropdown_btn');
const regionDropdown = document.getElementById('region_dropdown');
const arrowToggle = document.getElementById('region_svg');

// Function to toggle the dropdown visibility


function toggleDropdown() {
    arrowToggle.classList.toggle('arrow-toggle');

    if (regionDropdownBtn.classList.contains('select-btn-color')) {

        regionDropdownBtn.classList.remove('select-btn-color');
        regionDropdownBtn.classList.add('select-btn-color-active');
    } else {

        regionDropdownBtn.classList.remove('select-btn-color-active');
        regionDropdownBtn.classList.add('select-btn-color');
    }

    regionDropdown.classList.toggle('hidden');
    regionDropdown.classList.toggle('flex');
}

// Function to close the dropdown
function closeDropdown() {
    arrowToggle.classList.remove('arrow-toggle');

    if (regionDropdownBtn.classList.contains('select-btn-color-active')) {
        regionDropdownBtn.classList.remove('select-btn-color-active');
        regionDropdownBtn.classList.add('select-btn-color');
    }

    regionDropdown.classList.remove('flex');
    regionDropdown.classList.add('hidden');
}


regionDropdownBtn.addEventListener('click', function (event) {

    event.stopPropagation();
    toggleDropdown();
});


document.getElementById('select-region').addEventListener('click', function (event) {

    closeDropdown();
});



// close whe clicking elsewere
document.addEventListener('click', function (event) {

    if (regionDropdown.classList.contains('flex') &&
        !regionDropdown.contains(event.target) &&
        !regionDropdownBtn.contains(event.target)) {
        closeDropdown();
    }
});







 // Dropdown functionality for pricerange arearange and rooms dropdown


const inlineBtns = document.querySelectorAll('.inline-btn');
const inlineDropdowns = document.querySelectorAll('.inline-dropdown');
const inlineSvgs = document.querySelectorAll('.inline-svg');

let currentlyOpenIndex = null;

inlineBtns.forEach(function (inlineBtn, index) {

    inlineBtn.addEventListener('click', function (event) {
        event.stopPropagation();
        closeDropdown();

        if (currentlyOpenIndex !== null && currentlyOpenIndex !== index) {
            // Close the previously opened dropdown
            inlineDropdowns[currentlyOpenIndex].classList.remove('inline-flex');
            inlineDropdowns[currentlyOpenIndex].classList.add('hidden');
            inlineBtns[currentlyOpenIndex].classList.remove('select-btn-color-active');
            inlineBtns[currentlyOpenIndex].classList.add('select-btn-color');
            inlineSvgs[currentlyOpenIndex].classList.remove('arrow-toggle');
        }

        if (inlineBtn.classList.contains('select-btn-color')) {
            inlineBtn.classList.remove('select-btn-color');
            inlineBtn.classList.add('select-btn-color-active');
        } else {
            inlineBtn.classList.remove('select-btn-color-active');
            inlineBtn.classList.add('select-btn-color');
        }

        if (inlineDropdowns[index].classList.contains('hidden')) {
            inlineDropdowns[index].classList.remove('hidden');
            inlineDropdowns[index].classList.add('inline-flex');
        } else {
            inlineDropdowns[index].classList.remove('inline-flex');
            inlineDropdowns[index].classList.add('hidden');
        }

        if (inlineSvgs[index].classList.contains('arrow-toggle')) {
            inlineSvgs[index].classList.remove('arrow-toggle');
        } else {
            inlineSvgs[index].classList.add('arrow-toggle');
        }

        currentlyOpenIndex = (currentlyOpenIndex === index) ? null : index; // Toggle state
    }, );
});


// Close dropdown when clicking outside
document.addEventListener('click', (event)=> {

    // console.log(event.target)
    if (currentlyOpenIndex !== null && !event.target.closest('.inline-dropdown') || event.target.classList.contains('select-price-btn') ) {
        inlineDropdowns[currentlyOpenIndex].classList.remove('inline-flex');
        inlineDropdowns[currentlyOpenIndex].classList.add('hidden');
        inlineBtns[currentlyOpenIndex].classList.remove('select-btn-color-active');
        inlineBtns[currentlyOpenIndex].classList.add('select-btn-color');
        inlineSvgs[currentlyOpenIndex].classList.add('arrow-toggle');

        currentlyOpenIndex = null; // Reset index
    }

}, true);



// Customizing Region Checkboxes

const regionlabels=document.querySelectorAll('.region-labels')
const regioncheckboxes=document.querySelectorAll('.regions-checkbox')

const checkedsvg=document.querySelectorAll('.chekedsvg')
const uncheckedsvg=document.querySelectorAll('.uncheckedsvg')

regioncheckboxes.forEach((checkbox, index) => {
    checkbox.addEventListener('click', () => {
        if (regioncheckboxes[index].checked) {
            regionlabels[index].classList.add('checked-label');
            checkedsvg[index].style.display='block';
            uncheckedsvg[index].style.display='none';
        } else {
            checkedsvg[index].style.display='none';
            uncheckedsvg[index].style.display='block';
        }
    })
})

regioncheckboxes.forEach((checkbox, index) => {
    if (regioncheckboxes[index].checked) {
        regionlabels[index].classList.add('checked-label');
        checkedsvg[index].style.display='block';
        uncheckedsvg[index].style.display='none';
    } else {
        checkedsvg[index].style.display='none';
        uncheckedsvg[index].style.display='block';
    }
})





// ================ PRICERANGE VALIDATION ========================


const minprices=document.querySelectorAll('[data-min-price]')
const maxprices=document.querySelectorAll('[data-max-price]')
const rangebtn=document.getElementById('pricerangesubmit')
let validprice=true
let validarea=true
let validroom=true




//  Price Range Validation on Predefined prices click

minprices.forEach((ggg, index) => {

    ggg.addEventListener('click', () => {
     document.querySelector('input[name="minprice"]').value=minprices[index].dataset.minPrice

        if(parseInt(document.querySelector('input[name="minprice"]').value) > parseInt(document.querySelector('input[name="maxprice"]').value)){

            document.querySelector('.maxpricerange').style.border='2px solid red'
            rangebtn.setAttribute('type', 'button')
            validprice=false
            document.getElementById('pricerangediv').style.border = "1px solid red";


        } else {
            document.querySelector('.maxpricerange').style.border="1px solid #808A93"
            rangebtn.setAttribute('type', 'submit')
            validprice=true
            document.getElementById('pricerangediv').style.border = "none";

        }
    })
})



maxprices.forEach((bbb, index) => {
    bbb.addEventListener('click', () => {

        document.querySelector('input[name="maxprice"]').value=maxprices[index].dataset.maxPrice

        if(parseInt(document.querySelector('input[name="minprice"]').value) > parseInt(document.querySelector('input[name="maxprice"]').value)){

            document.querySelector('.maxpricerange').style.border='2px solid red'
            rangebtn.setAttribute('type', 'button')
            validprice=false
            document.getElementById('pricerangediv').style.border = "1px solid red";


        } else {
            document.querySelector('.maxpricerange').style.border="1px solid #808A93"
            rangebtn.setAttribute('type', 'submit')
            validprice=true
            document.getElementById('pricerangediv').style.border = "none";


        }
    })
})



// Price Range Validation on INPUT

document.querySelector('input[name="minprice"]').addEventListener('input', (event) => {
    const mininput = event.target.value;
    const numericValue = parseInt(mininput);
    if (isNaN(numericValue)) {

        document.querySelector('.minrpricerange').style.border='2px solid red'
        rangebtn.setAttribute('type', 'button')
        validprice=false




    } else {
        document.querySelector('.minrpricerange').style.border="1px solid #808A93"
        rangebtn.setAttribute('type', 'submit')

        if(parseInt(document.querySelector('input[name="minprice"]').value) > parseInt(document.querySelector('input[name="maxprice"]').value)){

            document.querySelector('.maxpricerange').style.border='2px solid red'
            rangebtn.setAttribute('type', 'button')
            document.getElementById('pricerangediv').style.border = "1px solid red";
            validprice=false


        } else {
            document.querySelector('.maxpricerange').style.border="1px solid #808A93"
            rangebtn.setAttribute('type', 'submit')
            document.getElementById('pricerangediv').style.border = "none";
            validprice=true

        }



    }







});

document.querySelector('input[name="maxprice"]').addEventListener('input', (event) => {
    const maxinput = event.target.value;

    // Convert the value to a number
    const numericValue = parseFloat(maxinput);
    console.log(isNaN(numericValue))
    // Check if the value is not a valid integer
    if (isNaN(numericValue)) {
        console.log('its nan')
        document.querySelector('.maxpricerange').style.border='2px solid red'
        rangebtn.setAttribute('type', 'button')
        validprice=false
        document.getElementById('pricerangediv').style.border = "1px solid red";


    } else {
        document.querySelector('.maxpricerange').style.border="1px solid #808A93"
        rangebtn.setAttribute('type', 'submit')

        if(parseInt(document.querySelector('input[name="minprice"]').value) > parseInt(document.querySelector('input[name="maxprice"]').value)){

            document.querySelector('.maxpricerange').style.border='2px solid red'
            rangebtn.setAttribute('type', 'button')
            document.getElementById('pricerangediv').style.border = "1px solid red";
            validprice=false


        } else {
            document.querySelector('.maxpricerange').style.border="1px solid #808A93"
            rangebtn.setAttribute('type', 'submit')
            validprice=true
            document.getElementById('pricerangediv').style.border = "none";
        }


    }









});



// ================ AREA Range VALIDATION ========================


// AREA Range Validation on INPUT

const minareas=document.querySelectorAll('[data-min-area]')
const maxareas=document.querySelectorAll('[data-max-area]')
const areabtn=document.querySelector('.pricerangesubmit')


//  AREA Range Validation on Predefined prices click



minareas.forEach((ggg, index) => {

    ggg.addEventListener('click', () => {
        document.querySelector('input[name="minarea"]').value=minareas[index].dataset.minArea

        if(parseInt(document.querySelector('input[name="minarea"]').value) > parseInt(document.querySelector('input[name="maxarea"]').value)){

            document.querySelector('.maxarearange').style.border='2px solid red'
            areabtn.setAttribute('type', 'button')
            validarea=false
            document.getElementById('arearangediv').style.border = "1px solid red";



        } else {
            document.querySelector('.maxarearange').style.border="1px solid #808A93"
            areabtn.setAttribute('type', 'submit')
            validarea=true
            document.getElementById('arearangediv').style.border = "none";

        }
    })
})

maxareas.forEach((bbb, index) => {
    bbb.addEventListener('click', () => {

        document.querySelector('input[name="maxarea"]').value=maxareas[index].dataset.maxArea

        if(parseInt(document.querySelector('input[name="minarea"]').value) > parseInt(document.querySelector('input[name="maxarea"]').value)){

            document.querySelector('.maxarearange').style.border='2px solid red'
            areabtn.setAttribute('type', 'button')
            validarea=false
            document.getElementById('arearangediv').style.border = "1px solid red";


        } else {
            document.querySelector('.maxarearange').style.border="1px solid #808A93"
            areabtn.setAttribute('type', 'submit')
            validarea=true
            document.getElementById('arearangediv').style.border = "none";

        }
    })
})





// AREA Range Validation on INPUT

document.querySelector('input[name="minarea"]').addEventListener('input', (event) => {
    const mininput2 = event.target.value;
    const numericValue2 = parseInt(mininput2);
    if (isNaN(numericValue2)) {


        document.querySelector('.minarearange').style.border='2px solid red'
        areabtn.setAttribute('type', 'button')
        validarea=false
        document.getElementById('arearangediv').style.border = "1px solid red";


    } else {
        document.querySelector('.minarearange').style.border="1px solid #808A93"
        areabtn.setAttribute('type', 'submit')

        if(parseInt(document.querySelector('input[name="minarea"]').value) > parseInt(document.querySelector('input[name="maxarea"]').value)){

            document.querySelector('.maxarearange').style.border='2px solid red'
            areabtn.setAttribute('type', 'button')
            document.getElementById('arearangediv').style.border = "1px solid red";
            validarea=false

        } else {
            document.querySelector('.maxarearange').style.border="1px solid #808A93"
            areabtn.setAttribute('type', 'submit')
            document.getElementById('arearangediv').style.border = "none";

            validarea=true
        }



    }







});

document.querySelector('input[name="maxarea"]').addEventListener('input', (event) => {
    const maxinput2 = event.target.value;

    // Convert the value to a number
    const numericValue = parseFloat(maxinput2);

    // Check if the value is not a valid integer
    if (isNaN(numericValue)) {

        document.querySelector('.maxarearange').style.border='2px solid red'
        areabtn.setAttribute('type', 'button')
        validarea=false



    } else {
        document.querySelector('.maxarearange').style.border="1px solid #808A93"
        areabtn.setAttribute('type', 'submit')

        if(parseInt(document.querySelector('input[name="minarea"]').value) > parseInt(document.querySelector('input[name="maxarea"]').value)){

            document.querySelector('.maxarearange').style.border='2px solid red'
            areabtn.setAttribute('type', 'button')
            validarea=false
            document.getElementById('arearangediv').style.border = "1px solid red";


        } else {
            document.querySelector('.maxarearange').style.border="1px solid #808A93"
            areabtn.setAttribute('type', 'submit')
            document.getElementById('arearangediv').style.border = "none";

            validarea=true
        }



    }









});



// ROOMS VALIDATIOM


const roomsbtn=document.querySelector('.roomsbtn')

document.querySelector('input[name="bedrooms"]').addEventListener('input', (event) => {
    const rooms = event.target.value;
    const numericValue2 = parseInt(rooms);
    if (isNaN(numericValue2) && rooms !== '') {


        document.querySelector('.roomsbox').style.border='2px solid red'
        roomsbtn.setAttribute('type', 'button')
        validroom=false
        // document.getElementById('roomsdiv').style.borderRadius = "10px";

        document.getElementById('roomsdiv').style.border = "1px solid red";


    } else {
        document.querySelector('.roomsbox').style.border="1px solid #808A93"
        roomsbtn.setAttribute('type', 'submit')
        validroom=true
        document.getElementById('roomsdiv').style.border = "none";


    }

});



// ====  whole form validation ====


const select_form=document.querySelector('.select-wrapper')


select_form.addEventListener('submit', (event) => {

    if(validroom===false || validarea===false || validprice===false){

        event.preventDefault();
    } else {

        select_form.submit();
    }



})
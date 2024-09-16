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



//  Price Range Validation on Predefined prices click

minprices.forEach((ggg, index) => {

    ggg.addEventListener('click', () => {
     document.querySelector('input[name="minprice"]').value=minprices[index].dataset.minPrice

        if(parseInt(document.querySelector('input[name="minprice"]').value) > parseInt(document.querySelector('input[name="maxprice"]').value)){

            document.querySelector('.maxpricerange').style.border='2px solid red'
            rangebtn.setAttribute('type', 'button')


        } else {
            document.querySelector('.maxpricerange').style.border="1px solid #808A93"
            rangebtn.setAttribute('type', 'submit')
        }
    })
})

maxprices.forEach((bbb, index) => {
    bbb.addEventListener('click', () => {

        document.querySelector('input[name="maxprice"]').value=maxprices[index].dataset.maxPrice

        if(parseInt(document.querySelector('input[name="minprice"]').value) > parseInt(document.querySelector('input[name="maxprice"]').value)){

            document.querySelector('.maxpricerange').style.border='2px solid red'
            rangebtn.setAttribute('type', 'button')


        } else {
            document.querySelector('.maxpricerange').style.border="1px solid #808A93"
            rangebtn.setAttribute('type', 'submit')
        }
    })
})

// Price Range Validation on INPUT

document.querySelector('input[name="minprice"]').addEventListener('input', (event) => {
    const mininput = event.target.value;
    const numericValue = parseInt(mininput);
    if (isNaN(numericValue)) {
        console.log(isNaN(numericValue))

         console.log(  document.querySelector('.minrpricerange')
         )
        document.querySelector('.minrpricerange').style.border='2px solid red'
        rangebtn.setAttribute('type', 'button')


    } else {
        document.querySelector('.minrpricerange').style.border="1px solid #808A93"
        rangebtn.setAttribute('type', 'submit')

        if(parseInt(document.querySelector('input[name="minprice"]').value) > parseInt(document.querySelector('input[name="maxprice"]').value)){

            document.querySelector('.maxpricerange').style.border='2px solid red'
            rangebtn.setAttribute('type', 'button')


        } else {
            document.querySelector('.maxpricerange').style.border="1px solid #808A93"
            rangebtn.setAttribute('type', 'submit')
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


    } else {
        document.querySelector('.maxpricerange').style.border="1px solid #808A93"
        rangebtn.setAttribute('type', 'submit')

        if(parseInt(document.querySelector('input[name="minprice"]').value) > parseInt(document.querySelector('input[name="maxprice"]').value)){

            document.querySelector('.maxpricerange').style.border='2px solid red'
            rangebtn.setAttribute('type', 'button')


        } else {
            document.querySelector('.maxpricerange').style.border="1px solid #808A93"
            rangebtn.setAttribute('type', 'submit')
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


        } else {
            document.querySelector('.maxarearange').style.border="1px solid #808A93"
            areabtn.setAttribute('type', 'submit')
        }
    })
})

maxareas.forEach((bbb, index) => {
    bbb.addEventListener('click', () => {

        document.querySelector('input[name="maxarea"]').value=maxareas[index].dataset.maxArea

        if(parseInt(document.querySelector('input[name="minarea"]').value) > parseInt(document.querySelector('input[name="maxarea"]').value)){

            document.querySelector('.maxarearange').style.border='2px solid red'
            areabtn.setAttribute('type', 'button')


        } else {
            document.querySelector('.maxarearange').style.border="1px solid #808A93"
            areabtn.setAttribute('type', 'submit')
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


    } else {
        document.querySelector('.minarearange').style.border="1px solid #808A93"
        areabtn.setAttribute('type', 'submit')

        if(parseInt(document.querySelector('input[name="minarea"]').value) > parseInt(document.querySelector('input[name="maxarea"]').value)){

            document.querySelector('.maxarearange').style.border='2px solid red'
            areabtn.setAttribute('type', 'button')


        } else {
            document.querySelector('.maxarearange').style.border="1px solid #808A93"
            areabtn.setAttribute('type', 'submit')
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


    } else {
        document.querySelector('.maxarearange').style.border="1px solid #808A93"
        areabtn.setAttribute('type', 'submit')

        if(parseInt(document.querySelector('input[name="minarea"]').value) > parseInt(document.querySelector('input[name="maxarea"]').value)){

            document.querySelector('.maxarearange').style.border='2px solid red'
            areabtn.setAttribute('type', 'button')


        } else {
            document.querySelector('.maxarearange').style.border="1px solid #808A93"
            areabtn.setAttribute('type', 'submit')
        }

    }









});



// ROOMS VALIDATIOM


const roomsbtn=document.querySelector('.roomsbtn')

document.querySelector('input[name="bedrooms"]').addEventListener('input', (event) => {
    const rooms = event.target.value;
    const numericValue2 = parseInt(rooms);
    if (isNaN(numericValue2)) {


        document.querySelector('.roomsbox').style.border='2px solid red'
        roomsbtn.setAttribute('type', 'button')


    } else {
        document.querySelector('.roomsbox').style.border="1px solid #808A93"
        roomsbtn.setAttribute('type', 'submit')


    }

});

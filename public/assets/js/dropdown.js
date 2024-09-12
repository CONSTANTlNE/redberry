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

// Click event for the button
regionDropdownBtn.addEventListener('click', function (event) {
    event.stopPropagation(); // Prevent click from propagating to the document
    toggleDropdown();
});



// Click event for the document to close dropdown when clicking outside
document.addEventListener('click', function (event) {
    // Check if the click is outside the dropdown and button



    if (!regionDropdown.contains(event.target) && event.target !== regionDropdownBtn) {
        if (!regionDropdown.classList.contains('hidden')) {
            toggleDropdown(); // Close the dropdown
        }
    }
}, true);












const inlineBtns = document.querySelectorAll('.inline-btn');
const inlineDropdowns = document.querySelectorAll('.inline-dropdown');
const inlineSvgs = document.querySelectorAll('.inline-svg');

let currentlyOpenIndex = null;

inlineBtns.forEach(function (inlineBtn, index) {

    inlineBtn.addEventListener('click', function (event) {
        event.stopPropagation();


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
    });
});

// Close dropdown when clicking outside
document.addEventListener('click', function () {
    if (currentlyOpenIndex !== null) {
        inlineDropdowns[currentlyOpenIndex].classList.remove('inline-flex');
        inlineDropdowns[currentlyOpenIndex].classList.add('hidden');
        inlineBtns[currentlyOpenIndex].classList.remove('select-btn-color-active');
        inlineBtns[currentlyOpenIndex].classList.add('select-btn-color');
        inlineSvgs[currentlyOpenIndex].classList.add('arrow-toggle');

        currentlyOpenIndex = null; // Reset index
    }
}, true);


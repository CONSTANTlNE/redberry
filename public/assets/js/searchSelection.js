document.addEventListener("DOMContentLoaded", function () {
    const regions_checkbox = document.querySelectorAll(".regions-checkbox");
     const search_form=document.querySelector('.search-wrapper')
    let remove_btns = document.querySelectorAll(".remove-icon");


    remove_btns.forEach((remove_btn) => {
        remove_btn.addEventListener("click", (event) => {
            event.target.parentElement.remove();
        })
    })





  // Functionality for Region button
const select_region_btn=document.getElementById("select-region");
    select_region_btn.addEventListener('click', (event) => {
        const checkedRegions = Array.from(regions_checkbox).filter((region) => region.checked);

        checkedRegions.forEach((checkedRegion) => {

            search_form.innerHTML +=
                `
<div class="search-item-wrapper">
            <input id="region" type="hidden" value="${checkedRegion.value}" name="region">
            <span class="searchable">${checkedRegion.dataset.name}</span>
            <svg class="remove-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15"
                 fill="none">
                <path d="M10.5 4L3.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.5 4L10.5 11" stroke="#354451" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        
        `

        });

        remove_btns = document.querySelectorAll(".remove-icon");
        remove_btns.forEach((remove_btn) => {
            remove_btn.addEventListener("click", (event) => {
                event.target.parentElement.remove();
            })
        })

    });
})

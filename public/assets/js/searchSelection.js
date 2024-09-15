let removeregion = document.querySelectorAll(".search-region");
let removepricerange = document.querySelector(".search-pricerange");
let removearearange = document.querySelector(".search-arearange");

let removebedrooms = document.querySelector(".search-bedrooms");
const select_wrapper= document.querySelector('.select-wrapper');

if(removeregion.length > 0) {
    removeregion.forEach((event) => {
        event.addEventListener('click', () => {
            const inputElement = event.querySelector('input[name="region"]');

            formregions = select_wrapper.querySelectorAll('input[name="region[]"]')

            formregions.forEach((formregion) => {
                if (formregion.value === inputElement.value) {
                    formregion.checked = false;
                }
            })

            select_wrapper.submit();

        });
    });
}


if(removepricerange) {
    removepricerange.addEventListener('click', (pricerange) => {

        select_wrapper.querySelector('input[name="minprice"]').value = null;
        select_wrapper.querySelector('input[name="maxprice"]').value = null;

        select_wrapper.submit();

    })
}


if(removearearange) {
    removearearange.addEventListener('click', (arearange) => {
        console.log('click')
        select_wrapper.querySelector('input[name="minarea"]').value = null;
        select_wrapper.querySelector('input[name="maxarea"]').value = null;

        select_wrapper.submit();
    })

}


if(removebedrooms) {
    removebedrooms.addEventListener('click', (bedrooms) => {
        select_wrapper.querySelector('input[name="bedrooms"]').value = null;

        select_wrapper.submit();
    })

}


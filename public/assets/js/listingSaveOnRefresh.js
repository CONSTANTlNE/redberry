const saleType= document.getElementById('sale-type');
const rentType  = document.getElementById('rent-type');
const address= document.getElementById('address');
const zipCode= document.getElementById('zip_code');
const region= document.getElementById('region_id');
const city= document.getElementById('city_id');
const price= document.getElementById('price');
const area= document.getElementById('area');
const description= document.getElementById('description');
const agent= document.getElementById('agentinput');
const agentName=document.querySelector('.agent-listing-class')
const bedrooms= document.getElementById('bedrooms');

const listingform=document.getElementById('listing-form');
const rentradio2 = document.getElementById('rent-type')
const saleradio2 = document.getElementById('sale-type')
const sale_checked2 = document.querySelector('.sale_checked');
const sale_unchecked2 = document.querySelector('.sale_unchecked');
const rental_checked2 = document.querySelector('.rental_checked');
const rental_unchecked2 = document.querySelector('.rental_unchecked');



function saveForm() {

    localStorage.setItem('address', address.value);
    localStorage.setItem('zipCode', zipCode.value);
    localStorage.setItem('region', region.value);
    localStorage.setItem('city', city.value);
    localStorage.setItem('price', price.value);
    localStorage.setItem('area', area.value);
    localStorage.setItem('description', description.value);
    localStorage.setItem('bedrooms', bedrooms.value);


}

function loadForm() {


    if (localStorage.getItem('address')) {
        address.value = localStorage.getItem('address');
    }

    if (localStorage.getItem('zipCode')) {
        zipCode.value = localStorage.getItem('zipCode');
    }

    if (localStorage.getItem('region')) {
        region.value = localStorage.getItem('region');
    }

    if (localStorage.getItem('city')) {
        city.value = localStorage.getItem('city');
    }

    if (localStorage.getItem('price')) {
        price.value = localStorage.getItem('price');
    }

    if (localStorage.getItem('area')) {
        area.value = localStorage.getItem('area');
    }

    if (localStorage.getItem('description')) {
        description.value = localStorage.getItem('description');
    }

    if (localStorage.getItem('agent')) {

        agent.value = localStorage.getItem('agent');
        agentName.innerHTML = localStorage.getItem('agentName');
    }

    if (localStorage.getItem('bedrooms')) {
        bedrooms.value = localStorage.getItem('bedrooms');
    }




    if(localStorage.getItem('rentType') === 'checked'){

        rentradio2.click()
    }


    if(localStorage.getItem('saleType') === 'checked'){

        saleradio2.click()

    }



}


// Save Agent

custom_option.forEach(function (custom_option) {
    custom_option.addEventListener('click', function (event) {

        localStorage.setItem('agent', event.target.getAttribute('data-agent-id'));
        localStorage.setItem('agentName', event.target.innerHTML);
    });

})

// Save Listing Type

rentradio2.addEventListener('click', () => {

    localStorage.setItem('rentType', 'checked');
    if(localStorage.getItem('saleType') === 'checked'){
        localStorage.setItem('saleType', 'null');
    }


})


saleradio2.addEventListener('click', () => {

    localStorage.setItem('saleType', 'checked');
    if(localStorage.getItem('rentType') === 'checked'){
        localStorage.setItem('rentType', 'null');
    }
    sale_checked2.style.display = 'block'
    sale_unchecked2.style.display = 'none'
    rental_checked2.style.display = 'none'
    rental_unchecked2.style.display = 'block'

})




listingform.addEventListener('input', (event) => {
    saveForm();
});

listingform.addEventListener('change', (event) => {
    saveForm();
});





window.addEventListener('load', loadForm);
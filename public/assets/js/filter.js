const selectRegionBtn = document.querySelector('#select-region');
const listingsindom = document.querySelectorAll('[data-listing-id]');

let sessionRegions = JSON.parse(sessionStorage.getItem('selectedRegions'));
let regionSet = new Set(sessionRegions);


// FILTERED BY REGION
let filteredListings = allistings.filter(listing =>
    regionSet.has(listing.city.region_id.toString())
);

let filteredListingIds = filteredListings.map(listing => listing.id);


if (sessionRegions) {
    listingsindom.forEach((listing) => {

        const listingId = parseInt(listing.dataset.listingId, 10);

        // console.log(listingId); // For debugging

        if (filteredListingIds.includes(listingId)) {
            listing.style.display = 'block';
        } else {
            listing.style.display = 'none';
        }
    })
}


selectRegionBtn.addEventListener('click', (event) => {

    // Get checked regions
    let checkedRegions = document.querySelectorAll('.regions-checkbox:checked');
    checkedRegions = Array.from(checkedRegions);
    // get ID of regions from nodelist
    let selectedRegions = checkedRegions.map(checkbox => checkbox.value);

    // put selected regions  in sessionRegions
    sessionStorage.setItem('selectedRegions', JSON.stringify(selectedRegions));


    // FILTERED BY REGION
    sessionRegions = JSON.parse(sessionStorage.getItem('selectedRegions'));


    regionSet = new Set(sessionRegions);

    filteredListings = allistings.filter(listing =>
        regionSet.has(listing.city.region_id.toString())
    );

    filteredListingIds = filteredListings.map(listing => listing.id);

    console.log(filteredListingIds);


    if (sessionRegions) {
        listingsindom.forEach((listing) => {

            const listingId = parseInt(listing.dataset.listingId, 10);

            console.log(listingId); // For debugging

            if (filteredListingIds.includes(listingId)) {
                listing.style.display = 'block';
            } else {
                listing.style.display = 'none';
            }
        })
    }
});




// Leave checkboxes checked on refresh


let regionCheckboxes = document.querySelectorAll('.regions-checkbox');

if (sessionRegions){
    regionCheckboxes.forEach((checkbox) => {

        if (sessionRegions.includes(checkbox.value)) {
            checkbox.checked = true;
        }
    })
}












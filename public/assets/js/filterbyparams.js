// const params = new URLSearchParams(window.location.search);
// const regions = params.getAll('region[]');
// const listingsindom = document.querySelectorAll('[data-listing-id]');
//
//
// let regionSet = new Set(regions);
//
//
// // FILTERED BY REGION
// let filteredListings = allistings.filter(listing =>
//     regionSet.has(listing.city.region_id.toString())
// );
//
// let filteredListingIds = filteredListings.map(listing => listing.id);
//
//
// if (regions.length > 0) {
//
//     listingsindom.forEach((listing) => {
//
//         const listingId = parseInt(listing.dataset.listingId, 10);
//
//         // console.log(listingId); // For debugging
//
//         if (filteredListingIds.includes(listingId)) {
//             listing.style.display = 'block';
//         } else {
//             listing.style.display = 'none';
//         }
//     })
// }
//
//
//
//
// let regionCheckboxes = document.querySelectorAll('.regions-checkbox');
//
// if (regions.length > 0) {
//     regionCheckboxes.forEach((checkbox) => {
//
//         if (regions.includes(checkbox.value)) {
//             checkbox.checked = true;
//         }
//
//     })
// }
//
//
//
//

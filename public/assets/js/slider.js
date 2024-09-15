

// SLIDER
const next = document.getElementById('swipernext')
const prev = document.getElementById('swiperprev')

prev.addEventListener('click', () => {
    document.querySelector('.swiper-button-prev').click()
})
next.addEventListener('click', () => {
    document.querySelector('.swiper-button-next').click()
})

const swiper = new Swiper(".swiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,

    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});





// Delete Modal
const deletelistingmodal = document.getElementById('deletelistingmodal')
const opendeletemodal = document.getElementById('opendeletemodal')
const closemodal = document.getElementById('closemodal')
const xsvg = document.getElementById('xsvg')




function getScrollbarWidth() {
    // Create a temporary div to measure scrollbar width
    const scrollDiv = document.createElement('div');
    scrollDiv.style.visibility = 'hidden';
    scrollDiv.style.overflow = 'scroll'; // Force scrollbar to appear
    scrollDiv.style.width = '50px';
    scrollDiv.style.height = '50px';
    document.body.appendChild(scrollDiv);
    const scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
    document.body.removeChild(scrollDiv);
    return scrollbarWidth;
}

function disableScroll() {
    const scrollbarWidth = getScrollbarWidth();
    document.body.style.position = 'fixed';
    document.body.style.top = `-${window.scrollY}px`;
    document.body.style.width = `calc(100% - ${scrollbarWidth}px)`;
}

function enableScroll() {
    const scrollY = document.body.style.top;
    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.width = '';
    window.scrollTo(0, parseInt(scrollY || '0') * -1);
}


opendeletemodal.addEventListener('click', () => {
    deletelistingmodal.showModal();
    disableScroll()
})

closemodal.addEventListener('click', () => {
    deletelistingmodal.close();
    enableScroll()
})

xsvg.addEventListener('click', () => {
    deletelistingmodal.close();
    enableScroll()
})




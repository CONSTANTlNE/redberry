let items=document.querySelectorAll('.listing-item')

console.log(items)
// SLIDER
const next = document.getElementById('swipernext')
const prev = document.getElementById('swiperprev')

prev.addEventListener('click', () => {

    if(items.length>=5){
    document.querySelector('.swiper-button-prev').click()
    }


})
next.addEventListener('click', () => {
    items=document.querySelectorAll('.listing-item')

    if(items.length>=5){
        document.querySelector('.swiper-button-next').click()
        document.querySelector('.swiper-wrapper').style.transform = 'translate3d(-350px, 0px, 0px)';
    }


})




const swiper = new Swiper(".swiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    centeredSlides:true,


    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});


document.addEventListener('DOMContentLoaded',()=>{

    if(items.length>=5) {
        setTimeout(() => {
            document.querySelector('.swiper-wrapper').style.transform = 'translate3d(0px, 0px, 0px)';

        }, 100)
    }

    if(items.length==4) {
        setTimeout(() => {
            document.querySelector('.swiper-wrapper').style.transform = 'translate3d(0px, 0px, 0px)';

        }, 100)
    }

    if (items.length==3){
        setTimeout(() => {
            document.querySelector('.swiper-wrapper').style.transform = 'translate3d(210px, 0px, 0px)';

        }, 100)
    }
    if (items.length==2){
        setTimeout(() => {
            document.querySelector('.swiper-wrapper').style.transform = 'translate3d(350px, 0px, 0px)';

        }, 100)
    }
})





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


document.addEventListener('click', (event) => {

    if (deletelistingmodal.open && event.target!==opendeletemodal) {
        deletelistingmodal.close();
        enableScroll()
    }
});




xsvg.addEventListener('click', () => {
    deletelistingmodal.close();
    enableScroll()
})






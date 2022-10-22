window.onbeforeunload = function () {
    window.scrollTo(0, 0);
}

let includes = document.getElementsByTagName('include');
for(var i=0; i<includes.length; i++){
    let include = includes[i];
    load_file(includes[i].attributes.src.value, function(text){
        include.insertAdjacentHTML('afterend', text);
        include.remove();
    });
}
function load_file(filename, callback) {
    fetch(filename).then(response => response.text()).then(text => callback(text));
}

function bookRedirect() {
    location.href='./views/book-page'
}

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
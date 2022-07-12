$(function() {
    var menu_btn = document.querySelector("#menu-btn");
    var sidebar = document.querySelector("#sidebar");
    var container = document.querySelector(".my-container");
    menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
    });

});

jQuery(document).ready(function($) {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            // $("nav").addClass("bg-dark");
            // $("nav").addClass("box-shadow");

            // $("nav").removeClass("top_50px");
        } else {
            // $("nav").removeClass("bg-dark");
            // $("nav").removeClass("box-shadow");
        }
    });
});
// Hide all item in .carousel-item initially
$(".carousel-item *").addClass("d-none");

// Animate the first slide
setTimeout(function() {
    $(".carousel-item.active *")
        .removeClass("d-none")
        .addClass("animated");
}, 700);

// Animate after the slider changes
$("#mainBanner").on("slid.bs.carousel", function(e) {
    // Add .d-none to previous shown slide
    $(".carousel-item *").addClass("d-none");

    // Element for new slide
    var c = e["relatedTarget"];

    // After 0.7 sec slide changes, then make the animation for new slide
    setTimeout(function() {
        $(c)
            .find("*")
            .removeClass("d-none")
            .addClass("animated");
        console.log("c");
    }, 700);
});

// owl carousel

$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        navText: ["<img class='carousel_arrow_left' src='assets/images/arrow_up.png' alt=''>",
            "<img class='carousel_arrow_right' src='assets/images/arrow_down.png' alt=''>"
        ],
    });
})


// Slick Slider

$(document).ready(function() {
    $(".carousel_estate").slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: "<img class='slick-prev' src='../assets/images/arrow-leftcircle.png'>",
        nextArrow: "<img class='slick-next' src='../assets/images/arrow-rightcircle.png'>",

    });
});
$(document).ready(function() {
    $(".carousel_update").slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: `<img class='slick-prev' src='../assets/images/arrow-leftcircle.png'>`,
        nextArrow: "<img class='slick-next' src='../assets/images/arrow-rightcircle.png'>",

    });
});

// photo grid

let columnView = document.getElementById('column-view');

window.addEventListener("click", function(event) {
    if (event.target.matches("#show-columns")) {
        if (columnView.classList.contains('d-none')) {
            squareGrid.classList.add('d-none');
            columnView.classList.remove('d-none');
        }
    }
});


$(document).on('click', '.login-modal', function() {

    $('#login').modal('show');
    $('body').addClass("modal-overflow-hidden");
});

$(document).on('click', '.close', function() {

    $('#login').modal('hide');
    $('body').removeClass("modal-overflow-hidden");
});

$(document).on('click', '.register-modal', function() {

    $('#reg-modal').modal('show');
    $('body').addClass("modal-overflow-hidden");
});

$(document).on('click', '.reg-close', function() {

    $('#reg-modal').modal('hide');
    $('body').removeClass("modal-overflow-hidden");
});
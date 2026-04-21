// header sticky
var header = document.querySelector(".header-sec");
var toggleClass = "is-sticky";

window.addEventListener("scroll", () => {
  var currentScroll = window.pageYOffset;
  if (currentScroll > 10) {
    header.classList.add(toggleClass);
  } else {
    header.classList.remove(toggleClass);
  }
});


$(".navbar-toggler").click(function() {
  $("#toggle").toggleClass("on");
});

$(".search-btn").on('click', function() {
  $(".main-search-area").addClass('main-search-area-open');
});
$(".srh-close").on('click', function() {
  $(".main-search-area").removeClass('main-search-area-open');
});

// =====banner slider
$(".banner-area").owlCarousel({
  dots: true,
  nav:false,
  center:true,
  navText: [
    '<i class="fas fa-angle-left"></i>',
    '<i class="fas fa-angle-right"></i>'
],
  margin:0,
  responsiveClass:true,
  autoplay:false,
  autoplaySpeed: 4000,
  smartSpeed: 1500,
  slideSpeed: 4000,
  loop:true,
  items:1,
  responsive:{
    0:{
      items:1
    },
    300:{
      items:1
    },
    480:{
      items:1
    },
    600:{
      items:1
    },
    900:{
      items:1
    }
  }
}); 

  // =====featured slider
  $(".featured-slider").owlCarousel({
    dots: false,
    nav:false,
    responsiveClass:true,
    autoplay:true,
    margin:20,
    autoplaySpeed: 4000,
    smartSpeed: 1500,
    slideSpeed: 4000,
    loop:true,
    items:4,
    animateOut: 'fadeOut',
    mouseDrag: !1,
    nav:false,
    responsive:{
      0:{
        nav:false,
        autoplay:true,
        items:1
      },
      300:{
        nav:false,
        autoplay:true,
        items:2
      },
      480:{
        nav:false,
        autoplay:true,
        items:2
      },
      600:{
        nav:false,
        autoplay:true,
        items:2
      },
      900:{
        nav:false,
        autoplay:false,
        items:4
      }
    }
  }); 

// =====testimonial slider
$(".testimonial-area").owlCarousel({
  dots: true,
  nav:false,
  center:true,
  navText: [
    '<i class="fas fa-angle-left"></i>',
    '<i class="fas fa-angle-right"></i>'
],
  margin:0,
  responsiveClass:true,
  autoplay:false,
  autoplaySpeed: 4000,
  smartSpeed: 1500,
  slideSpeed: 4000,
  loop:true,
  items:1,
  responsive:{
    0:{
      items:1
    },
    300:{
      items:1
    },
    480:{
      items:1
    },
    600:{
      items:1
    },
    900:{
      items:1
    }
  }
}); 


  // =====Instagram slider
  $(".instrgram-slider").owlCarousel({
    dots: false,
    nav:false,
    responsiveClass:true,
    autoplay:true,
    margin:15,
    autoplaySpeed: 4000,
    smartSpeed: 1500,
    slideSpeed: 4000,
    loop:true,
    items:8,
    animateOut: 'fadeOut',
    mouseDrag: !1,
    nav:false,
    responsive:{
      0:{
        nav:false,
        autoplay:true,
        items:1
      },
      300:{
        nav:false,
        autoplay:true,
        items:2
      },
      480:{
        nav:false,
        autoplay:true,
        items:2
      },
      600:{
        nav:false,
        autoplay:true,
        items:2
      },
      900:{
        nav:false,
        autoplay:false,
        items:8
      }
    }
  }); 


    // =====product play slider
  $(".product-play-slider").owlCarousel({
    dots: false,
    nav:true,
    responsiveClass:true,
    autoplay:true,
    margin:15,
    autoplaySpeed: 4000,
    smartSpeed: 1500,
    slideSpeed: 4000,
    loop:true,
    items:1,
    nav:false,
    navText: [
    '<i class="fas fa-angle-left"></i>',
    '<i class="fas fa-angle-right"></i>'
],
    responsive:{
      0:{
        nav:true,
        autoplay:true,
        items:1
      },
      300:{
        nav:true,
        autoplay:true,
        items:1
      },
      480:{
        nav:true,
        autoplay:true,
        items:1
      },
      600:{
        nav:true,
        autoplay:true,
        items:1
      },
      900:{
        nav:true,
        autoplay:false,
        items:1
      }
    }
  }); 


// featured comment & like
// $(".hearts").on('click', function() {
//   $(".fa-heart").toggleClass('fas');
// });


        // Fancybox Config
Fancybox.bind('[data-fancybox]', {
  //
}); 


function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function openState(evt, stateName) {
  var i, dashcontent, daslinks;
  dashcontent = document.getElementsByClassName("dashcontent");
  for (i = 0; i < dashcontent.length; i++) {
    dashcontent[i].style.display = "none";
  }
  daslinks = document.getElementsByClassName("daslinks");
  for (i = 0; i < daslinks.length; i++) {
    daslinks[i].className = daslinks[i].className.replace(" active", "");
  }
  document.getElementById(stateName).style.display = "block";
  evt.currentTarget.className += " active";
}

var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  $n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  var amount = Number($n.val());
  if (amount > 0) {
    $n.val(amount-1);
  }
});


const progress = document.getElementById("progress");
const prev = document.getElementById("prev");
const next = document.getElementById("next");
const circles = document.querySelectorAll(".circle");

let currentActive = 1;

next.addEventListener("click", () => {
  currentActive++;
  if (currentActive > circles.length) {
    currentActive = circles.length;
  }
  update();
});

prev.addEventListener("click", () => {
  currentActive--;
  if (currentActive < 1) {
    currentActive = 1;
  }
  update();
});

function update() {
  circles.forEach((circle, index) => {
    if (index < currentActive) {
      circle.classList.add("active");
    } else {
      circle.classList.remove("active");
    }
  });
  const actives = document.querySelectorAll(".active");
  progress.style.width = `${
    ((actives.length - 1) / (circles.length - 1)) * 100
  }%`;

  if (currentActive === 1) {
    prev.disabled = true;
  } else if (currentActive === circles.length) {
    next.disabled = true;
  } else {
    prev.disabled = false;
    next.disabled = false;
  }
}






/* FadeIn Scroll */
$(document).ready(function() {
    
  /* Every time the window is scrolled ... */
  $(window).scroll( function(){
  
      /* Check the location of each desired element */
      $('.fade').each( function(i){
          
          var bottom_of_object = $(this).position().top + $(this).outerHeight();
          var bottom_of_window = $(window).scrollTop() + $(window).height();
          
          /* If the object is completely visible in the window, fade it it */
          if( bottom_of_window > bottom_of_object ){
              
              $(this).animate({'opacity':'1'},900);
                  
          }
          
      }); 
  
  });
  
});

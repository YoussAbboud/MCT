{
	class Details {
		constructor() {
			this.DOM = {};

			const detailsTmpl = `
			<div class="details__bg details__bg--down">
				<button class="details__close"><i class="fas fa-2x fa-times icon--cross tm-fa-close"></i></button>
				<div class="details__description"></div>
			</div>						
			`;

			this.DOM.details = document.createElement('div');
			this.DOM.details.className = 'details';
			this.DOM.details.innerHTML = detailsTmpl;
			// DOM.content.appendChild(this.DOM.details);
			document.getElementById('tm-wrap').appendChild(this.DOM.details);
			this.init();
		}
		init() {
			this.DOM.bgDown = this.DOM.details.querySelector('.details__bg--down');
			this.DOM.description = this.DOM.details.querySelector('.details__description');
			this.DOM.close = this.DOM.details.querySelector('.details__close');

			this.initEvents();
		}
		initEvents() {
			// close page when outside of page is clicked.
			document.body.addEventListener('click', () => this.close());
			// prevent close page when inside of page is clicked.
			this.DOM.bgDown.addEventListener('click', function(event) {
							event.stopPropagation();
						});
			// close page when cross button is clicked.
			this.DOM.close.addEventListener('click', () => this.close());
		}
		fill(info) {
			// fill current page info
			this.DOM.description.innerHTML = info.description;
		}		
		getProductDetailsRect(){
			var p = 0;
			var d = 0;

			try {
				p = this.DOM.productBg.getBoundingClientRect();
				d = this.DOM.bgDown.getBoundingClientRect();	
			}
			catch(e){}

			return {
				productBgRect: p,
				detailsBgRect: d
			};
		}
		open(data) {
			if(this.isAnimating) return false;
			this.isAnimating = true;

			this.DOM.details.style.display = 'block';  

			this.DOM.details.classList.add('details--open');

			this.DOM.productBg = data.productBg;

			this.DOM.productBg.style.opacity = 0;

			const rect = this.getProductDetailsRect();

			this.DOM.bgDown.style.transform = `translateX(${rect.productBgRect.left-rect.detailsBgRect.left}px) translateY(${rect.productBgRect.top-rect.detailsBgRect.top}px) scaleX(${rect.productBgRect.width/rect.detailsBgRect.width}) scaleY(${rect.productBgRect.height/rect.detailsBgRect.height})`;
            this.DOM.bgDown.style.opacity = 1;

            // animate background
            anime({
                targets: [this.DOM.bgDown],
                duration: (target, index) => index ? 800 : 250,
                easing: (target, index) => index ? 'easeOutElastic' : 'easeOutSine',
                elasticity: 250,
                translateX: 0,
                translateY: 0,
                scaleX: 1,
                scaleY: 1,                              
                complete: () => this.isAnimating = false
            });

            // animate content
            anime({
                targets: [this.DOM.description],
                duration: 1000,
                easing: 'easeOutExpo',                
                translateY: ['100%',0],
                opacity: 1
            });

            // animate close button
            anime({
                targets: this.DOM.close,
                duration: 250,
                easing: 'easeOutSine',
                translateY: ['100%',0],
                opacity: 1
            });

            this.setCarousel();

            window.addEventListener("resize", this.setCarousel);
		}
		close() {
			if(this.isAnimating) return false;
			this.isAnimating = true;

			this.DOM.details.classList.remove('details--open');

			anime({
                targets: this.DOM.close,
                duration: 250,
                easing: 'easeOutSine',
                translateY: '100%',
                opacity: 0
            });

            anime({
                targets: [this.DOM.description],
                duration: 20,
                easing: 'linear',
                opacity: 0
            });

            const rect = this.getProductDetailsRect();
            anime({
                targets: [this.DOM.bgDown],
                duration: 250,
                easing: 'easeOutSine',                
                translateX: (target, index) => {
                    return index ? rect.productImgRect.left-rect.detailsImgRect.left : rect.productBgRect.left-rect.detailsBgRect.left;
                },
                translateY: (target, index) => {
                    return index ? rect.productImgRect.top-rect.detailsImgRect.top : rect.productBgRect.top-rect.detailsBgRect.top;
                },
                scaleX: (target, index) => {
                    return index ? rect.productImgRect.width/rect.detailsImgRect.width : rect.productBgRect.width/rect.detailsBgRect.width;
                },
                scaleY: (target, index) => {
                    return index ? rect.productImgRect.height/rect.detailsImgRect.height : rect.productBgRect.height/rect.detailsBgRect.height;
                },
                complete: () => {
                    this.DOM.bgDown.style.opacity = 0;
                    this.DOM.bgDown.style.transform = 'none';
                    this.DOM.productBg.style.opacity = 1;
                    this.DOM.details.style.display = 'none';                    
                    this.isAnimating = false;
                }
            });
		}
		// Slick Carousel
        setCarousel() {
          
	        var slider = $('.details .tm-img-slider');

	        if(slider.length) { // check if slider exist

		        if (slider.hasClass('slick-initialized')) {
		            slider.slick('destroy');
		        }

		        if($(window).width() > 767){
		            // Slick carousel
		            slider.slick({
		                dots: true,
		                infinite: true,
		                slidesToShow: 4,
		                slidesToScroll: 3
		            });
		        }
		        else {
		            slider.slick({
			            dots: true,
			            infinite: true,
			            slidesToShow: 2,
			            slidesToScroll: 1
		        	});
		     	}	
	        }          
        }
	}; // class Details

	class Item {
		constructor(el) {
			this.DOM = {};
			this.DOM.el = el;
			this.DOM.product = this.DOM.el.querySelector('.product');
			this.DOM.productBg = this.DOM.product.querySelector('.product__bg');

			this.info = {
				description: this.DOM.product.querySelector('.product__description').innerHTML
			};

			this.initEvents();
		}
		initEvents() {
			this.DOM.product.addEventListener('click', () => this.open());
		}
		open() {
			DOM.details.fill(this.info);
			DOM.details.open({
				productBg: this.DOM.productBg
			});
		}
	}; // class Item

	const DOM = {};
	DOM.grid = document.querySelector('.grid');
	DOM.content = DOM.grid.parentNode;
	DOM.gridItems = Array.from(DOM.grid.querySelectorAll('.grid__item'));
	let items = [];
	DOM.gridItems.forEach(item => items.push(new Item(item)));

	DOM.details = new Details();
};



(function ($) {
    "use strict"; // Start of use strict

    // Smooth scrolling using jQuery easing
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            if (target.length) {
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top - 70,
                    },
                    1000,
                    "easeInOutExpo"
                );
                return false;
            }
        }
    });

    // Closes responsive menu when a scroll trigger link is clicked
    $(".js-scroll-trigger").click(function () {
        $(".navbar-collapse").collapse("hide");
    });

    // Activate scrollspy to add active class to navbar items on scroll
    $("body").scrollspy({
        target: "#mainNav",
        offset: 100,
    });

    // Collapse Navbar
    var navbarCollapse = function () {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
})(jQuery); // End of use strict


$(document).ready(function(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    
    var countrycodes = "1"
    var delimiters = "-|\\.|—|–| "
    var phonedef = "\\+?(?:(?:(?:" + countrycodes + ")(?:\\s|" + delimiters + ")?)?\\(?[2-9]\\d{2}\\)?(?:\\s|" + delimiters + ")?[2-9]\\d{2}(?:" + delimiters + ")?[0-9a-z]{4})"
    var spechars = new RegExp("([- \(\)\.:]|\\s|" + delimiters + ")","gi") //Special characters to be removed from the link
    var phonereg = new RegExp("((^|[^0-9])(href=[\"']tel:)?((?:" + phonedef + ")[\"'][^>]*?>)?(" + phonedef + ")($|[^0-9]))","gi")
    
    function ReplacePhoneNumbers(oldhtml) {
    //Created by Jon Meck at LunaMetrics.com - Version 1.0
    var newhtml = oldhtml.replace(/href=['"]callto:/gi,'href="tel:')
    newhtml = newhtml.replace(phonereg, function ($0, $1, $2, $3, $4, $5, $6) {
        if ($3) return $1;
        else if ($4) return $2+$4+$5+$6;
        else return $2+""+$5+""+$6; }); 
    return newhtml;
    }
    
    $("#address").html(ReplacePhoneNumbers($("#address").html()))
    
    $("a[href^='tel:']").click(function(event){
         event.preventDefault(); 
    
         link  = $(this).attr('href');
         tracklink = link.replace("tel:","")
         tracklink = tracklink.replace(spechars,"")
         if(tracklink.length == 10) {tracklink = "1" + tracklink}
    
         ga('send', 'event', 'Contact', 'Phone', tracklink);
         //_gaq.push(['_trackEvent', 'Contact', 'Phone', tracklink]);
    
         setTimeout(function() {
            window.location = link;
         },300);
    });
    }
    })

    var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}



 /* jQuery Pre loader
  -----------------------------------------------*/
  $(window).load(function(){
    $('.preloader').fadeOut(1000); // set duration in brackets    
});


$(document).ready(function() {

  /* Home Slideshow Vegas
  -----------------------------------------------*/
  $(function() {
    $('body').vegas({
        slides: [
            { src: 'images/slide-1.jpg' },
            { src: 'images/slide-2.jpg' }
        ],
        timer: false,
        transition: [ 'zoomOut', ]
    });
  });


   /* Back top
  -----------------------------------------------*/
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
        $('.go-top').fadeIn(200);
        } else {
          $('.go-top').fadeOut(200);
        }
        });   
        // Animate the scroll to top
      $('.go-top').click(function(event) {
        event.preventDefault();
      $('html, body').animate({scrollTop: 0}, 300);
      })
      

  /* wow
  -------------------------------*/
  new WOW({ mobile: false }).init();

  });

  

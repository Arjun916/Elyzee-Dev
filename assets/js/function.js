(function ($) {
    "use strict";
	
	var $window = $(window); 
	var $body = $('body'); 

	/* Preloader Effect */
	$window.on('load', function(){
		$(".preloader").fadeOut(600);
	});	

	if($("a[href='#top']").length){
		$(document).on("click", "a[href='#top']", function() {
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});
	}
	
	
	if ($(".datetime_input").length > 0) {

	    jQuery.datetimepicker.setLocale($("body").hasClass("ar") ? 'ar' : 'en');

		function updateMinTime(dp, selectedDate) {
		    const now = new Date();

		    if (!selectedDate) {
		        dp.setOptions({ minTime: false });
		        return;
		    }

		    if (selectedDate.toDateString() === now.toDateString()) {

		        // ROUND UP to next 30-minute slot
		        let hour = now.getHours();
		        let mins = now.getMinutes();

		        if (mins < 30) {
		            mins = '30';
		        } else {
		            hour = hour + 1;
		            mins = '00';
		        }

		        // Format
		        let minTime = `${String(hour).padStart(2, '0')}:${mins}`;

		        dp.setOptions({
		            minTime: minTime
		        });

		    } else {
		        dp.setOptions({
		            minTime: false
		        });
		    }
		}
	    

	    $('.datetime_input').datetimepicker({
	        format: 'd/m/Y H:i',
	        theme: 'dark',
	        mask: false,
			scrollMonth: false,
			scrollInput: false,
	        minDate: 0,
	        startDate: new Date(),
	        yearStart: new Date().getFullYear(),
	        yearEnd: new Date().getFullYear() + 3,

	        allowTimes: [
	            '07:00','07:30','08:00','08:30','09:00','09:30',
	            '10:00','10:30','11:00','11:30','12:00','12:30',
	            '13:00','13:30','14:00','14:30','15:00','15:30',
	            '16:00','16:30','17:00','17:30','18:00','18:30',
	            '19:00','19:30','20:00','20:30','21:00','21:30'
	        ],

	        onShow: function(ct) {
	            updateMinTime(this, ct);
	        },

	        onSelectDate: function(ct) {
	            updateMinTime(this, ct);
	        },

	        rtl: $("body").hasClass("ar")
	    });
	}
	
	
	
	
	if($(".appointments .select-parent").length > 0 && $(".appointments .select-filter").length > 0)  {
	$(".appointments .select-parent").change(function() {
	  var category = $(this).val();
	  //loop through second selects options
	  $('.appointments .select-filter option').each(function() {
	  //if option has default class
	    if ($(this).hasClass(category) || $(this).hasClass("any")) {
	      $(this).show();
	    } else {
	      $(this).hide();
	    }
	  });

	  $('.appointments .select-filter').val('-').trigger('change');

	});
	
	
	$(".appointments .select-parent").each(function(index, element) {
	  var category = $(this).find('option:selected').val();
	  //loop through second selects options
	  $('.appointments .select-filter option').each(function() {
	  //if option has default class
	    if ($(this).hasClass(category) || $(this).hasClass("any")) {
	      $(this).show();
	    } else {
	      $(this).hide();
	    }
	  });
	});
	


	$(".appointments .select-filter").change(function() {
		 var category = ($(this).find('option:selected').attr('class')).replace(' -', '');
		 if(category && category != 'any')$('.select-parent').val(category);
	});
	$(".appointments .select-filter").each(function(index, element) {
		var category = ($(this).find('option:selected').attr('class')).replace(' -', '');
		if(category && category != 'any')$('.select-parent').val(category);
	});
}
		
	

	
	if ($('.hero-slider-layout ').length) {
		const hero_slider_layout = $('.hero-slider-layout .hero-slider').slick({
			dots: true,
			dotsClass:"hero-pagination",
			arrows:false,
			infinite: true,
			speed: 500,
			fade: true,
			draggable:true,
			cssEase: 'linear',
			autoplay:true,
			lazyLoad: 'ondemand',
			autoplaySpeed: 3500,
			slidesToShow: 1,
			slidesToScroll: 1,
			rtl: $body.hasClass( "ar" )? true : false,
			pauseOnFocus: false,
			pauseOnDotsHover: false,
			pauseOnHover: false
			
		});		
		
	}
	
	$(document).on('click', '.review-popup', function(e){
	    e.preventDefault();

	    var fullText = $(this)
	        .closest('.testimonial-item-content')
	        .find('.full-review .review-content')
	        .html();
	    var titleText = $(this)
	        .closest('.testimonial-item-content')
	        .find('.full-review')
	        .attr('data-title');
	    var footerText = $(this)
	        .closest('.testimonial-item-content')
	        .find('.full-review .review-footer')
	        .html();
			
			

	    // Set modal content BEFORE showing
	    $('#elyzee_modal .modal-title').text(titleText);
	    $('#elyzee_modal .modal-body').html(fullText);
		$('#elyzee_modal .modal-footer').html(footerText);

	    // Show the modal
	    var review_modal = new bootstrap.Modal(document.getElementById('elyzee_modal'));
	    review_modal.show();
	});
	
	
	if($(".testimonial-carousel").length > 0)  {
		$(".testimonial-carousel").each(function(){
			$(this).slick({
			  dots: true,
			  infinite: true,
			  speed: 300,
			  lazyLoad: 'ondemand',
			  slidesToShow:3,
			  slidesToScroll: 3,
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: 2,
			        slidesToScroll: 2,
			        infinite: true,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 1,
					slidesToScroll: 1
			      }
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  ],
			  	pauseOnFocus:false,
			  	pauseOnHover:false,
			  	pauseOnDotsHover:false,
				lazyLoad: 'ondemand',
				rtl: $( "body" ).hasClass( "ar" )? true : false
			});
		})
	
	}
	
	
	
	
	if($(".block-carousel").length > 0)  {
		
		$(".block-carousel").each(function(){
			var slidesToShow = (parseInt($(this).attr('data-slidesToShow'))? parseInt($(this).attr('data-slidesToShow')):5);
			var slidesInfinite = (($(this).attr('data-slidesLoop') == 'true')? true:false);
			$(this).slick({
			  dots: false,
			  infinite: slidesInfinite,
			  arrows:true,
			  speed: 300,
			  lazyLoad: 'ondemand',
			  slidesToShow:slidesToShow,
			  slidesToScroll: slidesToShow,
			  responsive: [
			    {
			      breakpoint: 1024,
			      settings: {
			        slidesToShow: slidesToShow-1,
			        slidesToScroll: slidesToShow-1,
			      }
			    },
			    {
			      breakpoint: 600,
			      settings: {
			        slidesToShow: 1,
			        slidesToScroll: 1
			      }
			    }
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  ],
			  	pauseOnFocus:false,
			  	pauseOnHover:false,
			  	pauseOnDotsHover:false,
				lazyLoad: 'ondemand',
				rtl: $( "body" ).hasClass( "ar" )? true : false
			}).on('setPosition', function (event, slick) {
				slick.$slides.css('height', slick.$slideTrack.height() + 'px');
			});
		})
	}


	

	
	
	if ($('.team-slider').length) {
		
		const team_slider = $('.team-slider').slick({
			dots: true,
			infinite: true,
			speed: 300,
			autoplay:true,
			lazyLoad: 'ondemand',
			autoplaySpeed: 3500,
			slidesToShow: 4,
			slidesToScroll: 4,
			rtl: $body.hasClass( "ar" )? true : false,
			pauseOnFocus: true,
			pauseOnDotsHover: false,
			pauseOnHover: true,
			responsive: [
		    {
		      breakpoint: 991,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
				dots: false,
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
				dots: false,
		      }
		    }
		  ]
		});
				
	}
	
	
	if ($('.services-slider').length) {
		
		const services_slider = $('.services-slider').slick({
			dots: true,
			infinite: true,
			speed: 300,
			autoplay:true,
			lazyLoad: 'ondemand',
			autoplaySpeed: 3500,
			slidesToShow: 4,
			slidesToScroll: 4,
			rtl: $body.hasClass( "ar" )? true : false,
			pauseOnFocus: true,
			pauseOnDotsHover: false,
			pauseOnHover: true,
			responsive: [
		    {
		      breakpoint: 991,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3
		      }
		    },
		    {
		      breakpoint: 768,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2,
				dots: false,
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
				dots: false,
		      }
		    }
		  ]
		});
				
	}
	

	/* Skill Bar */
	if ($('.skills-progress-bar').length) {
		$('.skills-progress-bar').waypoint(function() {
			$('.skillbar').each(function() {
				$(this).find('.count-bar').animate({
				width:$(this).attr('data-percent')
				},2000);
			});
		},{
			offset: '70%'
		});
	}
	
	/* Animated Wow Js */	
	new WOW().init();
	
	
	if($(".page-gallery .gallery-filters").length > 0)  {
			// call function when item is clicked
			$(".page-gallery .gallery-filters a").click(function(){
				$('.page-gallery .gallery-filters a').removeClass("bg-primary");
				$('.page-gallery .gallery-filters a').removeAttr("style");
				
				// add active class to selected
				var curr_gallery_clicker = $(this);
				$(this).addClass("bg-primary");
				
				var selectedBgColor = $(this).attr("data-bgcolor");
				if(selectedBgColor)$(this).attr("style", "background-color:"+selectedBgColor + " !important");
				
				// assigns class to selected item
				var selectedClass = $(this).attr("data-filter");
				// fades out all gallery items
				$(".page-gallery .gallery-item").fadeOut( "fast", function() {
				    $(".page-gallery .gallery-item"+selectedClass).fadeIn();
				  });
				// fades in selected category
				 return false;				
			});

	}
	
	
	$('.gallery-items').magnificPopup({
	    delegate: 'a',
	    gallery: { enabled: true },
	    type: 'image', // default, but overridden per item

	    callbacks: {
	        elementParse: function(item) {
	            var type = item.el.attr('data-type');

	            if (type === 'image') {
	                item.type = 'image';
	                item.mainClass = 'mfp-with-zoom mfp-img-mobile';
	            } 
	            else {
	                item.type = 'iframe';
	                item.mainClass = 'mfp-fade';
	            }
	        }
	    },

	    image: {
	        verticalFit: true
	    },

	    zoom: {
	        enabled: function(item) {
	            return item.type === 'image'; // zoom only for images
	        },
	        duration: 300,
	        opener: function(el) {
	            return el.find('img');
	        }
	    }
	});

	

	

	/* Popup Video */
	if ($('.popup-video').length) {
		$('.popup-video').magnificPopup({
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: true,
			fixedContentPos: true
		});
	}
	
	
	$('form.loader_form').on('submit', function () {
	    var $btn = $(this).find('button[type="submit"], input[type="submit"]');
	    $btn.prop('disabled', true); 
	});
	

	   
	

	
})(jQuery);
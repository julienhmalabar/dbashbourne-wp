$(document).ready(function() {
	
	$(document).on("click",'.modal-content a.btn',function(){
		$('.modal').modal('hide');
	});

	//
	// EMAIL FORM VALIDATION

		$(".js-sendMail").on( 'click', function(e) {

			e.preventDefault(); // To not refresh page
		
			var valid;	
			valid = validateContact();
			
			
			//var captchResponse = $('#g-recaptcha-response').val();
			
			
			var captchResponse = '';
			

			if(valid) {
				$.ajax({
					url: path+"/ajax/email.php",
					data:'name='+$("#name").val()+'&email='+$("#email").val()+'&phone='+$("#phone").val()+'&select='+$("#select").val()+'&message='+$("#message").val()+'&captchResponse='+captchResponse,
					type: "POST",
					success:function(results){
						
						$(".section-contact-content").css("display","none");
						$('#section-contact-message .section-contact-subtitle').html(results);
						$("#section-contact-message").css("display","block");
					},
					error:function (){}
				});
			}
			else {
				$(".section-contact-content").css("background-color","blue");
			}

		});

		function validateContact() {
			var valid = true;	
			
			if(!$("#name").val()) {
				$(".section-contact-error .error-global").css('display','block').delay(4000).fadeOut("slow");
				valid = false;
			}
			if(!$("#email").val()) {
				$(".section-contact-error .error-global").css('display','block').delay(4000).fadeOut("slow");
				valid = false;
			}
			if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
				$(".section-contact-error .error-email").css('display','block').delay(4000).fadeOut("slow");
				valid = false;
			}
			if(!$("#phone").val()) {
				$(".section-contact-error .error-global").css('display','block').delay(4000).fadeOut("slow");
				valid = false;
			}
			if(!$("#select").val()) {
				$(".section-contact-error .error-global").css('display','block').delay(4000).fadeOut("slow");
				valid = false;
			}
			if(!$("#message").val()) {
				$(".section-contact-error .error-global").css('display','block').delay(4000).fadeOut("slow");
				valid = false;
			}

			//var captchResponse = $('#g-recaptcha-response').val();
			var captchResponse = '65465';
			if(captchResponse.length == 0 ) {
				$(".section-contact-error .error-recaptcha").css('display','block').delay(4000).fadeOut("slow");
				valid = false;
			}
			    
			
			return valid;
		}
		

	//





	//
	// Select Box
	$('.js-fancySelect').fancySelect( function() {
		$(this).on('change.fs blur.fs blur change', function() {
		    $(this).removeClass("open");
		});
	});

	var select = $('.js-fancySelectUrl');
	select.fancySelect().on('blur.fs blur change change.fs' , function() {
	    var url = $(this).val();
          if (url) {
              window.location = url;
          }
          return false;
	});
	//


	//
	// Auto open collapse when ID is load in URL
		var anchor = window.location.hash.replace("#", "");
	    $(".filter-selector .collapse").collapse('hide');
	    $("#" + anchor).collapse('show');
	//

	//
	// Footer collapse icons
	$(".js-footerCollapse").click(function() {
		$(this).find("i").toggleClass("hidden");
	})
	//


	//
	// Responsive table to SLIDER table

		// Au chargement de la page

		if ($(window).width() < 769) {

			// On donne la width du browser à chaque colonnedu tableau 
			//$(".productTable-column").css("width", $(window).width());
			$(".js-table-column").css("width", $(window).width());

			// On compte le nombre de colonnes qu'on aura à slider
			var nbCols = $(".js-table-column").length;

			// On donne la taille totale au conteneur
			// -- soit "largeur du browser" X "nombre de colonnes à slider"
			var calcx = $(window).width() * nbCols;
			$(".js-table-table").css("width", calcx);

			// Fallback for CSC Table
			colsclean = nbCols - 1;
			
			var calcx1 = $(window).width() * colsclean;
			$(".js-table-tablex1").css("width", calcx1);

			//console.log("calcx1" + calcx1);

		}
		
		//
		// Slide between columns in responsive table
		$('.js-nextColumn').click(function(e) {
	        e.preventDefault();
	        $('.js-table-wrapper').animate(
	        	{ scrollLeft:'+='+$(window).width() }, 'slow'
	        );        
	    });
	    $('.js-prevColumn').click(function(e) {
	        e.preventDefault();
	        $('.js-table-wrapper').animate(
	        	{ scrollLeft:'-='+$(window).width() }, 'slow'
	        );        
	    });

		
	

	//



	//
	// MOBILE NAV OPEN - CLOSE
	$(".js-nav").click(function(e) {
		e.preventDefault();

		$(this).find("i").toggleClass("hidden");

		if ($(".logobar").hasClass("nav-opened")) {

			$(".logobar").removeClass("nav-opened");

		} else {
			$(".logobar").addClass("nav-opened");
		}

		//$(".logobar").addClass("nav-opened");

		$(".navbar-wrapper").slideToggle( "slow" );

	});


	//
	// STICKY Toolbar
		var menu = document.querySelector('.js-sticky');
		var menuPosition = menu.getBoundingClientRect();
		var placeholder = document.createElement('div');
		placeholder.style.width = $(window).width + 'px';
		placeholder.style.height = menuPosition.height + 'px';
		var isAdded = false;

		window.addEventListener('scroll', function() {
			
			if (window.pageYOffset >= menuPosition.top && !isAdded) {
				menu.classList.add('sticky');
				menu.parentNode.insertBefore(placeholder, menu);
				isAdded = true;	
			} 
			else if (window.pageYOffset < menuPosition.top && isAdded) {
				menu.classList.remove('sticky');
				menu.parentNode.removeChild(placeholder);
				isAdded = false;
			}

		});
	//


});

var nbCols = $(".js-table-column").length;

			// On donne la taille totale au conteneur
			// -- soit "largeur du browser" X "nombre de colonnes à slider"
			var calcx = $(window).width() * nbCols;
			$(".js-table-table").css("width", calcx);

// Resize


jQuery(window).resize(function() {

	//
	// Responsive NAV
	/*if ( $(window).width() < 992 ) {
        //$(".navbar-wrapper").css("display","none");

        if ($(".logobar").hasClass("nav-opened")) {
        	$(".nav-icon i").toggleClass("hidden");
        }
    	
    	$(".navbar-wrapper").css("display","none");
    	$(".logobar").removeClass("nav-opened");
    
    }
    else {
    	$(".navbar-wrapper").css("display","block");
    	$(".nav-opened").removeClass("nav-opened");
    }*/
    //

    //
    //
    	if ( $(window).width() < 769 ) {

    		// On donne la width du browser à chaque colonne du tableau 
			$(".js-table-column").css("width", $(window).width());

			// On compte le nombre de colonnes qu'on aura à slider
			var nbCols = $(".js-table-column").length;

			// On donne la taille totale au conteneur
			// -- soit "largeur du browser" X "nombre de colonnes à slider"
			var calcx = $(window).width() * nbCols;
			$(".js-table-table").css("width", calcx);


			colsclean = nbCols - 1;

			var calcx1 = $(window).width() * colsclean;
			$(".js-table-tablex1").css("width", calcx1);
    	}
    	else {
    		var nbCols2 = $(".js-table-column").length;
    		var calcsize = 100 / nbCols2;

    		$(".js-table-column").css("width", calcsize+"%");
    		$(".js-table-table").css("width", "100%");
    		$(".js-table-tablex1").css("width", "100%");
    	}
    //

});















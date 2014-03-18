'use strict';


window.SlideController = (function( $ ) {

	var that = this;

	var options = {
    	selector : ".bxslider", 
    	noImagePreview : "/css/nopreview.png",
    	fileRequestRoute : "../file/"

	};

	var reader_slider;

	var controller = function(action , readerData, params,reader_slider ){
        switch(action){
    					case "prev-page":
    						reader_slider.goToPrevSlide();
    						break;
    					case "next-page":
    						reader_slider.goToNextSlide();
    						break;
    					case "page-anchor":
    						var pageNumber = readerData;
    						if (pageNumber > -1 && pageNumber < reader_slider.getSlideCount())
    							reader_slider.goToSlide(pageNumber);
    						break;
    
    				}
    };


	var buildPager = function(slideIndex){
					switch(slideIndex){
					  default:
					  	return "<img alt='Page"+slideIndex+"' src='"+ get_file_request_url() + Items[PageIDArray[slideIndex]].replace('.html','.jpg').replace('.xhtml','.jpg').replace('.htm','.jpg') +"'>"+"<div class='thumbnail_page_number' >"+(slideIndex+1)+"</div>";
					  break;
					}
				  };

	var onslide = function($slideElement, oldIndex, newIndex){ 

					var kapanacaklar = [oldIndex-2,oldIndex-1,oldIndex,oldIndex+1,oldIndex+2];
					var acilacaklar =  [newIndex-2,newIndex-1,newIndex,newIndex+1,newIndex+2];
					
					//We dont want them to close and open again so we filter that ones will be opened.
					kapanacaklar = kapanacaklar.filter(function(i) {return !(acilacaklar.indexOf(i) > -1);});

					//First close the to be closed ones that will not be opened.
					$.each (kapanacaklar, function(index,kapanacak) {
						var simdiKapanacak = $( $('.bxslider iframe.page_iframe')[kapanacak] );
						if ( typeof simdiKapanacak != 'undefined'){
							simdiKapanacak.removeAttr('src');
						}
					});


					//Second lets open the not opened ones
					$.each (acilacaklar, function(index,acilacak) {
						var simdiAcilacak  = $( $('.bxslider iframe.page_iframe')[acilacak] );
						// if instance exists not like (-1 or pagecount +1)
						if ( typeof simdiAcilacak != 'undefined'){
							var attr = $(simdiAcilacak).attr('src');
							//if not already open
							if (!(typeof attr !== 'undefined' && attr !== false)) {
								//grey overlay for hiding the ugly loading scene
								simdiAcilacak.parent().children('.loadingt').show();

								//change src attribute to load the source
							  	simdiAcilacak.attr('src', simdiAcilacak.attr('data-src' ));

							  	//make it fit to parent and zoom inner html
								simdiAcilacak.fitToParent();

								//when loaded the content
								simdiAcilacak.load(function(){

									//make it loaded and fit to parent
						        	$(this)
						        		.removeClass("lazy-hidden")
						        		.addClass("lazy-loaded")
						        		.fitToParent();	

						        	//grey overlay fade outs
						        	$($(this).parent().children('.loadingt')[0]).fadeOut(2000);


					    		});
							}
							
						}
					});
				};

    
	var init = function (options){
		//merge parameter options to default options 
		this.options = $.extend( this.options, options );

		//create instance of bxSlider or any other type
		reader_slider =$( this.options.selector ).bxSlider({
				infiniteLoop: false,
				hideControlOnEnd: true,
				responsive:false,
				touchEnabled: true,
				onSlideAfter : this.onslide ,
				buildPager: this.buildPager,
		});
		this.reader_slider=reader_slider;
		
		//if reader-action is clicked send it to controller
		$("[reader-action]").parent().click(function(e){
					var action = $(thischild).attr("reader-action");
					var readerData = $(thischild).attr("reader-data");
					var thischild= $(this).children("[reader-action]");
					this.controller (action,readerData,thischild,reader_slider);
		});


		this.onslide (null,reader_slider.getCurrentSlide(),reader_slider.getCurrentSlide() );


		this.bindKeys();

		



		return reader_slider;

	};

	var bindKeys = function () {
		$(document).keydown(function(e){
				
				//left key
			    if (e.keyCode == 37) { 
			       this.controller ("prev-page");
			       return false;
			    }

			    //right key
			    if (e.keyCode == 39) { 
			       this.controller ("next-page");
			       return false;
			    }
		});
	};

	return {
		init:init,
		buildPager:buildPager,
		onslide:onslide,
		controller:controller,
		bindKeys:bindKeys,
		reader_slider:reader_slider,
  	};
})(jQuery);
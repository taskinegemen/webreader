'use strict';


window.SlideController = (function( $ ) {

	var that = this;

	var options = {
    	selector : ".bxslider", 
    	noImagePreview : "/css/nopreview.png",
    	fileRequestRoute : "../file/"

	};

	var reader_slider;

	var controller = function(action , readerData, params ){
        switch(action){
    					case "prev-page":
    						this.reader_slider.goToPrevSlide();
    						break;
    					case "next-page":
    						this.reader_slider.goToNextSlide();
    						break;
    					case "page-anchor":
    						var pageNumber = readerData;
    						if (pageNumber > -1 && pageNumber < this.reader_slider.getSlideCount())
    							this.reader_slider.goToSlide(pageNumber);
    						break;
    
    				}
    };


	var buildPager = function(slideIndex){
					switch(slideIndex){
					  default:
					  	return "<img height='100' class='page_thumbnails' alt='Page"+slideIndex+"' src='"+ get_file_request_url() + Items[PageIDArray[slideIndex]].replace('.html','.png').replace('.xhtml','.png').replace('.htm','.png') +"'>"+"<div class='thumbnail_page_number' >"+(slideIndex+1)+"</div>";
					  break;
					}
				  };

	var onslide = function($slideElement, oldIndex, newIndex){ 




					$("#current_page_num_spinner").val(newIndex+1);

					console.log("old index"+oldIndex);
					console.log("new index"+newIndex);

					$("iframe").each(function(){
						var that=this.contentWindow;
						var eachPage="page"+newIndex;
						if(this.name==eachPage)
						{
							console.log('playing...');
							try{
								$(that).focus();
								}
							catch(err){
								console.log('page not focus!');
							}
						}
						else
						{
							try{
								$(this.contentWindow).blur();
								}
							catch(err){
								console.log('page not blur!');
							}
						}
					});

					var kapanacaklar = [oldIndex-2,oldIndex-1,oldIndex,oldIndex+1,oldIndex+2];
					var acilacaklar =  [newIndex,newIndex+1, newIndex-1,newIndex+2,newIndex-2];
					
					//We dont want them to close and open again so we filter that ones will be opened.
					kapanacaklar = kapanacaklar.filter(function(i) {return !(acilacaklar.indexOf(i) > -1);});

					//First close the to be closed ones that will not be opened.
					$.each (kapanacaklar, function(index,kapanacak) {
						var simdiKapanacak = window.pages[kapanacak] ;
						if ( typeof simdiKapanacak != 'undefined'){
							simdiKapanacak.removeAttr('src');
							simdiKapanacak.reader_appended=false;
							simdiKapanacak.remove();
						}
					});



					//Second lets open the not opened ones
					$.each (acilacaklar, function(index,acilacak) {
						var simdiAcilacak  = window.pages[acilacak];



						// if instance exists not like (-1 or pagecount +1)
						if ( typeof simdiAcilacak != 'undefined'){

							//if not already open
							if( ! simdiAcilacak.reader_appended ){
								simdiAcilacak.appendTo(simdiAcilacak.parentContainer);
								simdiAcilacak.reader_appended=true;

								//grey overlay for hiding the ugly loading scene
								simdiAcilacak.parent().children('.loadingt').show();
								console.log(simdiAcilacak);

								simdiAcilacak.width(simdiAcilacak.parentContainer.width());
								simdiAcilacak.height(simdiAcilacak.parentContainer.height());
								//change src attribute to load the source
							  	simdiAcilacak.attr('src', simdiAcilacak.attr('data-src' ));

							  	//make it fit to parent and zoom inner html
								//simdiAcilacak.fitToParent();

								//when loaded the content
								simdiAcilacak.load(function(){


									//make it loaded and fit to parent
						        	$(this)
						        		.removeClass("lazy-hidden")
						        		.addClass("lazy-loaded")
						        		.fitToParent();	

						        	//grey overlay fade outs

						        	if(window.appendedPages>=window.settings.firstLoadFrameNum){
  							        	$($(this).parent().children('.loadingt')[0]).fadeOut(2000);
  							        } else {
  							        	$($(this).parent().children('.loadingt')[0]).hide();
  							        }

						        	/*egemens reader fix*/
									if(typeof simdiAcilacak[0].contentWindow.okutus_play !='undefined')console.log(simdiAcilacak[0].contentWindow.okutus_stop());



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
				onSlideBefore: this.onSlideBefore,
				onSlideAfter : this.onslide ,
				buildPager: this.buildPager,
		});
		this.reader_slider=reader_slider;
		var that = this;
		$(document).ready(function(){
			
			$("[reader-action]")
				.parent()
				.on('click',
					function(e){
						
						var thischild= $(this).children("[reader-action]");
						var action = $(thischild).attr("reader-action");
						var readerData = $(thischild).attr("reader-data");
						window.SlideController.controller (action,readerData);
				});
			$("[reader-action]")
				.on('click',
					function(e){
						var action = $(this).attr("reader-action");
						var readerData = $(this).attr("reader-data");
						
						window.SlideController.controller (action,readerData);
				});


		});
		//if reader-action is clicked send it to controller
		


		this.onslide (null,reader_slider.getCurrentSlide(),reader_slider.getCurrentSlide() );


		this.bindKeys();

		$(document).ready(function() {
		    $(".bx-custom-pager img.page_thumbnails").lazy(
		    {
		        appendScroll: $($('.bx-custom-pager')[0])
		    });
		});



		return reader_slider;

	};

	var bindKeys = function () {
		$(document).keydown(function(e){
				
				//left key
			    if (e.keyCode == 37) { 
			       window.SlideController.controller ("prev-page");
			       return false;
			    }

			    //right key
			    if (e.keyCode == 39) { 
			       window.SlideController.controller ("next-page");
			       return false;
			    }
		});
	};

	var onSlideBefore = function () {
		if(typeof window.oversize != 'undefined')
			window.oversize.remove();
	};
	return {
		init:init,
		buildPager:buildPager,
		onSlideBefore:onSlideBefore,
		onslide:onslide,
		controller:controller,
		bindKeys:bindKeys,
		reader_slider:reader_slider,
  	};
})(jQuery);

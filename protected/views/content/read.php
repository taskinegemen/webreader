<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar sidebar-fixed">
					<div class="sidebar-menu nav-collapse">
						
						
                        
                        
                        
                        <div class="book_info_container">
				<div class="reader_book_cover_thumbnail">COVER</div>
                <ul class="reader_book_info">
                
                <li class="reader_book_info_detail" >Kitabın Adı: <span  content-meta='book-title'  class="reader_book_info_detail_data">Örnek Kitap</span></li>
                
                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail" >Tür/Konu: <span  content-meta='book-categories' class="reader_book_info_detail_data">Örnek Tür</span></li>
                
                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail">Editörler: <span content-meta='book-author' class="reader_book_info_detail_data">Örnek Kişi</span></li>

                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail">Sayfa Sayısı: <span content-meta='book-page-count'  class="reader_book_info_detail_data">200</span></li>

                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail">Yayınlanma Tarihi: <span content-meta='book-publish-date'  class="reader_book_info_detail_data">01.05.2014</span></li>

                <div class="vertical-divider"></div>
                <div class="clearfix"></div>


                </ul>
                

                </div>
                <!-- END book_info_container -->
                        
                        
                        
                        
						
						
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content" class="no_margin">
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
							<!--	<div class="page-header reader_info_header">
									
									<div class="reader_book_name">Kitabın Adı: <span content-meta='book-title' class="reder_book_name_data">Örnek Kitap</span></div>
                                    
                                    
                                    
                                    
                                    
                                    
                                     <div class="btn-group">
                                     
                                     
                                     			<button class="btn btn-default reader_toc_button dropdown-toggle" data-toggle="dropdown">
													İçindekiler &nbsp;<i class="fa fa-angle-down"></i>
												</button>
                                                
                                                <ul class="dropdown-menu pull-right reader_toc_dropdown">
													<li><a href="#page2"><span  reader-action='page-anchor' reader-data="2" class="reader_toc_dropdown_page_numbers">2</span> Buralara birşeyler yazılacak</a></li>
													<li><a href="#page43"><span  reader-action='page-anchor' reader-data="43" class="reader_toc_dropdown_page_numbers">43</span> Şimdilik deneme yapılıyor kısa olmasın diye uzatıyoz da uzatıyoz işte böyle</a></li>
													<li><a href="#page125"><span  reader-action='page-anchor' reader-data="125" class="reader_toc_dropdown_page_numbers">125</span> Buralarda hep table of content maddeleri olacak</a></li>
													<li><a href="#page212"><span  reader-action='page-anchor'  reader-data="212" class="reader_toc_dropdown_page_numbers">212</span> İşte öyle denemeler şakalar falan</a></li>
												</ul>
                                              
                                                
												<button class="btn btn-default">
													<i class="fa fa-chevron-left" reader-action='prev-page'></i>
												</button>
												<button class="btn btn-default">
													<i class="fa fa-chevron-right" reader-action='next-page'></i>
												</button>
								     </div>
                                    
                                    
                                    
                                    
                               <div id="ms2"></div>
                                    
                                    
                                    
                                    
                                   </div> -->
                                
                          <div class="reader_page_container">


							<ul class="bxslider">

							</ul>

                </div>
				<!-- /reader_page_container -->      
                                
                                
                                
                                
                                
                                
                                
							</div>
						</div>
						<!-- /PAGE HEADER -->
					</div>
				</div>
			</div>
		</div>
	</section>
    
    
    
    
    
   
    
    
    
    
    
    
    
    <script>
		jQuery(document).ready(function() {		
			App.setPage("widgets_box");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
    <script>
		jQuery.fn.fitToParent = function () {
		    this.each(function () {
		        var $iframe = jQuery(this);
		        var width = $iframe.width();
		        var height = $iframe.height();
		        var parentWidth = $iframe.parent().width();
		        var parentHeight = $iframe.parent().height();
		        

		        var innerWidth= $(window[$(this).attr('name')].document.body).width();
		        var innerHeight= $(window[$(this).attr('name')].document.body).height();

		        var aspect = innerWidth / innerHeight;
		        var parentAspect = parentWidth / parentHeight;


		        if (aspect > parentAspect) {
		        	var zoom =   width / innerWidth;
		            newWidth = innerWidth;
		            newHeight = newWidth / aspect;
		        } else {
		        	var zoom =   height / innerHeight;
		            newHeight = parentHeight;
		            newWidth = innerWidth * aspect;
		        }
		        
		        $iframe.width(innerWidth *zoom );
		        $iframe.height(innerHeight*zoom );
		        
		        
		        if (parentWidth-innerWidth*zoom > 0 ) 
		        	$iframe.css('left', ( (parentWidth-innerWidth*zoom)/2 )+"px");
		        else 
		        	$iframe.css('left', "0px");

	            $iframe.css('position','absolute');

	            $iframe.css('position','absolute');

		        $(window[$(this).attr('name')].document.body).css("zoom", zoom);

		    });
		};
	</script>
	<script>
	function resizeEverything(){
				var current= window.reader_slider.getCurrentSlide();
				console.log(current);
				var offset = $('#main-content').offset();
				var height= $(window).height() - offset.top;
				var width= $(window).width() - offset.left;
				$(".bxslider li,.bx-viewport ,.bxslider iframe.page_iframe ").height (height);
				$(".bxslider li,.bx-viewport ,.bxslider iframe.page_iframe ").width (width);
				$(".bxslider iframe.page_iframe").fitToParent();
				console.log(height);
				console.log("Resize Trigged");
				window.reader_slider.goToSlide(current);
				console.log($(".bxslider li")[current]);

				$("ul.bxslider").css("-webkit-transform", "translate3d(-"+($ ($(".bxslider li")[current] ).position().left )+"px, 0px, 0px)" );
			}
	$(document).ready(function() {	

		var BookMeta;
		var reader_slider;
		window.pages = [];
		var ContentFileRequesUrl="<?php echo $this->createUrl("content/file",array('id'=>$id) ); ?>"+"/";
		var Pages = [],Items = [], PageIDArray=[];

		String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g, '');};

		String.prototype.ltrim=function(){return this.replace(/^\s+/,'');};

		String.prototype.rtrim=function(){return this.replace(/\s+$/,'');};

		String.prototype.fulltrim=function(){return this.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,' ');};

		function trimString(s) {
		  var l=0, r=s.length -1;
		  while(l < s.length && s[l] == ' ') l++;
		  while(r > l && s[r] == ' ') r-=1;
		  return s.substring(l, r+1);
		}

		function compareObjects(o1, o2) {
		  var k = '';
		  for(k in o1) if(o1[k] != o2[k]) return false;
		  for(k in o2) if(o1[k] != o2[k]) return false;
		  return true;
		}

		function itemExists(haystack, needle) {
		  for(var i=0; i<haystack.length; i++) if(compareObjects(haystack[i], needle)) return true;
		  return false;
		}

		function searchFor(toSearch) {
		  var results = [];
		  toSearch = trimString(toSearch); // trim it
		  for(var i=0; i<objects.length; i++) {
		    for(var key in objects[i]) {
		      if(objects[i][key].indexOf(toSearch)!=-1) {
		        if(!itemExists(results, objects[i])) results.push(objects[i]);
		      }
		    }
		  }
		  return results;
		}

		jQuery(document).ready(function() {		


			var metaUrl= "<?php echo $this->createUrl("content/Getbookmeta",array('id'=>$id) ); ?>"
			$.ajax({
			  url: metaUrl,
			  
			  success: function (data){
			  	 
			  	BookMeta=JSON.parse(data);
			  	StartReaderApp();
			  },
			  
			});
		});

		function handleTopLayer(){
			if ($('#sidebar').hasClass('mini-menu')){
					$('.page-header.reader_info_header').hide(300);
				} else {
					$('.page-header.reader_info_header').show(300);

				}

		}

		function StartReaderApp (){

			handleTopLayer();
			
			var thumbnailContent;
			
			$.each(BookMeta.metadata.meta, function(index,meta){

				
				//find cover item
				if(typeof meta['@attributes'] != "undefined")
					if(typeof meta['@attributes']['content'] != "undefined")
						if(meta['@attributes']['name']=="covers"){
							thumbnailContent = meta['@attributes']['content'];
						}

			});

			$.each(BookMeta.spine.itemref, function(index,spines){
				var NewPageComponent={
					'id': spines['@attributes']
				};
				Pages[spines['@attributes']['idref']]=NewPageComponent;
				PageIDArray.push(spines['@attributes']['idref']);
			});

			$.each(BookMeta.manifest.item, function(index,item){
				
				Items[item["@attributes"]["id"]] = item["@attributes"]["href"];

				if (thumbnailContent === item["@attributes"]["id"] ){
					var newThumbnailImage = $("<img/>");
					newThumbnailImage.attr('src',ContentFileRequesUrl+item["@attributes"]["href"] );
					newThumbnailImage.css('width','100%');
					newThumbnailImage.css('height','100%');

					var pic_real_width, pic_real_height;
						
					$("<img/>") // Make in memory copy of image to avoid css issues
					    .attr("src", ContentFileRequesUrl+item["@attributes"]["href"])
					    .load(function() {
					        pic_real_width = this.width;   // Note: $(this).width() will not
					        pic_real_height = this.height; // work for in memory images.
					        ratio = pic_real_width/200;

							if (pic_real_width>200){
								$('.reader_book_cover_thumbnail').css('height', (  pic_real_height / ratio )  + 'px')
							} 
					    });

					$('.reader_book_cover_thumbnail').empty().append(newThumbnailImage);
				}

			});



			
			$(".reader_page_container .bxslider").empty();
			$.each(PageIDArray, function(index,page){
				console.log(page);

				var newPageContainer=$("<li style=''></li>");

				var newPage=$("<iframe name='page"+index+"'class='page_iframe' frameBorder='0' scrolling='no' style='overflow:hidden;margin:0 auto;' ></iframe>");

				newPage.appendTo(newPageContainer);
				newPageContainer.appendTo($(".reader_page_container .bxslider"));
				newPage.attr("data-src",ContentFileRequesUrl + Items[page] );
				//newPage.attr("src","http://reader.lindneo.com/ugur/css/ui/css/themes/loading.gif" );
				window.pages.push(newPage);


				
				newPage.load(function(){
						        	$(this)
						        		.removeClass("lazy-hidden")
						        		.addClass("lazy-loaded")
						        		.fitToParent();
						        	//show_visibles();
					    });
				
			});
			
			

			$('#sidebar-collapse, .fa-bars').click(function(){ 
				handleTopLayer();
				console.log("resize now");
				var nextTime = setTimeout(function() {

					resizeEverything(); 
					nextTime = null;
					

				}, 302);  
			});
			
			
			var onslide = function($slideElement, oldIndex, newIndex){ 

					var kapanacaklar = [oldIndex-2,oldIndex-1,oldIndex,oldIndex+1,oldIndex+2];
					var acilacaklar =  [newIndex-2,newIndex-1,newIndex,newIndex+1,newIndex+2];
					
					
					kapanacaklar = kapanacaklar.filter(function(i) {return !(acilacaklar.indexOf(i) > -1);});

					$.each (kapanacaklar, function(index,kapanacak) {
						var simdiKapanacak = $( $('.bxslider iframe.page_iframe')[kapanacak] );

						if ( typeof simdiKapanacak != 'undefined'){
							simdiKapanacak.removeAttr('src');
							console.log("kapandı: "+ kapanacak);
						}
					});



					
					$.each (acilacaklar, function(index,acilacak) {
						var simdiAcilacak  = $( $('.bxslider iframe.page_iframe')[acilacak] );

						if ( typeof simdiAcilacak != 'undefined'){
							var attr = $(simdiAcilacak).attr('src');
							if (!(typeof attr !== 'undefined' && attr !== false)) {
							  	simdiAcilacak.attr('src', simdiAcilacak.attr('data-src' ));
								console.log("acildi: "+ acilacak);
								simdiAcilacak.fitToParent();
							}
							
						}
					});

					
					
					console.log (kapanacaklar);
					console.log (acilacaklar);
					
					

				};

			
			reader_slider =	$('.bxslider').bxSlider({

				infiniteLoop: false,
				hideControlOnEnd: true,
				onSlideAfter : onslide ,
				responsive:false,
				touchEnabled: true,
				//onSliderLoad : function (currents){ onslide (null,currents,currents );},
				 buildPager: function(slideIndex){
					switch(slideIndex){
					  default:
					  	return "<img src='/erkan/css/nopreview.png'>";
					  break;
						
					}
				  }


			});
			window.reader_slider = reader_slider;



			$("[reader-action]").parent().click(function(e){
				var thischild= $(this).children("[reader-action]");
				var action = $(thischild).attr("reader-action");
				switch(action){
					case "prev-page":
						reader_slider.goToPrevSlide();
						break;
					case "next-page":
						reader_slider.goToNextSlide();
						console.log(action);
						break;
					case "page-anchor":
						var pageNumber = $(thischild).attr("reader-data");
						if (pageNumber > -1 && pageNumber < reader_slider.getSlideCount())
							reader_slider.goToSlide(pageNumber);
						console.log(action);
						break;

				}
				console.log(action);
			});

			onslide (null,reader_slider.getCurrentSlide(),reader_slider.getCurrentSlide() );
			
			

			$(document).ready(resizeEverything);

			$(window).on('resize',resizeEverything);

			


		}

		

		



		


	


	

	});	
	</script>
	<!-- /JAVASCRIPTS -->
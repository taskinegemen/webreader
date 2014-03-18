jQuery(document).ready(function() {		

	$.ajax({
	  url: metaUrl,
	  success: function (data){
	  	BookMeta=JSON.parse(data);
	  	StartReaderApp();
	  	window.SlideController.init({
			selector:".bxslider",	
		});
		$(document).ready(resizeEverything);
		$(window).on('resize',resizeEverything);
	  },
	});

	var acik=false;

	$( ".read_page_thumbnails" ).click(function() {
	  if (!acik){
		  $( ".read_page_thumbnails" ).css("bottom","170px");
		  $( ".bx-custom-pager" ).css("bottom","50px");
		  $(".bx-pager").css({'bottom': '0px', 'overflow-x': 'scroll', 'overflow-y': 'hidden', 'white-space':'nowrap', 'height': '150px'});
		  acik=true;
		} else {
			acik=false;
			$( ".read_page_thumbnails" ).css("bottom","0");
			$( ".bx-custom-pager" ).css("bottom","0");
			$( ".bx-pager").css({'bottom': '-170px'});
		}
	});
			
});


function StartReaderApp (){

			
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
				PageSrcArray[item["@attributes"]["href"] ] = item["@attributes"]["id"];
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

			
			//Set Names & etc
			$('[content-meta="book-title"]').text( BookMeta.metadatadc.title) ;
			$('[content-meta="book-author"]').text( BookMeta.metadatadc.creator) ;
			$('[content-meta="book-publish-date"]').text( BookMeta.metadatadc.date) ;
			$('[content-meta="book-page-count"]').text(BookMeta.spine.itemref.length) ;
			$('[content-meta="book-categories"]').text( BookMeta.metadatadc.subject[0]) ;


			
			$(".reader_page_container .bxslider").empty();

			
			$.each(PageIDArray, function(index,page){


				var newPageContainer=$("<li style='margin-top:5px;'></li>");
				var newLoading = $('<div class="loadingt" style="position: absolute;background: #0c0c0c;top: 0;bottom: 0;left: 0;right: 0;z-index:1;display:block"></div>');
				newLoading.appendTo(newPageContainer);


				var newPage=$("<iframe name='page"+index+"'class='page_iframe' frameBorder='0' scrolling='no' style='overflow:hidden;margin:0 auto;' ></iframe>")
				newPage.appendTo(newPageContainer);

				newPageContainer.appendTo($(".reader_page_container .bxslider"));

				newPage.attr("data-src",ContentFileRequesUrl + Items[page] );
				
				window.pages.push(newPage);

				newLoading = null;
				newPage = null;

			});
			



			//Get Table Of Contents
			$.get(ContentFileRequesUrl+Items["ncx"])
				.done(function(e){
					xmlDoc = $.parseXML( e ),
  					$xml = $( xmlDoc ),
  					$navMap = $xml.find( "navPoint" );

					//console.log($navMap.children('navlabel').text());
					console.log($navMap);
					$('ul.reader_toc_dropdown li:not(:first)').remove(); 
					$navMap.each(function(index,element){
						console.log(element);
						var source=$(element).find('content').attr("src");

						var newElement = {
							'label' : $(element).find('navLabel').find('text').text(),
							'link' : source,
							'pageNumber': PageIDArray.indexOf(PageSrcArray[source])
							
						};
						
						var newItem = $('<li> \
						<a href="#page'+newElement.pageNumber+'"> \
								<span reader-action="page-anchor" reader-data="'+newElement.pageNumber+'" class="reader_toc_dropdown_page_numbers"> \
									'+newElement.pageNumber+' \
								</span> \
								'+newElement.label+' \
							</a> \
						</li>');
						$('ul.reader_toc_dropdown').append(newItem);




						console.log(newElement);
						

					});
				});

}
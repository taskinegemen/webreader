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
			
			
			$( ".read_page_thumbnails" ).hover(function() {
			  $( ".read_page_thumbnails" ).css("bottom","50px");
			  $( ".bx-custom-pager" ).css("bottom","50px");
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

}
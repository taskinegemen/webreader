<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


		<script type="text/javascript">
		jQuery(document).ready(function() {     
			App.setPage("gallery");  //Set current page
			App.init(); //Initialise plugins and elements
		});
		</script><!-- /JAVASCRIPTS -->

		<div class="market_page_container">

			<?php echo functions::event('left_menu', $this); ?>

			<div id="main-content">
				<div class="container">
					<div class="row">
						<div class="reader_market_page_row clearfix">
                        

                        <div class="box-body clearfix">
									   <div id="filter-controls" class="btn-group">
										  <div class="hidden-xs">
                                          	  <div class="reader_book_category">En Çok Okunanlar</div>
											  <a href="#" class="btn btn-default" data-filter="*">Hepsi</a>
											  <a href="#" class="btn btn-default" data-filter=".category_1">Ücretli</a>
											  <a href="#" class="btn btn-default" data-filter=".category_2">Ücretsiz</a>
										  </div>
										  <div class="visible-xs">
											   <select id="e1" class="form-control">
													<option value="*">Hepsi</option>
													<option value=".category_1">Ücretli</option>
													<option value=".category_2">Ücretsiz</option>
												</select>
										  </div>
									   </div>

                                            
                                            
										<div id="filter-items" class="market_page_book_filter row">    

									</div>
                        
                        
                        
                        

						</div>
					</div>
				</div>
			</div>
		</div><!-- /market_page_container -->
<script type="text/javascript">
	 
    function getCurrency(code){
    	var type;
    	switch (code){
    		case '949':
    		type='TL';
    		break;
    		case '998':
    		type='$';
    		break;
    		case '978':
    		type='€';
    		break;
    	}
    	return type;
    }

    function d2h(d) {
        return d.toString(16);
    }

    function stringToHex (tmp) {
        var str = '',
            i = 0,
            tmp_len = tmp.length,
            c;
     
        for (; i < tmp_len; i += 1) {
            c = tmp.charCodeAt(i);
            str = d2h(c) + ' ';
        }
        return str%8;
    }

        var kerbela=$(window).kerbelainit();
        kerbela.setRequestedHttpService('catalog');
        var ticket=kerbela.getTicket();
        var auth=kerbela.getAuthTicket();
        var HTTP_service_ticket=ticket.HTTP_service_ticket;

        $.ajax({
          type: "POST",
          url: "http://catalog.lindneo.com/api/list",
          data: { attributes: '{}', auth: auth, http_service_ticket: HTTP_service_ticket, type:"web"}
        })
          .done(function( result ) {
          	var data = JSON.parse(result);
        	var author; 
              
            $.each( data.result, function( key, book ) {
				$.ajax({
		          type: "POST",
		          url: "http://catalog.lindneo.com/api/getMetaValue",
		          data: { id: book.contentId, metaKey:'author', auth: auth, http_service_ticket: HTTP_service_ticket, type:"web"}
		        }).done(function( res ) {
		        	var authorRes=JSON.parse(res).result;
		        	if(authorRes){
		        		author=authorRes;
		        	}else{
		        		author = '-';
		        	}
		        });

		        var bookthumbnail = "";
                var image_data = "";
                $.ajax({
                      url: "http://catalog.lindneo.com/api/getThumbnail/id/"+book.contentId
                    }).done(function(result1) {
                      console.log(result1);
                      bookthumbnail = result1;
                    });
                if(bookthumbnail){
                    image_data = "http://catalog.lindneo.com/api/getThumbnail/id/"+book.contentId;
                }
                else{
                    var imageid = stringToHex(book.contentId);
                    image_data = "<?php echo Yii::app()->request->baseUrl; ?>/css/covers/cover"+imageid+".jpg";
                }

				var card='<div class="';
        if (book.contentIsForSale=='Free') {
          card+='category_2';
        }else{
          card+='category_1';
        };
        card+=' item">\
        <div class="reader_book_card">\
					<div class="reader_book_card_book_cover">\
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/content/details/'+book.contentId+'">\
					<img src="'+image_data+'" style="width:198px; height:264px" /></div></a>\
					<div class="reader_book_card_info_container">\
						<div class="reader_market_book_name tip" data-original-title="'+book.contentTitle+'">'+book.contentTitle+'</div>\
						<button class="reader_book_card_options_button pop-bottom" data-title="Bottom"></button>\
						<div class="clearfix"></div>\
						<div class="reader_book_card_writer_name tip" data-original-title="'+author+'">'+author+'</div>\
						<div class="reader_book_price">';
				if (book.contentIsForSale=='Free') {
					card+='Ücretsiz';
				}else{
					card+=book.contentPrice+' '+getCurrency(book.contentPriceCurrencyCode);
				};
				card+='</div>\
					</div>\
				</div></div>';
				
				$('#filter-items').append(card);
            });
          });
      
</script>


	
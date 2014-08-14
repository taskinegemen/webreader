<?php
/* @var $this SiteController */
	$this->pageTitle=Yii::app()->name;
?>

<script type="text/javascript">
    $( document ).ready(function() { 
//if( !$('#sidebar').hasClass('mini-menu')) $('#sidebar').addClass('mini-menu');
//if( !$('#main-content').hasClass('margin-left-50')) $('#main-content').addClass('margin-left-50');
$("ul>li> #library").parent().addClass("current");
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
            var kerbela = $(window).kerbelainit();
            kerbela.setRequestedHttpService('koala');
            if (kerbela.getTicket()==null) {
                    window.location.href="<?php echo Yii::app()->request->baseUrl; ?>";
                };
            console.log(kerbela.getRequestedHttpService());
            var auth = kerbela.getAuthTicket();
            var HTTP_service_ticket = kerbela.getTicket().HTTP_service_ticket;
            console.log(HTTP_service_ticket);
            $.ajax({
              type: "POST",
              url: "<?php echo Yii::app()->params['koala_host'];?>/api/getUserBooks",
              data: { auth: encodeURI(auth), http_service_ticket: encodeURI(HTTP_service_ticket), type:"web"}
            })
              .done(function( result ) {
                console.log(result);
                userBooks = JSON.parse(result);
                console.log(userBooks.result);
                var getMainInfoBooks = [];

                if(userBooks.result){


                    $.each( userBooks.result, function( key, userBook ) {
                        getMainInfoBooks.push(userBook.book_id);
                    });

                     $.ajax({
                            type: "POST",
                            url: "<?php echo Yii::app()->params['catalog_host'];?>/api/getMainInfo",
                            data: { id : JSON.stringify(getMainInfoBooks) }
                        })
                          .done(function( result ) {
                            
                            books_data = JSON.parse(result);
                            console.log(books_data);
                            

                            if (books_data.result)
                            $.each (books_data.result, function(index,value){

                                var book_data = "";
                                var book_thumbnail = "";

                                var bookthumbnail = "<?php echo Yii::app()->params['catalog_host'];?>/api/getThumbnail?id="+value.contentId;
                                if(!bookthumbnail){
                                    
                                    var imageid = stringToHex(value.contentId);
                                    bookthumbnail = "<?php echo Yii::app()->request->baseUrl; ?>/css/covers/cover"+imageid+".jpg";
                                }
                                
                                var book = $('<div class="reader_book_card">\
                                                <div class="reader_book_card_book_cover solid_brand_color">\
                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/content/details/'+value.contentId+'">\
                                                 <img data-src="'+bookthumbnail+'" class="lazyimgs" style="width:198px; height:264px" /></a></div>\
                                                <div class="reader_book_card_info_container">\
                                                <div class="reader_market_book_name"><a href="<?php echo Yii::app()->request->baseUrl; ?>/content/details/'+value.contentId+'">'+value.contentTitle+'</a></div>\
                                                <button class="reader_book_card_options_button dropdown-toggle" data-toggle="dropdown"></button>\
													<ul class="dropdown-menu options_menu_dropdown">\
																<li>\
																<a href="#">Kütüphanemden Kaldır</a>\
																</li>\
																<li>\
																<a href="#">Eser Detayları</a>\
																</li>\
																<li>\
																<a href="#">Paylaş</a>\
																</li>\
																<li>\
																<a href="#">Uygunsuz İçerik Bildir</a>\
																</li>\
													</ul>\
                                                <div class="clearfix"></div>\
                                                <div class="reader_book_card_writer_name">'+value.contentAuthor+'</div>\
                                                <div class="reader_book_fav"><i class="fa fa-star-o"></i></div>\
                                                </div>\
                                                </div>');
                                
                                book.appendTo('#books');
                            });

                        });
                   
                }
                else{
                    $('.row').html('<div class="reader_nobook_page_row clearfix">\
                                            <div class="nobook_smiley"></div>\
                                            <p class="nobook_text">Kütüphanenizde hiç kitabınız bulunmamaktadır.</p>\
                                            <p class="nobook_text">Mağaza’dan kitap edinin.</p>\
                                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/content/list"><button class="btn btn-primary pull-right book_info_add_to_library_button brand_color_for_buttons">Mağazaya Git</button></a>\
                                            </div>');
                }
              });
        

		App.setPage("gallery");  //Set current page
		App.init(); //Initialise plugins and elements

$('img.lazyimgs').lazy();
	});
</script><!-- /JAVASCRIPTS -->

<div class="library_page_container">
	
<?php echo functions::event('left_menu', $this); ?>
    
	<div id="main-content">
		<div class="container">
			<div class="row">

				<!-- <div class="reader_library_page_row clearfix" id="favorite_books">

            <div style="display:none;">
				<div class="reader_library_page_row clearfix" id="favorite_books">

					<div class="reader_book_category">
						Favorilerim
					</div>
                    
                <div class="clearfix"></div>    
                    
       
        
        
        
                
        
        
        
        
                            
                    
        
				</div> -->
        <!-- END OF reader_library_page_row -->
                
                <!-- </div>
                
                 -->
				<div class="reader_library_page_row clearfix" id="books">
					<div class="reader_book_category">
						Kitaplarım
					</div>

                    <div class="clearfix"></div>



        
        
        
        


                           
                    
                    
                    
				</div>
			</div>
		</div>
	</div>
</div><!-- /library_page_container -->
<script>
            
            $( document ).ready(function() {
              //new UISearch( document.getElementById( 'sb-search' ) );
                $('img.lazyimgs').lazy();
            });

            
        </script>


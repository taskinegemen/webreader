<?php
/* @var $this SiteController */
	$this->pageTitle=Yii::app()->name;
?>

<script type="text/javascript">
	$( document ).ready(function() { 
        console.log('deneme');
        var username='egemen@linden-tech.com';
        var password='12548442';
        console.log(password);
        var kerbela=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','http://koala.lindneo.com/kerberizedservice/authenticate',username,password,'kerbela','koala','6000');
        var response=kerbela.execute();
        if (response.status) {
            var ticket=kerbela.getTicket();
            var auth=kerbela.getAuthTicket();
            var HTTP_service_ticket=ticket.HTTP_service_ticket;


            $.ajax({
              type: "POST",
              url: "http://koala.lindneo.com/api/getUserBooks",
              data: { user_id: "1", auth: auth, http_service_ticket: HTTP_service_ticket, type:"web"}
            })
              .done(function( result ) {
                console.log(result);
                deneme = JSON.parse(result);
                console.log(deneme.result);
                $.each( deneme.result, function( key, value ) {
                  console.log(value.book_id);
                  var kerbela_catalog = $(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','http://catalog.lindneo.com/kerberizedservice/authenticate',username,password,'kerbela','catalog','6000');
                        var response_catalog=kerbela_catalog.execute();
                        if (response_catalog.status) {
                            var ticket_catalog = kerbela_catalog.getTicket();
                            var auth_catalog=kerbela_catalog.getAuthTicket();
                            var HTTP_service_ticket_catalog=ticket_catalog.HTTP_service_ticket;
                            var book_data = "";
                            var book_thumbnail = "";
                            $.ajax({
                                type: "POST",
                                url: "http://catalog.lindneo.com/api/getMainInfo",
                                data: { id: value.book_id, auth: auth_catalog, http_service_ticket: HTTP_service_ticket_catalog, type:"web"}
                            })
                              .done(function( result ) {
                                
                                book_data = JSON.parse(result);
                                console.log(book_data.result);
                            });

                            $.ajax({
                                type: "POST",
                                url: "http://catalog.lindneo.com/api/getThumbnail",
                                data: { id: value.book_id, auth: auth_catalog, http_service_ticket: HTTP_service_ticket_catalog, type:"web"}
                            })
                              .done(function( result ) {
                                //book_thumbnail = JSON.parse(result);
                                console.log(result);
                            });
                            var book = $('<div class="reader_book_card">\
                                            <div class="reader_book_card_book_cover solid_brand_color"></div>\
                                            <div class="reader_book_card_info_container">\
                                            <div class="reader_market_book_name">'+book_data.result.contentTitle+'</div>\
                                            <button class="reader_book_card_options_button pop-bottom" data-title="Bottom"></button>\
                                            <div class="clearfix"></div>\
                                            <div class="reader_book_card_writer_name">'+book_data.result.contentAuthor+'</div>\
                                            <div class="reader_book_fav"><i class="fa fa-star-o"></i></div>\
                                            </div>\
                                            </div>');
                            console.log(book);
                            book.appendTo('#books');
                        }
                });
              });
          }

		//App.setPage("gallery");  //Set current page
		//App.init(); //Initialise plugins and elements


	});
</script><!-- /JAVASCRIPTS -->

<div class="library_page_container">
	<div id="sidebar" class="sidebar sidebar-fixed">
		<div class="sidebar-menu nav-collapse">
			<!--=== Navigation ===-->
		<ul>
			<li class="current">
				<a href="<?php echo $this->createUrl("site/library"); ?>">
					<i class="fa fa-book fa-fw"></i>
					<span class="menu-text">Kütüphanem</span>
				</a>
			</li> 
			<li>
				<a href="<?php echo  $this->createUrl("content/list"); ?>">
					<i class="fa fa-briefcase fa-fw"></i> 
                    <span class="menu-text">Mağaza</span>
				</a>
			</li>
			<li>
				<a href="<?php echo $this->createUrl("user/profile"); ?>">
					<i class="fa fa-user fa-fw"></i> 
                    <span class="menu-text">Profilim</span>
				</a>
			</li>
		</ul>
		<!-- /Navigation -->
		</div>
	</div><!-- /Sidebar -->
	<div id="main-content">
		<div class="container">
			<div class="row">
				<div class="reader_library_page_row clearfix" id="favorite_books">
					<div class="reader_book_category">
						Favorilerim
					</div>
                    
                    
                    
        <!-- READER BOOK CARD -->
        <div class="reader_book_card">
        <div class="reader_book_card_book_cover solid_brand_color"></div>
        <div class="reader_book_card_info_container">
        <div class="reader_market_book_name">The Book Name is here</div>
        <button class="reader_book_card_options_button pop-bottom" data-title="Bottom"></button>
        <div class="clearfix"></div>
        <div class="reader_book_card_writer_name">The Name of The Writer</div>
        <div class="reader_book_fav"><i class="fa fa-star"></i></div>
        </div>
        <!-- /reader_book_card_info_container -->
        </div>
        <!-- END OF READER BOOK CARD -->
        
        
        
                
        
        
        
        
                            
                    
        
				</div>
        <!-- END OF reader_library_page_row -->
                
                
                
                
				<div class="reader_library_page_row clearfix" id="books">
					<div class="reader_book_category">
						Diğerleri
					</div>
                    
        <!-- READER BOOK CARD -->
        <div class="reader_book_card">
        <div class="reader_book_card_book_cover solid_brand_color"></div>
        <div class="reader_book_card_info_container">
        <div class="reader_market_book_name">The Book Name is here</div>
        <button class="reader_book_card_options_button pop-bottom" data-title="Bottom"></button>
        <div class="clearfix"></div>
        <div class="reader_book_card_writer_name">The Name of The Writer</div>
        <div class="reader_book_fav"><i class="fa fa-star-o"></i></div>
        </div>
        <!-- /reader_book_card_info_container -->
        </div>
        <!-- END OF READER BOOK CARD --> 
        
        
        
        
        


                           
                    
                    
                    
				</div>
			</div>
		</div>
	</div>
</div><!-- /library_page_container -->

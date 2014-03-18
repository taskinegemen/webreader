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
						<div class="reader_market_page_row clearfix">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="reader_book_category">En Çok Okunanlar
											</li>
											<li class="active">
												<a href="#tab_1_1" data-toggle="tab">Ücretli</a>
											</li>
											<li class="">
												<a href="#tab_1_2" data-toggle="tab">Ücretsiz</a>
											</li>
											<li class="">
												<a href="#tab_1_3" data-toggle="tab">Hepsi</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active in" id="tab_1_1">
												<div class="divide-10"></div>
											
											</div>
											<div class="tab-pane" id="tab_1_2">
												<div class="divide-10"></div>
												
											</div>
											<div class="tab-pane fade" id="tab_1_3">
												<div class="divide-10"></div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /market_page_container -->
<script type="text/javascript">
	var username='egemen@linden-tech.com';
    var password='12548442';
    var kerbela=$(window).kerbelainit('http://kerbela.lindneo.com','http://kerbela.lindneo.com/api/authenticate/','http://kerbela.lindneo.com/api/ticketgrant/','http://catalog.lindneo.com/kerberizedservice/authenticate',username,password,'kerbela','catalog','6000');
    var response=kerbela.execute();
    
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
    if (response.status) {
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

				var card='<div class="reader_book_card">\
					<div class="reader_book_card_book_cover">\
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/content/details/'+book.contentId+'">\
					<img src="http://catalog.lindneo.com/api/getThumbnail?id='+book.contentId+'" style="width:198px; height:264px" /></div></a>\
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
				</div>';
				if (book.contentIsForSale=='Free') {
					$('#tab_1_2').append(card);
				}else{
					$('#tab_1_1').append(card);
				};
				$('#tab_1_3').append(card);
            });
          });
      }
</script>
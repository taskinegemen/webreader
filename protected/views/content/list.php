<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


		<script type="text/javascript">
		jQuery(document).ready(function() {     
			$("ul>li> #list").parent().addClass("current");
            App.setPage("gallery");  //Set current page
			App.init(); //Initialise plugins and elements
		});
		</script><!-- /JAVASCRIPTS -->

		<div class="market_page_container">

			<?php echo functions::event('left_menu', $this); ?>

            
            
            


			<div id="main-content">            
            
             <div class="market_page_action_bar">                          
                 <ul class="market_page_left_actions">
                 
                 
                    <li class="dropdown market_page_categories">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategoriler <i class="fa fa-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li>Kategori 1</li>
                                <li>Kategori 2</li>
                                <li>Kategori 3</li>
                                <li>Kategori 4</li>
                            </ul>
                    </li>
                    
                    
                    <div class="action_bar_spacer"></div>
                    <li class="market_page_left_actions_current"><a href="#" target="_blank">Anasayfa</a></li>
                    <li><a href="#" target="_blank">En'ler</a></li>
                    <li><a href="#" target="_blank">Yeni Kitaplar</a></li>
                 </ul>
             </div>
                 <!-- END OF market_page_left_actions ->
             </div>
             <!- END OF market_page_action_bar -->
             
				<div class="container">
					<div class="row">
						<div class="reader_market_page_row clearfix">
                        

                        <div class="box-body clearfix" id="booksSpace">
						
                        

						</div>
					</div>
				</div>
			</div>
		</div><!-- /market_page_container -->
<script type="text/javascript">
    $( document ).ready(function() { 
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
        if (ticket==null) {
            window.location.href="<?php echo Yii::app()->request->baseUrl; ?>";
        };
        var auth=kerbela.getAuthTicket();
        var HTTP_service_ticket=ticket.HTTP_service_ticket;
        var organisationId=window.location;
        console.log(organisationId);
        var myRe = /.([A-Za-z\-0-9]+)\.(com|net|edu|mil|gov)/g;
        var myArray = myRe.exec(organisationId);
        organisationId=(myArray[1]).replace('-','_');
        //var server_organisationId="seviye";
        var server_organisationId="<?php echo Yii::app()->params[organisation_id];?>";
        if(organisationId=='okutus' || organisationId=='lindneo'){
            organisationId=server_organisationId;
        }
        //organisationId="linden_team";
        console.log(organisationId);
        if (organisationId)
            var dataToBeSent = { attributes: '{"organisationId":["'+organisationId+'"]}', auth: auth, http_service_ticket: HTTP_service_ticket, type:"web"};
        else 
            var dataToBeSent = { };

        if (organisationId)

        var holderUlElement =  $('.dropdown.market_page_categories ul.dropdown-menu');
        
       
        function listAllBooks(){
            $.ajax({
              type: "POST",
              url: "<?php echo Yii::app()->params['catalog_host'];?>/api/list",
              data: dataToBeSent
            })
              .done(function( result ) {
                    listBookCards(result);
              });
          };




        $.ajax({
          type: "POST",
          url: "<?php echo Yii::app()->params['catalog_host'];?>/api/getOrganisationCategories",
          data: { id: organisationId}
        })
            .done(function( result ) {
                try{

                    var catergories= JSON.parse(result).result;
                }
                catch(e){
                    $('.dropdown.market_page_categories').hide();
                    return;
                }
                console.log(catergories);

                if(catergories == null){
                    
                       $('.dropdown.market_page_categories').hide();
                       return;
                   
                } else {
                    holderUlElement.empty();
                }
                var allBooks=$('<li></li>');
                allBooks
                        .text("Tüm Yayınlar")
                        .appendTo(holderUlElement)
                        .click(function(event){
                            listAllBooks();
                        });


                $.each(catergories,function(index,category){
                    var newCategoryElement = $('<li></li>');
                    newCategoryElement
                        .attr('data-category_id',category.category_id)
                        .attr('data-category_name',category.category_name)
                        .attr('data-organisation_id',category.organisation_id)
                        .attr('data-periodical',category.periodical)
                        .text(category.category_name)
                        .appendTo(holderUlElement)
                        .click(function(event){
                             $.ajax({
                                  type: "POST",
                                  url: "<?php echo Yii::app()->params['catalog_host'];?>/api/listCategoryCatalogs",
                                  data: { id: $(this).attr('data-category_id'), auth: auth, http_service_ticket: HTTP_service_ticket, type:"web" }
                                })
                                  .done(function( result ) {
                                        console.log(result);
                                        listBookCards(result);
                                  });
                        });
                });
            });
         
        listAllBooks();
        function listBookCards (result){
            console.log("RESULT: "+result);
            var data = JSON.parse(result);
            console.log(data);
            var author=""; 
            $('#booksSpace').empty();
            $.each( data.result, function( key, book ) {
                /**
                $.ajax({
                  type: "POST",
                  url: "http://bigcat.okutus.com/api/getMetaValue",
                  data: { id: book.contentId, metaKey:'author', auth: auth, http_service_ticket: HTTP_service_ticket, type:"web"}
                }).done(function( res ) {
                    var authorRes=JSON.parse(res).result;
                    if(authorRes){
                        author=authorRes;
                    }else{
                        author = '-';
                    }
                });
                */
                //var bookthumbnail = "<?php echo Yii::app()->params['catalog_host'];?>/api/getThumbnail?id=5ZLCqyyAHL6Q3vlukDRZQhH7UbMupEr1sRzFVRXxH0AC";
                var bookthumbnail = "<?php echo Yii::app()->params['catalog_host'];?>/api/getThumbnail?id="+book.contentId;

                if(!bookthumbnail){
                    var imageid = stringToHex(book.contentId);
                    bookthumbnail = "/css/covers/cover"+imageid+".jpg";
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
                    <img src="<?php echo Yii::app()->params['catalog_host'];?>/api/getThumbnail?id='+book.contentId+'" style="width:198px; height:264px" /></div></a>\
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
                
                $('#booksSpace').append(card);
            });
        }



      if( $('#sidebar').hasClass('mini-menu')) $('#sidebar').removeClass('mini-menu');
 if( $('#main-content').hasClass('margin-left-50')) $('#main-content').removeClass('margin-left-50');
$('img.lazyimgs').lazy();

    });
</script> 


<script type="text/javascript">





</script> 

	

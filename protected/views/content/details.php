<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<style type="text/css">
    
      #CreditCardFront span, #CreditCardFront strong { position: absolute; } #CreditCardFront span { color: #aaafb8; } #CreditCardFront strong { color: #8e8e8e; } .CardNumber { top: 90px; left: 15px; font-size: 20px; } .LastDate { left: 140px; top: 115px; font-size: 14px; } .UserName { top: 137px; left: 15px; font-size: 16px; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; display: block; width: 205px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; } .focused { background-color: #fefbd9; } .CardLogo { position: absolute; left: 15px; top: 15px; display: none; } #CreditCardFront .CVCTxt { top: 65px; right: 20px; } 
</style>

<script>
		$( document ).ready(function() { 
            var kerbela = $(window).kerbelainit();
            kerbela.setRequestedHttpService('catalog');
            console.log(kerbela.getRequestedHttpService());
            var auth = kerbela.getAuthTicket();
            var HTTP_service_ticket = kerbela.getTicket().HTTP_service_ticket;
            
            var book_data = "";
            var book_thumbnail = "";
            $.ajax({
                type: "POST",
                url: "http://catalog.lindneo.com/api/getMainInfo",
                data: { id: '<?php echo $id; ?>', auth: auth, http_service_ticket: HTTP_service_ticket, type:"web"}
            })
              .done(function( result ) {
               		book_data = JSON.parse(result);
                    console.log(book_data.result);
            });


            kerbela.setRequestedHttpService('koala');
            console.log(kerbela.getRequestedHttpService());
            var auth_koala = kerbela.getAuthTicket();
            var HTTP_service_ticket_koala = kerbela.getTicket().HTTP_service_ticket;
            $('#bbook').show();
            $('#rbook').hide();
            $.ajax({
                    type: "POST",
                    url: "http://koala.lindneo.com/api/checkUserBook",
                    data: { book_id: '<?php echo $id; ?>', auth: auth_koala, http_service_ticket: HTTP_service_ticket_koala, type:"web"}
                })
                  .done(function( result ) {
                    console.log(result);
                    checkdata=JSON.parse(result);
                    if(checkdata.result){
                        console.log(checkdata.result);
                        $('#bbook').hide();
                        $('#rbook').show();
                    }
                });

            $('.book_info_the_name_of_the_book').html(book_data.result.contentTitle);
            $('.book_info_page').html(book_data.result.contentTotalPage);
            $('.book_info_date').html(book_data.result.contentDate);
            $('.book_info_the_name_of_the_writer').html(book_data.result.contentAuthor);
            $('.contentExplanation').html(book_data.result.contentExplanation);

            $('.book_info_book_cover').css('background-image', 'url(http://catalog.lindneo.com/api/getThumbnail/id/<?php echo $id; ?>)');
            console.log(book_data.result.contentPrice);
            if(book_data.result.contentIsForSale == 'Free'){
                $('#odeme_bilgileri').hide();
            }
            
                $('#bookname').html(book_data.result.contentTitle);
                $('#bookauthor').html(book_data.result.contentAuthor);
                var price_type = "";
                if(book_data.result.contentPriceCurrencyCode == "949") price_type = "TL";
                $('#bookprice').html(book_data.result.contentPrice+" "+price_type);
            
            /*var book = $('<div class="reader_book_card">\
                            <div class="reader_book_card_book_cover solid_brand_color">\
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/content/details/'+value.book_id+'"><img src="http://catalog.lindneo.com/api/getThumbnail/id/'+value.book_id+'" style="width:198px; height:264px;"></a></div>\
                            <div class="reader_book_card_info_container">\
                            <div class="reader_market_book_name"><a href="<?php echo Yii::app()->request->baseUrl; ?>/content/details/'+value.book_id+'">'+book_data.result.contentTitle+'</a></div>\
                            <button class="reader_book_card_options_button pop-bottom" data-title="Bottom"></button>\
                            <div class="clearfix"></div>\
                            <div class="reader_book_card_writer_name">'+book_data.result.contentAuthor+'</div>\
                            <div class="reader_book_fav"><i class="fa fa-star-o"></i></div>\
                            </div>\
                            </div>');
            console.log(book);
            book.appendTo('#books');
            */


    		App.setPage("gallery");  //Set current page
    		App.init(); //Initialise plugins and elements
            $('#card_preview').css({'background-image': 'url(<?php echo Yii::app()->request->baseUrl; ?>/css/ui/img/card.jpg)', 'background-repeat': 'no-repeat'});
            $('#CreditCardBack').hide();
            $('.UserName').css('background-color','');
            $('.CardNumber').css('background-color','');
            $('.LastDate').css('background-color','');
            $('.CVCTxt').css('background-color','');
            $('#name').focus(function() {
              $('#CreditCardFront').show();
              $('#CreditCardBack').hide();
              $('#card_preview').css({'background-image': 'url(<?php echo Yii::app()->request->baseUrl; ?>/css/ui/img/card.jpg)', 'background-repeat': 'no-repeat'});
              $('.UserName').css('background-color','#fefbd9');
              $('.CardNumber').css('background-color','');
              $('.LastDate').css('background-color','');
              $('.CVCTxt').css('background-color','');
            });
            $('#cardnumber').focus(function() {
              $('#CreditCardFront').show();
              $('#CreditCardBack').hide();
              $('#card_preview').css({'background-image': 'url(<?php echo Yii::app()->request->baseUrl; ?>/css/ui/img/card.jpg)', 'background-repeat': 'no-repeat'});
              $('.UserName').css('background-color','');
              $('.CardNumber').css('background-color','#fefbd9');
              $('.LastDate').css('background-color','');
              $('.CVCTxt').css('background-color','');
            });
            $('#card_month').focus(function() {
                $('#CreditCardFront').show();
              $('#CreditCardBack').hide();
              $('#card_preview').css({'background-image': 'url(<?php echo Yii::app()->request->baseUrl; ?>/css/ui/img/card.jpg)', 'background-repeat': 'no-repeat'});
              $('.UserName').css('background-color','');
              $('.CardNumber').css('background-color','');
              $('.LastDate').css('background-color','#fefbd9');
              $('.CVCTxt').css('background-color','');
            });
            $('#card_year').focus(function() {
                $('#CreditCardFront').show();
              $('#CreditCardBack').hide();
              $('#card_preview').css({'background-image': 'url(<?php echo Yii::app()->request->baseUrl; ?>/css/ui/img/card.jpg)', 'background-repeat': 'no-repeat'});
              $('.UserName').css('background-color','');
              $('.CardNumber').css('background-color','');
              $('.LastDate').css('background-color','#fefbd9');
              $('.CVCTxt').css('background-color','');
            });

            $('#cvc').focus(function() {
              $('#CreditCardFront').hide();
              $('#CreditCardBack').show();
              $('.UserName').css('background-color','');
              $('.CardNumber').css('background-color','');
              $('.LastDate').css('background-color','');
              $('.CVCTxt').css('background-color','#fefbd9');
              $('#card_preview').css({'background-image': 'url(<?php echo Yii::app()->request->baseUrl; ?>/css/ui/img/cardback.jpg)', 'background-repeat': 'no-repeat'});
            });

            var month = "";
            var year = "";

            $('#card_month').change(function(){
                month = $(this).val();
            });

            $('#card_year').change(function(){
                year = $(this).val();
            });

            $('#buy_book').click(function() {
                console.log($('#name').val());
                console.log($('#cardnumber').val());
                console.log($('#cvc').val());
                console.log(month);
                console.log(year);

                kerbela.setRequestedHttpService('panda');
                console.log(kerbela.getRequestedHttpService());
                var auth_panda = kerbela.getAuthTicket();
                var HTTP_service_ticket_panda = kerbela.getTicket().HTTP_service_ticket;
                $.ajax({
                    type: "POST",
                    url: "http://panda.lindneo.com/api/transaction",
                    data: { type_name:'book', type_id: '<?php echo $id; ?>', auth: auth_panda, http_service_ticket: HTTP_service_ticket_panda, type:"web"}
                })
                  .done(function( result ) {
                    console.log(result);
                    if(result){
                        $('#buybook').modal('hide');
                        $('#bbook').hide();
                        $('#rbook').show();
                    }
                });
            });


	});
	</script>
	<!-- /JAVASCRIPTS -->
    
<div class="book_info_page_container">

<?php echo functions::event('left_menu', $this); ?>

<div id="main-content">
	<div class="container">
		<div class="row">
	
<div class="reader_book_info_container clearfix">

<div class="book_info_details_container clearfix">
<div class="book_info_book_cover_container">

<div class="book_info_book_cover"></div>
<div class="stars_rating_of_the_book">

<div id="readOnly-demo" title="poor">
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="1" title="kötü" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="2" title="zayıf" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="3" title="orta" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off.png" alt="4" title="iyi" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off.png" alt="5" title="mükemmel" />
<input type="hidden" name="score" value="2" readonly="readonly">
</div>
</div>
<!-- /stars_rating_of_the_book -->


<div class="number_rating_of_the_book">(583)</div>

</div>
<!-- /book_info_book_cover_container -->


<div class="book_info_details_right_part">

<div class="book_info_details_row clearfix">
<h1 class="book_info_the_name_of_the_book">Beautiful Ruins</h1>
<div class="book_info_page">128 Sayfa</div>
<div class="book_info_date">15 Ekim 2013</div>
<div class="clearfix"></div>
<h3 class="book_info_the_name_of_the_writer">Jess Walter</h2>

<button class="btn btn-primary pull-right book_info_add_to_library_button brand_color_for_buttons"  id="bbook" data-toggle="modal" data-target="#buybook">Kütüphaneme Ekle</button>
<a class="btn btn-primary pull-right book_info_add_to_library_button brand_color_for_buttons" href="<?php echo Yii::app()->request->baseUrl.'/content/read/'.$id; ?>" target="_blank" id="rbook">Oku</a>

</div>
<!-- /book_info_details_row -->



<div class="book_info_details_row clearfix">
<div class="book_info_description">
<span class="book_info_titles brand_text_color">Açıklama:</span>
<p class="contentExplanation">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pretium bibendum sollicitudin. Fusce ligula sapien, blandit et nulla et, dictum facilisis mauris. Quisque vel venenatis ante, dignissim lacinia felis. Morbi nec libero et urna tristique molestie.Aenean at felis ante. Etiam eget eros in orci vestibulum porta.</p> 
</div>
<!-- /book_info_description -->


<div class="book_info_rate_the_book">

<span class="book_info_titles brand_text_color"><center>Kitabı Oyla</center></span>


<div id="size-demo" class="book_rater_stars">
<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-half-big.png" alt="1" title="kötü">&nbsp;
<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off-big.png" alt="2" title="zayıf">&nbsp;
<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off-big.png" alt="3" title="orta">&nbsp;
<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off-big.png" alt="4" title="iyi">&nbsp;
<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off-big.png" alt="5" title="mükemmel">
<input type="hidden" name="score">
</div>



</div>


</div>
<!-- /book_info_details_row -->

</div>
<!-- /book_info_details_right_part -->
</div>
<!-- /book_info_details_container -->


<div class="book_info_comment_box clearfix">
<span class="book_info_titles clearfix brand_text_color">Yorum Yap</span>
<textarea rows="3" cols="5" name="textarea" class="form-control"></textarea>
<button class="send_comment btn btn-primary brand_color_for_buttons">Gönder</button>
</div>



<div class="book_info_comments_container clearfix">
<span class="book_info_titles brand_text_color">Yorumlar</span>

<div class="user_comment_container clearfix">
<div class="user_comment_avatar"><img src="<?php echo Yii::app()->request->baseUrl; ?>/avatars/avatar.png"></div>
<div class="user_comment_details">
<div class="user_comment_username">Erkan Öğümsöğütlü</div>
<div class="user_comment_user_rating">
<div id="readOnly-demo" title="poor">
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="1" title="kötü" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="2" title="zayıf" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="3" title="orta" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off.png" alt="4" title="iyi" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off.png" alt="5" title="mükemmel" />
<input type="hidden" name="score" value="2" readonly="readonly">
</div>
</div>
<!-- /user_comment_user_rating -->
<div class="user_comment_date">08/12/2013</div>
<div class="clearfix"></div>
<div class="user_comment_content">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pretium bibendum sollicitudin. 
</div>
<!-- /user_comment_content -->
</div>
<!-- /user_comment_details -->
</div>
<!-- /user_comment_container -->








<div class="user_comment_container clearfix">
<div class="user_comment_avatar"><img src="<?php echo Yii::app()->request->baseUrl; ?>/avatars/avatar2.png"></div>
<div class="user_comment_details">
<div class="user_comment_username">Can Deniz Güngörmüş</div>
<div class="user_comment_user_rating">
<div id="readOnly-demo" title="poor">
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="1" title="kötü" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="2" title="zayıf" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-on.png" alt="3" title="orta" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off.png" alt="4" title="iyi" />&nbsp;
<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-raty/img/star-off.png" alt="5" title="mükemmel" />
<input type="hidden" name="score" value="2" readonly="readonly">
</div>
</div>
<!-- /user_comment_user_rating -->
<div class="user_comment_date">07/10/2013</div>
<div class="clearfix"></div>
<div class="user_comment_content">
Nulla pretium bibendum sollicitudin. Fusce ligula sapien, blandit et nulla et, dictum facilisis mauris. Morbi nec libero et urna tristique molestie.Aenean at felis ante. Etiam eget eros in orci vestibulum porta.
</div>
<!-- /user_comment_content -->
</div>
<!-- /user_comment_details -->
</div>
<!-- /user_comment_container -->









</div>
<!-- /book_info_comments_container -->
</div>
<!-- /reader_book_info_container -->
	
		</div>
	</div>
</div>


</div>
<!-- /book_info_page_container -->


<!-- KİTAP SATIN ALMA MODAL -->
<div class="modal fade" id="buybook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="width:800px; height:500px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Kitap Satın Al</h4>
      </div>
      <div class="modal-body">
        <div style="width:760px; float:left;">
        <!-- Kitap Bilgileri -->
              
            <div id="bookname" style="float:left;"></div>
            <div id="bookprice" style="float:right;"></div><br><br>
      
      <!-- /Kitap Bilgileri -->
        </div>
        <div id="odeme_bilgileri">
          <div style="width:420px; float:left;">
                
              <!-- Kart Bilgileri -->
              
             
                    <input type="text" class="form-control" id="name" placeholder="Kart Üzerindeki Ad Soyad"><br>
                    <input type="text" class="form-control" id="cardnumber" placeholder="Kart Numarası"><br>
                <div id="cardmonth">
                    <select class="form-control" id="card_month" style="float:left; width:100px;">
                        <option value="0">Ay</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div id="cardyear">
                    <select class="form-control" id="card_year" style="float:left; width:100px; margin-left:10px;">
                        <option value="0">Yıl</option>
                        <option value="14">2014</option>
                        <option value="15">2015</option>
                        <option value="16">2016</option>
                        <option value="17">2017</option>
                        <option value="18">2018</option>
                        <option value="19">2019</option>
                        <option value="20">2020</option>
                        <option value="21">2021</option>
                        <option value="22">2022</option>
                        <option value="23">2023</option>
                        <option value="24">2024</option>
                        <option value="25">2025</option>
                        <option value="26">2026</option>
                        <option value="27">2027</option>
                        <option value="28">2028</option>
                        <option value="29">2029</option>
                        <option value="30">2030</option>
                    </select>
                </div>
                    <input type="text" class="form-control" id="cvc" placeholder="CVC" style="float:right; width:200px;"><br>
            
              <!-- /Kart Bilgileri -->
            </div>
            <div id="card_preview" style="width:320px; height:200px; margin-left:10px; float:left; position: relative;">
                <div class="Perspective">
                    <div id="CreditCardFront">
                        <span class="CardLogo"></span>
                        <span class="CardNumber">1234 5678 9000 0000</span>
                        <strong class="UserName">AD SOYAD</strong>
                        <span class="LastDate">AA/YY</span>
                        <span class="Cardype"></span>
                        <span class="CVCTxt" style="display: none;">CVC</span>
                    </div>
                    <div id="CreditCardBack" class="past">
                        <span class="CVCTxt" style="position: absolute;margin: 55px 150px;">CVC</span>
                        <div id="CVCInfo" style="display: none;">
                            <div class="InfoBubble ArrowT">
                                <div class="Arrow"></div>Kartınızın arkasındaki son 3 rakam
                            </div>
                        </div>
                    </div>
                </div>
            </div><br><br>
            </div>
      </div>
      <div class="modal-footer" style="width:500px;">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-default" id="buy_book">Satın Al</button>
      </div>
    </div>
  </div>
</div>
<!-- /KİTAP SATIN ALMA MODAL -->
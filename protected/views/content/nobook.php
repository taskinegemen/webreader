<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<script>
		jQuery(document).ready(function() {		
			App.setPage("gallery");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->
 
 
    
<div class="market_page_container">

<?php echo functions::event('left_menu', $this); ?>

<div id="main-content">
	<div class="container">
		<div class="row">
	
<div class="reader_nobook_page_row clearfix">


<div class="nobook_smiley"></div>
<p class="nobook_text">Kütüphanenizde hiç kitabınız bulunmamaktadır.</p>
<p class="nobook_text">Mağaza’dan kitap edinin.</p>

<a href="/erkan/index.php/content/list"><button class="btn btn-primary pull-right book_info_add_to_library_button brand_color_for_buttons">Mağazaya Git</button></a>




</div>
<!-- /reader_nobook_page_row -->
	
		</div>
	</div>
</div>


</div>
<!-- /market_page_container -->




<!--
<div class="popover fade bottom in">
<div class="arrow"></div>
<h3 class="popover-title">Kütüphaneme Ekle</h3>
<h3 class="popover-title">Favorilerime Ekle</h3>
<h3 class="popover-title">Kitap Bilgileri</h3>

</div>-->
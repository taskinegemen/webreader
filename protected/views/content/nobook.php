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
</div>
		<!-- /Sidebar -->
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
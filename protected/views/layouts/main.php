<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="language" content="tr" />

		<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/css/themes/night.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/css/responsive.css" >
	<link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/css/themes/default.css" id="skin-switcher">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/font-awesome/css/font-awesome.min.css" rel="stylesheet">

	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- UNIFORM -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/uniform/css/uniform.default.min.css" />
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/css/animatecss/animate.min.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootstrap-wizard/wizard.css" />
	
	<!-- FONTS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/webfonts/open_sans/open_sans.css" />

	<!-- Expand Search box -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/ExpandingSearchBar/css/component.css" />

<!-- JS -->

<!-- JAVASCRIPTS -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!-- JQUERY -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery/jquery-2.0.3.min.js"></script>
		<!-- JQUERY UI-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
		<!-- BOOTSTRAP -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/bootstrap-dist/js/bootstrap.min.js"></script>
		<!-- BLOCK UI -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
		<!-- ISOTOPE -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/isotope/jquery.isotope.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/isotope/imagesloaded.pkgd.min.js"></script>
		<!-- COLORBOX -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/colorbox/jquery.colorbox.min.js"></script>            

		<!-- Expand Search box -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/ExpandingSearchBar/js/classie.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/ExpandingSearchBar/js/modernizr.custom.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/ExpandingSearchBar/js/uisearch.js"></script>            
            
            
		<!-- DATE RANGE PICKER -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootstrap-daterangepicker/moment.min.js"></script>
		
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
		<!-- SLIMSCROLL -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
		<!-- COOKIE -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jQuery-Cookie/jquery.cookie.min.js"></script>
		<!-- CUSTOM SCRIPT -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/script.js"></script>

		<!-- UNIFORM -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/uniform/jquery.uniform.min.js"></script>
		<!-- BACKSTRETCH -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/backstretch/jquery.backstretch.min.js"></script>

	<!-- EASY PIE CHART -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-easing/jquery.easing.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/easypiechart/jquery.easypiechart.min.js"></script>
		<!-- FLOT CHARTS -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/flot/jquery.flot.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/flot/jquery.flot.time.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/flot/jquery.flot.selection.min.js"></script>
		<!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/flot/jquery.flot.resize.min.js"></script>-->
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/flot/jquery.flot.pie.min.js"></script>
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/flot/jquery.flot.stack.min.js"></script>
		<!-- GRITTER -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/gritter/js/jquery.gritter.min.js"></script>
		<!-- TYPEHEAD -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/typeahead/typeahead.min.js"></script>
		<!-- AUTOSIZE -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/autosize/jquery.autosize.min.js"></script>
		<!-- COUNTABLE -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/countable/jquery.simplyCountable.min.js"></script>
		<!-- INPUT MASK -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
		<!-- FILE UPLOAD -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<!-- SELECT2 -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/select2/select2.min.js"></script>
		<!-- UNIFORM -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/uniform/jquery.uniform.min.js"></script>
	

			<!-- WIZARD -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
		<!-- WIZARD -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-validate/jquery.validate.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-validate/additional-methods.min.js"></script>
		<!-- BOOTBOX -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootbox/bootbox.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/bootstrap-wizard/form-wizard.js"></script>
		<!-- HUBSPOT MESSENGER -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/hubspot-messenger/js/messenger.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/hubspot-messenger/js/messenger-theme-flat.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/hubspot-messenger/js/messenger-theme-future.js"></script>

		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/xml2json.js"></script>
		<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/lazyloader.min.js"></script>-->
<!-- /JS -->


		<!-- bxSlider -->
			<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/bxSlider/jquery.bxslider.css" type="text/css" />
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.fitvids.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/bxSlider/jquery.bxslider.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app/functions.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app/slider_control.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app/reader_app.js"></script>
		
		<!-- bxSlider -->

		<!-- kerbela -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kerbela/sha256.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kerbela/aes.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kerbela/enc-base64-min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kerbela/kerbela.js"></script>
		<!-- kerbela -->
		<script>
			$( document ).ready(function() {
			  new UISearch( document.getElementById( 'sb-search' ) );
			});
			
		</script>



	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body class="editor_blue">
<?php 
if (Yii::app()->controller->action->id=="read"):?>
<!-- Header -->
	<header class="navbar clearfix navbar-fixed-top read_page_navbar navbar_blue" id="header">
		<!-- Top Navigation Bar -->
		<div class="container">
		<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<!-- <a href="<?php echo $this->createUrl('site/index');  ?>">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/logo.png" alt="Linden" class="img-responsive" >
					</a> -->
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse brand_hover_color_for_navbar_components">
						<i class="fa fa-bars" data-icon1="fa fa-bars" data-icon2="fa fa-bars" ></i>
					</div>
					<!-- /SIDEBAR COLLAPSE -->
					<div class="expanding-searchbox">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Ne aramak istiyorsunuz?" type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search brand_hover_color_for_navbar_components"></span>
							</form>
						</div>
					</div>
                    
                    
                    
				</div>

			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">  
            
            <!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle read_page_user" data-toggle="dropdown">
						<?php
							$avatarSrc=Yii::app()->request->baseUrl."/avatars/avatar.png";
						?>
						<img alt="" src="<?php echo $avatarSrc; ?>" />
					</a>
					<ul class="dropdown-menu">
                    	<li><span class="username"><?php echo Yii::app()->user->name; ?></span></li>
						<li><a href="/user/profile"><i class="fa fa-user"></i> <?php _e('Profil') ?></a></li>
						<li><a href="/site/logout"><i class="fa fa-power-off"></i> <?php _e('Çıkış') ?></a></li>
					</ul>
				</li>
                
                
                
                <li><i class="fa fa-info-circle dropdown-toggle" data-toggle="dropdown"></i>
                	<ul class="dropdown-menu pull-right reader_info_dropdown">
				  		<li>Bilgi</li>
                        <li><a href="http://www.linden-tech.com" target="_blank"><span class="okutus_info_linden"></span></a></li>
			        </ul>
                </li>
                
				

              <li><i class="fa fa-list-alt dropdown-toggle" data-toggle="dropdown"></i>
                <ul class="dropdown-menu pull-right reader_toc_dropdown">
                
                <li>İçindekiler</li>
				  <li><a href="#page43"><span  reader-action='page-anchor' reader-data="43" class="reader_toc_dropdown_page_numbers">43</span> Şimdilik deneme yapılıyor kısa olmasın diye uzatıyoz da uzatıyoz işte böyle</a></li>
				  <li><a href="#page125"><span  reader-action='page-anchor' reader-data="125" class="reader_toc_dropdown_page_numbers">125</span> Buralarda hep table of content maddeleri olacak</a></li>
				  <li><a href="#page212"><span  reader-action='page-anchor'  reader-data="212" class="reader_toc_dropdown_page_numbers">212</span> İşte öyle denemeler şakalar falan</a></li>
			    </ul>
             </li>
                
                
                <li><i class="fa fa-plus-circle" id="toggle_zoom" ></i></li>
                <li><i class="fa fa-arrows-alt" id="toggle_full_screen"></i></li>

            </ul>
			<!-- /Top Right Menu -->
            
            
            <div class="navbar_logo"></div>
            
		</div>
		<!-- /top navigation bar -->
	</header> <!-- /.header -->






















<?php elseif(Yii::app()->controller->action->id!="login"): ?>
<!-- Header -->
	<header class="navbar clearfix navbar-fixed-top navbar_blue" id="header">
		<!-- Top Navigation Bar -->
		<div class="container">
		<div class="navbar-brand">
					<!-- COMPANY LOGO -->
					<!-- <a href="<?php echo $this->createUrl('site/index');  ?>">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/logo.png" alt="Linden" class="img-responsive" >
					</a> -->
					<!-- /COMPANY LOGO -->
					<!-- TEAM STATUS FOR MOBILE -->
					<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse brand_hover_color_for_navbar_components">
						<i class="fa fa-bars" data-icon1="fa fa-bars" data-icon2="fa fa-bars" ></i>
					</div>
					<!-- /SIDEBAR COLLAPSE -->
					<div class="expanding-searchbox">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Ne aramak istiyorsunuz?" type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search brand_hover_color_for_navbar_components"></span>
							</form>
						</div>
					</div>
                    
                    
                    
				</div>

			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
				
                
                <!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle read_page_user" data-toggle="dropdown">
						<?php
							$avatarSrc=Yii::app()->request->baseUrl."/avatars/avatar.png";
						?>
						<img alt="" src="<?php echo $avatarSrc; ?>" />
					</a>
					<ul class="dropdown-menu">
                    	<li><span class="username"><?php echo Yii::app()->user->name; ?></span></li>
						<li><a href="/user/profile"><i class="fa fa-user"></i> <?php _e('Profil') ?></a></li>
						<li><a href="/site/logout"><i class="fa fa-power-off"></i> <?php _e('Çıkış') ?></a></li>
					</ul>
				</li>
				<!-- /user login dropdown -->
                
                
			</ul>
			<!-- /Top Right Menu -->
            
            
            <div class="navbar_logo"></div>
            
		</div>
		<!-- /top navigation bar -->
	</header> <!-- /.header -->
<?php elseif(Yii::app()->controller->action->id=="login"): ?>

<?php endif; ?>
	
	<?php echo $content; ?>

	

</body>
</html>

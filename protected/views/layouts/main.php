<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="language" content="tr" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<style>
	#splashscreen {
    height: 100%;
    width: 100%;
    z-index: 99;
	}

@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a,
#cssmenu #menu-button {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#cssmenu #menu-button {
  display: none;
}
#cssmenu {
  width: auto;
  font-family: 'Open Sans', Helvetica, sans-serif;
  /*background: #39b1cc;
  background: -moz-linear-gradient(top, #51bbd2 0%, #2d97af 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #51bbd2), color-stop(100%, #2d97af));
  background: -webkit-linear-gradient(top, #51bbd2 0%, #2d97af 100%);
  background: -o-linear-gradient(top, #51bbd2 0%, #2d97af 100%);
  background: -ms-linear-gradient(top, #51bbd2 0%, #2d97af 100%);
  background: linear-gradient(to bottom, #51bbd2 0%, #2d97af 100%);*/
}
#cssmenu > ul {
  background: url('images/bg.png');
 /* box-shadow: inset 0 -3px 0 rgba(0, 0, 0, 0.05);*/
}
#cssmenu.align-right > ul > li {
  float: right;
}
#cssmenu > ul > li {
  float: left;
  display: inline-block;
}
#cssmenu.align-center > ul {
  float: none;
  text-align: center;
}
#cssmenu.align-center > ul > li {
  float: none;
}
#cssmenu.align-center ul ul {
  text-align: left;
}
#cssmenu > ul > li > a {
  padding: 18px 25px 21px 25px;
  border-right: 1px solid rgba(80, 80, 80, 0.12);
  text-decoration: none;
  /*font-size: 13px;*/
  /*font-weight: 700;*/
  /*color: #d3eced;*/
  /*text-transform: uppercase;*/
  /*letter-spacing: 1px;*/
}
#cssmenu > ul > li:hover > a,
#cssmenu > ul > li > a:hover,
#cssmenu > ul > li.active > a {
  color: #ffffff;
  /*background: #32a9c3;*/
  /*background: rgba(0, 0, 0, 0.1);*/
}
#cssmenu > ul > li.has-sub > a {
	background-color:transparent;
  /*padding-right: 45px;*/
  color:#737373
}
#cssmenu > ul > li.has-sub > a::after {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-top-color: #d3eced;
  right: 17px;
  top: 22px;
}
#cssmenu > ul > li.has-sub.active > a::after,
#cssmenu > ul > li.has-sub:hover > a {
  border-top-color: #ffffff;
}
#cssmenu ul ul {
  position: absolute;
  left: -9999px;
  top: 60px;
  padding-top: 6px;
  font-size: 13px;
  opacity: 0;
  -webkit-transition: top 0.2s ease, opacity 0.2s ease-in;
  -moz-transition: top 0.2s ease, opacity 0.2s ease-in;
  -ms-transition: top 0.2s ease, opacity 0.2s ease-in;
  -o-transition: top 0.2s ease, opacity 0.2s ease-in;
  transition: top 0.2s ease, opacity 0.2s ease-in;
}
#cssmenu.align-right ul ul {
  text-align: right;
}
#cssmenu > ul > li > ul::after {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  border: 5px solid transparent;
  border-bottom-color: #ffffff;
  top: -4px;
  left: 20px;
}
#cssmenu.align-right > ul > li > ul::after {
  left: auto;
  right: 20px;
}
#cssmenu ul ul ul::after {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  border: 5px solid transparent;
  /*border-right-color: #ffffff;*/
  top: 11px;
  left: -4px;
}
#cssmenu.align-right ul ul ul::after {
  border-right-color: transparent;
  border-left-color: #ffffff;
  left: auto;
  right: -4px;
}
#cssmenu > ul > li > ul {
  top: 120px;
}
#cssmenu > ul > li:hover > ul {
  top: 52px;
  left: 0;
  opacity: 1;
}
#cssmenu.align-right > ul > li:hover > ul {
  left: auto;
  right: 0;
}
#cssmenu ul ul ul {
  padding-top: 0;
  padding-left: 6px;
}
#cssmenu.align-right ul ul ul {
  padding-right: 6px;
}
#cssmenu ul ul > li:hover > ul {
  left: 180px;
  top: 0;
  opacity: 1;
}
#cssmenu.align-right ul ul > li:hover > ul {
  left: auto;
  right: 100%;
  opacity: 1;
}
#cssmenu ul ul li a {
  text-decoration: none;
  font-weight: 400;
  padding: 11px 25px;
  width: 180px;
  color: #777777;
  background: #ffffff;
  box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1), 1px 1px 1px rgba(0, 0, 0, 0.1), -1px 1px 1px rgba(0, 0, 0, 0.1);
}
#cssmenu ul ul li:hover > a,
#cssmenu ul ul li.active > a {
  color: #333333;
}
#cssmenu ul ul li:first-child > a {
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
#cssmenu ul ul li:last-child > a {
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
}
#cssmenu > ul > li > ul::after {
  position: absolute;
  display: block;
}
#cssmenu ul ul li.has-sub > a::after {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  border: 4px solid transparent;
  border-left-color: #777777;
  right: 17px;
  top: 14px;
}
#cssmenu.align-right ul ul li.has-sub > a::after {
  border-left-color: transparent;
  border-right-color: #777777;
  right: auto;
  left: 17px;
}
#cssmenu ul ul li.has-sub.active > a::after,
#cssmenu ul ul li.has-sub:hover > a::after {
  border-left-color: #333333;
}
#cssmenu.align-right ul ul li.has-sub.active > a::after,
#cssmenu.align-right ul ul li.has-sub:hover > a::after {
  border-right-color: #333333;
  border-left-color: transparent;
}
@media all and (max-width: 800px), only screen and (-webkit-min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min--moz-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (-o-min-device-pixel-ratio: 2/1) and (max-width: 1024px), only screen and (min-device-pixel-ratio: 2) and (max-width: 1024px), only screen and (min-resolution: 192dpi) and (max-width: 1024px), only screen and (min-resolution: 2dppx) and (max-width: 1024px) {
  #cssmenu {
    background: #39b1cc;
  }
  #cssmenu > ul {
    display: none;
  }
  #cssmenu > ul.open {
    display: block;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
  }
  #cssmenu.align-right > ul {
    float: none;
  }
  #cssmenu.align-center > ul {
    text-align: left;
  }
  #cssmenu > ul > li,
  #cssmenu.align-right > ul > li {
    float: none;
    display: block;
  }
  #cssmenu > ul > li > a {
    padding: 18px 25px 18px 25px;
    border-right: 0;
  }
  #cssmenu > ul > li:hover > a,
  #cssmenu > ul > li.active > a {
    background: rgba(0, 0, 0, 0.1);
  }
  #cssmenu #menu-button {
    display: block;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    color: #d3eced;
    padding: 18px 25px 18px 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
    background: url('images/bg.png');
    cursor: pointer;
  }
  #cssmenu ul ul,
  #cssmenu ul li:hover > ul,
  #cssmenu > ul > li > ul,
  #cssmenu ul ul ul,
  #cssmenu ul ul li:hover > ul,
  #cssmenu.align-right ul ul,
  #cssmenu.align-right ul li:hover > ul,
  #cssmenu.align-right > ul > li > ul,
  #cssmenu.align-right ul ul ul,
  #cssmenu.align-right ul ul li:hover > ul {
    left: 0;
    right: auto;
    top: auto;
    opacity: 1;
    width: 100%;
    padding: 0;
    position: relative;
    text-align: left;
  }
  #cssmenu ul ul li {
    width: 100%;
  }
  #cssmenu ul ul li a {
    width: 100%;
    box-shadow: none;
    padding-left: 35px;
  }
  #cssmenu ul ul ul li a {
    padding-left: 45px;
  }
  #cssmenu ul ul li:first-child > a,
  #cssmenu ul ul li:last-child > a {
    border-radius: 0;
  }
  #cssmenu #menu-button::after {
    display: block;
    content: '';
    position: absolute;
    height: 3px;
    width: 22px;
    border-top: 2px solid #d3eced;
    border-bottom: 2px solid #d3eced;
    right: 25px;
    top: 18px;
  }
  #cssmenu #menu-button::before {
    display: block;
    content: '';
    position: absolute;
    height: 3px;
    width: 22px;
    border-top: 2px solid #d3eced;
    right: 25px;
    top: 28px;
  }
  #cssmenu > ul > li.has-sub > a::after,
  #cssmenu ul ul li.has-sub > a::after {
    display: none;
  }
}


	</style>
	<?php
        $organisationId=Yii::app()->getBaseUrl(true);
        $myArray=array();
        preg_match ("/.([A-Za-z\-0-9]+)\.(com|net|edu|mil|gov)/", $organisationId,$myArray); 
        $organisationId=$myArray[1];

        $server_organisationId=Yii::app()->params['organisation_id'];
        if($organisationId=='okutus'){
            $organisationId=$server_organisationId;
        }
	
    ?>
<script>
console.log('<?php echo $organisationId;?>');
</script>
		<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/css/cloud-admin.css" >
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no" />
    
	<?php 
		$css_file= 'css/branding/'.$organisationId.'/style.css';
		if (file_exists($css_file)) {?>
	    	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/<?php echo $css_file;?>" >
	<?php } else { ?>
	    	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/branding/linden/style.css" >
	<?php } ?>
<!--<link rel="stylesheet" type="text/css"  href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/css/themes/night.css" >-->
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

	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css"/>

<!-- JS -->

<!-- JAVASCRIPTS -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!-- JQUERY -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery/jquery-2.0.3.min.js"></script>
		<!-- JQUERY UI-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
		<!-- BOOTSTRAP -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/bootstrap-dist/js/bootstrap.min.js"></script>
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

		<!-- BLOCK UI -->
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ui/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
		

		<?php echo functions::event('header', ""); ?>
		
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.lazy.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.cookie.js"></script>

		<!-- kerbela -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kerbela/sha256.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kerbela/aes.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kerbela/enc-base64-min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/kerbela/kerbela.js"></script>
		<script type="text/javascript" src="http://demos.myjqueryplugins.com/jmenu/jquery/jMenu.jquery.js"></script>
		<!-- kerbela -->
		<script>
			/*
			$( document ).ready(function() {
			  //new UISearch( document.getElementById( 'sb-search' ) );
				//$('img.lazyimgs').lazy();
			});*/

			
		</script>



	
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
					<!-- <div class="expanding-searchbox">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Ne aramak istiyorsunuz?" type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search brand_hover_color_for_navbar_components"></span>
							</form>
						</div>
					</div> -->
                    
                    
                    
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
						<!-- <li><a href="#" class="profilLink"><i class="fa fa-user"></i> <?php _e('Profil') ?></a></li> -->
						<!--<li><a href="<?php echo Yii::app()->getBaseUrl(true).'/site/library';?>" class="libraryLink"><i class="fa fa-mail-reply"></i> <?php _e('Kütüphaneme Dön') ?></a></li>-->
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout"><i class="fa fa-power-off"></i> <?php _e('Çıkış') ?></a></li>
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
				  <li><a href="#page43"><span  reader-action='page-anchor' reader-data="43" class="reader_toc_dropdown_page_numbers">43</span> İçindekiler kısmı 1</a></li>
				  <li><a href="#page125"><span  reader-action='page-anchor' reader-data="125" class="reader_toc_dropdown_page_numbers">125</span> İçindekiler kısmı 2</a></li>
				  <li><a href="#page212"><span  reader-action='page-anchor'  reader-data="212" class="reader_toc_dropdown_page_numbers">212</span> İçindekiler kısmı 3</a></li>
			    </ul>
             </li>
                
                
                <li><i class="fa fa-plus-circle" id="toggle_zoom" ></i></li>
                <li><i class="fa fa-arrows-alt" id="toggle_full_screen"></i></li>
      			
                <li><i reader-action='next-page'  class="fa fa-chevron-right" id="toggle_prev"></i></li>
                <li class="navbar_page_numbers"><input type='text' min="1" max="5" style='background: transparent;color: #fff;width:30px;text-align:right;border: transparent;' id="current_page_num_spinner" size=4 >/<span content-meta='book-page-count' >0</span></li>
               
                <li><i reader-action='prev-page'  class="fa fa-chevron-left" id="toggle_next"></i></li>
                
                
                <script type="text/javascript">
            	$(document).ready(function() {
					$("#current_page_num_spinner")
					.keydown(function(event) {
						
						var current= $(this).val();
						var max = $("[content-meta='book-page-count']").text();
						
						if( current < 1 ){
							$(this).val(1);
							event.preventDefault();	
						}

						if( parseInt(current) > parseInt(max) ){

							$(this).val(max);
							event.preventDefault();	
						}

						// Allow only backspace and delete

						if ( event.keyCode == 46 || event.keyCode == 8 ) {
							
							// let it happen, don't do anything
						}
						else if(event.keyCode == 13 ){
							window.SlideController.controller('page-anchor',$(this).val()-1);
						}
						else {
							// Ensure that it is a number and stop the keypress
							if (event.keyCode < 48 || event.keyCode > 57 ) {
								event.preventDefault();	
							}	
						}
					}).keypress(function(e){
						var current= $(this).val();
						var max = $("[content-meta='book-page-count']").text();
						
						if( current<1 ){
							$(this).val(1);
							event.preventDefault();	
						}
						
						if( parseInt(current) > parseInt(max) ){
							$(this).val(max);
							event.preventDefault();	
						}

					}).focus(function() {
					   $(this).select();
					   $(this).attr('max', $("[content-meta='book-page-count']").text());
					}).on('input',function(){
						var current= $(this).val();
						var max = $("[content-meta='book-page-count']").text();
						
						if( current < 1 ){
							$(this).val(1);
							window.SlideController.controller('page-anchor',$(this).val()-1);
						}

						if( parseInt(current) > parseInt(max) ){

							$(this).val(max);
							window.SlideController.controller('page-anchor',$(this).val()-1);
						}



					}).change(function() {
						var current= $(this).val();
						var max = $("[content-meta='book-page-count']").text();
						console.log(max);
						if( current<1 ){
							$(this).val(1);
						}
						if( current > max ){
							$(this).val(max);
						}

					    window.SlideController.controller('page-anchor',$(this).val()-1);
					});
				});
            	</script>
                
                

            </ul>
			<!-- /Top Right Menu -->
            
            
            <div class="navbar_logo"></div>
            
		</div>
		<!-- /top navigation bar -->
	</header> <!-- /.header -->


<?php elseif(Yii::app()->controller->action->id!="login" && Yii::app()->controller->action->id!="forgetPassword" ): ?>
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
					<!-- <div class="expanding-searchbox">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Ne aramak istiyorsunuz?" type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search brand_hover_color_for_navbar_components"></span>
							</form>
						</div>
					</div> -->
                    
                    
                    
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
						<!-- <li><a href="#" class="profilLink"><i class="fa fa-user"></i> <?php _e('Profil') ?></a></li>-->
						<li><a href="#" class="libraryLink"><i class="fa fa-mail-reply"></i> <?php _e('Kütüphaneme Dön') ?></a></li> 
						<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout"><i class="fa fa-power-off"></i> <?php _e('Çıkış') ?></a></li>
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

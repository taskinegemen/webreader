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

<div id="sidebar" class="sidebar">
	<div class="sidebar-menu nav-collapse">
		<!--=== Navigation ===-->
		<ul>
			<li class="current">
				<a href="/site/dashboard">
					<i class="fa fa-tachometer fa-fw"></i>
					<span class="menu-text">Kontrol	Paneli</span>
					</a>
			</li>
			
			<!--<li>
				<a href="users.html">
					<i class="icon-tasks"></i>
					Hosting
				</a>
			</li>
			-->
			<li>
				<a href="#">
					<i class="fa fa-medkit fa-fw"></i> <span class="menu-text">
					Destek
				</span>
				</a>
			</li>
			
			<li>
				<a href="#">
					<i class="fa fa-money fa-fw"></i> <span class="menu-text">
					Hesabım
				</span>
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
	


	
</div>
</div>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

    <script>
		var ContentFileRequesUrl="<?php echo $this->createUrl("content/file",array('id'=>$id) ); ?>"+"/";
		var metaUrl= "<?php echo $this->createUrl("content/Getbookmeta",array('id'=>$id) ); ?>"	
	</script>

	
<!-- HEADER -->
	<header class="navbar clearfix navbar-fixed-top" id="header">
		<div class="container">
        
        
        
				<!-- TEAM STATUS FOR MOBILE -->
					<div class="visible-xs">
						<a href="#" class="team-status-toggle switcher btn dropdown-toggle">
							<i class="fa fa-users"></i>
						</a>
					</div>
					<!-- /TEAM STATUS FOR MOBILE -->
					<!-- SIDEBAR COLLAPSE -->
					<div id="sidebar-collapse" class="sidebar-collapse btn">
						<i class="fa fa-bars" data-icon1="fa fa-bars" data-icon2="fa fa-bars" ></i> 
					</div>
					<!-- /SIDEBAR COLLAPSE -->
				
                <!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user" id="header-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/avatars/avatar.png" />
							<span class="username">Erkan Öğümsöğütlü</span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
							<li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
							<li><a href="#"><i class="fa fa-eye"></i> Privacy Settings</a></li>
							<li><a href="login.html"><i class="fa fa-power-off"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
                    
                    
                    
                <!-- COMPANY LOGO -->
					<div class="linden_logo"></div>
					<!-- /COMPANY LOGO -->
                    
                    
                    
                    
                
                
		</div>
		
	</header>
	<!--/HEADER -->
	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar sidebar-fixed">
					<div class="sidebar-menu nav-collapse">
						
						
                        
                        
                        
                        <div class="book_info_container">
				<div class="reader_book_cover_thumbnail">COVER</div>
                <ul class="reader_book_info">
                
                <li class="reader_book_info_detail" >Kitabın Adı: <span  content-meta='book-title'  class="reader_book_info_detail_data">Örnek Kitap</span></li>
                
                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail" >Tür/Konu: <span  content-meta='book-categories' class="reader_book_info_detail_data">Örnek Tür</span></li>
                
                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail">Editörler: <span content-meta='book-author' class="reader_book_info_detail_data">Örnek Kişi</span></li>

                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail">Sayfa Sayısı: <span content-meta='book-page-count'  class="reader_book_info_detail_data">200</span></li>

                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail">Yayınlanma Tarihi: <span content-meta='book-publish-date'  class="reader_book_info_detail_data">01.05.2014</span></li>

                <div class="vertical-divider"></div>
                <div class="clearfix"></div>


                </ul>
                

                </div>
                <!-- END book_info_container -->
                        
                        
                        
                        
						
						
					</div>
				</div>
				<!-- /SIDEBAR -->
		<div id="main-content" class="no_margin">
			<div class="container">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
							<!--	<div class="page-header reader_info_header">
									
									<div class="reader_book_name">Kitabın Adı: <span content-meta='book-title' class="reder_book_name_data">Örnek Kitap</span></div>
                                    
                                    
                                    
                                    
                                    
                                    
                                     <div class="btn-group">
                                     
                                     
                                     			<button class="btn btn-default reader_toc_button dropdown-toggle" data-toggle="dropdown">
													İçindekiler &nbsp;<i class="fa fa-angle-down"></i>
												</button>
                                                
                                                <ul class="dropdown-menu pull-right reader_toc_dropdown">
													<li><a href="#page2"><span  reader-action='page-anchor' reader-data="2" class="reader_toc_dropdown_page_numbers">2</span> Buralara birşeyler yazılacak</a></li>
													<li><a href="#page43"><span  reader-action='page-anchor' reader-data="43" class="reader_toc_dropdown_page_numbers">43</span> Şimdilik deneme yapılıyor kısa olmasın diye uzatıyoz da uzatıyoz işte böyle</a></li>
													<li><a href="#page125"><span  reader-action='page-anchor' reader-data="125" class="reader_toc_dropdown_page_numbers">125</span> Buralarda hep table of content maddeleri olacak</a></li>
													<li><a href="#page212"><span  reader-action='page-anchor'  reader-data="212" class="reader_toc_dropdown_page_numbers">212</span> İşte öyle denemeler şakalar falan</a></li>
												</ul>
                                              
                                                
												<button class="btn btn-default">
													<i class="fa fa-chevron-left" reader-action='prev-page'></i>
												</button>
												<button class="btn btn-default">
													<i class="fa fa-chevron-right" reader-action='next-page'></i>
												</button>
								     </div>
                                    
                                    
                                    
                                    
                               <div id="ms2"></div>
                                    
                                    
                                    
                                    
                                   </div> -->
                                
                          <div class="reader_page_container">


							<ul class="bxslider">

							</ul>

                </div>
				<!-- /reader_page_container -->      
                                
                                
                                
                                
                                
                                
                                
							</div>
						</div>
						<!-- /PAGE HEADER -->
					</div>
				</div>
			</div>
		</div>
	</section>
   

    <script>
		jQuery(document).ready(function() {		
			App.setPage("widgets_box");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>


	<!-- /JAVASCRIPTS -->
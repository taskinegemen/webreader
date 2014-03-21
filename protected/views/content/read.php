<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

    <script>
		var ContentFileRequesUrl="<?php echo $this->createUrl('content/file',array('id'=>$id) ); ?>"+"/";
		var metaUrl= "<?php echo $this->createUrl('content/Getbookmeta',array('id'=>$id) ); ?>"	
		function get_file_request_url(){
			return "<?php echo $this->createUrl('content/file',array('id'=>$id) ); ?>"+"/";;

		}
	</script>

	<script type="text/javascript" src='<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.fullscreen-min.js'></script>
	<script type="text/javascript" src='<?php echo Yii::app()->request->baseUrl; ?>/js/libs/iscroll-lite.js'></script>
	<style type="text/css">

	</style>


	<script type="text/javascript">



	</script>

	
	<!-- PAGE -->
	<section id="page">
				<!-- SIDEBAR -->
				<div id="sidebar" class="sidebar sidebar-fixed" style="margin-top:51px;">
					<div class="sidebar-menu nav-collapse">
						
						
                        
                        
                        
                <div class="book_info_container">
				<div class="reader_book_cover_thumbnail">COVER</div>
                <ul class="reader_book_info">
                
                
                <li class="reader_book_info_detail" > Sayfa:<input type='number' min="1" max="5" style='width:50px;text-align:right;color:#cdd0d8;border: transparent;font-weight:bold;' id="current_page_num_spinner" size=4 >/<span content-meta='book-page-count'  class="reader_book_info_detail_data">0</span>  </li>
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
                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail" >Kitabın Adı: <span  content-meta='book-title'  class="reader_book_info_detail_data">Örnek Kitap</span></li>
                
                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail" >Tür/Konu: <span  content-meta='book-categories' class="reader_book_info_detail_data">Örnek Tür</span></li>
                
                <div class="vertical-divider"></div>
                <div class="clearfix"></div>
                
                <li class="reader_book_info_detail">Editörler: <span content-meta='book-author' class="reader_book_info_detail_data">Örnek Kişi</span></li>

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
		<div class="read_page_thumbnails">İÇERİK</div>
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
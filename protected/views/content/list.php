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
												<div class="divide-10"></div><!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name tip" data-original-title="The Book Name is here">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name tip" data-original-title="The Name of The Writer">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
											</div>
											<div class="tab-pane" id="tab_1_2">
												<div class="divide-10"></div>
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name tip" data-original-title="The Book Name is here">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name tip" data-original-title="The Name of The Writer">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
											</div>
											<div class="tab-pane fade" id="tab_1_3">
												<div class="divide-10"></div><!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name tip" data-original-title="The Book Name is here">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name tip" data-original-title="The Name of The Writer">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															Ücretsiz
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name tip" data-original-title="The Book Name is here">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name tip" data-original-title="The Name of The Writer">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
												<!-- READER BOOK CARD -->
												<div class="reader_book_card">
													<div class="reader_book_card_book_cover"></div>
													<div class="reader_book_card_info_container">
														<div class="reader_market_book_name">
															The Book Name is here
														</div>
														<div class="clearfix"></div>
														<div class="reader_book_card_writer_name">
															The Name of The Writer
														</div>
														<div class="reader_book_price">
															5.00TL
														</div>
													</div><!-- /reader_book_card_info_container -->
												</div><!-- END OF READER BOOK CARD -->
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
		<!--

<div class="popover fade bottom in">
<div class="arrow"></div>
<h3 class="popover-title">Kütüphaneme Ekle</h3>
<h3 class="popover-title">Favorilerime Ekle</h3>
<h3 class="popover-title">Kitap Bilgileri</h3>

</div>-->

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
	
<div class="reader_mybook_page_row clearfix">

<!--
<div class="nobook_smiley"></div>
<p class="nobook_text">Kütüphanenizde hiç kitabınız bulunmamaktadır.</p>
<p class="nobook_text">Mağaza’dan kitap edinin.</p>

<a href="/erkan/index.php/content/list"><button class="btn btn-primary pull-right book_info_add_to_library_button brand_color_for_buttons">Mağazaya Git</button></a>
-->





<div class="myprofile_information_container">

<div class="myprofile_picture_container">
<div class="change_profile_picture"><a href="#"><i class="fa fa-edit"></i></a></div>
<img src="/erkan/avatars/avatar.png">
</div>



<div class="myprofile_information_part">

<div class="myprofile_information_components">
<p>HESABIN</p>
<button class="btn btn-success">Değişiklikleri Kaydet</button>
</div>

<div class="myprofile_information_components">
<p>İsim</p>
<div class="myprofile_info_edit"><i class="fa fa-edit"></i> <div contenteditable="true">Erkan Öğümsöğütlü</div></div>
</div>

<div class="myprofile_information_components">
<p>Kullanıcı Adı</p>
<div class="myprofile_info_edit"><i class="fa fa-edit"></i> <div contenteditable="true">erkanogumsogutlu</div></div>
</div>

<div class="myprofile_information_components">
<p>E-Mail Adres</p>
<div class="myprofile_info_edit"><i class="fa fa-edit"></i> <div contenteditable="true">erkan@linden-tech.com</div></div>
</div>


<div class="myprofile_information_components">

<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Şifreni Değiştir</a> </h3>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
          <div class="panel-body"> 
				<div><p>Eski Şifre:</p> <input name="LoginForm[password]" id="LoginForm_password" type="password"></div><br />
                <div><p>Yeni Şifre:</p> <input name="LoginForm[password]" id="LoginForm_password" type="password"></div><br />
                <div> <p>Yine Şifre Tekrarı:</p> <input name="LoginForm[password]" id="LoginForm_password" type="password"></div>
          </div>
        </div>
    </div>
</div>

</div>
</div>
<!-- end of myprofile_information_part -->

<div class="clearfix"></div>

<div class="myprofile_books">

		<p>Favori Kitaplarım</p>
		

        <!-- READER BOOK CARD -->
        <div class="reader_book_card">
        <div class="reader_book_card_book_cover solid_brand_color"></div>
        <div class="reader_book_card_info_container">
        <div class="reader_market_book_name tip" data-original-title="The Book Name is here">The Book Name is here</div>
        <button class="reader_book_card_options_button pop-bottom" data-title="Bottom" data-content="<li>Kütüphaneme Ekle</li><li>Favorilerime Ekle</li><li>Kitap Bilgileri/li>"></button>
        <div class="clearfix"></div>
        <div class="reader_book_card_writer_name tip" data-original-title="The Name of The Writer">The Name of The Writer</div>
        <div class="reader_book_price brand_text_color">5.00TL</div>
        </div>
        <!-- /reader_book_card_info_container -->
        </div>
        <!-- END OF READER BOOK CARD -->
        
        
        
        
        
        
        <!-- READER BOOK CARD -->
        <div class="reader_book_card">
        <div class="reader_book_card_book_cover solid_brand_color"></div>
        <div class="reader_book_card_info_container">
        <div class="reader_market_book_name tip" data-original-title="The Book Name is here">The Book Name is here</div>
        <button class="reader_book_card_options_button pop-bottom" data-title="Bottom" data-content="<li>Kütüphaneme Ekle</li><li>Favorilerime Ekle</li><li>Kitap Bilgileri/li>"></button>
        <div class="clearfix"></div>
        <div class="reader_book_card_writer_name tip" data-original-title="The Name of The Writer">The Name of The Writer</div>
        <div class="reader_book_price brand_text_color">5.00TL</div>
        </div>
        <!-- /reader_book_card_info_container -->
        </div>
        <!-- END OF READER BOOK CARD -->
        
        
        
        
        
        <!-- READER BOOK CARD -->
        <div class="reader_book_card">
        <div class="reader_book_card_book_cover solid_brand_color"></div>
        <div class="reader_book_card_info_container">
        <div class="reader_market_book_name tip" data-original-title="The Book Name is here">The Book Name is here</div>
        <button class="reader_book_card_options_button pop-bottom" data-title="Bottom" data-content="<li>Kütüphaneme Ekle</li><li>Favorilerime Ekle</li><li>Kitap Bilgileri/li>"></button>
        <div class="clearfix"></div>
        <div class="reader_book_card_writer_name tip" data-original-title="The Name of The Writer">The Name of The Writer</div>
        <div class="reader_book_price brand_text_color">5.00TL</div>
        </div>
        <!-- /reader_book_card_info_container -->
        </div>
        <!-- END OF READER BOOK CARD -->
        
        
        
        
        
        
        <!-- READER BOOK CARD -->
        <div class="reader_book_card">
        <div class="reader_book_card_book_cover solid_brand_color"></div>
        <div class="reader_book_card_info_container">
        <div class="reader_market_book_name tip" data-original-title="The Book Name is here">The Book Name is here</div>
        <button class="reader_book_card_options_button pop-bottom" data-title="Bottom" data-content="<li>Kütüphaneme Ekle</li><li>Favorilerime Ekle</li><li>Kitap Bilgileri/li>"></button>
        <div class="clearfix"></div>
        <div class="reader_book_card_writer_name tip" data-original-title="The Name of The Writer">The Name of The Writer</div>
        <div class="reader_book_price brand_text_color">5.00TL</div>
        </div>
        <!-- /reader_book_card_info_container -->
        </div>
        <!-- END OF READER BOOK CARD -->


</div>
<!-- end of myprofile_books -->
</div>
<!-- end of myprofile_information_container -->



</div>
<!-- /reader_mybook_page_row -->
	
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
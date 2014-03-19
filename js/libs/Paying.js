var bank='', Cnum='', CardUName, discounts = [];
var ykb_installment = 0;
var ykb_Ins3_Box = $('#ykbIns3Box');
var ykb_Ins6_Box = $('#ykbIns6Box');
var ykb_Ins3_ChckBox_ykbParam = $('#ykb_Ins3_Chck');
var ykb_Ins3_ChckBox_ykbParam1 = $('#ykb_Ins3_Chck2');
var ykb_bluebox6_ykbParam = $('#ykb_Ins6_Chck');
var ykb_bluebox6_ykbParam1 = $('#ykb_Ins6_Chck2');
var ykb_checkboxes3 = $('.ykbChck3');
var ykb_checkboxes6 = $('.ykbChck6');
var koiCode	= $('#koiCode');
$(function(){
	var koiCode	= $('#koiCode');
	$('.FormInput,.FormSelect').focus(function(){
		var form='normal';
		if($(this).attr('name')=='CVC') { form='parent'; }
		else if($(this).attr('name')=='month' || $(this).attr('name')=='year') { form='parent2'; }
		if($(this).attr('name')!='month' && $(this).attr('name')!='year') { $(this).addClass('FormInputFcs'); }
		/*delErr($(this),form)*/
		if($(this).attr('name')=='cardname' && $('[name="cardname"]').val()==''){
			$('.UserName').addClass('focused');
			$('.UserName').html('AD SOYAD');
		}
		else if($(this).attr('name')=='cardnum' && $('[name="cardnum"]').val()==''){
			$('.CardNumber').addClass('focused');
			$('.CardNumber').html('1234 5678 9000 0000');
		}
		else if($(this).attr('name')=='month' && $('[name="month"]').val()==0 || $(this).attr('name')=='year' && $('[name="year"]').val()==0){
			$('.LastDate').addClass('focused');
		}
		else if($(this).attr('name')=='CVC' && $('[name="CVC"]').val()==''){
			$('.CVCTxt').html('CVC');
			$('.CVCTxt').addClass('focused');
		}
		
	});
	$('[name="cardname"]').focus();
	
	$('.FormInput,.FormSelect').blur(function(){
		var SVal = $(this).val();
		if($(this).attr('name')=='cardname'){
			$('.UserName').removeClass('focused');
			if(SVal=='') { $('.UserName').html('AD SOYAD'); }
			else { $('.UserName').html(SVal); }
		}
		else if($(this).attr('name')=='cardnum'){
			$('.CardNumber').removeClass('focused');
			if(SVal=='') { $('.CardNumber').html('1234 5678 9000 0000'); }
		}		
		else if($(this).attr('name')=='month' || $(this).attr('name')=='year'){
			$('.LastDate').removeClass('focused');
		}
		else if($(this).attr('name')=='CVC'){
			$('.CVCTxt').removeClass('focused');
			if(SVal=='') { $('.CVCTxt').html('CVC'); }
		}
		$(this).removeClass('FormInputFcs');
	});

	/*Card Selects*/
	if($(".DateSelect").length>0 && getInternetExplorerVersion()==7) { $("#P-CCMonthSelect,#P-CCYearSelect").spicyselect(); }
	/*Card Selects*/

	/*Payment Key Options*/
	$('[name="cardname"]').keyup(function(){
		var Uname = $(this).val();
		$('.UserName').html(Uname);
		$('.UserName').removeClass('focused');
	});	
	$('[name="cardname"]').focus(function(){ $('.CardInfoSort').animate({top: '30px'}); });
	
	/*Card Number*/
	$('[name="cardnum"],[name="CVC"]').bind('copy paste', function (e) { e.preventDefault(); });	
	$('[name="cardnum"]').focus(function(){ 
		$(this).removeClass('numpad_clear');
		$(this).removeClass('numpad_submit');
		$('.CardInfoSort').animate({top: '103px'}); 
		var NumVal = $('[name="cardnum"]').val().replace(/^\s+|\s+$/g, "");
		var ValLen = Number(NumVal.length);
		setCaretToPos(document.getElementById("P-CCNumberField"),ValLen);
	});
	$('[name="cardnum"]').blur(function(){ 
		var Cnum = $(this).val();
		Cnum = Cnum.replace(/^\s+|\s+$/g, "");
		if($(this).val().length>18) getBankInfo(Cnum.replace(' ','').substr(0,6),false); 
	});
	$('[name="cardnum"]').keyup(function(e){ var code = (e.keyCode ? e.keyCode : e.which); if($(this).val()!='') { ctrlCardNum($(this),'keyup',code); } });
	$('[name="cardnum"]').keypress(function(e){ var code = (e.keyCode ? e.keyCode : e.which); ctrlCardNum($(this),'keypress',code); $('.CardNumber').removeClass('focused'); });			
	
	
	$('[name="CVC"]').keypress(function(e){ $('.CVCTxt').removeClass('focused'); delErr($(this),'parent'); delErr($('#P-CCMonthSelect'),'parent2'); delErr($('#P-CCYearSelect'),'parent2'); });
	
	$('.NumpadIco').click(function(){ 
		$('#P-CCNumberField').focus(); 
		$('#P-CCNumberField').addClass('FormInput'); 
		setTimeout("$('#jqfnumkeypad_cardnum').show()",100);
	});
	/*Card Number*/
	
	$('[name="month"],[name="year"]').change(function(){
		var Month = $('[name="month"]').val();
		var Year =	$('[name="year"]').val();
		if(Month.length<2) Month='0'+Month;
		if(Month==0){ Month='AA'; }
		if(Year==0){ Year='YY'; }
		$('.LastDate').html(Month+'/'+Year);
		$('.CardInfoSort').animate({ top: '173px'} );
		delErr($('#P-CCMonthSelect'),'parent2');
		delErr($('#P-CCYearSelect'),'parent2');
		delErr($('[name="CVC"]'),'parent');
	});
	$('[name="month"]').trigger('change');
	
	$('[name="CVC"]').focus(function(){
		setTimeout(Show3DInfo,2000);
		$('.CardInfoSort').animate({top: '173px'});
		if($('.CreditCard').attr('class').indexOf('Amex')<0){
			$('#CreditCardBack').removeAttr('class');
			$('#CreditCardFront').addClass('future');
			$('#CreditCardFront .CVCTxt').hide();
		}
		else { $('#CreditCardFront .CVCTxt').show(); }
		setTimeout(Hide3DInfo,12000);
	});
	$('[name="CVC"]').blur(function(){
		if($('.CreditCard').attr('class').indexOf('Amex')<0){
			$('#CreditCardFront').removeAttr('class');
			$('#CreditCardBack').addClass('past');
			$('#CreditCardFront .CVCTxt').hide();
		}
		else { $('#CreditCardFront .CVCTxt').show(); }
	});
	$('[name="CVC"]').keyup(function(){ 
		var CVCL = $(this).val().length;
		var CVCTxt ='';
		if(CVCL==0){
			$('.CVCTxt').html('CVC');
			$('.CVCTxt').addClass('focused');
		}
		else {
			for(var i=0; i<CVCL; i++) CVCTxt=CVCTxt+'*';
			$('.CVCTxt').html(CVCTxt);
		}
	});
	/*Payment Key Options*/
	
	/*CVC INFO*/
	$('#CreditCardBack .CVCTxt').hover(function(){ $('#CVCInfo').show(); },function(){ $('#CVCInfo').hide(); });
	/*CVC INFO*/
	
	/*Shopping Summary*/
	var ulTop,pheight=100;
	var Llength = $('.Products').children('li').length;
	if(Llength<3) {
		$('.Separator').hide();
		if(Llength>1){ $('.ProcessFlow').css('height','205px'); }
		else { $('.ProcessFlow').css('height','auto'); }
	}
	else { 
		$('.Processes').css('min-height','246px');  
		$('.ProcessFlow').css('height','200px');
		$('.Separator').show(); 
	}
	/*Show Hide All Products*/
	$('#ShowAllP').click(function(){
		$(this).hide(); $('#HideOther').css('display','block');
		$('.ProcessFlow').animate({height:(Llength)*pheight+'px'});
	});
	$('#HideOther').click(function(){
		$(this).hide(); $('#ShowAllP').css('display','block');
		$('.ProcessFlow').animate({height:'200px'});
	});

	/*Show Hide All Products*/

	/*Paying Op*/
	$('.PaymentOptions ul li').click(function(){
		if(!$(this).hasClass('disabled')){
			delErr($(this),'payment');			
			$(this).addClass('selected').siblings().removeClass('selected').removeClass('FormInputErr');
			$(this).find('.InsCon').find('input').attr('checked','checked');
			var chckVal = getBankOp('ins');
			$('#installmentNum').attr('value',chckVal);
			var CardBank = getBankOp('bank');		
			var TotalP = $(this).find('.TotalPrice').val();
			var InsV = $(this).find('.Ins').html();
			var TotalPArr = addCommas(TotalP).toString().split(',');
			
			if($('#P-CCNumberField').val().length>18){
				if(chckVal==1) { $('#BuyProduct span').html('Peþin Ödeme Yap').css('background-position','142px -59px'); }
				else { $('#BuyProduct span').html('Taksitli Ödeme Yap').css('background-position','153px -59px'); }
			}
			
			if(chckVal==3 || chckVal==6){
				/*Ykb 3+3 taksit kutucuklari
				if($('#'+CardBank+'_Ins').length>0){
					$('#'+CardBank+'_Ins').addClass('selected');	
					$('#'+CardBank+'_Ins').children('.CampInfo').hide();
					$('#'+CardBank+'_Ins').find('.InsBox').hide();
					$('#'+CardBank+'_Ins').find('#ykbIns'+chckVal+'Box').show();
					ykb_installment=chckVal; bank=CardBank;
					//if($('#ykbIns'+chckVal+'Box').find('.ykb'+chckVal+'InsStatus').html()=='') { }
					toggleYkbBlueBox(true); 
				}*/
			}	
			else {
				$('#'+CardBank+'_Ins').removeClass('selected');	
				$('#'+CardBank+'_Ins').children('.CampInfo').show();
				$('.InsBox').hide();
			}
				
			koiCode.val('');
			if (!TotalPArr[1]) { TotalPArr.push('00'); }
			if (TotalPArr[1].length<2) { TotalPArr[1] = TotalPArr[1]+'0'; }
			writePrice($('.strike strong'),TotalPArr[0],TotalPArr[1],false);
			$('#HTotalPrice').attr('value',TotalP);
			$('.ShoppingTPrice .price').html(InsV);
			$('[name="Discount"]').trigger('change');
		}
	});
	/*Paying Op*/

	/*Payment Menu*/
	$('#PaymentMenu ul li a').click(function(){
		var chckVal = getBankOp('ins');
		$(this).parent().addClass('on').siblings().removeClass('on');
		if($(this).parent().attr('class').indexOf('PayPal')>-1){
			$('#PayPal').show(); $('#CreditCard').hide(); $('#PayPalType').val(1);
			$('.selOp li:first').trigger('click');
			$('#BuyProduct span').html('PayPal ile öde').css('background-position','114px -59px');		
		}
		else { 
			$('#PayPal').hide(); $('#CreditCard').show(); $('#PayPalType').val(0); 
			if(chckVal==1) { $('#BuyProduct span').html('Peþin Ödeme Yap').css('background-position','142px -59px'); }
			else if(chckVal==0) { $('#BuyProduct span').html('Ödeme Yap').css('background-position','95px -59px'); }
			else { $('#BuyProduct span').html('Taksitli Ödeme Yap').css('background-position','153px -59px'); }
		}	
	});

	/*Payment Menu*/
	 
	/*Discount Coupon*/
	if($('[name="Discount"]').length>0) { setInsOp($('[name="Discount"]').val()); } else { setInsOp(0); }
	setContracts($('[name="Discount"]').val());
	if($('[name="Discount"]').length>0) { 
		var DisVal = $('[name="Discount"]').val();
		calcDiscouns(DisVal);
		if(DisVal!=0) { $('.ShoppingTPrice .strike').removeClass('dpnone'); }
	}
	$('[name="Discount"]').change(function(){ 	
		var DisVal=0,DisType,PriceArr,InsArr,NewInsP,TotalPrice,InsPrice,Value, SBank=getBankOp('bank');	
		Value = $(this).val();
		calcDiscouns(Value);
		setInsOp(Value);
		var SelIdx = $('[name="Discount"] :selected').index();		
		$('.Products li').each(function(){
			$(this).find('.PInfo').find('.PPrice').eq(SelIdx).show().siblings().hide();
		});
		if(Value!=0) { $('#DiscountCoupon strong').html($(this).children('option:selected').html()); }
		for(var i=0; i< discounts.length;i++){ if(discounts[i][0]==$('[name="Discount"]').val()) DisVal=i+1; }
		if(DisVal>0){ 
			DisVal--; InsType = discounts[DisVal][1]; 
			InsPDis = Number(discounts[DisVal][2]);
		}	
		setContracts(Value);		
		
		$('.selOp .Ins').each(function(i){ 
			var InsBox=0, YkbTotalPrice='', YkbDis,Sum;
			var InsCon = $(this).parent().next().children('strong');
			TotalPrice = Number($(this).parent().siblings('.TotalPrice').val());
			var Ins = $(this).parent().prev().find('input').attr('id').split('_')[1].replace('ins','');
			var OtherIns =0;
			if(Ins=='cash') { Ins=1; } else { Ins = Number(Ins); }			
			if(SBank=='ykb'){ InsBox=$('#'+SBank+'Ins'+i*3+'Box'); }
			if(InsBox.length>0){ 
				OtherIns = Number(InsBox.find('.ykbIns').val()); 
				YkbTotalPrice = InsBox.find('.ykbTotal').val();
				YkbDis = InsBox.find('.ykbDis').val();
			}
			
			if(Value==0){			
				TotalPrice = $(this).parent().siblings('.TotalPrice').val();		
				InsPrice = $(this).parent().siblings('.InsPrice').val();		
				if(InsBox.length>0){ 	
					YkbArr = TotalPrice.toString().split('.');					
					if (!YkbArr[1]) { Sum =YkbArr[0]; } else { Sum =YkbArr[0]+','+YkbArr[1]; }
					YkbDisArr = (Number(TotalPrice)/OtherIns).toFixed(2).split('.');
					if (!YkbDisArr[1]) { YkbDis = YkbDisArr[0]+'0'; } else { YkbDis = YkbDisArr[0]+','+YkbDisArr[1]; }
				}				
				PriceArr = addCommas(TotalPrice.toString()).split(','); InsArr = addCommas(InsPrice.toString()).split(',');
				if (!PriceArr[1]) { PriceArr.push('00'); } if (!InsArr[1]) { InsArr.push('00'); }
				if (PriceArr[1].length<2) { PriceArr[1] = PriceArr[1]+'0'; } if (InsArr[1].length<2) { InsArr[1] = InsArr[1]+'0'; }
			}
			else{
				if(InsBox.length>0){ 
					var NewInsP2 = getNewPrice(TotalPrice,InsPDis,InsType,false);
					var InsPrice2 = (getNewPrice(TotalPrice,InsPDis,InsType,true)/OtherIns).toFixed(2);	
					YkbArr = NewInsP2.toString().split(','); YkbDisArr = InsPrice2.toString().split('.');
					if (!YkbArr[1]) { Sum =YkbArr[0]; } else { Sum = YkbArr[0]+','+YkbArr[1]; }
					if (!YkbDisArr[1]) { YkbDis = YkbDisArr[0]+'0'; } else { YkbDis = YkbDisArr[0]+','+YkbDisArr[1]; }
				}
				NewInsP = getNewPrice(TotalPrice,InsPDis,InsType,false);
				InsPrice = (getNewPrice(TotalPrice,InsPDis,InsType,true)/Ins).toFixed(2);				
				InsArr = InsPrice.toString().split('.'); PriceArr = NewInsP.split(',');
				if (!PriceArr[1]) { PriceArr.push('00'); } if (!InsArr[1]) { InsArr.push('00'); }
				if (PriceArr[1].length<2) { PriceArr[1] = PriceArr[1]+'0'; } if (InsArr[1].length<2) { InsArr[1] = InsArr[1]+'0'; }		
			}
			
			if(InsBox.length>0){ 
				InsBox.find('.Insstatus').children('p').html('<span>'+ YkbDis +" TL X " + OtherIns + " Taksit</span></br> <strong> Toplam: " + Sum.replace('.','') + " TL</strong>");
			}
			
			writePrice($(this),PriceArr[0],PriceArr[1],false,'');
			writePrice(InsCon,InsArr[0],InsArr[1],false,''); 	
			InsCon.html(InsCon.html()+' x '+ $(this).attr('rel') +' taksit');			
			/*InsCon.html(InsCon.html()+' x '+ i*3 +' taksit');*/
		});
		
		var TotalP = $('#HTotalPrice').val();
		var TotalPArr = addCommas(TotalP).toString().split(',');
		if (!TotalPArr[1]) { TotalPArr.push('00'); }
		if (TotalPArr[1].length<2) { TotalPArr[1] = TotalPArr[1]+'0'; }
		var WriteCon = $('.strike:first strike');
		writePrice(WriteCon,TotalPArr[0],TotalPArr[1],false,'');
	});
	/*Discount Coupon*/
	
	/*Ins Info*/
	$('.ShowInsInfo').hover(function(){ $('#InsInfo').show(); $('.ShoppingTotal').addClass('postop'); }); 
	$('#InsInfoCon').mouseleave(function(){ $('#InsInfo').hide(); $('.ShoppingTotal').removeClass('postop'); });
	/*Ins Info*/
	
	/*TC NO*/
	$('.ShowTCInfo').hover(function(){ $('#TCInfo').show(); });	$('.TCNumber').mouseleave(function(){ $('#TCInfo').hide(); });	
	$('.ShowCouponInfo').hover(function(){ $('#CreditCard').css('z-index','15'); $('#CouponInfo').show(); });	$('.ShoppingLinks').mouseleave(function(){ $('#CreditCard').css('z-index','25'); $('#CouponInfo').hide(); });	
	$('#soz').click(function(){ chckTC($('[name="Discount"]').val(),$('#soz').is(':checked')); calcDiscouns(0);	});
	/*TC NO*/
	
	/*Rights*/
	$('#soz2,#soz3').click(function(){ delErr($(this),'normal'); });
	/*Rights*/ 
	
	/*YKB*/
	$('.ykbIns3').click(function(){
		if ($(this).attr('id') == 'ykb_Ins3_Chck') {
			$('#ykb_Ins3_Chck2').removeAttr("checked");
		}
		if ($(this).attr('id') == 'ykb_Ins3_Chck2')  {
			$('#ykb_Ins3_Chck').removeAttr("checked");
		}
		if (($('#ykb_Ins3_Chck').attr("checked") == false) &&
			($('#ykb_Ins3_Chck2').attr("checked") == false)) {
			koiCode.val('');
		} else {
			koiCode.val($(this).val());
		}
		$('.PaymentOptions ul.selOp li.selected').trigger('click');
	});
	$('.ykbIns6').click(function(){
		if ($(this).attr('id') == 'ykb_Ins6_Chck') {
			$('#ykb_Ins6_Chck2').removeAttr("checked");
		}
		if ($(this).attr('id') == 'ykb_Ins6_Chck2')  {
			$('#ykb_Ins6_Chck').removeAttr("checked");
		}
		if (($('#ykb_Ins3_Chck').attr("checked") == false) &&
				($('#ykb_Ins3_Chck2').attr("checked") == false)) {
			koiCode.val('');
		} else {
			koiCode.val($(this).val());
		}
		$('.PaymentOptions ul.selOp li.selected').trigger('click');
		/*$('[name="Discount"]').trigger('change');*/
	});
	$('[name="cardnum"]').blur(toggleYkbBlueBox);
	/*YKB*/

	
	/*Bank Info*/
	$('.BankInstallmens a').click(function(){
		var BankType = $(this).attr('rev'); 
		$('#InstallmentOp').css('width','735px');
		$(window).trigger('resize');
		$('.InsTableInfo').show();
		$('.InsTableInfo').children('.'+BankType).fadeIn().siblings('p').hide();
	});	
	$('.Banks ul li').click(function(){
		var SBank = $(this).attr('class');
		$('#InstallmentOp').modal({maxWidth:'470',overlayClose:'True'});  		
		$(window).trigger('resize');
		if(SBank=='maximumC') { AnimateInfo('isbank'); }
		else if(SBank=='worldC') { AnimateInfo('ykb'); }
		else if(SBank=='finansC') { AnimateInfo('finans'); }
		else if(SBank=='axessC') { AnimateInfo('axs'); }
		else if(SBank=='hsbcC') { AnimateInfo('hsbc'); }
		else if(SBank=='bonusC') { AnimateInfo('bonus'); }
	});
	/*Bank Info*/
});
function AnimateInfo (bankname){
	var AnimPos = 0; 
	AnimPos = (Number($('.InsTableCon .'+bankname).prevAll().length) * Number($('.InsTableCon .'+bankname).height()) ) + (Number($('.InsTableCon .'+bankname).prevAll().length) * 20);
	setTimeout("$('.InsTableCon').animate({ scrollTop: '"+AnimPos+"' }, 1000)",5); 
}

var letters='ABCDEFGHIJKLMNÿOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzàáÿÿéèÿÿíìÿÿïÿóòÿÿúùÿÿ';
var trletters='ÇçÖöÞþÐðÜüÝi????ý';
var numbers='1234567890';
var signs=',.:;@-\'';
var mathsigns='+-=()*/';
var custom='<>#$%&?¿';

function alpha(e,allow) {
	var k;
	k=document.all?parseInt(e.keyCode): parseInt(e.which);
	var tabc=0;
	if(navigator.userAgent.indexOf('Opera')>-1) { tabc=9; }
	if(k!=8 && k!=tabc){ 
		return (allow.indexOf(String.fromCharCode(k))!=-1);
	}
	else{ return true;}
}
function getBankInfo(binNum,returnVal){ 
	$.ajax({
		type: "POST",
		url: "/creditCardBankInfo",
		data: { ccBinNum: binNum },
		success: function(data) {
			var BankInfo = data.split('#|#');				
			if(data==''){
				$('.PaymentOptions ul').removeClass('selOp').hide(); 
				if($('#3dpage').val()!='3dpage'){ $('#secure3D').removeAttr('checked').removeAttr('disabled'); }
				$('.CardLogo,.PaymentOptions,.bgColorBlue,#'+BankInfo[0]+'_Ins').hide();
				$('.Banks').show();
				$('.Cardype').removeAttr('class').addClass('Cardype');
				$('.axs').addClass('selOp'); 
				$('[name="Discount"]').trigger('change');
				if($('#P-CCNumberField').val().length>17) {  $('.axs li:first').trigger('click'); $('#BuyProduct span').html('Peþin Ödeme Yap').css('background-position','142px -59px'); }
				if($('#P-CCNumberField').attr('class').indexOf('numpad_submit')>-1 && $('#P-CCNumberField').val().length!=19) { $('#jqfnumkeypad_cardnum').show(); } else { $('#CreditCardFront').trigger('click'); }
				if(returnVal) { return false; }
			}
			else{ bank=BankInfo[0];
				$('[name="cardnum"]').removeClass('FormInputErr'); $('[name="cardnum"]').parent().children().remove('.FormTxtWarn');
				$('.CardLogo').empty().append($('<img/>').attr({src:'rsrc/MyBasket/img/bank_logo/'+BankInfo[4]+'.png',alt:BankInfo[3]}));
				$('ul.'+BankInfo[0]).addClass('selOp').show().siblings('ul').removeClass('selOp').hide(); 				
				$('[name="Discount"]').trigger('change');
				if($('ul.'+BankInfo[0]+' li.selected').length>0) {
					var chckVal = getBankOp('ins');
					if(chckVal==1) { $('#BuyProduct span').html('Peþin Ödeme Yap').css('background-position','142px -59px'); }
					else { $('#BuyProduct span').html('Taksitli Ödeme Yap').css('background-position','153px -59px'); }
				}
				/*$('ul.'+BankInfo[0]+' li:first').trigger('click');*/
				if($('#P-CCNumberField').attr('class').indexOf('numpad_submit')>-1 && $('#P-CCNumberField').val().length!=19) { $('#jqfnumkeypad_cardnum').show(); } else { $('#CreditCardFront').trigger('click'); }
				
				/*if($('#'+BankInfo[0]+'_Ins').length>0) { $('#'+BankInfo[0]+'_Ins').show(); }
				else { $('.InsInfo').hide(); }*/
				
				if(binNum.substring(0,1)==4) { $('.Cardype').removeAttr('class').addClass('Cardype VisaC'); }
				else if(binNum.substring(0,1)==5) { $('.Cardype').removeAttr('class').addClass('Cardype MasterC'); }
				else if(binNum.substring(0,1)==3) { $('.Cardype').removeAttr('class').addClass('Cardype Amex'); }
				else { $('.Cardype').attr('class','Cardype'); }
				
				if(BankInfo[2]==1) { 
					$('#secure3D').attr('checked','checked').attr('disabled','disabled');	
					$('.PaymentOptions').addClass('bankcard');
					$('#CCPost').attr('action','javascript:cc3dSorgula();');
					$('#BuyProduct span').html('Peþin Ödeme Yap').css('background-position','142px -59px');
					if($('#P-CCNumberField').val().length>17) { $('ul.'+BankInfo[0]+' li:first').trigger('click'); }
					if($('#P-CCNumberField').attr('class').indexOf('numpad_submit')>-1 && $('#P-CCNumberField').val().length!=19) setTimeout("$('#jqfnumkeypad_cardnum').show();",5);	
				}
				else { 
					$('#secure3D').removeAttr('checked').removeAttr('disabled'); $('.PaymentOptions').removeClass('bankcard'); 					
					if($('#3dpage').length<1) { $('#CCPost').attr('action','https://www.gittigidiyor.com/odeme-yap?Enc='+$('#Enc').val()); }
				}
				if($('#3dpage').val()=='3dpage'){ $('#secure3D').attr('checked','checked').attr('disabled','disabled');	 }
				
				if(BankInfo[4]==62005) { $('.CreditCard').addClass('Amex');  }
				else { $('.CreditCard').removeClass('Amex'); }
				
				/*Flexi card control*/
				var boxLen = $('ul.'+BankInfo[0]+' li').length;
				if(BankInfo[3]=='Flexi'){
					if(boxLen>1){
						disableInsBox(BankInfo[0],2,6);
						disableInsBox(BankInfo[0],3,9);
					}
				}
				else{
					if(boxLen>1){
						enableInsBox(BankInfo[0],2);
						enableInsBox(BankInfo[0],3);
					}
				}
				/*Flexi card control*/
				
				if(returnVal) { return true; }
			}
		},
		complete: function(xhr, status) {
			if(xhr.responseText!='' && $('.PaymentOptions').attr('class').indexOf('bankcard')<0 && $('.PaymentOptions ul.selOp li').length>1) { 
				$('.CardLogo,.PaymentOptions').show(); $('.Banks').hide();  
			}
			else { $('.CardLogo,.PaymentOptions').hide(); $('.Banks').show();  }
			if(xhr.responseText!='') { $('.CardLogo').show(); }
		}
	});
}

function disableInsBox(bank,sort,ins){
	$('ul.'+bank+' li').eq(sort).removeClass('selected');
	$('ul.'+bank+' li').eq(sort).addClass('disabled');
	$('ul.'+bank+' li').eq(sort).find('input').removeAttr('checked');
	$('ul.'+bank+' li').eq(sort).find('input').attr('disabled','disabled');
	if($('ul.'+bank+' li').eq(sort).find('.disabled').length<1){ $('ul.'+bank+' li').eq(sort).find('.InsCon').append($('<p class="disabled"/>').html('Kartýnýz '+ins+' taksitle<br/> ödemeyi desteklemiyor.')) }
}
function enableInsBox(bank,sort){
	$('ul.'+bank+' li').eq(sort).removeClass('disabled');
	$('ul.'+bank+' li').eq(sort).find('input').removeAttr('disabled');
	$('ul.'+bank+' li').find('.disabled').remove();
}

function getBankOp(option){
	if($('.PaymentOptions ul.selOp li.selected').length==0) { return 0; }
	var InsSelected='', $that = $('.PaymentOptions ul.selOp');	
	var UlClass = $that.attr('class').split(' ')[1];
	InsSelected = $that.children('.selected').find('[name="'+UlClass+'_ins"]').attr('id');	
	InsSelected = InsSelected.replace('ins','');
	var OpArr = InsSelected.split('_');	
	if(OpArr[1]=='cash') { OpArr[1]='1'; }		
	if(option=='bank') { return OpArr[0]; }
	if(option=='ins') { return OpArr[1]; }
}

function setContracts(Value){
	var DisVal = 0, InsPDis;
	for(var i=0; i< discounts.length;i++){ if(discounts[i][0]==$('[name="Discount"]').val()) DisVal=i+1; }
	if(DisVal>0){ 
		DisVal--; InsType = discounts[DisVal][1]; 
		InsPDis = Number(discounts[DisVal][2]); 
		if(Value!=0){
			if(InsType=='Percent'){
				$('#discountRate').val(InsPDis);
				$('#discountValue').val(($('#HTotalPrice').val()*InsPDis)/100);
				$('#totalPrice').val($('#HTotalPrice').val());
			}
			else{
				$('#discountValue').val(InsPDis);
				$('#discountRate').val('');
				$('#totalPrice').val($('#HTotalPrice').val());
			}
		}
	}	
	else{
		$('#discountRate').val('');
		$('#discountValue').val('');
		$('#totalPrice').val($('#HTotalPrice').val());
	}
}

function setInsOp(DisVal){ $('.discount'+DisVal).show().siblings().hide(); }
function ctrlCardNum(el,func,kcode){	
	Cnum = el.val();
	Cnum = Cnum.replace(/^\s+|\s+$/g, "");
	if(kcode!=8 && el.attr('class').indexOf('numpad_clear')<0) { el.attr('value',GetEditNum(Cnum)); }
	else { el.attr('value', Cnum); 
		if(el.attr('class').indexOf('numpad_clear')<0){
			var ValLen = Number(Cnum.length);
			setCaretToPos(document.getElementById("cardnum"),ValLen); 
		}
	}
	var CnumL = Cnum.length;
	$('.CardNumber').html( GetEditNum(Cnum) );
	if(CnumL==19) { $('#CreditCardFront').trigger('click'); }
	else if(CnumL>17 && CnumL<=19) { 
		if(func=='keyup' || el.attr('class').indexOf('numpad_submit')>-1) { getBankInfo(Cnum.replace(' ','').substr(0,6),false); }
	}	
	else {
		if($('#3dpage').val()!='3dpage') { $('#secure3D').removeAttr('checked').removeAttr('disabled'); }
		$('.CardLogo,.PaymentOptions').hide();
		$('.Cardype').removeAttr('class').addClass('Cardype');
		$('.Banks').show();	
		$('.CreditCard').removeClass('Amex'); 		
		$('#BuyProduct span').html('Ödeme Yap').css('background-position','95px -59px');	
	}
	$('[name="cardnum"]').removeClass('FormInputErr');
	$('[name="cardnum"]').siblings().remove('.FormTxtWarn');
}
function GetEditNum(num){
	num = num.replace(/ /g, '');
	num = num.split('');
	var NumTxt ='', frst, scnd, thrd;
	if(num[3]==' ') { frst = false; } else { frst = true; }
	if(num[7]==' ') { scnd = false; } else { scnd = true; }
	if(num[11]==' ') { thrd = false; } else { thrd = true; }
	for(var i=0; i<num.length; i++){
		if((i==3 && frst) || (i==7 && scnd) || (i==11 && thrd)) {
			NumTxt = NumTxt+num[i]+' '; 
			if(i==3) frst = false;
			if(i==7) scnd = false;
			if(i==11) thrd = false;
		} 
		else { NumTxt = NumTxt+num[i]; } 
	}
	return NumTxt;
}

function setSelectionRange(input, selectionStart, selectionEnd) {
  if (input.setSelectionRange) {
    input.focus();
    input.setSelectionRange(selectionStart, selectionEnd);
  }
  else if (input.createTextRange) {
    var range = input.createTextRange();
    range.collapse(true);
    range.moveEnd('character', selectionEnd);
    range.moveStart('character', selectionStart);
    range.select();
  }
}
function setCaretToPos (input, pos) {  setSelectionRange(input, pos, pos); }
function Show3DInfo() { $('#CVCInfo').show(); }
function Hide3DInfo() { $('#CVCInfo').hide(); }
/*Discount Functions*/
function getNewPrice(price,dis,type,num){
	if(type=='Percent'){
		var DisPrice = (price*dis)/100;
		var NewPrice = price-DisPrice;
		if(num) return NewPrice.toFixed(2);
		else return addCommas(NewPrice.toFixed(2));
	}
	else{
		var NewPrice = price-dis;
		if(num) return NewPrice.toFixed(2);
		else return addCommas(NewPrice.toFixed(2));
	}
}
function addCommas(nStr){ 
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? ',' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + '.' + '$2');
	}
	return x1 + x2;
}
function calcDiscouns(value){ 
	if(discounts){
		var DisVal = value;
		for(var i=0; i< discounts.length;i++){ if(discounts[i][0]==DisVal) DisVal=i+1; }
		if(DisVal>0){
			DisVal--;
			var DisType = discounts[DisVal][1]; Discount = Number(discounts[DisVal][2]);
			var Price = $('#HTotalPrice').val();
			var NewPrice = getNewPrice(Price,Discount,DisType,false);
			var PriceArr = NewPrice.split(',');
			var DiscArr;
			if(DisType=='Percent'){	DiscArr = (Price*Discount)/100;	DiscArr = DiscArr.toFixed(2); }	else{ DiscArr = Discount; }
			DiscArr = DiscArr.toString();
			DiscArr=DiscArr.split('.');
			if (!PriceArr[1]) { PriceArr.push('00'); } if (!DiscArr[1]) { DiscArr.push('00'); }
			if (PriceArr[1].length<2) { PriceArr[1] = PriceArr[1]+'0'; } if (DiscArr[1].length<2) { DiscArr[1] = DiscArr[1]+'0'; }
			writePrice($('#CouponInfo strong'),DiscArr[0],DiscArr[1],false,'');
			
			var PriceTxt = $('.ShoppingTPrice .price').html();
			$('[name="Discount"]').parent().children('p:last').removeClass('strike');
			$('[name="Discount"]').parent().children('p:last').html('<strong class="OverallTotal">Genel Toplam: &nbsp;&nbsp;<span class="price">'+PriceTxt+'</span></strong>');
		}
		else {
			var Price = addCommas($('#HTotalPrice').val());	
			var PriceArr = Price.split(',');
			if (!PriceArr[1]) { PriceArr.push('00'); }
			if (PriceArr[1].length<2) { PriceArr[1] = PriceArr[1]+'0'; }
			
			var PriceTxt = $('.ShoppingTPrice .price:first').html();
			$('[name="Discount"]').parent().children('p:last').addClass('strike');
			$('[name="Discount"]').parent().children('p:last').html('<b class="OverallTotal">Toplam: &nbsp;&nbsp;</b> <strong class="price">'+PriceTxt+'</strong>');
		}
		writePrice($('.ShoppingTPrice .price'),PriceArr[0],PriceArr[1],false,'');
	}	
	if(value==0) { $('.strike:first,#DiscountCoupon').hide(); } else { $('.strike:first,#DiscountCoupon').show();  }
	chckTC(value,$('#soz').is(':checked'));
}

function getDiscounts() {
	if(discounts){
		var SelIdx=0;
		var TotalP = addCommas($('#HTotalPrice').val());		
		var SelectedVal = $('[name="Discount"] option:selected').html();
		var OpTxt='', DisCount=0, DisDue = false;
		$('[name="Discount"]').empty();	
		for(var i=0; i<discounts.length;i++){
			if(TotalP>=Number(discounts[i][3])){	
				DisDue = true;
				OpTxt = discounts[i][4]+' Ýndirim Çeki'; 
				if(SelectedVal==OpTxt){ SelIdx=i; $('[name="Discount"]').append($('<option/>').attr('value',discounts[i][0]).attr('selected','selected').html(OpTxt)); DisCount++; }
				else { $('[name="Discount"]').append($('<option/>').attr('value',discounts[i][0]).html(OpTxt)); }
			}		
		}
		if(SelectedVal=='Ýndirim Çeki Kullanmayacaðým.'){ $('[name="Discount"]').append($('<option/>').attr('value','0').attr('selected','selected').html('Ýndirim Çeki Kullanmayacaðým.')); DisCount--; }
		else { $('[name="Discount"]').append($('<option/>').attr('value','0').html('Ýndirim Çeki Kullanmayacaðým.'));}
		
		if(DisCount>0 || DisDue) { calcDiscouns(discounts[SelIdx][0]); } else { calcDiscouns(0); }
		if(DisCount<0) { calcDiscouns(0); }
	}
}

function chckTC(value,chck) {	
	if(value!=0 && chck){
		$('.TCNumber').css('display','inline-block'); 
		$('#soz').parent().parent().show();
		$('#soz').attr('checked','checked');
	} 
	else { 
		$('.TCNumber').hide(); 
		$('#soz').parent().parent().hide();
		$('[name="Discount"]').children('option').eq(0).attr('selected','selected');
		$('#soz').attr('checked','checked');
	}
}

function writePrice(el,price,dec,txt,Inst) {	
	if(txt==true){el.html('Toplam: '+price+', <sup>'+dec+'</sup> TL'); }
	else if(txt==false) { el.html(' '+price+', <sup>'+dec+'</sup> TL');  }
	else if(txt=='Ins') { el.html(' '+price+','+dec+' TL x '+Inst+' Taksit');   }
	else if(txt=='Ins2') { el.html('Toplam: '+price+','+dec+' TL');   }
}
/*Discount Functions*/

/*Check Form*/
function CCPostSubmit() {
	var ErrCount = 0;
	var PayPal = $('.PaymentMenu li.selected').attr('class').indexOf('PayPal');
	var CardName = GetVal($('[name="cardname"]'));
	var CardNum = GetVal($('[name="cardnum"]'));
	var CVC = GetVal($('[name="CVC"]'));	
	if(PayPal<0){
		if(CardName.length<1){	ErrCount++;
			writeErr($('[name="cardname"]'),'Kart üzerindeki isminizi eksik girdiniz.','normal');
			return false;
		}
		else { delErr($('[name="cardname"]'),'normal'); } 
		
		if(CardNum.length>0 && CardNum.length<18){ ErrCount++;
			writeErr($('[name="cardnum"]'),'Kart numaranýzý eksik girdiniz.','normal');
			return false;
		}
		else if(CardNum.length==0){ ErrCount++;
			writeErr($('[name="cardnum"]'),'Kart numaranýzý girmediniz.','normal');
			return false;
		}
		else { delErr($('[name="cardnum"]'),'normal'); } 
		
		var dt= new Date();
		var ThisYear = dt.getFullYear().toString();
		ThisYear = ThisYear.substring(2,4); 
		var ThisMonth = Number(dt.getMonth())+1;
		var SMonth = $('#P-CCMonthSelect').val();
		var SYear = $('#P-CCYearSelect').val();
		if(SMonth.substring(0,1)=='0') { SMonth = Number(SMonth.substring(1,2)); }
		if(SMonth==0){
			writeErr($('#P-CCMonthSelect'),'Lütfen bir tarih seçiniz.','parent2');
			return false;
		}
		else if(SYear==0){
			writeErr($('#P-CCYearSelect'),'Lütfen bir yýl seçiniz.','parent2');
			return false;
		}
		else if(SYear==ThisYear){
			if(SMonth<ThisMonth){
				writeErr($('#P-CCMonthSelect'),'Lütfen geçerli bir tarih giriniz.','parent2');
				return false;
			}
			else{ delErr($('#P-CCMonthSelect'),'parent2');	}
		}
		else{ delErr($('#P-CCMonthSelect'),'parent2'); delErr($('#P-CCYearSelect'),'parent2');	}
		
		if(CVC.length<1){ ErrCount++;
			writeErr($('[name="CVC"]'),'CVC numaranýzý girmediniz.','parent');
			return false;
		}
		else if(CVC.length<3){ ErrCount++;
			writeErr($('[name="CVC"]'),'CVC numaranýzý eksik girdiniz.','parent');
			return false;	
		}	
		else { delErr($('[name="CVC"]'),'parent'); }
		
		if(getBankOp('ins')==0){ ErrCount++;
			writeErr($('ul.selOp li:first'),'Lütfen ödeme seçeneklerinden birini seçiniz.','payment');
			return false;
		}
		else { delErr($('ul.selOp li:first'),'payment'); }
	}
	
	if($('#soz2').is(':checked')){ delErr($('#soz2'),'next');	}
	else { ErrCount++;
		writeErr($('#soz2'),'Mesafeli satýþ sözleþmesini kabul etmeniz gerekmektedir.','next');
		return false;
	}
	
	if($('#soz3').is(':checked')){ delErr($('#soz3'),'next'); }
	else {ErrCount++;
		writeErr($('#soz3'),'Ön bilgilendirme formunu kabul etmeniz gerekmektedir.','next');
		return false;
	}
	
	if($('#termsofuse').length>0){
		if($('#termsofuse').is(':checked')){ delErr($('#termsofuse'),'next'); }
		else {ErrCount++;
			writeErr($('#termsofuse'),'Kullanýcý Sözleþmesini ve Gizlilik Politikasýný kabul etmeniz gerekmektedir.','next');
			return false;
		}
	}
	
	if($('[name="TCNO"]').length>0){
		if($('[name="Discount"]').length>0 && $('[name="Discount"]').val()!=0){
			if($('[name="TCNO"]').val().length<1){ ErrCount++;
				writeErr($('[name="TCNO"]'),'TC Kimlik numaranýzý girmediniz.','tc');
				return false;	
			}
			else if($('[name="TCNO"]').val().length>0 && $('[name="TCNO"]').val().length<11){ ErrCount++;
				writeErr($('[name="TCNO"]'),'TC Kimlik numaranýzý eksik girmdiniz.','tc');
				return false;	
			}
			else { delErr($('[name="TCNO"]'),'tc'); }
		}
	}	
	if(ErrCount==0) { return true; } else { return false; }
}

function writeErr(el,text,form) {
	el.addClass('FormInputErr');
	if(form=='normal') { 
		el.siblings('.FormTxtWarn').remove();
		el.parent().append($('<span class="FormTxtWarn"/>').html(text)); 
	}
	else if(form=='parent'){
		el.parent().parent().find('.FormTxtWarn').remove();
		if(el.attr('name')=='CVC'){	el.parent().parent().append($('<span class="FormTxtWarn" style="margin-left:112px;"/>').html(text)); }
		else{ el.parent().parent().append($('<span class="FormTxtWarn"/>').html(text)); }
	}
	else if(form=='parent2'){
		el.parent().parent().parent().find('.FormTxtWarn').remove();
		el.parent().parent().parent().append($('<span class="FormTxtWarn"/>').html(text)); 
	}
	else if(form=='next'){
		el.parent().next().find('.FormTxtWarn').remove();
		el.parent().next().append($('<span class="FormTxtWarn"/>').html(text)); 
	}
	else if(form=='payment'){ $('.PaymentOptions .Gray').removeAttr('class').addClass('RedWarn'); el.siblings().addClass('FormInputErr'); }
	else if(form=='tc'){ el.siblings('span').removeAttr('class').addClass('RedWarn'); }
}
function delErr(el,form) {
	el.removeClass('FormInputErr');
	if(form=='normal') { el.siblings('.FormTxtWarn').remove();}
	else if(form=='parent') { el.parent().parent().find('.FormTxtWarn').remove(); }
	else if(form=='parent2') { el.parent().parent().parent().find('.FormTxtWarn').remove(); }
	else if(form=='next') { el.parent().next().find('.FormTxtWarn').remove(); }
	else if(form=='payment') { $('.PaymentOptions .RedWarn').removeAttr('class').addClass('Gray'); el.siblings().removeClass('FormInputErr'); }
	else if(form=='tc') { el.siblings('span').removeAttr('class'); }
}
function GetVal(el) { return el.val(); }
/*Check Form*/

/* YKB funtions - START */
function ykbBinNumberQuery(ccNum,installmentNum,price) {
var TotalP,InsV,TotalPArr=[];
var ykb_Ins3_ykbParam = $('#ykb_Ins3_Chck');
var ykb_Ins3_ykbParam1 = $('#ykb_Ins3_Chck2');
var ykb_Ins6_ykbParam = $('#ykb_Ins6_Chck');
var ykb_Ins6_ykbParam1 = $('#ykb_Ins6_Chck2');
var ykb_Ins3_Box = $('#ykbIns3Box');
var ykb_Ins6_Box = $('#ykbIns6Box');
var koiCode	= $('#koiCode');
	$.ajax({
		type: "POST",
		url: "/ykbCreditCardCheck",
		data: { ccNum : ccNum, installment : installmentNum, price : price },
		success: function(data) { 
			if(data.indexOf('#|#' != -1)) {
				var ykbParam	= $('.ykbParam');
				var ykbParam1	= $('.ykbParam1');				
				var SelectedChck=0;		
				update = data.split('#|#');

				if(update[0] == '1' && (installmentNum==3 || installmentNum==6)) {
					ykbParam.val(update[1]);
                    koiCode.val(update[1]);
					if(update[5] == 1) {
						ykbParam1.val(update[6]);
					}

					if (installmentNum == 3) {
						if(ykb_Ins3_ykbParam.is(':checked')) { SelectedChck = ykb_Ins3_ykbParam; }
						else if(ykb_Ins3_ykbParam1.is(':checked')) { SelectedChck = ykb_Ins3_ykbParam1; }
						else { SelectedChck = ykb_Ins3_ykbParam; }
						ykb_Ins3_Box.find('.ykb3InsStatus').show();
						ykb_Ins6_Box.find('.ykb6InsStatus').hide();
						ykb_Ins3_Box.find('.ykb3InsStatus').html('<span>'+update[2] +" TL X " + update[3] + " Taksit</span></br> <strong> Toplam: " + update[4] + " TL</strong>");
						ykb_Ins3_Box.find('.ykbTotal').attr('value',update[4].replace(',','.'));
						ykb_Ins3_Box.find('.ykbDis').attr('value',update[2].replace(',','.'));
						ykb_Ins3_Box.find('.ykbIns').attr('value',update[3]);       
						ykb_Ins3_ykbParam1.val(update[6]);
						if(ykb_Ins3_ykbParam1.is(':checked')) { koiCode.val(update[6]); } else { koiCode.val(update[1]); }
                    } else if (installmentNum == 6) {
						if(ykb_Ins6_ykbParam.is(':checked')) { SelectedChck = ykb_Ins6_ykbParam; }
						else if(ykb_Ins6_ykbParam1.is(':checked')) { SelectedChck = ykb_Ins6_ykbParam1; }
						else { SelectedChck = ykb_Ins6_ykbParam; }
						ykb_Ins6_Box.find('.ykb6InsStatus').show();
						ykb_Ins3_Box.find('.ykb3InsStatus').hide();
						ykb_Ins6_Box.find('.ykb6InsStatus').html('<span>'+update[2] +" TL X " + update[3] + " Taksit</span></br> <strong> Toplam: " + update[4] + " TL</strong>");
						ykb_Ins6_Box.find('.ykbTotal').attr('value',update[4].replace(',','.'));
						ykb_Ins6_Box.find('.ykbDis').attr('value',update[2].replace(',','.'));
						ykb_Ins6_Box.find('.ykbIns').attr('value',update[3]);
						ykb_Ins6_ykbParam1.val(update[6]);
						if(ykb_Ins6_ykbParam1.is(':checked')) { koiCode.val(update[6]); } else { koiCode.val(update[1]); }
                    }
						
				} else { 
					ykbParam.val('0');
					koiCode.val('');
				}
			} else {
				ykbParam.val('0');
				koiCode.val('');
			}
		}
	});
}

function checkYkb() { ykbBinNumberQuery(getCCNum(),getInstallmentNum(),getPrice()); }
function toggleYkbBlueBox(loadYkbInfo){ 
	if (loadYkbInfo && (bank=='ykb') && (ykb_installment==3 || ykb_installment==6))	{
		setTimeout(checkYkb,50);
    } else {
        ykb_Ins3_Box.css('display','none');
        ykb_Ins6_Box.css('display','none');
    }
}
function getCCNum(){ return $('[name="cardnum"]').val().replace(/ /g,''); }
function getPrice(){ 
	var InsSelected = getBankOp('ins');
	var SelEq =0;
	if(InsSelected=='1') { SelEq = 0; }
	else if(InsSelected=='3') { SelEq = 1; }
	else if(InsSelected=='6') { SelEq = 2; }
	else { SelEq = 3; }
	var SelPrice = $('.selOp li').eq(SelEq).find('.Ins').html();
	SelPrice = SelPrice.replace('<sup>',''); SelPrice = SelPrice.replace('</sup>','');
	SelPrice = SelPrice.replace(' TL',''); SelPrice = SelPrice.replace(', ',',');
	return SelPrice;
}
function getInstallmentNum() { return getBankOp('ins'); }
/* YKB funtions - FINISH */

function getInternetExplorerVersion() {
  var rv = -1;
  if (navigator.appName == 'Microsoft Internet Explorer') {
    var ua = navigator.userAgent;
    var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
    if (re.exec(ua) != null)
      rv = parseFloat( RegExp.$1 );
  }
  return rv;
}
function isIeVersion7or8() {
  var msg = "false";
  var ver = getInternetExplorerVersion();
  if ( ver > -1 )
  {
    if ( ver <= 8.0 ) 
      msg = "true";
    else
      msg = "false";
  }
  return msg;
}
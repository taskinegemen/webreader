var BookMeta;
var reader_slider;
var Pages = [],Items = [], PageIDArray=[];
	
window.pages = [];

	jQuery.fn.fitToParent = function () {
		    this.each(function () {
		        var $iframe = jQuery(this);
		        var width = $iframe.width();
		        var height = $iframe.height();
		        var parentWidth = $iframe.parent().width();
		        var parentHeight = $iframe.parent().height();
		        

		        var innerWidth= $(window[$(this).attr('name')].document.body).width();
		        var innerHeight= $(window[$(this).attr('name')].document.body).height();

		        var aspect = innerWidth / innerHeight;
		        var parentAspect = parentWidth / parentHeight;


		        if (aspect > parentAspect) {
		        	var zoom =   width / innerWidth;
		            newWidth = innerWidth;
		            newHeight = newWidth / aspect;
		        } else {
		        	var zoom =   height / innerHeight;
		            newHeight = parentHeight;
		            newWidth = innerWidth * aspect;
		        }
		        
		        $iframe.width(innerWidth *zoom );
		        $iframe.height(innerHeight*zoom );
		        
		        
		        if (parentWidth-innerWidth*zoom > 0 ) 
		        	$iframe.css('left', ( (parentWidth-innerWidth*zoom)/2 )+"px");
		        else 
		        	$iframe.css('left', "0px");

	            $iframe.css('position','absolute');

	            $iframe.css('position','absolute');

		        $(window[$(this).attr('name')].document.body).css("zoom", zoom);

		    });
		};


	function resizeEverything(){
				var current= window.SlideController.reader_slider.getCurrentSlide();
				var offset = $('#main-content').offset();
				var height= $(window).height() - offset.top +25;
				var width= $(window).width() - offset.left;
				$(".bxslider li,.bx-viewport ,.bxslider iframe.page_iframe ").height (height);
				$(".bxslider li,.bx-viewport ,.bxslider iframe.page_iframe ").width (width);
				$(".bxslider iframe.page_iframe").fitToParent();
				window.SlideController.reader_slider.goToSlide(current);

				$("ul.bxslider").css("-webkit-transform", "translate3d(-"+($ ($(".bxslider li")[current] ).position().left )+"px, 0px, 0px)" );
			}




		String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g, '');};

		String.prototype.ltrim=function(){return this.replace(/^\s+/,'');};

		String.prototype.rtrim=function(){return this.replace(/\s+$/,'');};

		String.prototype.fulltrim=function(){return this.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,' ');};

		function trimString(s) {
		  var l=0, r=s.length -1;
		  while(l < s.length && s[l] == ' ') l++;
		  while(r > l && s[r] == ' ') r-=1;
		  return s.substring(l, r+1);
		}

		function compareObjects(o1, o2) {
		  var k = '';
		  for(k in o1) if(o1[k] != o2[k]) return false;
		  for(k in o2) if(o1[k] != o2[k]) return false;
		  return true;
		}

		function itemExists(haystack, needle) {
		  for(var i=0; i<haystack.length; i++) if(compareObjects(haystack[i], needle)) return true;
		  return false;
		}

		function searchFor(toSearch) {
		  var results = [];
		  toSearch = trimString(toSearch); // trim it
		  for(var i=0; i<objects.length; i++) {
		    for(var key in objects[i]) {
		      if(objects[i][key].indexOf(toSearch)!=-1) {
		        if(!itemExists(results, objects[i])) results.push(objects[i]);
		      }
		    }
		  }
		  return results;
		}

		
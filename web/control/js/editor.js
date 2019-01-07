	var dselect;
	  // Search for elements by class
   allElements = dsA("#isiPost img");
  for (i=0; i<allElements.length; i++) {
     classname1 = allElements[i];
	classname1.addEventListener("dblclick",function(e){
		editSizeImage(this);
	});
  }
  delete classname1;
  delete allElements;
	
	function activeImg(){
		var classname1 = ds(".notActive");
		classname1.addEventListener("dblclick",function(){
		editSizeImage(this);
	});
		classname1.removeAttribute("class");
	}
	
	var listfontdiv=null,objekheader=null,listimage=null;
		de("styleWithCSS", false, null);
		if(window.innerWidth<640){
		de("enableObjectResizing", false, false);
		}
		
	function addimage(imagelink,x,y,f){
	var xstring='';
	var ystring='';
	var fstring='';
	if(x.length>0)
		xstring='width="'+x+'"';
	if(y.length>0)
		ystring='height="'+y+'"';	
	if(f.length>0)
		fstring='style="float:'+f+';"';
	
	de('insertHTML', false, '<img class="notActive" src="'+imagelink+'" '+xstring+' '+ystring+' '+fstring+'>');
	activeImg();
	//document.execCommand('insertHTML', false, '<div class ="edit-image"> <img src="'+imagelink+'" ></div>');
	}
	function getImage(){
		if(dss('.getimage').display!="inline"){
		listimage = new ce(".getimage")
		var positon=getPositionFixed(ds(".addimageclass"));
		var posy1 =positon.y;
		var posx1 = positon.x+ds(".addimageclass").offsetWidth;		
		listimage.sd="inline";
		listimage.sh="200px";
		listimage.sw="250px";
		listimage.sf='left';
		listimage.sl=posx1+"px";
		listimage.st=posy1+"px";
		listimage.sbc="#27b3e2";
		}else{
		dss('.getimage').display="none";
		}
	}
	function getPosition( element ) {
   var rect = element.getBoundingClientRect();
   return {x:rect.left,y:rect.top};
}
	function removeH(){
		
		var a=s().anchorNode;
		try {

		find=false;
		while(find === false ){
			
		if(a.tagName=='H1' || a.tagName =='H2' || a.tagName =='H3' ||  a.tagName =='H4' || a.tagName =='H5' || a.tagName =='H6'){
			find=true;
			continue;
		}
		if(a.tagName=='BODY'){
		return;
		}
		
		 a= a.parentNode;
		}

		if(find===true){
		
		let range = document.createRange();
			range.selectNode(a);
			
		var inner =  a.innerHTML;
			
		s().removeAllRanges();
		s().addRange(range);
		document.execCommand('insertHTML', false, inner);
		
		
		}
		}
	catch(error){}	

	}
	function createlink(){
		link= prompt("Masukan Alamat", '');
		de('createLink', false,link);
	}
	
	function jenisheader(){
		if(dss('.extension-header').display!='inline'){			
			var positon=getPositionFixed(ds(".hdr"));
			var posy1 =positon.y-85;
			var posx1 = positon.x+ds(".hdr").offsetWidth+5;
		var objekheader =new ce(".extension-header");
		objekheader.sd = "inline";
		objekheader.st=posy1+"px";
		objekheader.sl=posx1+"px";
		}else{
			dss('.extension-header').display= "none";
		}
		
	}
	
		function fontname(){
			
			if(!ds('#fname')){
			var listfont = ["Open-Sans:Open Sans, Sans-Serif", "Playfair-Display:Playfair Display, serif","Roboto-Condensed:Roboto, sans-serif","Ubuntu:Ubuntu, sans-serif","Merriweather:Merriweather, serif","Noto-Serif-SC:Noto Sans TC, sans-serif","Bungee:Bungee, cursive"];
			div=dc("div");
			div.style.marginTop="10px";
			esa(div,'id','fname');
			createfontlist(div,listfont);
			
			var positon=getPositionFixed(ds(".mjf"));
			var posy1 =positon.y;
			var posx1 = positon.x+ds(".mjf").offsetWidth;
			
		openPopupControl(div,"120px","310px",posx1,posy1);
		listfontdiv=div;
			}else{
				listfontdiv.remove();
				closePopupControl();
			}
		
	}
	
	function setfont(fontNameI,fontNameS1,fontNameS2){
		 var item2 = fontNameI.replace("-", "+");
		var cssId = fontNameI;
		if (!ds('#'+cssId))
		{
			var link  = dc('link');
			link.id   = cssId;
			link.rel  = 'stylesheet';
			link.type = 'text/css';
			link.href = 'https://fonts.googleapis.com/css?family='+item2;
			link.media = 'all';
			ds('head').appendChild(link);
		}
		
		de('fontName', false,"'"+fontNameS1+"',"+fontNameS2);
		
	}
	function createfontlist(div,arrayFont){
		arrayFont.forEach(function (item, index, array) {
			 var array = item.split(':');
			 var cssfont = array[1].split(',');
			var oImg = new ce("img");
				oImg.sa('src', './font/'+array[0]+'.png');
				oImg.sa('alt', 'na');
				oImg.sa('height', '40px');
				oImg.sa('width', '100px');
				oImg.sa('class', 'changefont');
				 item = item.replace("-", " ");
				oImg.sa('onclick', "setfont('"+array[0]+"','"+cssfont[0]+"','"+cssfont[1]+"');");
				div.appendChild(oImg.e());
			
		});
	}
	
		function fontSize(){
		if(dss('.extension-font').display!="inline"){
			var positon=getPositionFixed(ds(".muf"));
			var posy1 =positon.y-28;
			var posx1 = positon.x+ds(".muf").offsetWidth+3;
		var objekheader =new ce(".extension-font");
		objekheader.sd = "inline";
		objekheader.st=posy1+"px";
		objekheader.sl=posx1+"px";
		objekheader.sa('id','fsz')
		}else{
			dss('.extension-font').display = "none";
		}
		
	}

	
		function forecolor(){ 
	if(!ds('#pck')){
			var positon=getPositionFixed(ds(".mwf"));
			var posy =positon.y;
			var posx = positon.x+ds(".mwf").offsetWidth;
		
		PICKER.show(posx+"px",posy+"px");	
	}else{	
		PICKER.close();	
	}
	}
	
	function iSizeFont(){
		if(ds('.editsfnt')== null){
		dselect=s().getRangeAt(0);
		var panel = new ce('div');
		panel.sa('class', 'editsfnt');
		panel.sp="fixed";
		panel.st="calc(50% - 50px)";
		panel.sl="calc(50% - 75px)";
		panel.szi="11";
		panel.sbc="#dadada";
		panel.sh="150px";
		panel.sw="200px";
		panel.spd="10px";
		var iSize = new ce('input');
		    iSize.sa('class', 'iSizeFont');
			iSize.sw="100px";
			iSize.e().addEventListener("mouseover",function(e){
				if(s().getRangeAt(0).toString().length>0){
				dselect=s().getRangeAt(0);
				}
				}, false);
		var button = dc("input");
			button.type = "button";
			button.value = "Terapkan";
			button.onclick = function(){
			s().removeAllRanges();
			s().addRange(dselect);
			de('fontSize', false,dsv('.iSizeFont')+'px');
			dsr(".editsfnt");			
			};
		var button2 = dc("input");
			button2.type = "button";
			button2.value = "Batal";
			button2.onclick = function(){
			dsr(".editsfnt");
		};
		
		panel.ac(dctn("size 1 - 7 (px)"));
		panel.ac(dc("br"));
		panel.ac(iSize.e());
		panel.ac(button);
		panel.ac(button2);
		ac(panel.e());
		}else{
			dsr(".editsfnt");
		}
	}
	
	
	function editSizeImage(elem){
		if(ds('.editsm')!== null){
			dsr(".editsm");
		}
		dselect=s().getRangeAt(0);
		var panel = new ce('div');
		panel.sa('class', 'editsm');
		panel.sp="fixed";
		panel.st="calc(50% - 50px)";
		panel.sl="calc(50% - 75px)";
		panel.szi="11";
		panel.sbc="#dadada";
		panel.sh="150px";
		panel.sw="200px";
		panel.spd="10px";
		var iWidth = new ce('input');
		    iWidth.sa('class', 'iWidth');
		    
		    var iw = ega(elem,'width');
		    if(iw==null){
		    iw=elem.naturalWidth;
		    }
		    
			iWidth.sa('value', iw);
			iWidth.sw="100px";
		var iHeight= new ce('input');
		    iHeight.sa('class', 'iHeight');
		    
		    var ih = ega(elem,'height');
		    if(ih==null){
		    ih=elem.naturalHeight;
		    }
		    
			iHeight.sa('value',  ih);
			iHeight.sw="100px";
			
		var button = dc("input");
			button.type = "button";
			button.value = "Terapkan";
			button.onclick = function(){
			s().removeAllRanges();
			s().addRange(dselect);
			var f="";
			if(ds("#rRight").checked==true){
				f="right";
			}else if(ds("#rLeft").checked==true){
				f="left";
			}
			addimage(elem.src,dsv(".iWidth")+"px",dsv(".iHeight")+"px",f);
			dsr(".editsm");
			};
		var button2 = dc("input");
			button2.type = "button";
			button2.value = "Batal";
			button2.onclick = function(){
			dsr(".editsm");
		};
		var button3 = dc("input");
			button3.type = "button";
			button3.value = "Hapus";
			button3.onclick = function(){
			dsr(".editsm");
			s().removeAllRanges();
			s().addRange(dselect);
			de("delete", null, false);
		};
		
		var radiod =new ce('div');
		radiod.spd='5px';
		radiod.e().innerHTML='<label><input type="radio" id="rNone" name="rfloat" value=""> none</label><label><input type="radio" id="rLeft" name="rfloat" value="left"> left</label><label><input type="radio" id="rRight"  name="rfloat" value="right"> right</label>';
		radiod.pp(dc('br'));
		radiod.pp2('Float :',dc('label'));
	
		panel.ac(dctn("Width(px)"));
		panel.ac(dc("br"));
		panel.ac(iWidth.e());
		panel.ac(dc("br"));
		panel.ac(dctn("Height(px)"));
		panel.ac(dc("br"));
		panel.ac(iHeight.e());
		panel.ac(radiod.e());
		panel.ac(button);
		panel.ac(button2);
		panel.ac(button3);
		ac(panel.e());
		switch (es(elem).float) {
		  case 'right':
			ds("#rRight").checked=true;
			break;
		  case 'left':
			ds("#rLeft").checked=true;
			break;
		  default:
			ds("#rNone").checked=true;
			break;
		}
		
	}
	
	
	
function openPopupRight(objek,lebar,tinggi,x,y) {
	var elem =  ds("#popupRight .iPopup");	
	eac(elem,objek);	
	
	
	var forminput=dss(".popupRight");
	forminput.width = lebar;
	forminput.height = tinggi;
	forminput.left = x+"px";
	forminput.top =y+"px";

	

}
 
function closePopupRight() {
    dss("#popupRight").width = "0";
}

function openPopupControl(objek,lebar,tinggi,x,y) {
	var elem =  ds("#popupControl .iPopup");	
	eac(elem,objek);	
	
	
	var forminput=new ce("#popupControl");
	forminput.sw = lebar;
	forminput.sh = tinggi;
	forminput.sl = x+"px";
	forminput.st =y+"px";

	

}
 
function closePopupControl() {
    dss("#popupControl").width = "0";
}
	//coloroutpicker http://jsfiddle.net/mShET/1/
	//esar Canassa
	// translate from js
	PICKER = {
    mouse_inside: false,
	 colors:null,
	 colorctx:null,

    to_hex: function (dec) {
        hex = dec.toString(16);
        return hex.length == 2 ? hex : '0' + hex;
    },

    show: function (x,y) {
		var cl = new ce('canvas');
		PICKER.colors = cl.e();
		 
		cl.sa('width', '230');
		cl.sa('height', '150');
		cl.sa('id', 'pck');
		cl.sa('onmousedown', 'event.preventDefault();');
		var cs=es(PICKER.colors);
		cl.st=y;
		cl.sl=x;
		cl.sp="fixed";
		cl.sc="crosshair";
		cl.sd="display: block";
		cl.szi="11";

        ec(b(),PICKER.colors);
        PICKER.colorctx = PICKER.colors.getContext('2d');

        PICKER.render();

        PICKER.colors.addEventListener("click",function (e) {
                var new_color = PICKER.get_color(e);
						de('foreColor', false,new_color);
						PICKER.close();
						fc=false;
                return new_color;
            }, false);
			
		PICKER.colors.addEventListener('mouseover', function() {
				 PICKER.mouse_inside=true;
			});
    		PICKER.colors.addEventListener('mouseover', function() {
				 PICKER.mouse_inside=true;
			});
			PICKER.colors.addEventListener('mouseout', function() {
				 PICKER.mouse_inside=false;
			});

        b().addEventListener('mouseup', function() {
				 if (PICKER.mouse_is_inside==false) PICKER.close();
			});
    },

    bind_inputs: function () {

		NodeList.prototype.forEach = Array.prototype.forEach;

		var divs = dsA('.color-picker:not(.color-picker-binded)');
		
		[].forEach.call(divs, function(div) {
		ds('.color-picker').setAttribute( "onClick", "PICKER.show(this);" );

		  div.classList.add('color-picker-binded');
			});
	},

    close: function () { PICKER.colors.remove();},

    get_color: function (e) {
        var pos_x = e.pageX - PICKER.colors.offsetLeft;
        var pos_y = e.pageY - PICKER.colors.offsetTop -document.documentElement.scrollTop;

        data = PICKER.colorctx.getImageData(pos_x, pos_y, 1, 1).data;
        return '#' + PICKER.to_hex(data[0]) + PICKER.to_hex(data[1]) + PICKER.to_hex(data[2]);
    },

  // Build Color palette
    render: function () {
		
        var gradient = PICKER.colorctx.createLinearGradient(0, 0, PICKER.colors.offsetWidth, 0);

        // Create color gradient
        gradient.addColorStop(0,    "rgb(255,   0,   0)");
        gradient.addColorStop(0.15, "rgb(255,   0, 255)");
        gradient.addColorStop(0.33, "rgb(0,     0, 255)");
        gradient.addColorStop(0.49, "rgb(0,   255, 255)");
        gradient.addColorStop(0.67, "rgb(0,   255,   0)");
        gradient.addColorStop(0.84, "rgb(255, 255,   0)");
        gradient.addColorStop(1,    "rgb(255,   0,   0)");

  // Apply gradient to canvas
        PICKER.colorctx.fillStyle = gradient;
        PICKER.colorctx.fillRect(0, 0, PICKER.colorctx.canvas.width, PICKER.colorctx.canvas.height);

        // Create semi transparent gradient (white -> trans. -> black)
        gradient = PICKER.colorctx.createLinearGradient(0, 0, 0,PICKER.colors.offsetHeight);
        gradient.addColorStop(0,   "rgba(255, 255, 255, 1)");
        gradient.addColorStop(0.5, "rgba(255, 255, 255, 0)");
        gradient.addColorStop(0.5, "rgba(0,     0,   0, 0)");
        gradient.addColorStop(1,   "rgba(0,     0,   0, 1)");

        // Apply gradient to canvas
        PICKER.colorctx.fillStyle = gradient;
        PICKER.colorctx.fillRect(0, 0, PICKER.colorctx.canvas.width, PICKER.colors.offsetHeight);


    }
};
function getPositionFixed(el) {
  var xPos = 0;
  var yPos = 0;
 
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      xPos += (el.offsetLeft + el.clientLeft);
      yPos += (el.offsetTop  + el.clientTop);
    } else {
      // for all other non-BODY elements
      xPos += (el.offsetLeft  + el.clientLeft);
      yPos += (el.offsetTop  + el.clientTop);
    }
 
    el = el.offsetParent;
  }
  return {
    x: xPos,
    y: yPos
  };
}
function getPosition(el) {
  var xPos = 0;
  var yPos = 0;
 
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      var xScroll = el.scrollLeft || dc.scrollLeft;
      var yScroll = el.scrollTop || dc.scrollTop;
 
      xPos += (el.offsetLeft - xScroll + el.clientLeft);
      yPos += (el.offsetTop - yScroll + el.clientTop);
    } else {
      // for all other non-BODY elements
      xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
      yPos += (el.offsetTop - el.scrollTop + el.clientTop);
    }
 
    el = el.offsetParent;
  }
  return {
    x: xPos,
    y: yPos
  };
}
var keys = {
    tab: false,
    shift: false
};
document.onkeydown = function(evt) {
    evt = evt || window.event;
    var isTab = false;
	var isShift = false;
    if ("key" in evt) {
        isTab = (evt.key == "Tab" || evt.key == "TAB");
		isShift=(evt.key == "Shift" || evt.key == "SHIFT");
    } else {
        isTab = (evt.keyCode == 9);
		isShift = (evt.keyCode == 16);
		
    }
    if (isTab) {
       keys['tab']=true;
    }
	if (isShift) {
       keys['shift']=true;
    }
	if( keys['shift'] && keys['tab'] ){
		de('outdent', false, null);
		return false;
	}else if(keys['tab']){
		de('indent', false, null);
	  return false;
	}
};

document.onkeyup = function(evt) {
    evt = evt || window.event;
    var isTab = false;
	var isShift = false;
    if ("key" in evt) {
        isTab = (evt.key == "Tab" || evt.key == "TAB");
		isShift=(evt.key == "Shift" || evt.key == "SHIFT");
    } else {
        isTab = (evt.keyCode == 9);
		isShift = (evt.keyCode == 16);
    }
    if (isTab) {
       keys['tab']=false;
    }
	if (isShift) {
       keys['shift']=false;
    }

};


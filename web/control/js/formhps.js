function hpss(lp,act,id,btn) {
	
 	 var formData = new FormData(); 

		formData.append('act',act);
		formData.append('id',id);
		formData.append('lp',hex_sha512(lp));
		formData.append('d','43rew32wesf3524@#!%&%dwd');
		id='';
		lp='';

    var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {
				
				var message = xmlHttp.responseText; 
				window.parent.openWclearPopupRightP(message);
				
				if(message =='Done'){
				 var row = btn.parentNode.parentNode;
				row.parentNode.removeChild(row);
				}
				
            }
        }
        xmlHttp.open("post", '/control/hps.php'); 
        xmlHttp.send(formData); 
}
	function hpsv(act,id,btn){
		if(ds('.editsfnt')== null){
		var panel = new ce('div');
		panel.sa('class', 'editsfnt');
		panel.sp="fixed";
		panel.st="calc(50% - 50px)";
		panel.sl="calc(50% - 75px)";
		panel.szi="11";
		panel.sbc="#dadada";
		panel.sh="100px";
		panel.sw="200px";
		panel.spd="10px";
		var iSize = new ce('input');
		    iSize.sa('class', 'iSizeFont');
			iSize.sw="100px";
			iSize.sa('type','password');
		var button = dc("input");
			button.type = "button";
			button.value = "Konfirmasi";
			button.onclick = function(){
			hpss(dsv('.iSizeFont'),act,id,btn);
			dsr(".editsfnt");				
			};
		var button2 = dc("input");
			button2.type = "button";
			button2.value = "Batal";
			button2.onclick = function(){
			dsr(".editsfnt");
		};
		
		panel.ac(dctn("Masukan Password"));
		panel.ac(dc("br"));
		panel.ac(iSize.e());
		panel.ac(button);
		panel.ac(button2);
		ac(panel.e());
		}
	}
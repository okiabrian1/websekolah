function errorMSG(tulisan) {
alert (tulisan);
}
function aContainsB (a, b) {
    return a.indexOf(b) >= 0;
}

		
function Saformpb(pwd,path) {
	
		
		if(document.getElementById('passbaru').value==document.getElementById('passbaruRe').value){
		
		
	 var formData2 = new FormData(); 

		formData2.append('testl',hex_sha512(pwd));
		formData2.append('passb',hex_sha512(dsv('#passbaru')));
		formData2.append('id',dsv('#idUbah'));
		formData2.append('p',"wdw5fgdfsgds3aawjkkjg34dgf");
		pwd='';
	
	   var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {
		
				var message = xmlHttp.responseText.split(':'); 
				window.parent.openWclearPopupRightP(message);
				closeNavRight();  
            }
        }
        xmlHttp.open("post", path); 
        xmlHttp.send(formData2);	
	}else{
		alert("Password Tidak sama");
	}
}

	function chp(path){
		if(ds('.editd')== null){
		var panel = new ce('div');
		panel.sa('class', 'editd');
		panel.sp="fixed";
		panel.st="calc(50% - 50px)";
		panel.sl="calc(50% - 75px)";
		panel.szi="11";
		panel.sbc="#dadada";
		panel.sh="100px";
		panel.sw="200px";
		panel.spd="10px";
		var iSize = new ce('input');
		    iSize.sa('class', 'pasw');
			iSize.sw="100px";
			iSize.sa('type','password');
		var button = dc("input");
			button.type = "button";
			button.value = "Konfirmasi";
			button.onclick = function(){
			Saformpb(dsv('.pasw'),path);
			dsr(".editd");				
			};
		var button2 = dc("input");
			button2.type = "button";
			button2.value = "Batal";
			button2.onclick = function(){
			dsr(".editd");
		};
		
		panel.ac(dctn("Masukan Password"));
		panel.ac(dc("br"));
		panel.ac(iSize.e());
		panel.ac(button);
		panel.ac(button2);
		ac(panel.e());
		}
	}
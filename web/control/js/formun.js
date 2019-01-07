function errorMSG(tulisan) {
alert (tulisan);
}
function aContainsB (a, b) {
    return a.indexOf(b) >= 0;
}

		
function Saformn(path) {
	
	 var formData = new FormData(); 
	if(document.getElementById('PostID').value.length==0){
		formData.append('author',document.getElementById('userID').value);
		formData.append('headline',document.getElementById('judulPost').value,);
		formData.append('story',document.getElementById('isiPost').innerHTML);
		formData.append('tglTampil',document.getElementById('popupDatepicker').value);
		formData.append('p','wdw536@df^%a3aawf534d%gf');
	
	
    var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {			
				var message = xmlHttp.responseText.split(':'); 
								var p =document.createElement('p');
				p.appendChild(document.createTextNode(message[0]));
				window.parent.openWclearPopupRight(p);
				window.parent.setValue("PostID",message[1]);
				closeNavRight();
				formData.remove();
            }
        }
        xmlHttp.open("post", path); 
        xmlHttp.send(formData); 
	
}else{
		formData.append('author',document.getElementById('userID').value);
		formData.append('headline',document.getElementById('judulPost').value,);
		formData.append('story',document.getElementById('isiPost').innerHTML);
		formData.append('tglTampil',document.getElementById('popupDatepicker').value);
		formData.append('postID',document.getElementById('PostID').value);
		formData.append('p','wdw536@df^%a3aawf534d%gf');
		
		var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {			
				var message = xmlHttp.responseText; 
				var p =document.createElement('p');
				p.appendChild(document.createTextNode(message));
				window.parent.openWclearPopupRight(p);
				closeNavRight();
				formData.remove();
            }
        }
        xmlHttp.open("post", path); 
        xmlHttp.send(formData); 
		
		
		
	}
	

}
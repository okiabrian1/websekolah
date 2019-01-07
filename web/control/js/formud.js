	wp=window.parent;
	d=document;
function errorMSG(tulisan) {
alert (tulisan);
}
function aContainsB (a, b) {
    return a.indexOf(b) >= 0;
}
function regformu(forms, gambar,ket) {
	

  	
	var bar = d.querySelector('#bar1');
  var percent =  d.querySelector('#percent1');
  var progress= d.querySelector("#progress_div");

	if (gambar.value.length ==0) {
        alert('Masukan lokasi gambar terlebih dahulu');
        return false;
	 }
	 
	var formData = new FormData(forms);
	formData.append('ket',ket);
		   

	var xmlHttp = new XMLHttpRequest();
       xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {			
			 if(xmlHttp.responseText)
				{
				 // console.log(xhr.responseText);
				  d.querySelector('#progress_div').style.display="none";
				  
				 var message =  xmlHttp.responseText.match(/<p class="error">.*?(.*?)<\/p>/)[1]; ; 
				 	var p =document.createElement('p');
						p.appendChild(document.createTextNode(message));
					wp.openWclearPopupRight(p);
					
				 	progress.style.display="block";
				//document.getElementById("message").innerHTML = message;
				
				
				if(aContainsB (message,"has been uploaded")){
				var lokasiGambar = xmlHttp.responseText.match(/<p class="lokasi_gambar">.*?(.*?)<\/p>/)[1];
				var waktu = xmlHttp.responseText.match(/<p class="tgl_gambar">.*?(.*?)<\/p>/)[1];
					
				var linkIm = "addimagef('"+lokasiGambar+"');";
				var panel = new ce('div');
					panel.sw ='200px';
				var img = new ce('img');
					img.sa('src',lokasiGambar);
					img.sa('onclick',linkIm);
					img.sa('onmousedown',"event.preventDefault();");
					img.sw='200px';
					img.sh='150px';
					img.sc='pointer';
					panel.ac(img.e());
					
				d.querySelector(".output_image").prepend(panel.e());
				}
		
			}
            }
        }
	
		xmlHttp.upload.addEventListener("progress", function(e) {
			var pc = parseInt(100 - (e.loaded / e.total * 100));
			    bar.width=pc+"px";
				percent.innerHTML=100;
		}, false);
	
	
        xmlHttp.open("post", forms.action); 
        xmlHttp.send(formData); 
		
		progress.style.display="block";
		
      var percentVal = '100%';

	  return false;

}
function addimagef(imagelink){
	wp.addimage(imagelink,'','','');
}
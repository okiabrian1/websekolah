function errorMSG(tulisan) {
alert (tulisan);
}
function aContainsB (a, b) {
    return a.indexOf(b) >= 0;
}
function regformp(forms, judul, isi,tglDibuat,tglDitampilkan,ket) {

  	
	var bar = $('#bar');
  var percent = $('#percent');
  
	var p = document.createElement("input");
 
    forms.appendChild(p);
    p.name = "ket";
    p.type = "hidden";
    p.value = ket;
	
	
	

  
  $(forms).ajaxForm({
    beforeSubmit: function() {
		
	
		if (judul.value.length ==0) {
        alert('dwaaaaaaaaaaaaaa');
		if (isi.value.length ==0) {
        alert('dwaaaaaaaaaaaaaa');
		if (tglDitampilkan.value.length ==0) {
        alert('dwaaaaaaaaaaaaaa');
        return false;
    }

    },

    uploadProgress: function(event, position, total, percentComplete) {

    },
    
	success: function() {

    },

    complete: function(xhr) {
      if(xhr.responseText)
      {
		 // console.log(xhr.responseText);
		  document.getElementById("progress_div").style.display="none";
		  
		 var message =  xhr.responseText.match(/<p class="error">.*?(.*?)<\/p>/)[1];
        document.getElementById("message").innerHTML = message;
		
		
		if(aContainsB (message,"has been uploaded")){
		var lokasiGambar = xhr.responseText.match(/<p class="lokasi_gambar">.*?(.*?)<\/p>/)[1];
		var waktu = xhr.responseText.match(/<p class="tgl_gambar">.*?(.*?)<\/p>/)[1];
			
			
			
		 $("#listGambarTabel tr").each(function(){
               var trow = $(this);
             if(trow.index() === 0){
                 trow.append('<td  style="width:200px"> <img src="'+lokasiGambar+'"  style="width:200px;height:150px;"></td>');
				 
			 }else if(trow.index() === 1){
                 trow.append('<td>'+lokasiGambar.replace('../../image/','')+'</td>');
             }else{
                 trow.append('<td>'+waktu+'</td>');
             }
            })
		}
		
      }
    }
	
  }); 

    return true;
}
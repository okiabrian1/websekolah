function errorMSG(tulisan) {
alert (tulisan);
}
function aContainsB (a, b) {
    return a.indexOf(b) >= 0;
}
function regformu(forms, gambar,ket) {

  	
	var bar = $('#bar');
  var percent = $('#percent');
  
	var p = document.createElement("input");
 
    forms.appendChild(p);
    p.name = "ket";
    p.type = "hidden";
    p.value = ket;
	
	
	

  
  $(forms).ajaxForm({
    beforeSubmit: function() {
		
	    $("input").prop('disabled', true);
	if (gambar.value.length===0) {
        alert('Masukan lokasi gambar terlebih dahulu');
        $("input").prop('disabled', false);
        return false;
    }

      document.getElementById("progress_div").style.display="block";
      var percentVal = '0%';
      bar.width(percentVal);
      percent.html(percentVal);
    },
    uploadProgress: function(event, position, total, percentComplete) {
        var percentVal = percentComplete + '%';
        bar.width(percentVal);
        if(percentComplete==100){
           percent.html("memproses");
        }else{
        percent.html(percentVal);
        }
    },
    success: function() {
        var percentVal = '100%';
        bar.width(percentVal);
        percent.html("memproses");
    },

    complete: function(xhr) {
      if(xhr.responseText)
      {
		  //console.log(xhr.responseText);
		  document.getElementById("progress_div").style.display="none";
		  
		 var message =  xhr.responseText.match(/<p class="error">.*?(.*?)<\/p>/)[1]; 
		window.parent.openWclearPopupRight("<p>"+message+"</p>");
		
        //document.getElementById("message").innerHTML = message;
		
		
		if(aContainsB (message,"has been uploaded")){
		var lokasiGambar = xhr.responseText.match(/<p class="lokasi_gambar">.*?(.*?)<\/p>/)[1];
		var waktu = xhr.responseText.match(/<p class="tgl_gambar">.*?(.*?)<\/p>/)[1];
			
			
			
		 $("#listGambarTabel tr").each(function(){
               var trow = $(this);
             if(trow.index() === 0){
				 var linkIm = "addimage('"+lokasiGambar+"');";
                 trow.append('<td  style="width:200px"> <img src="'+lokasiGambar+'" onclick="'+linkIm+'"  style="width:200px;height:150px;"></td>');
				 
			 }else if(trow.index() === 1){
                 trow.append('<td>'+lokasiGambar.replace('../../image/','')+'</td>');
             }else{
                 trow.append('<td>'+waktu+'</td>');
             }
            })
		}
		
		$("input").prop('disabled', false);
		
      }
    }
	
  }); 

    return true;
}

function addimage(imagelink){
	$("div.jqte_editor",window.parent.document).append('<img src="'+imagelink+'" >');
}
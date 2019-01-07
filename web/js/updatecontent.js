
function updateSlider() {
	alamat = document.location.origin;
	lebarlayar=$(window).width();
	$.getJSON(alamat+'/php/getData.php?update=headerslide&lebar='+lebarlayar, function(data) {
		if(data.length>0){
		for(var i =0; i<data.length;i++){
			isi=' <li><img src="'+data[i].img+'"> <!-- random image --><div class="caption '+data[i].posisitext+'-align"><h3>'+data[i].title+'</h3><h5 class="light grey-text text-lighten-3">'+data[i].slogan+'</h5></div> </li>';	
			$('ul.slides').append(isi);
		}
		 $('.slider').slider();
		}
	});
}

function updatePost(id,nomor, jalan) {
    alamat = document.location.origin;
	lebarlayar=$(window).width();
	
	$.getJSON(alamat+'/php/getData.php?update=post&nomor='+nomor+'&lebar='+lebarlayar, function(data) {
		if(data.length>0){
			datalength=data.length;
			for(var i =1; i<4;i++){
	$("div.slide"+id+"show div.card"+i+" div.card-content div.card-title").empty();
	$("div.slide"+id+"show div.card"+i+" div.card-image").empty();
	$("div.slide"+id+"show div.card"+i).attr("style","background-color:rgba(0.5, 0.5, 0.5, 0.0);-webkit-box-shadow:0px 0px 0px 0px #ccc;box-shadow:0px 0px 0px 0px #ccc");
	$("div.slide"+id+"show div.card"+i).attr("onclick","");
	$("div.slide"+id+"show div.card"+i).removeClass("m-pointer");
			}
	
	for( i =0; i<data.length;i++){
	$("div.slide"+id+"show div.card"+(i+1)+" div.card-title").append("<i>" + data[i].headline + "</i>");
	$("div.slide"+id+"show div.card"+(i+1)+" div.card-image").append("<img src=" + data[i].img + ">");
	$("div.slide"+id+"show div.card"+(i+1)).attr("onclick","updateView("+id+","+data[i].id+",'"+data[i].img2+"','"+data[i].headline+"');");
	$("div.slide"+id+"show div.card"+(i+1)).attr("style","");
	$("div.slide"+id+"show div.card"+(i+1)).addClass("m-pointer");
	}
	
	if(jalan == 1){
		if(datalength==3){
			$("#maju"+id).attr("onclick","updatePost("+id+","+(nomor+3)+",1)");
		}
			$("#mundur"+id).attr("onclick","updatePost("+id+","+(nomor-3)+",0)");
	}else if(jalan===0 && nomor>0){
	$("#maju"+id).attr("onclick","updatePost("+id+","+nomor+",1)");
	$("#mundur"+id).attr("onclick","updatePost("+id+","+(nomor-3)+",0)");
	}else{
		$("#maju"+id).attr("onclick","updatePost("+id+","+(nomor+3)+",1)");
	$("#mundur"+id).attr("onclick","updatePost("+id+","+nomor+",0)");
	}
	
		}
	});
	



}

function updateView(id,idpost,img, title) {
	$("div.slide"+id+"show div.cardview div.card-title").empty();
	$("div.slide"+id+"show div.cardview div.card-image").empty();
	
	$("div.slide"+id+"show div.cardview div.card-title").append("<i>" + title + "</i>");
	$("div.slide"+id+"show div.cardview div.card-image").append("<img src=" + img + ">");

}

 
function closeNav() {
    document.getElementById("card1").style.marginLeft = "0";

}
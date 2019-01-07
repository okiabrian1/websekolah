

function post1() {
    updatePost(1,0,1) 
}
function post2() {
    updatePost(2,0,1) 
}
function post3() {
    updatePost(3,0,1) 
}
function checkPoint(elem,jalan) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = elem.offset().top;
    //var elemBottom = elemTop + elem.height();
 //if ((elemBottom <= docViewBottom) && (elemTop >= docViewTop)) {
	
    if (elemTop <= docViewBottom) {
		elem.attr("id","on");
        window[jalan]();
		
    }
}
$(window).scroll(function(){
	
  var elemSlide1show = $('.slide1show');
  var elemSlide2show = $('.slide2show');
  var elemSlide3show = $('.slide3show');
  
  if(elemSlide1show.prop('id') =="off"){
	  checkPoint(elemSlide1show,'post1');
	 
  }
    if(elemSlide2show.prop('id') =="off"){
	  checkPoint(elemSlide2show,'post2');
	 
  }
    if(elemSlide3show.prop('id') =="off"){
	  checkPoint(elemSlide3show,'post3');
	 
  }
  
  
});
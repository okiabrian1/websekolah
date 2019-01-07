
function openNav() {
		var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	if(window.screen.width>640){
		dss("#sideNavigation").width = "250px";
	}else if(window.screen.width>340){
	    dss("#sideNavigation").width = "250px";
	}else{
	 dss("#sideNavigation").width = "100vw";
}

}
 
function closeNav() {
    dss("#sideNavigation").width = "0";
    dss("#main").marginLeft = "0";
}

function openNavRight() {
	if(window.screen.width>340){	
    dss("#sideNavigationRight").width = "250px";
	}else{
		 dss("#sideNavigationRight").width = "100vw";
	}
	
}
 
function closeNavRight() {
    dss("#sideNavigationRight").width = "0";
}

function openPopupRight(pesan) {
	ds("#popupRight .iPopup").appendChild(pesan); 
	if(window.screen.width>640){	
		dss("#popupRight").width = "350px";
	}else{
		dss("#popupRight").width = "250px";
	}
}
 
function closePopupRight() {
    dss("#popupRight").width = "0";
}
function clearPopupRight() {
   ds("#popupRight .iPopup").remove(); 
}
function empty(a){
	 var s=  ds(a); 
	   while (s.firstChild) {
		s.removeChild(s.firstChild);
		}
}

function openReg() {
	if(window.screen.width>340){	
    dss("#new").width = "250px";
	}else{
		 dss("#new").width = "100vw";
	}


}
function closeReg() {
    dss("#new").width = "0";
}


function openWclearPopupRight(pesan) {
	empty("#popupRight .iPopup");
	 ds("#popupRight .iPopup").appendChild(pesan);  
if(window.screen.width>340){	
    dss("#popupRight").width = "350px";
}else{
	    dss("#popupRight").width = "100vw";
}
}

function openWclearPopupRightP(pesan) {
	empty("#popupRight .iPopup");
	var p = dc("p");
		p.style.color='white';
		p.innerHTML=pesan;
		p.style.fontSize="20px";
	 ds("#popupRight .iPopup").prepend(p);  
if(window.screen.width>340){	
    dss("#popupRight").width = "350px";
}else{
	    dss("#popupRight").width = "100vw";
}
}

function bukaEditorPassword(id){
    dss('#editorPassowrd').display = 'block';
    // hide the lorem ipsum text
    ds('#idUbah').value= id;
	openNavRight();
}
function tutupEditorPassword(id){
    dss('#editorPassowrd').display = 'none';
    // hide the lorem ipsum text
   ds('#idUbah').value = "";
	closeNavRight();
}
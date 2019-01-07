function tt(a,b,c){
	var eform = document.createElement("form");
	eform.setAttribute('method',"post");
	eform.setAttribute('action',b);
	eform.setAttribute('target',c);
	eform.setAttribute('id',"postToIframe");
   document.body.appendChild(eform);
   

    for(var item in a){
		var einput = document.createElement("input");
			einput.setAttribute('type',"hidden");
			einput.setAttribute('name',item);
			einput.setAttribute('value',a[item]);
		 document.querySelector('#postToIframe').appendChild(einput);
    };
	 document.querySelector('#postToIframe').submit();
	
    document.querySelector('#postToIframe').remove();
	document.querySelector('script[src="js/antar.js"]').remove();
	document.querySelector('script[src="js/text.js"]').remove();
}
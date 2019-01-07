
var my_awesome_script = document.createElement('script');
my_awesome_script.setAttribute('src','js/antar.js');
document.head.appendChild(my_awesome_script)
var my_awesome_script = document.createElement('script');
my_awesome_script.setAttribute('src','js/text.js');
document.head.appendChild(my_awesome_script);


function showDate(date1) {
	alert('The date chosen is ' + date1);
};

function setValue(id,val) {
	document.getElementById(id).value = val;
};


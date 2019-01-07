function formhash(form, password) {
    // Buat masukan elemen baru, ini akan menjadi bidang untuk kata kunci dalam ''hash'' bagi kita. 
    var p = document.createElement("input");
 
    // Tambahkan elemen baru tersebut ke dalam formulir kita. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Pastikan kata kunci dalam teks tidak dikirimkan.
    password.value = "";
 
    // Lalu, daftarkan formulirnya. 
    form.submit();
}
 
function regformhash(lp,path) {
     // Memeriksa kelengkapan setiap bidang
		var u = ds('#username'); 
		var a = ds('#access'); 
		var e = ds('#email'); 
		var pa = ds('#pass'); 
		var pr = ds('#passRe'); 
    if (u.value == ''         || 
          a.value == ''     || 
          e.value == ''  || 
          pa.value == '' ||  pr.value == '' || lp == '') {
		
       openWclearPopupRightP('Anda harus menyediakan semua detail yang diperlukan. Silakan coba lagi');
        return false;
    }
 
    // Memeriksa nama pengguna
 
    re = /^\w+$/; 
    if(!re.test(u.value)) { 
        alert("Nama pengguna harus mengandung hanya huruf, angka, dan garis bawah. Silakan coba lagi"); 
        u.focus();
        return false; 
    }
 
    // Memeriksa panjang minimal kata kunci (6 karakter)
    // Hasil pemeriksaan disalin di bawah, tetapi ditampilkan untuk menunjukkan
    // panduan yang lebih spesifik bagi pengguna
    if (pa.value.length < 6) {
        openWclearPopupRightP('Kata kunci harus setidaknya sepanjang 6 karakter. Silakan coba lagi');
        pa.focus();
        return false;
    }
 
    // Setidaknya satu angka, satu huruf kecil dan satu huruf besar
    // Setidaknya enam karakter
     if (a.value != 0 && a.value != 1 ) {
        openWclearPopupRightP('akses pilih 0 atau 1');
        a.focus();
        return false;
    }
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(pa.value)) {
        openWclearPopupRightP('Kata kunci harus mengandung setidaknya satu angka, satu huruf kecil dan satu huruf besar. Silakan coba lagi');
        return false;
    }
 
    // Memastikan kata kunci dan konfirmasinya sama
    if (pa.value != pr.value) {
        openWclearPopupRightP('Kata kunci dan konfirmasi Anda tidak cocok. Silakan coba lagi');
        pa.focus();
        return false;
    }
 
    // Buat masukan elemen baru, ini akan menjadi bidang untuk kata kunci dengan ''hash'' kita. 
    var p = document.createElement("input");
 
    // Tambahkan elemen baru ini ke formulir kita. 
	
 	 var formData = new FormData(); 

		formData.append('username',u.value);
		formData.append('email',e.value);
		formData.append('access',a.value);
		formData.append('p',hex_sha512(pa.value));
		formData.append('lp',hex_sha512(lp));
		formData.append('fkey','hg54fszd#2@vv4^&*75@#r435');
		u='';
		e='';
		a='';
		pa='';
		pr='';
		lp='';

    var xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
            {
		
						var message = xmlHttp.responseText.split('|'); 
				window.parent.openWclearPopupRightP(message[0]);
				
				  // Get a reference to the table
				  let tableRef = document.getElementById('listGambarTabel');

				  // Insert a row at the end of the table
				  let newRow = tableRef.insertRow(-1);


		hapusImg="<svg width='30' height='30' id='icoOpen'><path d='M5,5 25,25' stroke='red' stroke-width='5'/> <path d='M25,5 5,25' stroke='red' stroke-width='5'/></svg>";
		editImg="<svg width='60' height='30' id='icoOpen'><path d='M0,0 30,0 45,30 15,30  0,0' fill='white'/>  <path d='M7,5 28,5' stroke='silver'/> <path d='M10,10 30,10' stroke='silver'/> <path d='M12,15 28,15' stroke='silver'/> <path d='M15,20 35,20' stroke='silver'/>  <path d='M17,25 37,25' stroke='silver'/>  <path d='M37,3 20,15 24,16 25,20  42,8 40,3  24,16 40,3 37,3' fill='brown' /> <path d='M20,15 18,21 25,20 24,16 20,15' fill='#f3c893' /><path d='M20,17 18,21 22,20 22,16 20,17' fill='#9c9a9a' /></svg>";
		
					newRow.insertCell(0).appendChild(dctn(message[1]));
					newRow.insertCell(1).appendChild(dctn(message[2]));
					newRow.insertCell(2).appendChild(dctn(message[3]));
					newRow.insertCell(3).appendChild(dctn(message[4]));
					newRow.insertCell(4).appendChild(dctn(message[5]));
					newRow.insertCell(5).appendChild(dctn(message[6]));
					newRow.insertCell(6).innerHTML="<a href='#' onclick='bukaEditorPassword("+message[1]+")'>"+editImg+"</a>";
					newRow.insertCell(7).innerHTML="<a href='#' onclick='hpsak("+message[1]+")'>"+hapusImg+"</a>";
					
				closeNavRight();
            }
        }
        xmlHttp.open("post", path); 
        xmlHttp.send(formData); 
}
	function iSizeFont(path){
		if(ds('.editsfnt')== null){
		var panel = new ce('div');
		panel.sa('class', 'editsfnt');
		panel.sp="fixed";
		panel.st="calc(50% - 50px)";
		panel.sl="calc(50% - 75px)";
		panel.szi="11";
		panel.sbc="#dadada";
		panel.sh="100px";
		panel.sw="200px";
		panel.spd="10px";
		var iSize = new ce('input');
		    iSize.sa('class', 'iSizeFont');
			iSize.sw="100px";
			iSize.sa('type','password');
		var button = dc("input");
			button.type = "button";
			button.value = "Konfirmasi";
			button.onclick = function(){
			regformhash(dsv('.iSizeFont'),path);
			dsr(".editsfnt");				
			};
		var button2 = dc("input");
			button2.type = "button";
			button2.value = "Batal";
			button2.onclick = function(){
			dsr(".editsfnt");
		};
		
		panel.ac(dctn("Masukan Password"));
		panel.ac(dc("br"));
		panel.ac(iSize.e());
		panel.ac(button);
		panel.ac(button2);
		ac(panel.e());
		}
	}
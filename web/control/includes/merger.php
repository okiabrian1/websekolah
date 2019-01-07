<?php
/*  This services are property of Andy Chilton, http://chilts.org/
    This plugin uses online webservices from javascript-minifier.com and cssminifier.com
    
	simple plugin by Toni Almeida, promatik.
    https://github.com/promatik/PHP-JS-CSS-Minifier/blob/master/minifier.php
    
*/

function mergercss($css,$nama) {
    // setup the URL and read the CSS from a file
    $url = 'https://cssminifier.com/raw';
	
	$hasil='';
	for($i=0;$i<count($css);$i++){
		$handle = file_get_contents($css[$i]);
		$hasil=$hasil.$handle;
	}
	
    $data = array(
        'input' => $hasil,
    );
	
	
    // init the request, set various options, and send it
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);



$fp = fopen("../../css/combine/".$nama,"wb");
fwrite($fp,$result);
}


function mergerjs($js,$nama) {
    // setup the URL, the JavaScript and the form data
    $url = 'https://javascript-minifier.com/raw';
	
	$hasil='';
	for($i=0;$i<count($js);$i++){
		$handle = file_get_contents($js[$i]);
		$hasil=$hasil.$handle;
	}
	
    $data = array(
        'input' => $hasil,
    );

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );


$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$fp = fopen("../../js/combine/".$nama,"wb");
fwrite($fp,$result);
}




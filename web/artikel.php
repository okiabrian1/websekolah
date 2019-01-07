<?php
include_once './control/includes/functions.php';
include_once './control/includes/news_show.inc.php';
if(isset($_GET["id"]) ){
	$idP=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$editData= getNewsImprove($idP, $mysqli)[0];
	$editData['TGL_ditampilkan']=date("m/d/Y", strtotime($editData['TGL_ditampilkan']));
}else{
	$idP="";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Parallax Template - Materialize</title>

  <!-- CSS  -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/artikel.css" type="text/css" rel="stylesheet" media="screen,projection"/>

				<style>
				 .small { font: 10px sans-serif;fill:black; }
				 .small2 { font: 9px sans-serif;fill:black; }
				 .white{fill:white;}
				 .tengah{margin-top:10px;}
				 .post-time{padding-left:10px;}
				 .post-tags{padding-left:10px;}
				 article{margin: 20px; padding: 0px 20px 20px 20px;}
				 .post-title{padding-top:20px;}
				</style>
				<style>
					<?php echo html_entity_decode(htmlspecialchars_decode($editData['css'])); ?>
                </style>
</head>
<body>






    <div class='post-holder container z-depth-1 back white batas-atas'>    
            

		  <nav role="navigation">
  
      <ul class="left">
	  <li>
	   <a href="#" onclick="openNav()" >
		<svg width="30" height="40" id="icoOpen" class="tengah">
        <path d="M0,15 30,15" stroke="white" stroke-width="5" />
        <path d="M0,24 30,24" stroke="white" stroke-width="5"/>
        <path d="M0,33 30,33" stroke="white" stroke-width="5"/>
		</svg>
		</a>
	</li>
       
       
      
      </ul>

		 <h4 class="post-title "><?php echo $editData['headline'] ?></h4>
    
  </nav>
  
        <article class="post tag-getting-started tag-story tag-tutorial">  
              
         <header>        

    
                <div class="post-meta"><span class="author">
				<i><svg width='45' height='30' id='icoOpen'>
				<path d='M0,0 30,0 45,30 15,30  0,0' fill='#f2f4f7'/>  <path d='M7,5 28,5' stroke='silver'/> <path d='M10,10 30,10' stroke='silver'/> <path d='M12,15 28,15' stroke='silver'/> <path d='M15,20 35,20' stroke='silver'/>  <path d='M17,25 37,25' stroke='silver'/>  <path d='M37,3 20,15 24,16 25,20  42,8 40,3  24,16 40,3 37,3' fill='brown' /> <path d='M20,15 18,21 25,20 24,16 20,15' fill='#f3c893' /><path d='M20,17 18,21 22,20 22,16 20,17' fill='#9c9a9a' />
				</svg>
				</i><?php echo $editData['author'] ?>  </span>
                <span class="post-time"><i><svg width='25' height='35' id='icoOpen'>

				<path d='M0,0 25,0 25,12 0,12 ' fill='#993535'/><path d='M0,13 25,13 25,35 0,35 ' fill='#f2f4f7'/><path d='M2.5,13 2.5,33' stroke='silver'/><path d='M12.5,13 12.5,33' stroke='silver'/><path d='M22.5,13 22.5,33' stroke='silver'/> 
				<path d='M2.5,13 22.5,13' stroke='silver'/><path d='M2.5,23 22.5,23' stroke='silver'/><path d='M2.5,33 22.5,33' stroke='silver'/>
				<text x="2" y="10" class="small white">Date</text>
				<text x="4" y="21" class="small2">1</text>
				<text x="14" y="21" class="small2">2</text>
				<text x="4" y="31" class="small2">3</text>
				<text x="14" y="31" class="small2">4</text>
				</svg>
				</i><?php echo $editData['TGL_ditampilkan'] ?></span> </span>  
                <span class="post-tags "><i><svg width='15' height='10' id='icoOpen'>
				<path d='M0,0 10,0 15,5 10,10  0,10' fill='#383838'/></svg></i>Info Sekolah 
         </header>    

         <hr>
	
			<?php echo html_entity_decode(htmlspecialchars_decode($editData['html'])); ?>
            
                   

        </article>  

		  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="white-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>
    </div>

    <ul class="pagination center">
    <li class="disabled"><a href="#!"><svg width="30" height="30" id="icoOpen">
						<path d="M25,5 5,15 25,25" stroke="#000" stroke-width="1"/>
					</svg></a></li>
    <li class="waves-effect"><a href="#!"> <svg width="30" height="30" id="icoOpen">
						<path d="M5,5 25,15 5,25" stroke="#000" stroke-width="1"/>
					</svg></a></li>
  </ul>




  <!--  Scripts-->
<script  defer src="js/loadimage.js"></script>
  </body>
</html>

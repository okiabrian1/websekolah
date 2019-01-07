<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>SMK Negeri 1 Bakam</title>
    <link rel="preload" href="css/combine/index.css" as="style" onload="this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="css/combine/index.css"></noscript>
  
  <script>
    /*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
    !function(a){"use strict";var b=function(b,c,d){function j(a){if(e.body)return a();setTimeout(function(){j(a)})}function l(){f.addEventListener&&f.removeEventListener("load",l),f.media=d||"all"}var g,e=a.document,f=e.createElement("link");if(c)g=c;else{var h=(e.body||e.getElementsByTagName("head")[0]).childNodes;g=h[h.length-1]}var i=e.styleSheets;f.rel="stylesheet",f.href=b,f.media="only x",j(function(){g.parentNode.insertBefore(f,c?g:g.nextSibling)});var k=function(a){for(var b=f.href,c=i.length;c--;)if(i[c].href===b)return a();setTimeout(function(){k(a)})};return f.addEventListener&&f.addEventListener("load",l),f.onloadcssdefined=k,k(l),f};"undefined"!=typeof exports?exports.loadCSS=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
    /*! loadCSS rel=preload polyfill. [c]2017 Filament Group, Inc. MIT License */
    !function(a){if(a.loadCSS){var b=loadCSS.relpreload={};if(b.support=function(){try{return a.document.createElement("link").relList.supports("preload")}catch(a){return!1}},b.poly=function(){for(var b=a.document.getElementsByTagName("link"),c=0;c<b.length;c++){var d=b[c];"preload"===d.rel&&"style"===d.getAttribute("as")&&(a.loadCSS(d.href,d,d.getAttribute("media")),d.rel=null)}},!b.support()){b.poly();var c=a.setInterval(b.poly,300);a.addEventListener&&a.addEventListener("load",function(){b.poly(),a.clearInterval(c)}),a.attachEvent&&a.attachEvent("onload",function(){a.clearInterval(c)})}}}(this);
  </script>
</head>
<body>
    
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <?php 
        if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) !== false ) {
            $logo = "logo.webp";
        }else{
            $logo = "logo.png";
        }
        ?>
      <a  class="brand-logo center"><img class="brand" src="/image/<?php echo $logo ?>" ></a>

      
      <ul class="left hide-on-med-and-down">
        <li><a href="#">HOME</a></li>
        <li><a href="#">JURUSAN</a></li>
        <li><a href="#">TENTANG</a></li>
       
      
      </ul>

 


      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>

    </div>
  </nav>

   
    <div class="row">
  <div class="slider">
    <ul class="slides">
    </ul>
  </div>
</div>


  <div class="menu2nd">
            <div class="container ">
                <div class="row">
                    <div class="top-left col-sm-11 hidden-xs">
                        <ul class="list-inline">                   
				        <li><a href="#">HOME</a></li>
				        <li><a href="#">JURUSAN</a></li>
				        <li><a href="#">TENTANG</a></li>                  
    				</ul>


                    </div>
                </div>
            </div>
        </div>
        


        

  <div class="container ">
                <div class="row">
<h4 class="heading"><a>Artikel Terbaru</a></h4>
</div>
</div>

<div class="container ">
	<div class="row">
		<div  class="col s12 m12 l12">
            <div id="off" class=" slide1show slideshowHeight row">
				<div class="slideform">
				<div class="slideview"> 
					<div  id="cardview" class="cardview card">
						<div class="card-image"></div>
						<div class="card-content">
							<div class="card-title"></div>
						</div>
					</div>
				</div>
				<div class="slidemenu"> 
					<div  class="button" tabindex="1">
					  <span>				
					<div  id="card1" class="card1 card horizontal m-pointer">
						<div class="card-image"></div>
						<div class="card-content">
							<div class="card-title"></div>
						</div>
					</div>
										</span>
					</div>
					<div  class="button" tabindex="2">
					  <span>
					<div id="card2" class="card2 card horizontal m-pointer">
						<div class="card-image"></div>
						<div class="card-content">
							<div class="card-title"></div>
						</div>
					</div>
					</span>
					</div>
					<div  class="button" tabindex="3">
					  <span>
					<div id="card3" class="card3 card horizontal m-pointer" >
					
						<div class="card-image"></div>
						<div class="card-content">
							<div class="card-title"></div>
						</div>
					
					</div>
					</span>
					</div>
					
					<div  class="geser" >
					<a onclick="updatePost(1,0,0)" id="mundur1" class="geserA-btn" href="javascript:void(0);"> <svg width="30" height="30" id="icoOpen">
						<path d="M25,5 5,15 25,25" stroke="#000" stroke-width="1"/>
					</svg></a>
					
					
					<a onclick="updatePost(1,0,1)" id="maju1"  class="geserA-btn" href="javascript:void(0);">  <svg width="30" height="30" id="icoOpen">
						<path d="M5,5 25,15 5,25" stroke="#000" stroke-width="1"/>
					</svg></a>
					</div>
				</div>
				</div>
            </div> 
        </div>
    </div>  
</div>


	 
<hr>	 	  
<div class="container ">
<div class="row">
              <div  class="col s12 m12 l6">
			  <h4 class="heading"><a>TKJ</a></h4>
                  <div id="off" class=" slide2show slideshowHeight row">
                    <div  class="col s12 m12 ">
                      <div  id="card1" class="card1 card horizontal m-pointer">
                        <div class="card-image">
                         
                        </div>
						<div class="card-content">
                          <div class="card-title">
                        </div>
                        </div>
                      </div>
					  
					  <div id="card2" class="card2 card horizontal m-pointer">
                        <div class="card-image">
                         
                        </div>
						<div class="card-content">
                          <div class="card-title">
                        </div>
                        </div>
                      </div>
					  
					  <div id="card3" class="card3 card horizontal m-pointer">
                        <div class="card-image">
                        
                        </div>
												<div class="card-content">
                          <div class="card-title">
					
                        </div>
                        </div>
                      </div>
					  				  <a onclick="updatePost(2,0,0)" id="mundur2" href="javascript:void(0);">
				  <svg width="30" height="30" id="icoOpen">
						<path d="M25,5 5,15 25,25" stroke="#000" stroke-width="5"/>
					</svg>
					<a>
				  <a onclick="updatePost(2,0,1)" id="maju2"  href="javascript:void(0);">
				    <svg width="30" height="30" id="icoOpen">
						<path d="M5,5 25,15 5,25" stroke="#000" stroke-width="5"/>
					</svg>
				</a>
                    </div>
					
					
                  </div>

              </div>
			               <div  class="col s12 m12 l6">
						     <h4 class="heading"><a>TKR</a></h4>
                  <div id="off" class=" slide3show slideshowHeight row">
                    <div  class="col s12 m12 ">
                      <div  id="card1" class="card1 card horizontal m-pointer">
                        <div class="card-image">
                         
                        </div>
						<div class="card-content">
                          <div class="card-title">
                        </div>
                        </div>
                      </div>
					  
					  <div id="card2" class="card2 card horizontal m-pointer">
                        <div class="card-image">
                         
                        </div>
						<div class="card-content">
                          <div class="card-title">
                        </div>
                        </div>
                      </div>
					  
					  <div id="card3" class="card3 card horizontal m-pointer">
                        <div class="card-image">
                        
                        </div>
												<div class="card-content">
                          <div class="card-title">
					
                        </div>
                        </div>
                      </div>
					  <a onclick="updatePost(3,0,0)" id="mundur3" href="javascript:void(0);"><svg width="30" height="30" id="icoOpen">
						<path d="M25,5 5,15 25,25" stroke="#000" stroke-width="5"/>
					</svg></a>
				  
				  <a onclick="updatePost(3,0,1)" id="maju3"  href="javascript:void(0);">  <svg width="30" height="30" id="icoOpen">
						<path d="M5,5 25,15 5,25" stroke="#000" stroke-width="5"/>
					</svg></a>
                    </div>
					
					
                  </div>
				  
              </div>
          </div>
		  
      </div> 
</div>	  
	  
	  
 <footer class="page-footer light-blue darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
           <h5 itemprop="name">SMK NEGERI 1 BAKAM</h5>
    <address>
        <p>
            <i class="tiny material-icons">map</i> Jl. Raya Pangkalpinang Mentok Km.38 Desa Bakam Kec. Bakam, Bangka – Bangka Belitung 33252<br>
            <i class="tiny material-icons">phone</i>69830142<br>                        
             <i class="tiny material-icons">mail</i> smknsatubakam@gmail.com <br>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text"></h5>
          <ul>

          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text"></h5>
          <ul>

          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
<script  defer src="js/combine/index.js"></script>
  </body>
</html>
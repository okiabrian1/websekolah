<?php
define ("da",  "12wr35gs56dg7878hjgh9!@#8ewredserlh435r^&*%##@432h*()54354%!5kjh3alhbx3k6*^^?)(rlkehrf8ds23o3%#!!^^%k24324");
define("jalan", "dddeerwa6534%^$%@4887#23224gf"); 
if(jalan == peta):
include_once 'includes/functions.php';
sec_session_start();
 if(isset($_POST["p"]) ){
include_once 'includes/news.inc.php';
 }
include_once 'includes/db_connect.php';


 if(!isset($_POST["p"]) ):
if (login_check($mysqli) == true) :

$editData= array(
				'id' => "",
				'headline' => "Judul Berita",
				'story' => "Isi berita",
				'author' => "",
				'TGL_ditampilkan' => "",
				'TGL_dibuat' => "",
				'TGL_diubah' => "",
			
			);
if(isset($_GET["id"]) ){

	$idP =inputAngkaValidated('id','get');
	if ($idP === false) {
	header('Location: error.php');
		$idP='';
	
		exit();
	}
	
	$editData= getNews($idP, $mysqli)[0];
	$editData['TGL_ditampilkan']=date("m/d/Y", strtotime($editData['TGL_ditampilkan']));
}else{
	$idP="";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Editor</title>
<link type="text/css" rel="stylesheet" href="css/sidebar.css">
<link type="text/css" rel="stylesheet" href="css/datepicker.css">

	  <style>
	  
	  #isiPost {
			
		 padding-top: 10px;
		 font-size: 24px;
		 margin-right:10px;
		 margin-left:10px;
		  -webkit-box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 margin-bottom:20px;
		 background-color:white;
		 word-break: break-all;
		 min-height:20px;
	  }
	  #isiPost img {
		height: auto;
		max-width: 100%;
	  }
	  .getimage{
		  position:fixed;
		  border:none;
		  width:0;
		  height:0;
		overflow:hidden;
	  }
	  
	  	@media only screen and (max-width:640px){

    		#heading {
    			 margin-top:30px;
    		}
    		  .topnav{
	           display:none;
		  }
	  	}
	  	  
	  	@media only screen and (min-width:641px){

    		#heading {
    			 margin-top:30px;
    		}
	  	}
	  
	    @media only screen and (max-height:549px){
	        .toolbox{
	            width:50px;
	        }
	        .full-content{
	            margin-left:50px;
	        }
	       .topnav{
	           display:none;
		  }
		  .top-mobile{
		       left:60px;
			  position:fixed;
			  z-index:99;
			  top:0px;
			  float:left;
			  display: flex;
			  flex-flow: row wrap;
			  margin-right:7px;
		  }
		  .bottom-mobile{
			  position:fixed;
			  z-index:99;
			  top:25px;
			  left:35px;
			  float:left;
			  display: flex;
			  flex-flow: row wrap;
		  }
		  
	    }
	    
	    @media only screen and (min-width:641px){

    	.top-mobile{
    			left:12%;
    		}
	  	}
	    
	   @media only screen and (min-height:550px){
	       		  .top-mobile{
			  position:fixed;
			  z-index:99;
			  top:0px;
			  float:left;
			  display: flex;
			  flex-flow: row wrap;
			  margin-right:7px;
		  }
		  .bottom-mobile{
			  position:fixed;
			  z-index:99;
			  top:25px;
			  left:35px;
			  float:left;
			  display: flex;
			  flex-flow: row wrap;
		  }
	        .toolbox{
	            width:25px;
	        }
	        .full-content{
	            margin-left:25px;
	        }
	            .top-mobile{
	            left:35px;
	        }
	    }
	    
	    
	    
	  @media only screen and (max-width:430px){

		
		  .topnav{display:none;
		  }
		  #main{
			  padding:0;
			  
		  }
		  #isiPost{
			padding-top:0px;  
		  }

		#heading {
			 margin-top:60px;
		}
		
			.control-panel{
			  position:fixed;
			  z-index:99;
			  top:28px;
			  right:10px;
			  float:left;
			  display: flex;
			  flex-flow: row wrap;
		  }
	  }  
	  
	  @media only screen and (min-width:641px) and (min-height:550px){
		  .top-mobile{
			  position:absolute;
			  z-index:99;
			 left:-30px;
			 top:0px;
			 width:30px;
			 background-color:#2b9cff;
		  }
		  .bottom-mobile{
			  position:absolute;
			  z-index:99;
			 left:-30px;
			 top:0;
		  }
		  	#isiPost img {
			max-width: 100%;
			}
		#heading {
			 margin-top:20px;
		}
			.control-panel{
			  position:fixed;
			  z-index:99;
			  bottom:0;
			  right:10px;
			  float:left;
			  display: flex;
			  flex-flow: row wrap;
		  }

	  }


	  
		html {
		  font-family: "Helevetica", sans-serif;
		}

		body {
	
		  font-weight: 100;
		 margin:0;
		}

		div:focus {
		  outline: none;
		}

		#heading {
		  		 -webkit-box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 margin-bottom:20px;
		
		  margin-left:10px;
		   margin-right:10px;
		   		 background-color:#4286f4;
				 padding-bottom:10px;
				 padding-right:10px;
				 padding-left:10px;
				 
		}
		#judulPost{
			width:100%;
			border: 0;
		}

		


	
		
	.popupRight .closebtn {	
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
	}
	.popupRight p{
		width:350px;
	}

	.popupRight h1 {
		color:#995511;
		}
	
	.popupRight {
		height: 200px; /* 100% Full-height */
		width: 0; /* 0 width - change this with JavaScript */
		 z-index: 10; /* Stay on top */
		position:fixed;
		right: 0;
		overflow-x: hidden; /* Disable horizontal scroll */
		overflow-y: hidden; /* Disable vertical scroll */
		background-color:#403F3A;
		 transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */

		 
	}

	.popupRight .iPopup {
	background-color: #403F3F;
	padding-right:10px;
	padding-left:10px;
	}

	.popupRight .ibox {
	background-color: #403F3F;

	}
	.popupRight input {
		margin-bottom:5px;
		padding:5px;

	}

	.popupRight p {
		padding: 0px;
		text-decoration: none;
		font-size: 12px;
		color: #C4C4C4;
		display: block;
		transition: 0.3s
	}

	.popupRight a {
		padding: 8px 8px 8px 32px;
		text-decoration: none;
		font-size: 25px;
		color: #C4C4C4;
		display: block;
		transition: 0.3s
	}

	/* When you mouse over the navigation links, change their color */
	.popupRight a:hover, .offcanvas a:focus{
		color: #f1f1f1;
	}

	.popupRight li {
	 background:#F2F2F2;
	 width: 100%;
	 }

	 .popupRight li:hover{
	 background:#555353;
	 }


		.btn-editor{width:25px;height:25px; background-color:#2b9cff;}
		.btn-editor:hover{background-color:#0081f2; cursor:pointer; }
		.small { font: 9px sans-serif;fill:black;font-weight:bold; }
		.super-small { font: 3px sans-serif;fill:black;font-weight:bold; }
		.agak-small { font: 6px sans-serif;fill:black;font-weight:bold; }
		.super-small-sedikit { font: 3px sans-serif;fill:black;font-weight:bold; }
		.transparent {fill:rgba(124,240,10,0.0) }
		.italic{font-style:italic;}
		.underline{font-style:underline;}
		
	.toolbox{
		 transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
		 -webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		
		 position:fixed;
		 display:flex;
		 min-width:25px;
		 flex-wrap: wrap;
		 background-color:#2b9cff;
	}
	.toolbox>* {
          flex: 0 0 50%;
      }
	.editor{float:left; 
		display: flex;
		 flex-flow: row wrap;
		height:100%;
		width:100%;
		 
   }
   .full-content{
	   width:100%;
	   height:auto;
	  background-color:#d1d1d1;
	  -webkit-box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
   }
		
	.extension-header{
		display:none;
		position:fixed;
			  z-index:99;
			  top:0;
			  left:0;
		
	}
		.extension-font{
		display:none;
		position:fixed;
			  z-index:99;
			  top:0;
			  left:0;
		
	}
	.input-tgl{
		display: flex;
	}
		.input-tgl input{
		
	}
	.input-tgl div{
		padding:5px;
	}
	.edit-image{
  resize: both; overflow: hidden;;
	}
	.edit-image img{
	width:100%; height:100%;
	}
				</style>
				
	</head>
<input type="hidden" name="userID" id="userID" value="<?php echo getClearSession('user_id')  ?>" />	
<div id="sideNavigation" class="sidenav">
<div class="t-control">
<h1>Control<h1>
</div>
  <li><a href="<?php siteURL() ?>/control/news.php">Daftar Berita</a></li> 
  <li><a href="<?php siteURL() ?>/control/akun.php">Daftar Akun</a></li> 

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   
</div>


<input type="hidden" id="PostID" name="PostID" value="<?php echo $idP ?>">

<div id="sideNavigationRight" class="sidenavRight">
<div id="ibox" class="ibox">
	<div id="iSave" class="iSave">
		<h1>Save</h1>
		<p>Waktu ditampilkan</p>
		<div class="input-tgl">
		<input type="text" id="popupDatepicker" name="popupDatepicker" class="datepicker formVal" value="<?php echo $editData['TGL_ditampilkan'] ?>">
		</div>
		</div>
		<li><a href="javascript:void(0)" onclick="return Saformn('<?php echo esc_url($_SERVER['PHP_SELF'])."?aksi=editor"; ?>')">Simpan</a></li>  

		<li><a href="javascript:void(0)" class="closebtn" onclick="closeNavRight()">Batal</a></li>  
   </div>
</div>
 
<div id="popupControl" class="popupControl popupRight">
<div id="ibox" class="ibox">
	<div id="iPopup" class="iPopup"></div>
   </div>
</div>

<div id="popupRight" class="popupRight">
<div id="ibox" class="ibox">
	<div id="iPopup" class="iPopup"></div>
   </div>
		<a href="javascript:void(0)" class="closebtn" onclick="closePopupRight()">&times;</a> 
</div>

<nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="30" height="30" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
    </svg>
  </a>
</nav>
  
 <div id="main"> 
   <div class="editor">
  <div class="toolbox">
  	<div title="Bold" onclick="de('bold', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">B</text>
				</svg>
	</div>		
	<div title="Mengubah jenis font" class =" mjf" onclick="fontname();"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">F</text>
				</svg>
	</div>	
	<div title="Mengubah ukuran font" class="muf" onclick="fontSize();"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">F</text>
				<text x="6" y="7.5" class="super-small">12</text>
				</svg>
	</div>
	<div title="Mengubah warna font" class ="mwf" onclick="forecolor();"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">F</text>
				<text x="6" y="7.5" class="super-small">c</text>
				</svg>
	</div>
	<div title="Add image"  class="addimageclass" onclick="getImage()"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M1,2 9,2 9,8 1,8' fill="white"/>
				<path d='M2.5,6 L3.5,4 l1,1 l1,-2 l2,3 z' stroke="#000000" stroke-width="0.1" />

                img
				</svg>
	</div>
	<div title="Italic"  onclick="de('italic', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small italic">
                a
				</text>
				</svg>
	</div>
	<div title="underline" onclick="de('underline', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">
                a
				</text>
				<path d='M1,8 9,8 9,9 1,9 '/>
				</svg>
	</div>
	<div title="strikeThrough"  onclick="de('strikeThrough', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">
                a
				</text>
				<path d='M1,5 9,5 9,6 1,6 '/>
				</svg>
	</div>
	<div title="Subscript" onclick="de('subscript', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">
                a
				</text>
				<text x="7" y="9" class="super-small">
                2
				</text>
				</svg>
	</div>
	<div title="Superscript" onclick="de('superscript', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">
                a
				</text>
				<text x="7" y="3" class="super-small">
                2
				</text>
				</svg>
	</div>
		<div title="Membuat link"  onclick="createlink();"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 50 50" >
					    <defs>
						<pattern id="kotak" 
						width="1" height="1"
						patternUnits="userSpaceOnUse">
						<polygon points="0,0 1,0 1,1 0,1"/>
						</pattern>
						</defs>
				<path d='M0,0 50,0 50,50 0,50' class="transparent" />
				<rect stroke="url(#kotak)" stroke-width="2px" x="3.5" y="19.5" width="20" height="10" rx="1" ry="1"  class="transparent"/>
				<rect x="15.5" y="22.5" width="20" height="4" rx="1" ry="1" />
				<rect stroke="url(#kotak)" stroke-width="2px" x="28.5" y="19.5" width="20" height="10" rx="1" ry="1"  class="transparent"/>
				</svg>
	</div>
	<div title="Menghapus link"  onclick="de('unlink', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 50 50" >
					    <defs>
						<pattern id="kotak" 
						width="1" height="1"
						patternUnits="userSpaceOnUse">
						<polygon points="0,0 1,0 1,1 0,1"/>
						</pattern>
						</defs>
				<path d='M0,0 50,0 50,50 0,50' class="transparent" />
				<rect stroke="url(#kotak)" stroke-width="2px" x="6" y="19.5" width="15" height="10" rx="1" ry="1"  class="transparent"/>
				<rect x="15.5" y="22.5" width="20" height="4" rx="1" ry="1" />
				<rect stroke="url(#kotak)" stroke-width="2px" x="28.5" y="19.5" width="15" height="10" rx="1" ry="1"  class="transparent"/>
				<path d='M0,22 50,22 50,25 0,25' fill='#aa0000'/>
				</svg>
	</div>	
	<div title="Ordered list" onclick="de('insertorderedlist', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="1" y="3" class="super-small-sedikit">1</text><text x="1" y="6" class="super-small-sedikit">2</text><text x="1" y="9" class="super-small-sedikit">3</text>
				<path d='M3,2 9,2 ' stroke="black" stroke-width="1"/>
				<path d='M3,5 9,5 ' stroke="black" stroke-width="1"/>
				<path d='M3,8 9,8 ' stroke="black" stroke-width="1"/>
				</svg>
	</div>

	
	<div title="unOrdered list" onclick="de('insertunorderedlist', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<circle cx="1.5" cy="3" r="0.75"/>  <circle cx="1.5" cy="5" r="0.75"/>  <circle cx="1.5" cy="7" r="0.75"/>
				<path d='M3,3 9,3 ' stroke="black" stroke-width="1"/>
				<path d='M3,5 9,5 ' stroke="black" stroke-width="1"/>
				<path d='M3,7 9,7 ' stroke="black" stroke-width="1"/>
				</svg>
	</div>
		  	<div title="Header" class ="hdr"  onclick="jenisheader()"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">H</text>
				</svg>
		</div>
	<div class="extension-font" >
	<div title="Naikan ukuran font" onclick="de('increasefontsize', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M2,7 5,2 8,7 7,7 5,3  '/>

				</svg>
	</div>		
	<div title="Mengubah ukuran font" onclick="iSizeFont()"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="2" y="7.5" class="small">F</text>
				<text x="6" y="7.5" class="super-small">n</text>
				</svg>
	</div>
	<div title="Turunkan ukuran font" onclick="de('decreasefontsize', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M2,3 5,8 8,3 7,3 5,3 '/>
				</svg>
	</div>	
	
	</div>
	<div class="extension-header" >
	  	<div title="H1" onclick="de('formatBlock', false, '<h1>');"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="1" y="7.5" class="agak-small">H1</text>
				</svg>
		</div>
		<div title="H2" onclick="de('formatBlock', false, '<h2>');"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="1" y="7.5" class="agak-small">H2</text>
				</svg>
		</div>
		<div title="H3" onclick="de('formatBlock', false, '<h3>');"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="1" y="7.5" class="agak-small">H3</text>
				</svg>
		</div>
		<div title="H4" onclick="de('formatBlock', false, '<h4>');"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<text x="1" y="7.5" class="agak-small">H4</text>
				</svg>
		</div>
		<div title="Hapus header" onclick="removeH();"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M2,2 8,8 ' stroke="red" stroke-width="1"/>
				<path d='M8,2 2,8 '  stroke="red" stroke-width="1"/>
				</svg>
		</div>
	</div>
	<div class="top-mobile" >
		<div title="Rata Kiri" onclick="de('justifyLeft', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M1,3 7,3 ' stroke="black" stroke-width="1"/>
				<path d='M1,5 9,5 ' stroke="black" stroke-width="1"/>
				<path d='M1,7 4,7 ' stroke="black" stroke-width="1"/>
				</svg>
			</div>
			<div title="Rata Tengah"  onclick="de('justifyCenter', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
						<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
						<path d='M2,3 8,3 ' stroke="black" stroke-width="1"/>
						<path d='M3,5 7,5 ' stroke="black" stroke-width="1"/>
						<path d='M2,7 8,7 ' stroke="black" stroke-width="1"/>
						</svg>
			</div>
			<div title="Rata Kanan"  onclick="de('justifyRight', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
						<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
						<path d='M7,3 9,3 ' stroke="black" stroke-width="1"/>
						<path d='M1,5 9,5 ' stroke="black" stroke-width="1"/>
						<path d='M4,7 9,7 ' stroke="black" stroke-width="1"/>
						</svg>
			</div>
			<div title="Rata Kanan-Kiri"  onclick="de('justifyFull', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
						<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
						<path d='M1,3 9,3 ' stroke="black" stroke-width="1"/>
						<path d='M1,5 9,5 ' stroke="black" stroke-width="1"/>
						<path d='M1,7 9,7 ' stroke="black" stroke-width="1"/>
						</svg>
			</div>
	<div title="Undo" onclick="de('undo', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M1,5 1,2 9,2 9,7 5,7 5,9 2,6.5  5,4 5,6 8,6 8,3 2,3 2,5   ' />
				</svg>
	</div>
	<div title="Redo" onclick="de('redo', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M1,5 1,2 9,2 9,7 5,7 5,9 2,6.5  5,4 5,6 8,6 8,3 2,3 2,5 ' transform="translate(10,0) scale(-1, 1) "/>
				</svg>
	</div>
	<div title="Hapus Format"  onclick="de('removeFormat', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M 2,1 8,1 9,2 9,6 8,7 2,7 1,6 1,2 ' fill="white "/>
				<path d='M 3,2.5 7,2.5 ' stroke="black" stroke-width="1"/>
				<path d='M 2,4 8,4 ' stroke="black" stroke-width="1"/>
				<path d='M 2,5.5 8,5.5 ' stroke="black" stroke-width="1"/>
				<path d='M 5,5 8,8 ' stroke="red" stroke-width="1"/>
				<path d='M 8,5 5,8 ' stroke="red" stroke-width="1"/>
				</svg>
	</div>
	<div title="Select All" onclick="de('selectAll', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M 2,1 8,1 9,2 9,6 8,7 2,7 1,6 1,2 ' fill="white "/>
				<path d='M 3,2.5 7,2.5 ' stroke="blue" stroke-width="1"/>
				<path d='M 2,4 8,4 ' stroke="blue" stroke-width="1"/>
				<path d='M 2,5.5 8,5.5 ' stroke="blue" stroke-width="1"/>
				</svg>
	</div>
	<div title="Copy"  onclick="de('copy', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M 2,1 8,1 9,2 9,6 8,7 2,7 1,6 1,2 '  fill="#b5b5b5 "/>
				<path d='M 3,2.5 7,2.5 ' stroke="black" stroke-width="1"/>
				<path d='M 2,4 8,4 ' stroke="black" stroke-width="1"/>
				<path d='M 2,5.5 8,5.5 ' stroke="black" stroke-width="1"/>
				<path d='M 4,3 10,3 11,4 11,8 10,9 4,9 3,8 3,4 'fill="#d6d6d6 "/>
				<path d='M 5,4.5 9,4.5 ' stroke="black" stroke-width="1"/>
				<path d='M 4,6 10,6 ' stroke="black" stroke-width="1"/>
				<path d='M 4,7.5 10,7.5 ' stroke="black" stroke-width="1"/>
				</svg>
	</div>
		<div title="Cut"  onclick="de('cut', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 50 50" >
					    <defs>
						<pattern id="kotak" 
						width="1" height="1"
						patternUnits="userSpaceOnUse">
						<polygon points="0,0 1,0 1,1 0,1"/>
						</pattern>
						</defs>
				<path d='M0,0 50,0 50,50 0,50' class="transparent" />
				<rect stroke="url(#kotak)" stroke-width="2px" x="3.5" y="19.5" width="15" height="10" rx="1" ry="1"  class="transparent"   transform="matrix(1 0.5 -0.5 1 15 -10)" />/>
				<path d='M 20,25 45,40 ' stroke="black" stroke-width="4"/>
				<rect stroke="url(#kotak)" stroke-width="2px" x="3.5" y="39" width="15" height="10" rx="1" ry="1"  class="transparent" transform="matrix(1 -0.5 0.5 1 -20 5)"/>
				<path d='M 20,40 45,20 ' stroke="black" stroke-width="4"/>
				</svg>
	</div>
				<div title="Geser kiri" onclick="de('outdent', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M4,2 9,2 ' stroke="black" stroke-width="1"/>
				<path d='M4,5 9,5 ' stroke="black" stroke-width="1"/>
				<path d='M4,8 9,8 ' stroke="black" stroke-width="1"/>
				<path d='M2,1 1,2.5  2,3.5 2,2.75 3,2.75 3,1.75 2,1.75' fill='black'/>
				<path d='M2,4 1,5.5  2,6.5 2,5.75 3,5.75 3,4.75 2,4.75 ' fill='black'/>
				<path d='M2,7 1,8.5  2,9.5 2,8.75 3,8.75 3,7.75 2,7.75 ' fill='black'/>
				</svg>
			</div>
			<div title="Geser kanan" onclick="de('indent', false, null);"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M4,2 9,2 ' stroke="black" stroke-width="1"/>
				<path d='M4,5 9,5 ' stroke="black" stroke-width="1"/>
				<path d='M4,8 9,8 ' stroke="black" stroke-width="1"/>
				<path d='M1,2  2,1.75 2,1 3,2.5  2,3.5 2,2.75 1,2.75  ' fill='black'/>
				<path d='M1,5  2,4.75 2,4 3,5.5  2,6.5 2,5.75 1,5.75   ' fill='black'/>
				<path d='M1,8  2,7.75 2,7 3,8.5  2,9.5 2,8.75 1,8.75  ' fill='black'/>
				</svg>
			</div>
	</div>
		<div class="bottom-mobile" >
		</div>
		<div class="control-panel" >
			<div title="Panel"  onclick="openNav()"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 10 10" >
				<path d='M0,0 10,0 10,10 0,10 '  class="transparent"/>
				<path d='M1,3 9,3 ' stroke="black" stroke-width="1"/>
				<path d='M1,5 9,5 ' stroke="black" stroke-width="1"/>
				<path d='M1,7 9,7 ' stroke="black" stroke-width="1"/>
				</svg>
			</div>
			<div title="Save"  onclick="openNavRight()"  onmousedown="event.preventDefault();"><svg class="btn-editor" viewBox="0 0 40 40" >
			<path d="M15,0 15,15" style="fill:none;stroke:#000000;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
			<path d="M20,0 20,18" style="fill:none;stroke:#000000;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
			<path d="M25,0 25,15" style="fill:none;stroke:#000000;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1" />
			<path d="M7,14 20,25 33,14" style="fill:none;stroke:#000000;stroke-width:3;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:3;stroke-dasharray:none;stroke-opacity:1" />
			<path d="M2,25 2,38 38,38 38,25" style="fill:none;stroke:#000000;stroke-width:5;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:3;stroke-dasharray:none;stroke-opacity:1" />
			</svg>
			</div>
		</div>
	
	</div>
	<input type="hidden" name="author" class="formVal" value="<?php echo getClearSession('user_id')  ?>" />
	<div class="full-content">
		 <div id= "heading">
			Judul Post:		 
		  <input type="text" id = "judulPost" class="formVal" name="headline" value ="<?php echo $editData['headline'] ?>">
		  </div>	
		 <div id="isiPost"  class="formVal" name="story" contenteditable="true" designMode="on">
		 <?php echo $editData['story'] ?>
		 </div>
		 </div>
	</div>
<hr>
 <iframe class= "getimage" name ="my_iframe"  src =""></iframe>
 <script defer type="text/javascript" src="js/edloa.js" charset="utf-8"></script>
 </div>

<div class="footer">
</div>
</body>
	<script defer src="js/mylib.js" type="text/javascript"  charset="utf-8"></script>
	<script defer src="js/slide-sidebar.js"  type="text/javascript" charset="utf-8"></script>
	<script defer src="js/formun.js" type="text/javascript"  charset="utf-8"></script>	  
	<script defer src="js/datepicker.js" type="text/javascript"  charset="utf-8"></script>	 
	<script defer src="js/editor.js"></script>
</html>
        <?php else : 

               header('Location: error.php');
      
         endif;
      
         endif;	
		 else :
				header('Location: error.php');
         endif; 
		 ?>


<?php
define ("da",  "12wr35gs56dg7878hjgh9!@#8ewredserlh435r^&*%##@432h*()54354%!5kjh3alhbx3k6*^^?)(rlkehrf8ds23o3%#!!^^%k24324");
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
$result=generateinfo($mysqli);

?>
<!DOCTYPE html>
<html>
    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Login</title>
<style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      background-color: #256edb;
    }

    main {
      flex: 1 0 auto;
    }
	 @media only screen and (max-width:640px){
		 .container{
		width:101vw;
		height:auto;
		margin-top:-10px;
		margin-left:-10px;
		background-color:#359dff;
		-webkit-box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
	}
		.form{
		display: inline-block;
		padding: 32px 50px 0px 50px;
	}
	label{
    width: 200px;
    word-wrap: break-word;
	display:block;
	}

	 }
	@media only screen and (min-width:641px){
		 .container{
		width:500px;
		height:350px;
		margin-left:calc(50vw - 250px);
		background-color:#359dff;
		-webkit-box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
	}
		.form{
		display: inline-block;
		padding: 32px 50px 0px 50px;
		margin-top: 5%;
		border: 1px solid #fff;
		margin-left: 5%;
	}
	.img-logo {

		  transform: translate(40%, 0%);
		}
			 	@media only screen and (min-height:460px){
		 .container{
	margin-top:calc(50vh - 225px);
		}
	 }


	 }
	 
	 
		 
	
	.row{
		margin-top:10px;
		transform: translate(10%, 0%);
	}
    

	label, p{
	color:#060c67cc;
	}
	input{
		border:none;
					 		-webkit-box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
	}
	
    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #1724ebcc;
	   -webkit-transition-duration: 0.4s; /* Safari */
      transition-duration: 0.4s;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #1724ebcc;
	  	   -webkit-transition-duration: 0.1s; /* Safari */
      transition-duration: 0.1s;

    }
	.submit{
		width:150px;
		height:50px;
		   background: #008cff; 
		     border: 2px solid #008cff;
			 		-webkit-box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 box-shadow:0 0.5px 0.5px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12),0 1px 5px 0 rgba(0,0,0,.2);
		 margin-left:calc(50% - 75px);
		       border: none;
      color: white;
      padding: 16px 32px;
      text-align: center;
      display: inline-block;
      font-size: 16px;
      -webkit-transition-duration: 0.2s; /* Safari */
      transition-duration: 0.2s;
      cursor: pointer;
      text-decoration: none;
      text-transform: uppercase;
	  margin-bottom:20px;
	}
	 .submit:hover {
      background-color: #00569b;
      color: white;
 }
  </style>
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Log masuk gagal!</p>';
        }
        ?> 
      <div class="container">
        <div class="form">		      

            <img class="img-logo" src="../image/logo.png">
          <p>Silahkan Login Dengan Username dan Password Anda</p>
        <form action="includes/process_login.php" method="post" name="login_form">   
		<div class='row'>		
		<?php	
					  echo"huruf (1-5 ";
		if($result["a1"]!=-1){
			if($result["a1"] !=0)
				echo ','.($result["a1"]+5).' ';
			else
				echo ',acak ';
		}
		
		if($result["a2"] != 0){
			if($result["a2"] !=-1)
				echo ', '.($result["a2"]+5).' ';
			else
				echo ',acak ';
		}
		echo")<br/>";
		?>
		   <div class='input-field' >
           <input type="text" name="usl" id="usl" />
					  <label for='username'>Masukan Username</label>
		 </div>	
		 </div>	
		 <div class='row'>	
		<div class='input-field' >		 
          <input type="password" 
                             name="password" 
                             id="password"/>
			<label for='password'>Masukan Password</label>
			 </div>
			 </div>	
			<input id="awdawd" name="awdawd" type="hidden" value="<?php sleep(rand(1, 3)); echo $result["ket"] ?>" />
			<input id="lk" name="lk" type="hidden" value="wadawdagefes^%#&(!()dwadwa(&_@QPOU!@#2937297312302143476" />			
                   <br />
			<input type="button" class='submit' 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
 
   
 </div>	 </div>	 
    </body>
	    <script defer type="text/JavaScript" src="js/sha512.js"></script> 
        <script defer type="text/JavaScript" src="js/forms.js"></script> 
</html>
<?php require('Connections/ePenilai.php'); ?>
<?php

session_start();
  
      $user = $_POST["username"];
      $pass = $_POST["password"];
      
      $login = $mysqli->query("SELECT * FROM login WHERE noIC = '$user' AND password='$pass'");
      $res = mysqli_fetch_assoc($login);
     
     if ($_SESSION['MM_Username'] || $_COOKIE["user"])
     {
         header("Location:autologin.php");
         exit;
     }
     /*autologin end*/ 
     
      if(isset($_POST["submit"]))
     {
 
            if($res)
            {
                if(!empty($_POST["remember"]))
                {
                    setcookie ("user", $user, time() + (86400 * 30 * 30), "/");
                    setcookie ("pass", $pass, time() + (86400 * 30 * 30), "/");
                }
                else
                {
                    if(isset($_COOKIE["user"]))
                    {
                        setcookie ("user", "");
                    }
                    if(isset($_COOKIE["pass"]))
                    {
                        setcookie ("pass", "");
                    }
                }
            }
            else
            {
                $msg = "Invalid Username or Password";
            }
        
            if($res["aksesLevel"] == "pp")
            {
                $_SESSION['MM_Username'] = $res['noIC'];
                $_SESSION['aksesLevel'] = $res["aksesLevel"];
                $_SESSION['password'] = $res["password"];
                header('Location:mainPP.php');
            }
            else if($res["aksesLevel"] == "p")
            {
            $_SESSION['MM_Username'] = $res['noIC'];
            $_SESSION['aksesLevel'] = $res["aksesLevel"];
            $_SESSION['password'] = $res["password"];
            header('Location:main_menu.php');
            }
            else if($res["aksesLevel"] == "kpp")
            {
            $_SESSION['MM_Username'] = $res['noIC'];
            $_SESSION['aksesLevel'] = $res["aksesLevel"];
            $_SESSION['password'] = $res["password"];
            header('Location:mainKPP.php');
            }
            else if($res["aksesLevel"] == "Belum sah")
            {
            $_SESSION['MM_Username'] = $res['noIC'];
            $_SESSION['aksesLevel'] = $res["aksesLevel"];
            $_SESSION['password'] = $res["password"];
            header('Location:denied.php');
            }
            else
            {
            header('Location:index.php?message=fail');
            }
                   
     }
     
?>
<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ePenilai</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
                        
        <style>
        .avatar {
            vertical-align: middle;
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        </style>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="img/logo.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="stylesheet" href="load.css">
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
        <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
        <script src="buttonNload.js"></script>
		<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
		<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
        <script src="offline.min.js"></script>
        <script src="jquery.min.js"></script>
        <link rel="stylesheet" href="offline-theme-chrome.css">  
        <link rel="stylesheet" href="offline-language-english.css">        
	
    </head>
    
    <body onload="myFunction()">					
    
    <div id="loader"></div>
    
    <div id="myDiv">
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">                                           
                        <a href="index.php"><img src="https://lh3.googleusercontent.com/YngIRyXIlCvf1572b1gKk0-YXANTQr-hb23O4VzGk3eQ7_De6Kyg-13fsTkHHXZnG6pZ=w300" width="100" height="100" alt="Avatar" class="avatar"></a>
                            <h1><strong>Log Masuk e-Penilai</strong></h1>
                            <div class="description">
                            	
                            </div>
                            <div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sudah mendaftar?Jika belum, klik <a href="daftar.php">sini</a></h3>
	                            		<p>Masukkan No. Kad Pengenalan dan kata laluan untuk log masuk:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form action="<?php echo $loginFormAction; ?>" aksesLevel="form" method="POST" class="login-form" name="prosesLogin">
				                        
			<div class="form-group">
			   <span id="sprytextfield4">
			      <input type="text" name="username" placeholder="No. Kad Pengenalan" class="form-username form-control" id="form-username">
			   <span class="textfieldRequiredMsg">Sila masukkan No. Kad Pengenalan</span>
			   <span class="textfieldInvalidFormatMsg">Mesti dalam format nombor.</span>
			   </span>
			 </div>
			   
			   <div class="form-group">
			      <span id="sprytextfield5">
			         <input type="password" name="password" placeholder="Kata Laluan" class="form-password form-control" id="form-password">
			     <span class="textfieldRequiredMsg">Sila masukkan Kata Laluan.</span>
			     </span>
			     </div>
			     
         <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat kata laluan saya
              </label>
            </div>
          </div>
			     
			     <button type="submit" name="submit" class="btn">Log Masuk</button>
				 </div>
                </div>
            </div>
        </div>
        </div>                   
                   
        </div>
       </form> 

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Hakcipta terpelihara SM</p>
        			</div>
        			
        		</div>
        	</div>
        </footer>
</div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        

    <script type="text/javascript">
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
    </script>
    </body>

</html>
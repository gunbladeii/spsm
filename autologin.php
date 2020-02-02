<?php require('Connections/ePenilai.php'); ?>
<?php
      session_start();
      function locationHeader()
      {
          if($_SESSION['aksesLevel'] == "pp")
            {
                header('Location:mainPP.php');
            }
            else if($_SESSION['aksesLevel'] == "p")
            {
            header('Location:main_menu.php');
            }
            else if($_SESSION['aksesLevel'] == "kpp")
            {
            header('Location:mainKPP.php');
            }
      }
      
      locationHeader();
?>
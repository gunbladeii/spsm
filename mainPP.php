<?php require('Connections/ePenilai.php'); ?>
<?php session_start();?>
<?php
session_start();
if($_SESSION['aksesLevel'] != 'pp')
    {
      header('Location:loginFailed.php');  
    }
?>
<?php

$colname_Recordset2 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset2 = $_SESSION['MM_Username'];
}
$Recordset2 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset2'");
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_dataSubjek = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_dataSubjek = $_SESSION['MM_Username'];
}
$dataSubjek = $mysqli->query("SELECT * FROM dataSubjekPP WHERE noIC = '$colname_dataSubjek'");
$row_dataSubjek = mysqli_fetch_assoc($dataSubjek);
$totalRows_dataSubjek = mysqli_num_rows($dataSubjek);

$daftarAliran = $mysqli->query("SELECT * FROM daftarAliran");
$row_daftarAliran = mysqli_fetch_assoc($daftarAliran);
$totalRows_daftarAliran = mysqli_num_rows($daftarAliran);

$daftarTingkatan = $mysqli->query("SELECT * FROM daftarTingkatan");
$row_daftarTingkatan = mysqli_fetch_assoc($daftarTingkatan);
$totalRows_daftarTingkatan = mysqli_num_rows($daftarTingkatan);

$daftarTahun = $mysqli->query("SELECT * FROM dataBengkel GROUP BY tahun ASC");
$row_daftarTahun = mysqli_fetch_assoc($daftarTahun);
$totalRows_daftarTahun = mysqli_num_rows($daftarTahun);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Paparan Admin</title>

    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

   <script>
  $( function() {
    $( "#tarikh" ).datepicker();
  } );
    </script>
  
</head>

<body>
                   <div class="container" style="text-align:center;">
                   <div class="row">
                        <div class="col-sm">
                        <a><i class="fas fa-user-circle fa-w-8 fa-5x"></i></a>
                            <h1>PENYELARAS PROJEK<br/> <?php echo strtoupper($row_Recordset2['nama']); ?>
                            </h1>
                        </div>
                    </div>

<form name="prosesDaftar" class="prosesDaftar" method="post" action="viewMainPP.php">
<hr>

<p><i class="fas fa-calendar"></i> Takwim Penerbitan Buku Teks Sekolah Menengah</p>

<div class="form-group">
    <div class="col-sm-12 shadow p-3 mb-5 bg-white rounded">
<iframe src="https://calendar.google.com/calendar/embed?title=Takwim%20Penerbitan%20Buku%20Teks%20Sekolah%20Menengah&amp;showTitle=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=300&amp;wkst=2&amp;bgcolor=%23ffffff&amp;src=en.malaysia%23holiday%40group.v.calendar.google.com&amp;color=%23853104&amp;src=cej4cqafb84vqqpn65apuihn5g%40group.calendar.google.com&amp;color=%23AB8B00&amp;ctz=Asia%2FKuala_Lumpur" style="border:solid 1px #777" width="300" height="300" frameborder="0" scrolling="no"></iframe>
    </div>
</div>
<hr>

<p><i class="fas fa-search"></i> Ruangan ini digunakan untuk kemudahan penyelaras projek untuk menyemak dan mengesah data penilai yang telah berdaftar melalui sistem ini.</p>

      <div class="form-group">
         <div class="input-group mb-3 shadow p-3 mb-5 bg-white rounded">
                    <select name="tahun" class="custom-select browser-default" required>
                      <option value="">Pilih Tahun</option>
                      <?php do {  ?>
                      <option value="<?php echo $row_daftarTahun['tahun']?>"><?php echo $row_daftarTahun['tahun']?></option>
                      <?php } while ($row_daftarTahun = mysqli_fetch_assoc($daftarTahun)); $rows = mysqli_num_rows($daftarTahun);
  if($rows > 0) {mysqli_data_seek($daftarTahun, 0);$row_daftarTahun = mysqli_fetch_assoc($daftarTahun);} ?>
                    </select>
                    <div class="input-group-append input-group-text">
                      <span class="fas fa-sign-in-alt"></span>
                   </div>
            </div>
        </div>

	<div class="form-group">
         <div class="input-group mb-3 shadow p-3 mb-5 bg-white rounded">
                    <select name="subjekPP" class="custom-select browser-default" required>
                      <option value="">Pilih Judul/Subjek</option>
                      <?php do {  ?>
                      <option value="<?php echo $row_dataSubjek['subjekPP']?>"><?php echo $row_dataSubjek['subjekPP']?></option>
                      <?php } while ($row_dataSubjek = mysqli_fetch_assoc($dataSubjek)); $rows = mysqli_num_rows($dataSubjek);
  if($rows > 0) {mysqli_data_seek($dataSubjek, 0);$row_dataSubjek = mysqli_fetch_assoc($dataSubjek);} ?>
                    </select>
                    <div class="input-group-append input-group-text">
                      <span class="fas fa-book"></span>
                   </div>
            </div>
        </div>

  <div class="form-group"> <!-- Submit Button -->
		
        <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Carian Maklumat</button>&nbsp;
        <a href="logout.php"><button type="button" name="submit" class="btn btn-primary"><i class="fas fa-home"></i></a>
	</div> 
    
</form>
</div>

</body>
</html>
<?php
mysqli_free_result($Recordset2);

mysqli_free_result($dataSubjek);

mysqli_free_result($daftarAliran);

mysqli_free_result($daftarTingkatan);

mysqli_free_result($daftarTahun);
?>

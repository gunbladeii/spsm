<?php require_once('Connections/ePenilai.php'); ?>
<?php session_start();

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}
$Recordset1 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset1'");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Halaman Utama</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="load.css">
		<script src="buttonNload.js"></script>
        
        
  
</head>

<body onload="myFunction()">
    
    <div id="loader"></div>
    
    <div id="myDiv">
    <div class="container">
<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong>Selamat Datang</strong><br/><?php echo ucwords($row_Recordset1['nama']); ?></h1>
                            <?php //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row_Recordset2['gambar'] ).'"/>';?>
                            <div class="description">
                            	<p>
	                            	<Strong></Strong> <br/> Sila baca dengan teliti arahan panduan penggunaan di bawah sebelum memulakan sesi pengisian maklumat
                            	</p>
                                                              
                                <p>1. <strong>Semua medan</strong> maklumat yang dipaparkan hendaklah diisi.</p>
                                <p>2. Kegagalan melengkapkan maklumat yang diperlukan akan menyebabkan <strong>data tidak dapat disimpan</strong> dalam pangkalan data.</p>                                
                                <p>3. Atas faktor keselamatan aplikasi, fungsi butang <strong><em>back</em></strong> pada peranti telefon <strong>tidak diaktifkan.</strong></p>
                                <p>4. Pastikan <strong>semua medan</strong> telah <strong>lengkap diisi</strong> jika ingin ke laman seterusnya.</p>
                                <p>5. Tekan butang <strong><em>home</em></strong> setelah selesai mengisi maklumat.</p>
                            </div>
                        </div>
                    </div>

<form name="simpan" method="post">

<br />

    <div class="form-group">
    <input name="cb" type="checkbox" class="cbox" id="cbox" value="checked"> <a style="font-size:14px">Saya dengan ini faham dan jelas dengan arahan dan panduan yang diberikan dan bertanggungjawab sepenuhnya semasa proses pengisian maklumat dijalankan</a>
    </div>
    
    <div class="form-group"> <!-- Submit Button -->
        <a href="pendaftaran.php">
	  <button type="button" name="submit" class="btn btn-primary btn-lg" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Seterusnya">Setuju</button></a>
    </div>
</form>
</div>


</body>
</html>
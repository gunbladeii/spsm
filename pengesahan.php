<?php require('Connections/ePenilai.php'); ?>
<?php session_start();

$pernahTerlibat = $_POST['pernahTerlibat'];
$judulPenerbit = $_POST['judulPenerbit'];
$aliranPenerbit = $_POST['aliranPenerbit'];
$penerbit = $_POST['penerbit'];
$noIC = $_POST['noIC'];

if (isset($_POST["submit"])){
  $mysqli->query("UPDATE dataPengesahan SET pernahTerlibat='$pernahTerlibat', judulPenerbit='$judulPenerbit', aliranPenerbit='$aliranPenerbit', penerbit='$penerbit' WHERE noIC='$noIC'");
  header("Location: pengakuan.php");
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}

$Recordset1 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset1'");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset2 = $_SESSION['MM_Username'];
}

$Recordset2 = $mysqli->query("SELECT * FROM dataPengesahan WHERE noIC = '$colname_Recordset2'");
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
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
        <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<title>Pengesahan</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="jquery-1.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $("#pernah").change(function (){
            
            if(this.value == 'Pernah') {
                $("#arahan").show();
                $("#judul").show();
                $("#aliran").show();
                $("#penerbit").show();
            }
            else 
            {
                $("#arahan").hide();
                $("#judul").hide();
                $("#aliran").hide();
                $("#penerbit").hide();
            }
        });
    });
    
</script>
</head>
<body>
               <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <div class="description">
                            	<p>
	                            	<Strong>[PENGESAHAN]</Strong> 
                                    
                            	</p>
                            </div>
                        </div>
                   </div>
                    
<form action="<?php echo $editFormAction; ?>" method="POST" name="prosesSumbangan">
<br/>
<div class="row">
<div class="col-sm-8 col-sm-offset-2 text">
<div class="description">
<p>Saya pernah/tidak pernah terlibat dengan penulisan buku teks KPM/buku rujukan.</p>
</div>
</div>
</div>

<div class="form-group">
<label for="pernahTerlibat" class="control-label"></label>
<span id="spryselect1">
<select class="form-control" name="pernahTerlibat" id="pernah">
  <option value="" <?php if (!(strcmp("", $row_Recordset2['pernahTerlibat']))) {echo "selected=\"selected\"";} ?>>Pernah atau Tidak pernah..</option>
  <option value="Pernah" <?php if (!(strcmp("Pernah", $row_Recordset2['pernahTerlibat']))) {echo "selected=\"selected\"";} ?>>Pernah</option>
  <option value="Tidak Pernah" <?php if (!(strcmp("Tidak Pernah", $row_Recordset2['pernahTerlibat']))) {echo "selected=\"selected\"";} ?>>Tidak Pernah</option>
</select>
<span class="selectRequiredMsg">*Wajib - Sila pilih pernah atau tidak pernah.</span></span></div>
<br/>

<div class="row" style="display: none;" id="arahan">
<div class="col-sm-8 col-sm-offset-2 text">
<div class="description">
<p>Jika pernah, Sila Lengkapkan maklumat di bawah</p>
</div>
</div>
</div>

<div class="form-group" id="judul" style="display: none;">
  <label for="judulPenerbit" class="control-label">Judul:</label>
  <span id="sprytextfield1">
  <input name="judulPenerbit" class="form-control" value="<?php if ($row_Recordset2['judulPenerbit'] == null){echo '-';} else {echo $row_Recordset2['judulPenerbit'];}?>" />
  <span class="textfieldRequiredMsg">*Wajib isi.</span></span>
</div>
<br/>
<div class="form-group" id="aliran" style="display: none;">
  <label for="aliranPenerbit" class="control-label">Aliran:</label>
  <span id="sprytextfield2">
  <input name="aliranPenerbit" class="form-control" value="<?php if ($row_Recordset2['aliranPenerbit'] == null){echo '-';} else {echo $row_Recordset2['aliranPenerbit'];}?>" />
  <span class="textfieldRequiredMsg">*Wajib isi.</span></span>
</div>
<br/>
<div class="form-group" id="penerbit" style="display: none;">
  <label for="penerbit" class="control-label">Nama Penerbit:</label>
  <span id="sprytextfield3">
  <input name="penerbit" class="form-control" value="<?php if ($row_Recordset2['penerbit'] == null){echo '-';} else {echo $row_Recordset2['penerbit']; }?>" />
  <span class="textfieldRequiredMsg">*Wajib isi.</span></span>
<br/>
</div>
<input name="noIC" type="hidden" value="<?php echo $row_Recordset1['noIC']; ?>" />
    <div class="form-group"> <!-- Submit Button -->
	    <button type="button" class="btn btn-link-1" onclick="history.back()"><img src="http://www.anc.edu/advising/images/buttons/arrows/arrow-92-xxl.png" width="20" height="20"></button>
        <button type="submit" name="submit" class="btn btn-primary">Seterusnya</button>
        <a href="index.php"><button type="button" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
       
	</div>
    <input type="hidden" name="MM_update" value="prosesSumbangan" />
</form>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
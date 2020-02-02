<?php require('Connections/ePenilai.php'); ?>
<?php session_start();

$namaKecemasan = $_POST['namaKecemasan'];
$telefonKecemasan = $_POST['telefonKecemasan'];
$hubunganWaris = $_POST['hubunganWaris'];
$noIC = $_POST['noIC'];


if (isset($_POST["submit"])){
   $mysqli->query("UPDATE dataWaris SET namaKecemasan='$namaKecemasan', telefonKecemasan='$telefonKecemasan', hubunganWaris='$hubunganWaris' WHERE noIC='$noIC'");
   header("Location: rekodMengajar.php");
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

$Recordset2 = $mysqli->query("SELECT * FROM dataWaris WHERE noIC = '$colname_Recordset2'");
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
        <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
        <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<title>Maklumat Kecemasan</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>

<body>
<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text"> 
                        <a></a>
                          <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <div class="description">
                            	<p>
	                            	<Strong>[Maklumat Waris]</Strong> <br/>Jika berlaku kecemasan, sila hubungi:
                            	</p>
                            </div>
                        </div>
                    </div>
<form action="<?php echo $editFormAction; ?>" method="POST" name="prosesKecemasan" >
<br/>
<div class="form-group">
<label for="nama" class="control-label">Nama:</label>
<span id="sprytextfield1">
<input name="namaKecemasan"  value="<?php echo $row_Recordset2['namaKecemasan']; ?>" class="form-control"/>
<span class="textfieldRequiredMsg">*Wajib - Sila masukkan nama waris yang boleh dihubungi.</span></span></div>
<br/>
<div class="form-group">
<label for="telefonKecemasan" class="control-label">Telefon:</label>
<span id="sprytextfield2">
<input name="telefonKecemasan"  value="<?php echo $row_Recordset2['telefonKecemasan']; ?>" class="form-control"/>
<span class="textfieldRequiredMsg">*Wajib - Sila masukkan no. telefon waris yang boleh dihubungi.</span><span class="textfieldInvalidFormatMsg">Format Nombor Telefon sahaja.</span></span></div>
<br/>
<div class="form-group">
<label for="hubungan" class="control-label">Hubungan:</label>
<span id="spryselect1">
<select name="hubunganWaris" class="form-control">
  <option value="">Hubungan..</option>
  <option value="Bapa" <?php if (!(strcmp("Bapa", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Bapa</option>
  <option value="Ibu" <?php if (!(strcmp("Ibu", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Ibu</option>
  <option value="Saudara mara" <?php if (!(strcmp("Saudara mara", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Saudara mara</option>
  <option value="Rakan" <?php if (!(strcmp("Rakan", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Rakan</option>
  <option value="Isteri" <?php if (!(strcmp("Isteri", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Isteri</option>
  <option value="Suami" <?php if (!(strcmp("Suami", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Suami</option>
   <option value="Kakak" <?php if (!(strcmp("Kakak", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Kakak</option>
    <option value="Abang" <?php if (!(strcmp("Abang", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Abang</option>
    <option value="Adik" <?php if (!(strcmp("Adik", $row_Recordset2['hubunganWaris']))) {echo "selected=\"selected\"";} ?>>Adik</option>
</select>
<span class="selectRequiredMsg">*Wajib - Sila masukkan hubungan anda dengan waris.</span></span></div>
<br/>
<input name="noIC" type="hidden" value="<?php echo $row_Recordset1['noIC']; ?>" />
<div class="form-group"> <!-- Submit Button -->
		<button type="button" class="btn btn-link-1" onclick="history.back()"><img src="http://www.anc.edu/advising/images/buttons/arrows/arrow-92-xxl.png" width="20" height="20"></button>
        <button type="submit" name="submit" class="btn btn-primary">Seterusnya</button>
        <a href="index.php"><button type="button" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
	</div>
<input type="hidden" name="MM_update" value="prosesKecemasan" />
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
</script>
</body>
</html>
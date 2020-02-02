<?php require('Connections/ePenilai.php'); ?>
<?php session_start();

$subjekAjar = $_POST['subjekAjar'];
$tempohMengajar = $_POST['tempohMengajar'];
$sekolahTerkini = $_POST['sekolahTerkini'];
$noIC = $_POST['noIC'];

if (isset($_POST["submit"])){
  $mysqli->query("UPDATE dataMengajar SET subjekAjar='$subjekAjar', tempohMengajar='$tempohMengajar', sekolahTerkini='$sekolahTerkini' WHERE noIC='$noIC'");
  header("Location: rekodAkademik.php");
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

$Recordset2 = $mysqli->query("SELECT * FROM dataMengajar WHERE noIC = '$colname_Recordset2'");
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
<title>Rekod Mengajar</title>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>
<div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <div class="description">
                            	<p>
	                            	<Strong>[Pengalaman Mengajar]</Strong> <br/> Sila lengkapkan semua maklumat berikut:
                            	</p>
                            </div>
                        </div>
                    </div>
<form action="<?php echo $editFormAction; ?>" method="POST" name="prosesMengajar">
<div class="form-group">
<label for="subjekAjar" class="control-label">Mata pelajaran yang diajar:</label>
<span id="sprytextfield1">
<input name="subjekAjar" class="form-control" value="<?php echo $row_Recordset2['subjekAjar']; ?>"/>
<span class="textfieldRequiredMsg">*Wajib - Nyatakan subjek yang yang diajar.</span></span></div>
<br/>
<div class="form-group">
<label for="tempohMengajar" class="control-label">Tempoh (Tahun)</label>
<span id="spryselect2">
<select name="tempohMengajar" class="form-control">
  <option value="">Pilih..</option>
  <option value="Kurang 5 tahun" <?php if (!(strcmp("Kurang 5 tahun", $row_Recordset2['tempohMengajar']))) {echo "selected=\"selected\"";} ?>>Kurang 5 tahun</option>
  <option value="5 - 10 tahun" <?php if (!(strcmp("5 - 10 tahun", $row_Recordset2['tempohMengajar']))) {echo "selected=\"selected\"";} ?>>5 - 10 tahun</option>
  <option value="11 - 15 tahun" <?php if (!(strcmp("11 - 15 tahun", $row_Recordset2['tempohMengajar']))) {echo "selected=\"selected\"";} ?>>11 - 15 tahun</option>
  <option value="16 - 20 tahun" <?php if (!(strcmp("16 - 20 tahun", $row_Recordset2['tempohMengajar']))) {echo "selected=\"selected\"";} ?>>16 - 20 tahun</option>
  <option value="21 tahun ke atas" <?php if (!(strcmp("21 tahun ke atas", $row_Recordset2['tempohMengajar']))) {echo "selected=\"selected\"";} ?>>21 tahun ke atas</option>
</select>
<span class="selectRequiredMsg">*Wajib - Sila pilih tempoh mengajar.</span></span></div>
<br/>
<div class="form-group">
<label for="sekolahTerkini" class="control-label"></label>
<input name="sekolahTerkini" class="form-control" value="<?php echo $row_Recordset2['sekolahTerkini']; ?>" type="hidden"/>
<br/>
<input name="noIC" type="hidden" value="<?php echo $row_Recordset1['noIC']; ?>" />
    <div class="form-group"> <!-- Submit Button -->
	    <button type="button" class="btn btn-link-1" onclick="history.back()"><img src="http://www.anc.edu/advising/images/buttons/arrows/arrow-92-xxl.png" width="20" height="20"></button>
        <button type="submit" name="submit" class="btn btn-primary">Seterusnya</button>
        <a href="index.php"><button type="button" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
	</div>
    <input type="hidden" name="MM_update" value="prosesMengajar" />
</form>
<script type="text/javascript">
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>

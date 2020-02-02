<?php require('Connections/ePenilai.php'); ?>
<?php session_start();

$sumbangan1 = $_POST['sumbangan1'];
$peringkat1 = $_POST['peringkat1'];
$tahun1 = $_POST['tahun1'];
$noIC = $_POST['noIC'];

if (isset($_POST["submit"])){
  $mysqli->query("UPDATE dataSumbangan SET `sumbangan1`='$sumbangan1', `peringkat1`='$peringkat1', `tahun1`='$tahun1' WHERE noIC='$noIC'");

  header("Location: pengesahan.php");
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

$Recordset2 = $mysqli->query("SELECT * FROM dataSumbangan WHERE noIC = '$colname_Recordset2'");
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
<title>Rekod Sumbangan</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>
               <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1><strong><?php echo ucwords($row_Recordset1['nama']); ?></strong></h1>
                            <div class="description">
                            	<p>
	                            	<Strong>[Sumbangan/Penglibatan di Kementerian Pendidikan Malaysia]</Strong>
                            	</p>
                            </div>
                        </div>
                   </div>
                    
<form action="<?php echo $editFormAction; ?>" method="POST" name="prosesSumbangan">
<div class="form-group">
<label for="sumbangan1" class="control-label">Sumbangan/Penglibatan:</label>
<span id="sprytextfield1">
<input name="sumbangan1" class="form-control" id="sumbangan1" value="<?php echo $row_Recordset2['sumbangan1']; ?>" />
<span class="textfieldRequiredMsg">*Wajib - Nyatakan sumbangan anda.Jika tiada,nyatakan "-".</span></span></div>
<br/>
<div class="form-group">
<label for="peringkat1" class="control-label">Peringkat</label>
<select class="form-control" name="peringkat1" >
  <option value="" <?php if (!(strcmp("", $row_Recordset2['peringkat1']))) {echo "selected=\"selected\"";} ?>>Pilih Peringkat..</option>
  <option value="PPD" <?php if (!(strcmp("PPD", $row_Recordset2['peringkat1']))) {echo "selected=\"selected\"";} ?>>PPD</option>
  <option value="JPN" <?php if (!(strcmp("JPN", $row_Recordset2['peringkat1']))) {echo "selected=\"selected\"";} ?>>JPN</option>
  <option value="Bahagian KPM" <?php if (!(strcmp("Bahagian KPM", $row_Recordset2['peringkat1']))) {echo "selected=\"selected\"";} ?>>Bahagian KPM</option>
  <option value="Antarabangsa" <?php if (!(strcmp("Antarabangsa", $row_Recordset2['peringkat1']))) {echo "selected=\"selected\"";} ?>>Antarabangsa</option>
</select>
</div>
<br/>
<div class="form-group">
<label for="tahun1" class="control-label">Tahun Penglibatan</label>
<select name="tahun1" class="form-control" >
  <option value="" <?php if (!(strcmp("", $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>Pilih Tahun..</option>
  <option value="1990" <?php if (!(strcmp(1990, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1990</option>
  <option value="1991" <?php if (!(strcmp(1991, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1991</option>
  <option value="1992" <?php if (!(strcmp(1992, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1992</option>
  <option value="1993" <?php if (!(strcmp(1993, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1993</option>
  <option value="1994" <?php if (!(strcmp(1994, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1994</option>
  <option value="1995" <?php if (!(strcmp(1995, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1995</option>
  <option value="1996" <?php if (!(strcmp(1996, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1996</option>
  <option value="1997" <?php if (!(strcmp(1997, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1997</option>
  <option value="1998" <?php if (!(strcmp(1998, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1998</option>
  <option value="1999" <?php if (!(strcmp(1999, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>1999</option>
  <option value="2000" <?php if (!(strcmp(2000, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2000</option>
  <option value="2001" <?php if (!(strcmp(2001, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2001</option>
<option value="2002" <?php if (!(strcmp(2002, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2002</option>
  <option value="2003" <?php if (!(strcmp(2003, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2003</option>
  <option value="2004" <?php if (!(strcmp(2004, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2004</option>
  <option value="2005" <?php if (!(strcmp(2005, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2005</option>
  <option value="2006" <?php if (!(strcmp(2006, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2006</option>
  <option value="2007" <?php if (!(strcmp(2007, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2007</option>
  <option value="2008" <?php if (!(strcmp(2008, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2008</option>
  <option value="2009" <?php if (!(strcmp(2009, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2009</option>
  <option value="2010" <?php if (!(strcmp(2010, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2010</option>
  <option value="2011" <?php if (!(strcmp(2011, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2011</option>
  <option value="2012" <?php if (!(strcmp(2012, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2012</option>
  <option value="2013" <?php if (!(strcmp(2013, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2013</option>
  <option value="2014" <?php if (!(strcmp(2014, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2014</option>
  <option value="2015" <?php if (!(strcmp(2015, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2015</option>
  <option value="2016" <?php if (!(strcmp(2016, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2016</option>
  <option value="2017" <?php if (!(strcmp(2017, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2017</option>
  <option value="2018" <?php if (!(strcmp(2018, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2018</option>
  <option value="2019" <?php if (!(strcmp(2019, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2019</option>
  <option value="2020" <?php if (!(strcmp(2020, $row_Recordset2['tahun1']))) {echo "selected=\"selected\"";} ?>>2020</option>
</select>
</div>
<br/>
<input name="noIC" type="hidden" value="<?php echo $row_Recordset1['noIC']; ?>" />
    <div class="form-group"> <!-- Submit Button -->
	    <button type="button" class="btn btn-link-1" onclick="history.back()"><img src="http://www.anc.edu/advising/images/buttons/arrows/arrow-92-xxl.png" width="20" height="20"></button>
        <button type="submit" name="submit" class="btn btn-primary">Seterusnya</button>
        <a href="index.php"><button type="button" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
	</div>
    <input type="hidden" name="MM_update" value="prosesSumbangan" />
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>
<?php require('Connections/ePenilai.php'); ?>
<?php session_start();

$back = $_POST['noIC'];

//edit judul and aliran
$judul = $_POST['judul'];
$aliran = $_POST['aliran'];
$noIC = $_POST['noIC'];
$noICEdit = $_POST['noICEdit'];

if (isset($_POST["submit"])){
  $mysqli->query("UPDATE dataBengkel SET judul='$judul', aliran='$aliran' WHERE noIC='$noIC'");
  header("Location: rekodPenilai_admin.php?noIC=$back");
}

//edit noIC

if (isset($_POST["submit"])){
 $mysqli->query("UPDATE login SET noIC='$noICEdit' WHERE noIC='$noIC'");
                       
 $mysqli->query("UPDATE dataBengkel SET noIC='$noICEdit' WHERE noIC='$noIC'");
                       
 $mysqli->query("UPDATE dataMengajar SET noIC='$noICEdit' WHERE noIC='$noIC'");                  
 $mysqli->query("UPDATE dataPendidikan SET noIC='$noICEdit' WHERE noIC='$noIC'");
                       
 $mysqli->query("UPDATE dataPengesahan SET noIC='$noICEdit' WHERE noIC='$noIC'"); 
  
 $mysqli->query("UPDATE dataPerkhidmatan SET noIC='$noICEdit' WHERE noIC='$noIC'");
                       
 $mysqli->query("UPDATE dataSumbangan SET noIC='$noICEdit' WHERE noIC='$noIC'");
                       
 $mysqli->query("UPDATE dataWaris SET noIC='$noICEdit' WHERE noIC='$noIC'");
                       
 $mysqli->query("UPDATE dataMarkahPenilai SET nnoIC='$noICEdit' WHERE noIC='$noIC'");
   

  header("Location: rekodPenilai_admin.php?noIC=$back");
}

$skalaItem1 = $_POST['skalaItem1'];
$skalaItem2 = $_POST['skalaItem2'];
$skalaItem3 = $_POST['skalaItem3'];
$skalaItem4 = $_POST['skalaItem4'];
$skalaItem5 = $_POST['skalaItem5'];
$skalaItem6 = $_POST['skalaItem6'];
//edit markah peserta

if (isset($_POST["submit2"])){
  $mysqli->query("UPDATE dataMarkahPenilai SET skalaItem1='$skalaItem1', skalaItem2='$skalaItem2', skalaItem3='$skalaItem3', skalaItem4='$skalaItem4', skalaItem5='$skalaItem5', skalaItem6='$skalaItem6' WHERE noIC='$noIC'");
  
  header("Location: rekodPenilai_admin.php?noIC=$back");
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}

$Recordset1 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset1'");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_dataPengesahan = "-1";
if (isset($_GET['noIC'])) {
  $colname_dataPengesahan = $_GET['noIC'];
}

$dataPengesahan = $mysqli->query("SELECT * FROM dataPengesahan WHERE noIC = '$colname_dataPengesahan' AND sah ='Sah'");
$row_dataPengesahan = mysqli_fetch_assoc($dataPengesahan);
$totalRows_dataPengesahan = mysqli_num_rows($dataPengesahan);

$colname_dataBengkel = "-1";
if (isset($_GET['noIC'])) {
  $colname_dataBengkel = $_GET['noIC'];
}

$dataBengkel = $mysqli->query("SELECT * FROM dataBengkel WHERE noIC = '$colname_dataBengkel' GROUP BY mesyuarat,tahun");
$row_dataBengkel = mysqli_fetch_assoc($dataBengkel);
$totalRows_dataBengkel = mysqli_num_rows($dataBengkel);

$colname_dataMarkahPenilai = "-1";
if (isset($_GET['noIC'])) {
  $colname_dataMarkahPenilai = $_GET['noIC'];
}

$dataMarkahPenilai = $mysqli->query("SELECT * FROM dataMarkahPenilai WHERE noIC = '$colname_dataMarkahPenilai' AND skalaItem1 IS NOT NULL");
$row_dataMarkahPenilai = mysqli_fetch_assoc($dataMarkahPenilai);
$totalRows_dataMarkahPenilai = mysqli_num_rows($dataMarkahPenilai);

$colname_dataMengajar = "-1";
if (isset($_GET['noIC'])) {
  $colname_dataMengajar = $_GET['noIC'];
}

$dataMengajar = $mysqli->query("SELECT * FROM dataMengajar WHERE noIC = '$colname_dataMengajar'");
$row_dataMengajar = mysqli_fetch_assoc($dataMengajar);
$totalRows_dataMengajar = mysqli_num_rows($dataMengajar);

$colname_dataPendidikan = "-1";
if (isset($_GET['noIC'])) {
  $colname_dataPendidikan = $_GET['noIC'];
}

$dataPendidikan = $mysqli->query("SELECT * FROM dataPendidikan WHERE noIC = '$colname_dataPendidikan'");
$row_dataPendidikan = mysqli_fetch_assoc($dataPendidikan);
$totalRows_dataPendidikan = mysqli_num_rows($dataPendidikan);

$colname_dataPerkhidmatan = "-1";
if (isset($_GET['noIC'])) {
  $colname_dataPerkhidmatan = $_GET['noIC'];
}

$dataPerkhidmatan = $mysqli->query("SELECT * FROM dataPerkhidmatan WHERE noIC = '$colname_dataPerkhidmatan'");
$row_dataPerkhidmatan = mysqli_fetch_assoc($dataPerkhidmatan);
$totalRows_dataPerkhidmatan = mysqli_num_rows($dataPerkhidmatan);

$colname_dataSumbangan = "-1";
if (isset($_GET['noIC'])) {
  $colname_dataSumbangan = $_GET['noIC'];
}

$dataSumbangan = $mysqli->query("SELECT * FROM dataSumbangan WHERE noIC = '$colname_dataSumbangan'");
$row_dataSumbangan = mysqli_fetch_assoc($dataSumbangan);
$totalRows_dataSumbangan = mysqli_num_rows($dataSumbangan);

$colname_dataWaris = "-1";
if (isset($_GET['noIC'])) {
  $colname_dataWaris = $_GET['noIC'];
}

$dataWaris = $mysqli->query("SELECT * FROM dataWaris WHERE noIC = '$colname_dataWaris'");
$row_dataWaris = mysqli_fetch_assoc($dataWaris);
$totalRows_dataWaris = mysqli_num_rows($dataWaris);

$colname_loginPenilai = "-1";
if (isset($_GET['noIC'])) {
  $colname_loginPenilai = $_GET['noIC'];
}

$loginPenilai = $mysqli->query("SELECT * FROM dataBengkel WHERE noIC = '$colname_loginPenilai'");
$row_loginPenilai = mysqli_fetch_assoc($loginPenilai);
$totalRows_loginPenilai = mysqli_num_rows($loginPenilai);

$colname_login = "-1";
if (isset($_GET['noIC'])) {
  $colname_login = $_GET['noIC'];
}

$login = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_login'");
$row_login = mysqli_fetch_assoc($login);
$totalRows_login = mysqli_num_rows($login);

$RB = $mysqli->query("SELECT * FROM daftarSubjek ORDER BY subjek ASC");
$row_RB = mysqli_fetch_assoc($RB);
$totalRows_RB = mysqli_num_rows($RB);

$RA = $mysqli->query("SELECT * FROM daftarAliran");
$row_RA = mysqli_fetch_assoc($RA);
$totalRows_RA = mysqli_num_rows($RA);
?>
<?php $i=1;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rekod Semakan</title>

    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <script src="offline.min.js"></script>
        <script src="jquery.min.js"></script>
        <link rel="stylesheet" href="offline-theme-chrome.css">  
        <link rel="stylesheet" href="offline-language-english.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
      <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBarColors);

      function drawBarColors() {
      var data = google.visualization.arrayToDataTable([
        ['Item', 'Skala',{ role: 'style' }, { role: 'annotation' }],
        ['Item 1', <?php echo $row_dataMarkahPenilai['skalaItem1'];?>, 'silver', <?php echo $row_dataMarkahPenilai['skalaItem1'];?>],
        ['Item 2', <?php echo $row_dataMarkahPenilai['skalaItem2'];?>, 'gold', <?php echo $row_dataMarkahPenilai['skalaItem2'];?>],
        ['Item 3', <?php echo $row_dataMarkahPenilai['skalaItem3'];?>, 'cyan', <?php echo $row_dataMarkahPenilai['skalaItem3'];?>],
        ['Item 4', <?php echo $row_dataMarkahPenilai['skalaItem4'];?>, 'magenta', <?php echo $row_dataMarkahPenilai['skalaItem4'];?>],
        ['Item 5', <?php echo $row_dataMarkahPenilai['skalaItem5'];?>, 'blue', <?php echo $row_dataMarkahPenilai['skalaItem5'];?>],
        ['Item 6', <?php echo $row_dataMarkahPenilai['skalaItem6'];?>, 'yellow', <?php echo $row_dataMarkahPenilai['skalaItem6'];?>]
      ]);
      
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      
      var options = {
        chartArea: {width: '70%'},
        legend: { position: "none" },
        bar: {groupWidth: "95%"},
        hAxis: {
          ticks: [0, 1, 2, 3, 4, 5],
          minValue: 1
        },
        vAxis: {
          title: ''
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(view, options);
    }
    </script>
    
    <script> 
        $(document).ready(function(){
        $("#flip").click(function(){
        $("#panel").toggle();
            });
        });
        
        $(document).ready(function(){
        $("#flip2").click(function(){
        $("#panel2").toggle();
            });
        });
        
        $(document).ready(function(){
        $("#flip3").click(function(){
        $("#panel3").toggle()
        $("#view3").hide();
            });
        });
    </script>
    
    <style>
        .header {
        background-color: #f1f1f1;
        padding: 30px;
        text-align: center;
        }
        
        #row {
            overflow: hidden;
            background-color: grey;
            color: white;
            display:block;
         }
         
         #row p {
            float: center;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
         
        .sticky {
         position: fixed;
         top: 0;
         width: 100%
         }
    </style>
   
</head>

<body>
   <div class="header">
  <h2>Penyelaras Projek: <?php echo strtoupper($row_Recordset1['nama']); ?></h2>
  </div>
                    <div id="row">
                         <div class="col-sm-8 col-sm-offset-2 text">
                                        <p> Berikut merupakan maklumat penuh <strong><?php echo strtoupper($row_loginPenilai['nama']); ?></strong> dengan No. Kad Pengenalan: <strong><?php echo ucfirst($row_loginPenilai['noIC']); ?></strong> (Kata Laluan: <?php echo $row_login['password']; ?>)</p>
                             
                            </div>
                        </div>
                            <br/>
<?php $i=1;?>
<div class="container">
<div class="container" id="page-wrap">
    
<div class="form-group">
     
    <p class="btn-info" id="flip3">Ubahsuai Rekod Panel (Klik jika ada perubahan)</p>
    <div id="panel3" style="display:none">
    <h4><i class="fas fa-book"></i> Kemaskini Maklumat Judul/Aliran</h4>
    <form action="<?php echo $editFormAction; ?>" name="updateBengkel" method="POST" class="login-form">
    <table class="table responsive hover">
        <tr>
            <td>
                
        <select name="judul" class="form-control" id="judul">
		  <option value="">Ubahsuai Subjek</option>
		  <?php do { ?>
		  <option value="<?php echo $row_RB['subjek']?>"><?php echo $row_RB['subjek']?></option>
		  <?php } while ($row_RB = mysqli_fetch_assoc($RB));
          $rows = mysqli_num_rows($RB);
          if($rows > 0) {mysqli_data_seek($RB, 0);
	      $row_RB = mysqli_fetch_assoc($RB); }?>
	    </select>
	    
	    </td>
        </tr>
            <td>
        <select name="aliran" class="form-control" id="aliran">
		  <option value="">Ubahsuai Aliran</option>
		  <?php do { ?>
		  <option value="<?php echo $row_RA['aliran']?>"><?php echo $row_RA['aliran']?></option>
		  <?php } while ($row_RA = mysqli_fetch_assoc($RA));
          $rows = mysqli_num_rows($RA);
          if($rows > 0) {mysqli_data_seek($RA, 0);
	      $row_RA = mysqli_fetch_assoc($RA); }?>
	    </select>
            </td>
        </tr>
        <tr>
            <td><input name="noIC" type="hidden" value="<?php echo $row_loginPenilai['noIC']; ?>" /><button type="submit" name="submit" class="btn btn-warning">Kemaskini</button></td>
        </tr>
    </table>    
    <input type="hidden" name="MM_update" value="updateBengkel" />
    </form>
    <!--
    <?php // update noIC?>
    <form action="<?php echo $editFormAction; ?>" name="updatenoIC" method="POST" class="login-form">
        <h4><i class="fas fa-sign-in-alt"></i> Kemaskini No. Kad Pengenalan</h4>
    <table class="table responsive hover">
        <tr>
            <td>
                
        <input type="number" nama="noICEdit" id="noICEdit" placeholder="Adakah <?php echo $row_loginPenilai['noIC'];?> salah diisi?Masukkan No. IC Baharu" style="width:100%; font-size:14px; text-indent: 12px;"/>
        
	       </td>
        <tr>
            <td><input name="noIC" type="hidden" value="<?php echo $row_loginPenilai['noIC']; ?>" /><button type="submit" name="submit" class="btn btn-primary">Kemaskini No. Kad Pengenalan</button></td>
        </tr>
    </table>    
    <input type="hidden" name="MM_update" value="updatenoIC" />
    </form>
    -->
</div>    
</div>
<?php if ($totalRows_dataPengesahan > 0) { // Show if recordset not empty ?>
    <div class="form-group">
    <!-- Zip Code-->
   <img width="40%" height="40%"class="img-circle"/>
    <p class="btn-info">Rekod Bengkel</p>
    <?php do { ?>
      <textarea rows="3" class="form-control" readonly="readonly"><?php echo $i++;?>. <?php echo strtoupper($row_dataBengkel['mesyuarat']); ?> <?php echo strtoupper($row_dataBengkel['judul']); ?> <?php echo strtoupper($row_dataBengkel['aliran']); ?> TINGKATAN <?php echo strtoupper($row_dataBengkel['tingkatan']); ?> <?php echo strtoupper($row_dataBengkel['tahun']); ?> (<?php echo strtoupper($row_dataBengkel['tarikh']); ?>)</textarea>
      <?php } while ($row_dataBengkel = mysqli_fetch_assoc($dataBengkel)); ?>
     
<br/>
    <p class="btn-info">Rekod Peribadi</p>
    <input class="form-control" value="Jantina: <?php echo ucwords($row_loginPenilai['jantina']); ?>" readonly="readonly" />    
    <textarea rows="2" class="form-control" readonly="readonly">Alamat Pejabat: <?php echo ucwords($row_dataPerkhidmatan['alamatKerja']); ?></textarea>
    <input class="form-control" value="Poskod: <?php echo $row_dataPerkhidmatan['poskod']; ?>" readonly="readonly"/>
    <input class="form-control" value="Negeri: <?php echo $row_dataPerkhidmatan['negeri']; ?>" readonly="readonly"/>
    <input class="form-control" value="Telefon Pejabat: <?php echo $row_dataPerkhidmatan['telefonPejabat']; ?>" readonly="readonly"/>
    <input class="form-control" value="Faks Pejabat: <?php echo $row_dataPerkhidmatan['faksPejabat']; ?>" readonly="readonly"/>
    <input class="form-control" value="Telefon Bimbit: <?php echo $row_dataPerkhidmatan['telefonBimbit']; ?>" readonly="readonly"/>
    <input class="form-control" value="E-mel: <?php echo $row_dataPerkhidmatan['emel']; ?>" readonly="readonly"/>
    <input class="form-control" value="Jawatan: <?php echo ucwords($row_dataPerkhidmatan['jawatan']); ?>" readonly="readonly"/>
    <input class="form-control" value="Gred Jawatan: <?php echo $row_dataPerkhidmatan['gredJawatan']; ?>" readonly="readonly"/>
    <input class="form-control" value="Nama Waris: <?php echo ucwords($row_dataWaris['namaKecemasan']); ?>" readonly="readonly"/>
    <input class="form-control" value="Telefon Waris: <?php echo $row_dataWaris['telefonKecemasan']; ?>" readonly="readonly"/>
    <input class="form-control" value="Hubungan Waris: <?php echo ucwords($row_dataWaris['hubunganWaris']); ?>" readonly="readonly"/>
    <input class="form-control" value="Subjek Mengajar: <?php echo ucwords($row_dataMengajar['subjekAjar']); ?>" readonly="readonly"/>
    <input class="form-control" value="Tempoh Mengajar: <?php echo $row_dataMengajar['tempohMengajar']; ?>" readonly="readonly"/>
    <textarea rows="2" class="form-control" readonly="readonly">Sekolah/Institusi Terkini: <?php echo ucwords($row_dataPerkhidmatan['alamatKerja']); ?></textarea>
    <textarea rows="2" class="form-control" readonly="readonly">Pengkhususan (Doktor):<?php echo ucwords($row_dataPendidikan['khususDoktor']); ?></textarea>
    <textarea rows="2" class="form-control" readonly="readonly">Institusi (Doktor):<?php echo ucwords($row_dataPendidikan['InstitusiDoktor']); ?></textarea>
    <input class="form-control" value="Tahun(Doktor): <?php echo $row_dataPendidikan['tahunDoktor']; ?>" readonly="readonly"/>
   <textarea rows="2" class="form-control" readonly="readonly">Pengkhususan (Sarjana): <?php echo ucwords($row_dataPendidikan['khususSarjana']); ?></textarea>
    <textarea rows="2" class="form-control" readonly="readonly">Institusi (Sarjana): <?php echo ucwords($row_dataPendidikan['institusiSarjana']); ?></textarea>
    <input class="form-control" value="Tahun (Sarjana): <?php echo $row_dataPendidikan['tahunSarjana']; ?>" readonly="readonly"/>
    <textarea rows="2" class="form-control" readonly="readonly">Pengkhususan (Sarjana Muda): <?php echo ucwords($row_dataPendidikan['khususSM']); ?></textarea>
   <textarea rows="2" class="form-control" readonly="readonly">Institusi (Sarjana Muda): <?php echo ucwords($row_dataPendidikan['institusiSM']); ?></textarea>
    <input class="form-control" value="Tahun (Sarjana Muda): <?php echo $row_dataPendidikan['tahunSM']; ?>" readonly="readonly"/>
   <textarea rows="2" class="form-control" readonly="readonly">Pengkhususan (Diploma): <?php echo ucwords($row_dataPendidikan['khususDiploma']); ?></textarea>
    <textarea rows="2" class="form-control" readonly="readonly">Institusi (Diploma): <?php echo ucwords($row_dataPendidikan['institusiDIploma']); ?></textarea>
    <input class="form-control" value="Tahun (Diploma): <?php echo $row_dataPendidikan['tahunDiploma']; ?>" readonly="readonly"/>
   <textarea rows="2" class="form-control" readonly="readonly">Pengkhususan (Ikhtisas): <?php echo ucwords($row_dataPendidikan['khususIkhtisas']); ?></textarea>
    <textarea rows="2" class="form-control" readonly="readonly">Institusi (Ikhtisas): <?php echo ucwords($row_dataPendidikan['institusiIkhtisas']); ?></textarea>
    <input class="form-control" value="Tahun (Ikhtisas): <?php echo $row_dataPendidikan['tahunIkhtisas']; ?>" readonly="readonly"/>
   <textarea rows="2" class="form-control" readonly="readonly">Sumbangan: <?php echo ucwords($row_dataSumbangan['sumbangan1']); ?></textarea>
    <input class="form-control" value="Peringkat: <?php echo ucwords($row_dataSumbangan['peringkat1']); ?>" readonly="readonly"/>
    <input class="form-control" value="Tahun Sumbangan: <?php echo $row_dataSumbangan['tahun1']; ?>" readonly="readonly"/>
    
    <?php } // Show if recordset not empty ?>
    
    <?php if ($totalRows_dataPengesahan == 0) { // Show if recordset empty ?>
    <p>Maklumat peribadi masih <strong>BELUM LENGKAP</strong> diisi oleh panel. Mohon maklum kepada panel untuk melengkapkan proses pengisian maklumat.</p>
    <?php } // Show if recordset empty ?>
    
    <?php if ($totalRows_dataMarkahPenilai > 0 && $totalRows_dataPengesahan > 0) { // Show if recordset not empty ?>
    <p class="btn-info" id="flip">Pengisian Markah (<strong>KLIK</strong> jika Peserta Bengkel Bakal Penilai)</p>
    <br/>
    <form action="<?php echo $editFormAction; ?>" name="simpan" method="POST" class="login-form">
    <div class"form-group id="panel" style="display:none">
    <input name="noIC" value="<?php echo $row_loginPenilai['noIC'];?>" type="hidden"/>
    <p>*Sila <strong>LENGKAPKAN</strong> skala pemarkahan panel di bawah (<em>Jika berkaitan</em>).</p>
    <p class="btn-success" align="left">Item 1 - Aktif dalam perbincangan kumpulan.</p>
    
    <table class="table responsive hover">
    <tr align="center">
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem1'],"1"))) {echo "checked=\"checked\"";} ?> name="skalaItem1" type="radio" value="1"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem1'],"2"))) {echo "checked=\"checked\"";} ?> name="skalaItem1" type="radio" value="2"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem1'],"3"))) {echo "checked=\"checked\"";} ?> name="skalaItem1" type="radio" value="3"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem1'],"4"))) {echo "checked=\"checked\"";} ?> name="skalaItem1" type="radio" value="4"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem1'],"5"))) {echo "checked=\"checked\"";} ?> name="skalaItem1" type="radio" value="5"> </div></th>
    </tr>
    <tr align="center">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
       
    </tr>
    </table>
    
     <p class="btn-success" align="left">Item 2 - Boleh memberi pendapat serta cadangan dengan jelas dan baik.</p>
    
    <table class="table responsive hover">
    <tr align="center">
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem2'],"1"))) {echo "checked=\"checked\"";} ?> name="skalaItem2" type="radio" value="1"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem2'],"2"))) {echo "checked=\"checked\"";} ?> name="skalaItem2" type="radio" value="2"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem2'],"3"))) {echo "checked=\"checked\"";} ?> name="skalaItem2" type="radio" value="3"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem2'],"4"))) {echo "checked=\"checked\"";} ?> name="skalaItem2" type="radio" value="4"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem2'],"5"))) {echo "checked=\"checked\"";} ?> name="skalaItem2" type="radio" value="5"> </div></th>
       
    </tr>
    <tr align="center">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        
    </tr>
    </table>
    
    <p class="btn-success" align="left">Item 3 - Boleh memberi pandangan/menerima kritikan ahli kumpulan yang lain.</p>
    
    <table class="table responsive hover">
    <tr align="center">
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem3'],"1"))) {echo "checked=\"checked\"";} ?> name="skalaItem3" type="radio" value="1"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem3'],"2"))) {echo "checked=\"checked\"";} ?> name="skalaItem3" type="radio" value="2"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem3'],"3"))) {echo "checked=\"checked\"";} ?> name="skalaItem3" type="radio" value="3"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem3'],"4"))) {echo "checked=\"checked\"";} ?> name="skalaItem3" type="radio" value="4"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem3'],"5"))) {echo "checked=\"checked\"";} ?> name="skalaItem3" type="radio" value="5"> </div></th>
        
    </tr>
    <tr align="center">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        
    </tr>
    </table>
    
    <p class="btn-success" align="left">Item 4 - Boleh bekerjasama dalam kumpulan.</p>
    
    <table class="table responsive hover">
    <tr align="center">
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem4'],"1"))) {echo "checked=\"checked\"";} ?> name="skalaItem4" type="radio" value="1"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem4'],"2"))) {echo "checked=\"checked\"";} ?> name="skalaItem4" type="radio" value="2"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem4'],"3"))) {echo "checked=\"checked\"";} ?> name="skalaItem4" type="radio" value="3"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem4'],"4"))) {echo "checked=\"checked\"";} ?> name="skalaItem4" type="radio" value="4"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem4'],"5"))) {echo "checked=\"checked\"";} ?> name="skalaItem4" type="radio" value="5"> </div></th>
        
    </tr>
    <tr align="center">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        
    </tr>
    </table>
    
    <p class="btn-success" align="left">Item 5 - Boleh mengurus masa dengan baik.</p>
    
    <table class="table responsive hover">
    <tr align="center">
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem5'],"1"))) {echo "checked=\"checked\"";} ?> name="skalaItem5" type="radio" value="1"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem5'],"2"))) {echo "checked=\"checked\"";} ?> name="skalaItem5" type="radio" value="2"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem5'],"3"))) {echo "checked=\"checked\"";} ?> name="skalaItem5" type="radio" value="3"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem5'],"4"))) {echo "checked=\"checked\"";} ?> name="skalaItem5" type="radio" value="4"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem5'],"5"))) {echo "checked=\"checked\"";} ?> name="skalaItem5" type="radio" value="5"> </div></th>
       
    </tr>
    <tr align="center">
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        
    </tr>
    </table>
    
    <p class="btn-success" align="left" id="flip2">Item 6 - Boleh memimpin pasukan (Klik jika Pengerusi).</p>
    
    <table class="table responsive hover" id="panel2" style="display:none">
    <tr align="center">
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem6'],"0"))) {echo "checked=\"checked\"";} ?> name="skalaItem6" type="radio" value="0" checked> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem6'],"1"))) {echo "checked=\"checked\"";} ?> name="skalaItem6" type="radio" value="1"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem6'],"2"))) {echo "checked=\"checked\"";} ?> name="skalaItem6" type="radio" value="2"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem6'],"3"))) {echo "checked=\"checked\"";} ?> name="skalaItem6" type="radio" value="3"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem6'],"4"))) {echo "checked=\"checked\"";} ?> name="skalaItem6" type="radio" value="4"> </div></th>
        <th><div align="center"><input <?php if (!(strcmp($row_dataMarkahPenilai['skalaItem6'],"5"))) {echo "checked=\"checked\"";} ?> name="skalaItem6" type="radio" value="5"> </div></th>
        
    </tr>
    <tr align="center">
        <td>Tiada</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        
    </tr>
    </table>
    <input type="hidden" name="MM_update" value="simpan" />
    
    <button type="submit" name="submit2" class="btn btn-primary">Simpan</button>
    <hr>
    <?php } // Show if recordset empty ?>
    </div>
    </form>
    
     <?php if ($totalRows_dataMarkahPenilai > 0 && $row_dataMarkahPenilai['skalaItem1'] != 0 && $row_dataMarkahPenilai['skalaItem2'] != 0 && $row_dataMarkahPenilai['skalaItem3'] != 0 && $row_dataMarkahPenilai['skalaItem4'] != 0 && $row_dataMarkahPenilai['skalaItem5'] != 0) { // Show if recordset not empty ?>
   
    <div id="chart_div"></div>
    
    
    </div>
    
    <?php } // Show if recordset not empty ?>
  </div>
  
  <script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("row");
    var sticky = navbar.offsetTop;

    function myFunction() {
    if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
        } else {
    navbar.classList.remove("sticky");
      }
    }
    </script>
 
  <form name="prosesSemakan" method="post" action="viewMainPP.php">
<div class="form-group">
  <!-- Submit Button -->
        <input type="hidden" name="subjekPP" value="<?php echo $row_loginPenilai['judul'];?>"/>
  <input type="hidden" name="aliranPP" value="<?php echo $row_loginPenilai['aliran'];?>"/>
  <input type="hidden" name="tahun" value="<?php echo $row_loginPenilai['tahun'];?>"/>
        <button type="submit" class="btn btn-primary"><img src="http://www.anc.edu/advising/images/buttons/arrows/arrow-92-xxl.png" width="20" height="20"></button>
        <a href="index.php"><button type="button" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
  
  </div>

</div>

</form>
</body>
</html>
 <script>
function goBack() {
    window.history.back();
}
</script>
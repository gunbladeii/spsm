<?php require('Connections/ePenilai.php'); ?>
<?php session_start();?>
<?php
session_start();
if($_SESSION['aksesLevel'] != 'kpp')
    {
      header('Location:loginFailed.php');  
    }
?>
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("Y");
$d=1;
$tahun = $_POST['tahun'];
$subjekPP = $_POST['subjekPP'];
$aliranPP = $_POST['aliranPP'];


	if (isset($_POST["download"]))
	{
	$sql = $mysqli->query("SELECT * FROM (((((((login 
					INNER JOIN dataBengkel ON login.noIC = dataBengkel.noIC) 
					INNER JOIN dataMengajar ON login.noIC = dataMengajar.noIC)
					INNER JOIN dataPendidikan ON login.noIC = dataPendidikan.noIC)
					INNER JOIN dataPengesahan ON login.noIC = dataPengesahan.noIC)
					INNER JOIN dataPerkhidmatan ON login.noIC = dataPerkhidmatan.noIC)
					INNER JOIN dataSumbangan ON login.noIC = dataSumbangan.noIC)
					INNER JOIN dataWaris ON login.noIC = dataWaris.noIC)					
					WHERE tahun='$tahun' AND judul='$subjekPP' AND aliran='$aliranPP' ORDER BY login.nama ASC"); 					
	if (mysqli_num_rows($sql) > 0)
		{
		$output .='
			<table class="table" border="1">
				<tr>
					<th>Bil</th>
					<th>Nama</th>
					<th>No Kad Pengenalan</th>
					<th>Jantina</th>
					<th>Bengkel/Mesyuarat</th>
					<th>Alamat Pejabat</th>
					<th>Poskod</th>
					<th>Negeri</th>
					<th>Telefon Pejabat</th>
					<th>Faks Pejabat</th>
					<th>Telefon Bimbit</th>
					<th>E-Mel</th>
					<th>Jawatan</th>
					<th>Gred Jawatan</th>
					<th>Nama Waris</th>
					<th>Telefon Waris</th>
					<th>Hubungan Waris</th>
					<th>Subjek Mengajar</th>
					<th>Tempoh Mengajar</th>
					<th>Sekolah/Institusi Terkini</th>
					<th>Pengkhususan (Doktor)</th>
					<th>Institusi (Doktor)</th>
					<th>Tahun (Doktor)</th>
					<th>Pengkhususan (Sarjana)</th>
					<th>Institusi (Sarjana)</th>
					<th>Tahun (Sarjana)</th>
					<th>Pengkhususan (Sarjana Muda)</th>
					<th>Institusi (Sarjana Muda)</th>
					<th>Tahun (Sarjana Muda)</th>
					<th>Pengkhususan (Diploma)</th>
					<th>Institusi (Diploma)</th>
					<th>Tahun (Diploma)</th>
					<th>Pengkhususan (Ikhtisas)</th>
					<th>Institusi (Ikhtisas)</th>
					<th>Tahun (Ikhtisas)</th>
					<th>Sumbangan</th>
					<th>Peringkat Sumbangan</th>
					<th>Tahun Sumbangan</th>
					<th>Pernah Terlibat Penulis Buku</th>
					<th>Penulis Subjek</th>
					<th>Penerbit</th>					
				</tr>		
			';
		while($row = mysqli_fetch_assoc($sql))
			{
			$output .='
				<tr>
					<td>'.$d++.'</td>
					<td>'.$row["nama"].'</td>
					<td>'.$row["noIC"].'</td>
					<td>'.$row["jantina"].'</td>
					<td>'.$row["mesyuarat"].'</td>
					<td>'.$row["alamatKerja"].'</td>
					<td>'.$row["poskod"].'</td>
					<td>'.$row["negeri"].'</td>
					<td>'.$row["telefonPejabat"].'</td>
					<td>'.$row["faksPejabat"].'</td>
					<td>'.$row["telefonBimbit"].'</td>
					<td>'.$row["emel"].'</td>
					<td>'.$row["jawatan"].'</td>
					<td>'.$row["gredJawatan"].'</td>
					<td>'.$row["namaKecemasan"].'</td>
					<td>'.$row["telefonKecemasan"].'</td>
					<td>'.$row["hubunganWaris"].'</td>
					<td>'.$row["subjekAjar"].'</td>
					<td>'.$row["tempohMengajar"].'</td>
					<td>'.$row["alamatKerja"].'</td>
					<td>'.$row["khususDoktor"].'</td>
					<td>'.$row["institusiDOktor"].'</td>
					<td>'.$row["tahunDoktor"].'</td>
					<td>'.$row["khususSarjana"].'</td>
					<td>'.$row["institusiSarjana"].'</td>
					<td>'.$row["tahunSarjana"].'</td>
					<td>'.$row["khususSM"].'</td>
					<td>'.$row["institusiSM"].'</td>
					<td>'.$row["tahunSM"].'</td>
					<td>'.$row["khususDiploma"].'</td>
					<td>'.$row["institusiDiploma"].'</td>
					<td>'.$row["tahunDiploma"].'</td>
					<td>'.$row["khususIkhtisas"].'</td>
					<td>'.$row["institusiIkhtisas"].'</td>
					<td>'.$row["tahunIkhtisas"].'</td>
					<td>'.$row["sumbangan1"].'</td>
					<td>'.$row["peringkat1"].'</td>
					<td>'.$row["tahun1"].'</td>
					<td>'.$row["pernahTerlibat"].'</td>
					<td>'.$row["judulPenerbit"].'</td>
					<td>'.$row["penerbit"].'</td>
					
				</tr>			
				';		
			}
		$output .='</table>';
		header("Content-Type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=dataPenilai.xls");
		echo $output;
			
		}
	exit;
	}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}

$Recordset1 = $mysqli->query("SELECT * FROM login WHERE noIC = '$colname_Recordset1'");
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_POST['mesyuarat'])) {
  $colname_Recordset2 = $_POST['mesyuarat'];
}
$colname4_Recordset2 = "-1";
if (isset($_POST['aliranPP'])) {
  $colname4_Recordset2 = $_POST['aliranPP'];
}
$colname2_Recordset2 = "-1";
if (isset($_POST['tahun'])) {
  $colname2_Recordset2 = $_POST['tahun'];
}
$colname3_Recordset2 = "-1";
if (isset($_POST['subjekPP'])) {
  $colname3_Recordset2 = $_POST['subjekPP'];
}

$Recordset2 = $mysqli->query("SELECT * FROM login INNER JOIN dataBengkel ON login.noIC = dataBengkel.noIC WHERE tahun='$colname2_Recordset2' AND judul='$colname3_Recordset2' AND aliran='$colname4_Recordset2' GROUP BY login.noIC ORDER BY login.nama ASC");
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$taburanPanelNegeri = $mysqli->query("SELECT * FROM taburanPanelNegeri");
$row_taburanPanelNegeri = mysqli_fetch_assoc($taburanPanelNegeri);
$totalRows_taburanPanelNegeri = mysqli_num_rows($taburanPanelNegeri);

$Recordset3 = $mysqli->query("SELECT aksesLevel, COUNT(aksesLevel) AS bilSah FROM login WHERE aksesLevel IS NOT NULL GROUP BY aksesLevel");
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$Recordset4 = $mysqli->query("SELECT dataPengesahan.sah, COUNT(sah) AS bilSah FROM dataBengkelNoIC INNER JOIN dataPengesahan ON dataBengkelNoIC.noIC = dataPengesahan.noIC WHERE dataPengesahan.sah IS NOT NULL GROUP BY dataBengkelNoIC.tahun, dataPengesahan.sah");
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$Recordset5 = $mysqli->query("SELECT tempat, COUNT(tempat) AS kehadiran FROM dataBengkel WHERE tempat IS NOT NULL GROUP BY tahun, tempat");
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

$Recordset6 = $mysqli->query("SELECT * FROM subjekPP GROUP BY subjekPP ORDER BY subjekPP ASC");
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);

$Recordset7 = $mysqli->query("SELECT tempat, subjek, COUNT(subjek) AS bilpeserta FROM kehadiran GROUP BY subjek,tempat ORDER BY subjek ASC");
$row_Recordset7 = mysqli_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysqli_num_rows($Recordset7);

$Recordset8 = $mysqli->query("SELECT tempat, judul, COUNT(judul) AS bilpeserta FROM dataBengkel WHERE judul IS NOT NULL GROUP BY judul ORDER BY judul ASC");
$row_Recordset8 = mysqli_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysqli_num_rows($Recordset8);
?>
<?php $i=1; $b=1; $c=1;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rekod Semakan</title>

    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">  
    <link rel="stylesheet" href="assets/css/style.css">
    
    <script src="https://code.jquery.com/jquery-3.3.0.js" integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8=" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
    .chartWithOverlay {
           position: relative;
           width: 700px;
    }
    .overlay {
           width: 200px;
           height: 200px;
           position: absolute;
           top: 60px;   /* chartArea top  */
           left: 180px; /* chartArea left */
    }
   </style>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Subjek');
        data.addColumn('string', 'Bilangan Peserta');
        data.addRows([
        <?php do { ?>
          ['<?php echo $row_Recordset7['subjek']?>',  '<?php echo $row_Recordset7['bilpeserta']?>'],
          <?php } while ($row_Recordset7 = mysqli_fetch_assoc($Recordset7)); ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('statusHadir'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>
    
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Subjek');
        data.addColumn('string', 'Bilangan Panel Berdaftar');
        data.addRows([
        <?php do { ?>
          ['<?php echo strtoupper($row_Recordset8['judul'])?>',  '<?php echo $row_Recordset8['bilpeserta']?>'],
          <?php } while ($row_Recordset8 = mysqli_fetch_assoc($Recordset8)); ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('statusBilPanel'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>
  
    <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawRightY);

function drawRightY() {
      var data = google.visualization.arrayToDataTable([
        ['Negeri', 'Bilangan Penilai',{ role: 'annotation' }],
        <?php do { ?>
          ['<?php echo $row_taburanPanelNegeri['negeri']?>', <?php if ($row_taburanPanelNegeri['bilNegeri'] == 0){echo null;}else{echo $row_taburanPanelNegeri['bilNegeri'];}?>,'<?php echo $row_taburanPanelNegeri['negeri']?>'],
          <?php } while ($row_taburanPanelNegeri = mysqli_fetch_assoc($taburanPanelNegeri)); ?>
        
      ]);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
                       
      var materialOptions = {
        
        bars: 'horizontal',
        axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          
        bar: {groupWidth: "60%"},
        legend: { position: "none" },
        
      };
      var materialChart = new google.charts.Bar(document.getElementById('taburanPanelNegeri'));
      materialChart.draw(view, materialOptions);
    }
    
    </script>
 <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawRightY);   
    function drawRightY() {
      var data = google.visualization.arrayToDataTable([
          ['Pengguna', 'Bilangan'],
          <?php do { ?>
          ['<?php if($row_Recordset3['aksesLevel']=='Belum sah'){echo 'Panel Belum Sah';}else if($row_Recordset3['aksesLevel']=='p') {echo 'Panel Sah';}else if($row_Recordset3['aksesLevel']=='pp') {echo 'Penyelaras Projek';}else if($row_Recordset3['aksesLevel']=='kpp') {echo 'Ketua Penolong Pengarah';}?>', <?php echo $row_Recordset3['bilSah']?>],
          <?php } while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3)); ?>
          
        ]);
      
      var materialOptions = {
        
        axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
        bars: 'horizontal',  
        bar: {groupWidth: "60%"},
        legend: { position: "none" },
        
      };
      var materialChart = new google.charts.Bar(document.getElementById('statusSah'));
      materialChart.draw(data, materialOptions);
    }
</script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Pengesahan', 'Bilangan'],
          <?php do { ?>
          ['<?php if($row_Recordset4['sah']=='Belum Sah'){echo 'Belum Lengkap';}else echo 'Lengkap';?>', <?php echo $row_Recordset4['bilSah']?>],
          <?php } while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4)); ?>
          
        ]);
        
        var options = {
          chartArea:{width:'60%', height:'100%'},
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('statusLengkap'));
        chart.draw(data, options);
        
    }
    </script>
    
    <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawRightY);   
    function drawRightY() {
      var data = google.visualization.arrayToDataTable([
          ['Lokasi', 'Bilangan'],
          <?php do { ?>
          ['<?php echo $row_Recordset5['tempat']?>', '<?php echo $row_Recordset5['kehadiran']?>'],
          <?php } while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5)); ?>
          
        ]);
      
      var materialOptions = {
        
        axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
        bars: 'horizontal',  
        bar: {groupWidth: "60%"},
        legend: { position: "none" },
        
      };
      var materialChart = new google.charts.Bar(document.getElementById('statusKehadiran'));
      materialChart.draw(data, materialOptions);
    }
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Judul');
        data.addColumn('string', 'Nama');
        data.addRows([
        <?php do { ?>
          ['<?php echo strtoupper($row_Recordset6['subjekPP'])?>',  '<?php echo strtoupper($row_Recordset6['nama'])?>'],
          <?php } while ($row_Recordset6 = mysqli_fetch_assoc($Recordset6)); ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('subjekPP'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>

<script>
    function akses($noIC, $akses){
        //get the input value
		document.getElementById($noIC).innerHTML = '<img src="https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/tick_green.png" width="20" height="20">';
		      
        $.ajax({
            //the url to send the data to
            url: "updateAksesLevel.php",
            //the data to send to
            data: {noIC : $noIC, akses: $akses},
            //type. for eg: GET, POST
            type: "POST",
            //on success
            success: function(data){
                console.log('<img src="https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/tick_green.png" width="20" height="20">'); //You can remove here
                
            },
            //on error
            error: function(){
                    console.log('<img src="https://www.shareicon.net/data/2017/02/24/879485_green_512x512.png" width="20" height="20">'); //You can remove here
                    
            }
        });
    }
</script>
   
</head>

<body>
                   <div class="container">
                   <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a></a>
                            <h1>Selamat Datang<br/><?php echo strtoupper($row_Recordset1['nama']); ?></h1>
                            <div class="description">
                            <h1><strong>Dashboard e-Penilai SPSM,BBT</strong></h1>
                            
                            </div>
                        </div>
                    </div>


<div id="page-wrap">
  <div class="form-group" align="center">
        <p class="btn-info">Statistik Bilangan Panel Berdafar Mengikut Subjek</p>
        <div id="statusBilPanel"></div>
  </div>
  
  
    <div class="form-group" align="center">
        <p class="btn-info">Taburan Panel Mengikut Negeri</p>
         
   <div id="taburanPanelNegeri"></div>

   </div>
   
   <div class="form-group" align="center">
        <p class="btn-info">Status Pengisian Maklumat oleh Panel</p>
         
   <div id="statusLengkap"></div>
   
   <div class="form-group" align="center">
        <p class="btn-info">Status Penguna dalam ePenilai</p>
         
   <div id="statusSah"></div>

   </div>
   
   <div class="form-group" align="center">
        <p class="btn-info">Status Kehadiran Panel Mengikut Lokasi</p>
         
   <div id="statusKehadiran"></div>

   </div>
   
    <div class="form-group" align="center">
        <p class="btn-info">Status Judul Mengikut Penyelaras Projek</p>
         
   <div id="subjekPP"></div>

   </div>
</div>
   
 <hr>   
      <div class="form-group"> <!-- Submit Button -->
          
          <a href="index.php"><button type="button" name="submit" class="btn btn-primary">Halaman Utama</button></a>
      </div>
</div>


</body>
</html>
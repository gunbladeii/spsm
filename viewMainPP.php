<?php require('Connections/ePenilai.php'); ?>
<?php session_start();
$back1 = $_POST['subjekPP'];
$back3 = $_POST['tahun'];
$tahun = $_POST['tahun'];
$subjekPP = $_POST['subjekPP'];
$d=1;
$downloadExcell = $_SERVER['PHP_SELF'];

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
					WHERE tahun='$tahun' AND judul='$subjekPP' ORDER BY login.nama ASC"); 					

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


$Recordset2 = $mysqli->query("SELECT * FROM login INNER JOIN dataBengkel ON login.noIC = dataBengkel.noIC WHERE tahun='$tahun' AND judul='$subjekPP' GROUP BY login.noIC ORDER BY login.nama ASC");
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);


$Recordset3 = $mysqli->query("SELECT dataPerkhidmatan.negeri, COUNT(negeri) AS bilNegeri FROM dataBengkelNoIC INNER JOIN dataPerkhidmatan ON dataBengkelNoIC.noIC = dataPerkhidmatan.noIC WHERE tahun='$tahun' AND judul='$subjekPP' AND negeri IS NOT NULL GROUP BY dataBengkelNoIC.tahun, dataPerkhidmatan.negeri;");
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$Recordset4 = $mysqli->query("SELECT dataPengesahan.sah, COUNT(sah) AS bilSah FROM dataBengkelNoIC INNER JOIN dataPengesahan ON dataBengkelNoIC.noIC = dataPengesahan.noIC WHERE tahun='$tahun' AND judul='$subjekPP' GROUP BY dataBengkelNoIC.tahun, dataPengesahan.sah");
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$Recordset5 = $mysqli->query("SELECT * FROM (((((((login 
					INNER JOIN dataBengkel ON login.noIC = dataBengkel.noIC) 
					INNER JOIN dataMengajar ON login.noIC = dataMengajar.noIC)
					INNER JOIN dataPendidikan ON login.noIC = dataPendidikan.noIC)
					INNER JOIN dataPengesahan ON login.noIC = dataPengesahan.noIC)
					INNER JOIN dataPerkhidmatan ON login.noIC = dataPerkhidmatan.noIC)
					INNER JOIN dataSumbangan ON login.noIC = dataSumbangan.noIC)
					INNER JOIN dataWaris ON login.noIC = dataWaris.noIC)					
					WHERE dataBengkel.tahun='$tahun' AND dataBengkel.judul='$subjekPP' GROUP BY dataBengkel.noIC ORDER BY dataBengkel.nama ASC;");
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
?>
<?php $i=1; $b=1; $c=1;?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Rekod Semakan</title>

    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="tabledesign.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.0.js" integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8=" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                    console.log('<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/OOjs_UI_icon_close.svg/1000px-OOjs_UI_icon_close.svg.png" width="20" height="20">'); //You can remove here
                    
            }
        });
    }
    
    function deleteRecord($noIC, $judul){
        //get the input value
		document.getElementById($noIC).innerHTML = '<i style="color:green" class="fas fa-exchange-alt"></i>';
		document.getElementById('nama').innerHTML = '<i style="color:green" class="fas fa-exchange-alt"></i>';
		document.getElementById('SP').innerHTML = '<i style="color:green" class="fas fa-exchange-alt"></i>';
		      
        $.ajax({
            //the url to send the data to
            url: "deleteAksesLevel.php",
            //the data to send to
            data: {noIC : $noIC, akses: $judul},
            //type. for eg: GET, POST
            type: "POST",
            //on success
            success: function(data){
                console.log('<i style="color:green" class="fas fa-spinner"></i>'); //You can remove here
                
            },
            //on error
            error: function(){
                    console.log('<i style="color:red" class="fas fa-times"></i>'); //You can remove here
                    
            }
        });
    }
    </script>
    
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Negeri', 'Bilangan'],
          <?php do { ?>
          ['<?php echo $row_Recordset3['negeri']?>', <?php if ($row_Recordset3['bilNegeri'] == 0){echo null;}else{echo $row_Recordset3['bilNegeri'];}?>],
          <?php } while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3)); ?>
          
        ]);
        
        var data2 = google.visualization.arrayToDataTable([
          ['Pengesahan', 'Bilangan'],
          <?php do { ?>
          ['<?php if($row_Recordset4['sah']=='Belum Sah'){echo 'Belum Lengkap';}else echo 'Lengkap';?>', <?php echo $row_Recordset4['bilSah']?>],
          <?php } while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4)); ?>
          
        ]);
        
        var options = {
          chartArea:{width:'60%', height:'100%'},
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
        
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart.draw(data2, options);
        
        
      }
    </script>


   
</head>

<body>
                   <div class="container">
                   <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                        <a><i class="fas fa-user-circle fa-w-8 fa-5x"></i></a>
                            <h1>PENYELARAS PROJEK<br/><?php echo strtoupper($row_Recordset1['nama']); ?></h1>
                            <div class="description">
                              <?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
                              <p> Berikut merupakan paparan ahli panel mengikut subjek <strong><?php echo strtoupper($row_Recordset2['judul']); ?></strong> aliran bagi tahun <strong><?php echo strtoupper($row_Recordset2['tahun']); ?></strong>. </p>
                              <?php } // Show if recordset not empty ?>
                            </div>
                        </div>
                    </div>


<div id="page-wrap">
  <?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
      
    <div class="form-group"> <!-- Zip Code-->
         
          <form action="<?php echo $downloadExcell; ?>" role="form" method="POST" class="well form-horizontal" name="download" class="download" enctype="multipart/form-data">
              					
				<button type="submit" name='download' value="Export to excel" class="btn btn-warning" id="buttonExcell">Eksport ke Excell</button>
                <input name="mesyuarat" type="hidden" value="<?php echo $row_Recordset2['mesyuarat'];?>"/>
                <input name="tahun" type="hidden" value="<?php echo $row_Recordset2['tahun'];?>" />
                <input name="subjekPP" type="hidden" value="<?php echo $row_Recordset2['judul'];?>" />
                <input name="aliranPP" type="hidden" value="<?php echo $row_Recordset2['aliran'];?>" />
                <input name="tingkatan" type="hidden" value="<?php echo $row_Recordset2['tingkatan'];?>" />
                <input type="hidden" name="MM_download" value="download">
        </form>
		
				<br/>
         	
	<?php if ($totalRows_Recordset5 > 0) { // Show if recordset not empty ?>
     <p class="btn-info">Rekod Panel Penilai</p>
       <table>
  <thead>
    <tr>
      <th scope="col">Bil</th>
      <th scope="col">Nama Panel</th>
      <th scope="col">Status Pengesahan</th>
      <th scope="col">Status Pengisian</th>
      <th scope="col">Jantina</th>
      <th scope="col">Gugur</th>
      
    </tr>
  </thead>
  <tbody>
   <?php do { ?> 
    <tr>
      <td data-label="1. Bil. Panel"><?php echo $i++;?></td>
      <td data-label="2. Nama Panel"><a id="nama" href="rekodPenilai_admin.php?noIC=<?php echo $row_Recordset5["noIC"];?>"><?php 
       if ($row_Recordset5["sah"] == 'Sah')
       {echo '<div>'.strtoupper($row_Recordset5["nama"]).'</div>';}
       else 
       {
          echo '<div style="color:red;">'.strtoupper($row_Recordset5["nama"]).'</div>';
       }
       ?>
       </a> </td>
       
      <td data-label="3. Status Pengesahan"><a id="<?php echo $row_Recordset5['noIC'];?>" onclick="akses(<?php echo $row_Recordset5['noIC'];?>,'p')"><?php if ($row_Recordset5['aksesLevel'] == 'p')
	      {
		    echo '<img src="https://cdn0.iconfinder.com/data/icons/round-ui-icons/512/tick_green.png" width="20" height="20">';
		  }
		else
		{
		  echo '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/OOjs_UI_icon_close.svg/1000px-OOjs_UI_icon_close.svg.png" width="20" height="20">';
		}  
	   ?> </a></td>
      <td data-label="4. Status Pengisian"><div id="SP"><?php 
       if ($row_Recordset5["sah"] == 'Sah')
       {echo 'Lengkap';}
       else 
       {
          echo '<span class="badge badge-danger">Tidak Lengkap</span>';
       }
       ?></div></td>
       
       <td data-label="5. Jantina">
           <?php if($row_Recordset5["jantina"]=='Lelaki'){echo '<i class="fas fa-male fa-w-8 fa-3x" style="color:black"></i>';} else {echo '<i class="fas fa-female fa-w-8 fa-3x"" style="color:#FF1493"></i>';}?>
       </td>
       <td data-label="6. Gugur">
          <a id="<?php echo $row_Recordset5['noIC'];?>" onclick="deleteRecord(<?php echo $row_Recordset5['noIC'];?>,'gugur')">
          <?php if ($row_Recordset5['judul'] == 'gugur')
	      {
		    echo '<i style="color:green" class="fas fa-spinner"></i>';
		  }
		else
		{
		 echo '<i style="color:red" class="fas fa-times"></i>';
		}  
	   ?> </a>
       </td>
    </tr>
    <?php } while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5)); ?>
  </tbody>
</table>
      </div>
     <?php }?>
      
      
      
    <?php if ($totalRows_Recordset3 > 0) { // Show if recordset not empty ?>
    <div class="form-group" align="center">
        <p class="btn-info">Taburan Panel Mengikut Negeri</p>
         <div id="piechart_3d"></div>
    </div>
    <?php } // Show if recordset not empty ?>
    <?php if ($totalRows_Recordset4 > 0) { // Show if recordset not empty ?>
     <div class="form-group" align="center">
        <p class="btn-info">Status Pendaftaran Panel</p>
         <div id="piechart_3d2"></div>
    </div>
    <?php } // Show if recordset not empty ?>
    
      <div class="form-group"> <!-- Submit Button -->
          <a href="mainPP.php"><button type="button" name="submit2" class="btn btn-primary">Menu Carian Penilai</button></a>
          <a href="index.php"><button type="button" name="submit" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
      </div>
          
      
    <?php } // Show if recordset not empty ?>
    
<?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
  <p>Carian berikut tidak ditemui, Sila tekan butang Carian Semula.Terima kasih</p>
      <div class="form-group"> <!-- Submit Button -->
          <a href="mainPP.php"><button type="button" name="submit1" class="btn btn-primary">Carian Semula</button></a>
          <a href="index.php"><button type="button" name="submit" class="btn btn-primary"><img src="http://lh3.ggpht.com/A0x3jzuH1qRkE10HcTiT4qQr_6iAqVg-CTsoIqxnoIFyv92V91WI3KqiVlOvLtfoMRg=w300" width="20" height="20"></button></a>
      </div>
        <?php } // Show if recordset empty ?>
</div>
</div>
</div>


</body>
</html>
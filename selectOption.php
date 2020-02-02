<?php require('Connections/ePenilai.php'); ?>
<?php

$daftarSubjekMPV = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPV' ORDER BY subjek ASC");
$row_daftarSubjekMPV = mysqli_fetch_assoc($daftarSubjekMPV);
$totalRows_daftarSubjekMPV = mysqli_num_rows($daftarSubjekMPV);

$daftarSubjekMPV2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPV' ORDER BY subjek ASC");
$row_daftarSubjekMPV2 = mysqli_fetch_assoc($daftarSubjekMPV2);
$totalRows_daftarSubjekMPV2 = mysqli_num_rows($daftarSubjekMPV2);

$daftarSubjekSSEM = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='SSEM' ORDER BY subjek ASC");
$row_daftarSubjekSSEM = mysqli_fetch_assoc($daftarSubjekSSEM);
$totalRows_daftarSubjekSSEM = mysqli_num_rows($daftarSubjekSSEM);

$daftarSubjekSSEM2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='SSEM' ORDER BY subjek ASC");
$row_daftarSubjekSSEM2 = mysqli_fetch_assoc($daftarSubjekSSEM2);
$totalRows_daftarSubjekSSEM2 = mysqli_num_rows($daftarSubjekSSEM2);

$daftarSubjekSTAM = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='STAM' ORDER BY subjek ASC");
$row_daftarSubjekSTAM = mysqli_fetch_assoc($daftarSubjekSTAM);
$totalRows_daftarSubjekSTAM = mysqli_num_rows($daftarSubjekSTAM);

$daftarSubjekSTAM2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='STAM' ORDER BY subjek ASC");
$row_daftarSubjekSTAM2 = mysqli_fetch_assoc($daftarSubjekSTAM2);
$totalRows_daftarSubjekSTAM2 = mysqli_num_rows($daftarSubjekSTAM2);

$daftarSubjekKSSM = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='KSSM' ORDER BY subjek ASC");
$row_daftarSubjekKSSM = mysqli_fetch_assoc($daftarSubjekKSSM);
$totalRows_daftarSubjekKSSM = mysqli_num_rows($daftarSubjekKSSM);

$daftarSubjekKSSM2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='KSSM' ORDER BY subjek ASC");
$row_daftarSubjekKSSM2 = mysqli_fetch_assoc($daftarSubjekKSSM2);
$totalRows_daftarSubjekKSSM2 = mysqli_num_rows($daftarSubjekKSSM2);

$daftarSubjekKSSMPK = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='KSSMPK' ORDER BY subjek ASC");
$row_daftarSubjekKSSMPK = mysqli_fetch_assoc($daftarSubjekKSSMPK);
$totalRows_daftarSubjekKSSMPK = mysqli_num_rows($daftarSubjekKSSMPK);

$daftarSubjekKSSMPK2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='KSSMPK' ORDER BY subjek ASC");
$row_daftarSubjekKSSMPK2 = mysqli_fetch_assoc($daftarSubjekKSSMPK2);
$totalRows_daftarSubjekKSSMPK2 = mysqli_num_rows($daftarSubjekKSSMPK2);

$daftarSubjekMPEI = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPEI' ORDER BY subjek ASC");
$row_daftarSubjekMPEI = mysqli_fetch_assoc($daftarSubjekMPEI);
$totalRows_daftarSubjekMPEI = mysqli_num_rows($daftarSubjekMPEI);


$daftarSubjekMPEI2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPEI' ORDER BY subjek ASC");
$row_daftarSubjekMPEI2 = mysqli_fetch_assoc($daftarSubjekMPEI2);
$totalRows_daftarSubjekMPEI2 = mysqli_num_rows($daftarSubjekMPEI2);


$daftarSubjekMPET = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPET' ORDER BY subjek ASC");
$row_daftarSubjekMPET = mysqli_fetch_assoc($daftarSubjekMPET);
$totalRows_daftarSubjekMPET = mysqli_num_rows($daftarSubjekMPET);


$daftarSubjekMPET2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPET' ORDER BY subjek ASC");
$row_daftarSubjekMPET2 = mysqli_fetch_assoc($daftarSubjekMPET2);
$totalRows_daftarSubjekMPET2 = mysqli_num_rows($daftarSubjekMPET2);


$daftarSubjekKBDKBT = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='KBDKBT' ORDER BY subjek ASC");
$row_daftarSubjekKBDKBT = mysqli_fetch_assoc($daftarSubjekKBDKBT);
$totalRows_daftarSubjekKBDKBT = mysqli_num_rows($daftarSubjekKBDKBT);


$daftarSubjekKBDKBT2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='KBDKBT' ORDER BY subjek ASC");
$row_daftarSubjekKBDKBT2 = mysqli_fetch_assoc($daftarSubjekKBDKBT2);
$totalRows_daftarSubjekKBDKBT2 = mysqli_num_rows($daftarSubjekKBDKBT2);


$daftarSubjekPERALIHAN = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='PERALIHAN' ORDER BY subjek ASC");
$row_daftarSubjekPERALIHAN = mysqli_fetch_assoc($daftarSubjekPERALIHAN);
$totalRows_daftarSubjekPERALIHAN = mysqli_num_rows($daftarSubjekPERALIHAN);


$daftarSubjekPERALIHAN2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='PERALIHAN' ORDER BY subjek ASC");
$row_daftarSubjekPERALIHAN2 = mysqli_fetch_assoc($daftarSubjekPERALIHAN2);
$totalRows_daftarSubjekPERALIHAN2 = mysqli_num_rows($daftarSubjekPERALIHAN2);


$daftarSubjekBRAILLE = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='BRAILLE' ORDER BY subjek ASC");
$row_daftarSubjekBRAILLE = mysqli_fetch_assoc($daftarSubjekBRAILLE);
$totalRows_daftarSubjekBRAILLE = mysqli_num_rows($daftarSubjekBRAILLE);


$daftarSubjekBRAILLE2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='BRAILLE' ORDER BY subjek ASC");
$row_daftarSubjekBRAILLE2 = mysqli_fetch_assoc($daftarSubjekBRAILLE2);
$totalRows_daftarSubjekBRAILLE2 = mysqli_num_rows($daftarSubjekBRAILLE2);


$daftarSubjekMPAK = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPAK' ORDER BY subjek ASC");
$row_daftarSubjekMPAK = mysqli_fetch_assoc($daftarSubjekMPAK);
$totalRows_daftarSubjekMPAK = mysqli_num_rows($daftarSubjekMPAK);


$daftarSubjekMPAK2 = $mysqli->query("SELECT * FROM daftarSubjek WHERE Aliran='MPAK' ORDER BY subjek ASC");
$row_daftarSubjekMPAK2 = mysqli_fetch_assoc($daftarSubjekMPAK2);
$totalRows_daftarSubjekMPAK2 = mysqli_num_rows($daftarSubjekMPAK2);

?>
<script>
/*
From JavaScript and Forms Tutorial at dyn-web.com
Find information and updates at http://www.dyn-web.com/tutorials/forms/
*/

// removes all option elements in select list 
// removeGrp (optional) boolean to remove optgroups

function removeAllOptions(sel, removeGrp) {
    var len, groups, par;
    if (removeGrp) {
        groups = sel.getElementsByTagName('optgroup');
        len = groups.length;
        for (var i=len; i; i--) {
            sel.removeChild( groups[i-1] );
        }
    }
    
    len = sel.options.length;
    for (var i=len; i; i--) {
        par = sel.options[i-1].parentNode;
        par.removeChild( sel.options[i-1] );
    }
}

function appendDataToSelect(sel, obj) {
    var f = document.createDocumentFragment();
    var labels = [], group, opts;
    
    function addOptions(obj) {
        var f = document.createDocumentFragment();
        var o;
        
        for (var i=0, len=obj.text.length; i<len; i++) {
            o = document.createElement('option');
            o.appendChild( document.createTextNode( obj.text[i] ) );
            
            if ( obj.value ) {
                o.value = obj.value[i];
            }
            
            f.appendChild(o);
        }
        return f;
    }
    
    if ( obj.text ) {
        opts = addOptions(obj);
        f.appendChild(opts);
    } else {
        for ( var prop in obj ) {
            if ( obj.hasOwnProperty(prop) ) {
                labels.push(prop);
            }
        }
        
        for (var i=0, len=labels.length; i<len; i++) {
            group = document.createElement('optgroup');
            group.label = labels[i];
            f.appendChild(group);
            opts = addOptions(obj[ labels[i] ] );
            group.appendChild(opts);
        }
    }
    sel.appendChild(f);
}

// anonymous function assigned to onchange event of controlling select list
document.forms['prosesDaftar'].elements['aliran'].onchange = function(e) {
    // name of associated select list
    var relName = 'judul[]';
    
    // reference to associated select list 
    var relList = this.form.elements[ relName ];
    
    // get data from object literal based on selection in controlling select list (this.value)
    var obj = Select_List_Data[ relName ][ this.value ];
    
    // remove current option elements
    removeAllOptions(relList, true);
    
    // call function to add optgroup/option elements
    // pass reference to associated select list and data for new options
    appendDataToSelect(relList, obj);
};

// object literal holds data for optgroup/option elements
var Select_List_Data = {
    
    // name of associated select list
    'judul[]': {
        
        // names match option values in controlling select list
        MPV: {
            // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekMPV['subjek']?>',
            <?php }while($row_daftarSubjekMPV = mysqli_fetch_assoc($daftarSubjekMPV))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekMPV2['subjek']?>',
            <?php }while($row_daftarSubjekMPV2 = mysqli_fetch_assoc($daftarSubjekMPV2))?>
            
                   ]
        },
        
        KBDKBT: {
            // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekKBDKBT['subjek']?>',
            <?php }while($row_daftarSubjekKBDKBT = mysqli_fetch_assoc($daftarSubjekKBDKBT))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekKBDKBT2['subjek']?>',
            <?php }while($row_daftarSubjekKBDKBT2 = mysqli_fetch_assoc($daftarSubjekKBDKBT2))?>
            
                   ]
        },
        
        KSSM: {
            // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekKSSM['subjek']?>',
            <?php }while($row_daftarSubjekKSSM = mysqli_fetch_assoc($daftarSubjekKSSM))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekKSSM2['subjek']?>',
            <?php }while($row_daftarSubjekKSSM2 = mysqli_fetch_assoc($daftarSubjekKSSM2))?>
            
                   ]
            
        },
        
        KSSMPK: {
            // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekKSSMPK['subjek']?>',
            <?php }while($row_daftarSubjekKSSMPK = mysqli_fetch_assoc($daftarSubjekKSSMPK))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekKSSMPK2['subjek']?>',
            <?php }while($row_daftarSubjekKSSMPK2 = mysqli_fetch_assoc($daftarSubjekKSSMPK2))?>
            
                   ]
        },
        
        MPAK: {
            // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekMPAK['subjek']?>',
            <?php }while($row_daftarSubjekMPAK = mysqli_fetch_assoc($daftarSubjekMPAK))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekMPAK2['subjek']?>',
            <?php }while($row_daftarSubjekMPAK2 = mysqli_fetch_assoc($daftarSubjekMPAK2))?>
            
                   ]
        },
        
        MPET: {
            // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekMPET['subjek']?>',
            <?php }while($row_daftarSubjekMPET = mysqli_fetch_assoc($daftarSubjekMPET))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekMPET2['subjek']?>',
            <?php }while($row_daftarSubjekMPET2 = mysqli_fetch_assoc($daftarSubjekMPET2))?>
            
                   ]
        },
        
        PERALIHAN: {
            // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekPERALIHAN['subjek']?>',
            <?php }while($row_daftarSubjekPERALIHAN = mysqli_fetch_assoc($daftarSubjekPERALIHAN))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekPERALIHAN2['subjek']?>',
            <?php }while($row_daftarSubjekPERALIHAN2 = mysqli_fetch_assoc($daftarSubjekPERALIHAN2))?>
            
                   ]
                   
        },
        
        SSEM: {
           // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekSSEM['subjek']?>',
            <?php }while($row_daftarSubjekSSEM = mysqli_fetch_assoc($daftarSubjekSSEM))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekSSEM2['subjek']?>',
            <?php }while($row_daftarSubjekSSEM2 = mysqli_fetch_assoc($daftarSubjekSSEM2))?>
            
                   ]
        },
        
       STAM: {
           // example without optgroups
            text: [
                
            <?php do{?>
            '<?php echo $row_daftarSubjekSTAM['subjek']?>',
            <?php }while($row_daftarSubjekSTAM = mysqli_fetch_assoc($daftarSubjekSTAM))?>
            
                  ],
            
            value: [
            
            <?php do{?>
            '<?php echo $row_daftarSubjekSTAM2['subjek']?>',
            <?php }while($row_daftarSubjekSTAM2 = mysqli_fetch_assoc($daftarSubjekSTAM2))?>
            
                   ]
        }, 
        
        
    }
    
};

// populate associated select list when page loads
window.onload = function() {
    var form = document.forms['prosesDaftar'];
    
    // reference to controlling select list
    var sel = form.elements['aliran'];
    sel.selectedIndex = 0;
    
    // name of associated select list
    var relName = 'judul[]';
    // reference to associated select list
    var rel = form.elements[ relName ];
    
    // get data for associated select list passing its name
    // and value of selected in controlling select list
    var data = Select_List_Data[ relName ][ sel.value ];
    
    // add options to associated select list
    appendDataToSelect(rel, data);
};

// JavaScript Document
</script>
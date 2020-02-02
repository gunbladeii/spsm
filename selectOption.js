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
            text: ['AKUAKULTUR DAN HAIWAN REKREASI TINGKATAN 4 DAN 5',
'ASUHAN DAN PENDIDIKAN AWAL KANAK-KANAK TINGKATAN 4 DAN 5',
'GERONTOLOGI ASAS DAN GERIATRIK TINGKATAN 4 DAN 5',
'HIASAN DALAMAN TINGKATAN 4 DAN 5',
'KATERING DAN PENYAJIAN TINGKATAN 4 DAN 5',
'KERJA PAIP DOMESTIK TINGKATAN 4 DAN 5',
'KIMPALAN ARKA DAN GAS TINGKATAN 4 DAN 5',
'LANDSKAP DAN NURSERI TINGKATAN 4 DAN 5',
'MENSERVIS AUTOMOBIL TING. 4 DAN 5',
'MENSERVIS MOTOSIKAL TINGKATAN 4 DAN 5',
'MENSERVIS PERALATAN ELEKTRIK DOMESTIK TINGKATAN 4 DAN 5',
'MENSERVIS PERALATAN PENYEJUKAN DAN PENYAMANAN UDARA TINGKATAN 4 DAN 5',
'PEMBINAAN DOMESTIK TINGKATAN 4 DAN 5',
'PEMBUATAN PERABOT TINGKATAN 4 DAN 5',
'PEMPROSESAN MAKANAN TINGKATAN 4 DAN 5',
'PENDAWAIAN DOMESTIK TINGKATAN 4 DAN 5',
'PENJAGAAN MUKA DAN PENGGAYAAN RAMBUT TINGKATAN 4 DAN 5',
'PRODUKSI MULTIMEDIA TINGKATAN 4 DAN 5',
'PRODUKSI REKA TANDA TINGKATAN 4 DAN 5',
'REKA BENTUK GRAFIK DIGITAL TINGKATAN 4 DAN 5',
'REKAAN DAN JAHITAN PAKAIAN TINGKATAN 4 DAN 5',
'TANAMAN MAKANAN TINGKATAN 4 DAN 5'],
            value: ['AKUAKULTUR DAN HAIWAN REKREASI TINGKATAN 4 DAN 5',
'ASUHAN DAN PENDIDIKAN AWAL KANAK-KANAK TINGKATAN 4 DAN 5',
'GERONTOLOGI ASAS DAN GERIATRIK TINGKATAN 4 DAN 5',
'HIASAN DALAMAN TINGKATAN 4 DAN 5',
'KATERING DAN PENYAJIAN TINGKATAN 4 DAN 5',
'KERJA PAIP DOMESTIK TINGKATAN 4 DAN 5',
'KIMPALAN ARKA DAN GAS TINGKATAN 4 DAN 5',
'LANDSKAP DAN NURSERI TINGKATAN 4 DAN 5',
'MENSERVIS AUTOMOBIL TING. 4 DAN 5',
'MENSERVIS MOTOSIKAL TINGKATAN 4 DAN 5',
'MENSERVIS PERALATAN ELEKTRIK DOMESTIK TINGKATAN 4 DAN 5',
'MENSERVIS PERALATAN PENYEJUKAN DAN PENYAMANAN UDARA TINGKATAN 4 DAN 5',
'PEMBINAAN DOMESTIK TINGKATAN 4 DAN 5',
'PEMBUATAN PERABOT TINGKATAN 4 DAN 5',
'PEMPROSESAN MAKANAN TINGKATAN 4 DAN 5',
'PENDAWAIAN DOMESTIK TINGKATAN 4 DAN 5',
'PENJAGAAN MUKA DAN PENGGAYAAN RAMBUT TINGKATAN 4 DAN 5',
'PRODUKSI MULTIMEDIA TINGKATAN 4 DAN 5',
'PRODUKSI REKA TANDA TINGKATAN 4 DAN 5',
'REKA BENTUK GRAFIK DIGITAL TINGKATAN 4 DAN 5',
'REKAAN DAN JAHITAN PAKAIAN TINGKATAN 4 DAN 5',
'TANAMAN MAKANAN TINGKATAN 4 DAN 5']
        },
        
        KBDKBT: {
            // example without optgroups
            text: ['AL ADAB WA BALAGHAH',
'AL LUGHATUL AL ARABIAH AL MUAASSIRAH',
'MANAHIJ AL ULUM AL ISLAMIAH'
],
            value: ['AL ADAB WA BALAGHAH',
'AL LUGHATUL AL ARABIAH AL MUAASSIRAH',
'MANAHIJ AL ULUM AL ISLAMIAH']
        },
        
        KSSM: {
            // example without optgroups
            text: ['ASAS SAINS KOMPUTER',
'BAHASA ANTARABANGSA BAHASA CINA',
'BAHASA ARAB',
'BAHASA CINA',
'BAHASA IBAN',
'BAHASA JEPUN',
'BAHASA JERMAN',
'BAHASA KADAZANDUSUN',
'BAHASA MELAYU',
'BAHASA PERANCIS',
'BAHASA SEMAI',
'BAHASA TAMIL',
'BIOLOGI',
'EKONOMI',
'ENGLISH',
'ENGLISH FOR COMMUNICATION',
'FIZIK',
'GEOGRAFI',
'KESUSASTERAAN CINA',
'KESUSASTERAAN MELAYU',
'KESUSASTERAAN TAMIL',
'KEUSAHAWANAN',
'KIMIA',
'KOMSAS BM',
'MAHARAT AL-QURAN',
'MATEMATIK',
'MATEMATIK TAMBAHAN',
'PENDIDIKAN AL-QURAN DAN AL-SUNNAH',
'PENDIDIKAN ISLAM',
'PENDIDIKAN JASMANI DAN PENDIDIKAN KESIHATAN',
'PENDIDIKAN MORAL',
'PENDIDIKAN MUZIK',
'PENDIDIKAN SENI VISUAL',
'PENDIDIKAN SYARIAH ISLAMIAH',
'PERNIAGAAN',
'PRINSIP PERAKAUNAN',
'REKA BENTUK DAN TEKNOLOGI',
'SAINS',
'SAINS TAMBAHAN',
'SEJARAH',
'TASAWWUR ISLAM',
'USUL AL DIN'],
            value: ['ASAS SAINS KOMPUTER',
'BAHASA ANTARABANGSA BAHASA CINA',
'BAHASA ARAB',
'BAHASA CINA',
'BAHASA IBAN',
'BAHASA JEPUN',
'BAHASA JERMAN',
'BAHASA KADAZANDUSUN',
'BAHASA MELAYU',
'BAHASA PERANCIS',
'BAHASA SEMAI',
'BAHASA TAMIL',
'BIOLOGI',
'EKONOMI',
'ENGLISH',
'ENGLISH FOR COMMUNICATION',
'FIZIK',
'GEOGRAFI',
'KESUSASTERAAN CINA',
'KESUSASTERAAN MELAYU',
'KESUSASTERAAN TAMIL',
'KEUSAHAWANAN',
'KIMIA',
'KOMSAS BM',
'MAHARAT AL-QURAN',
'MATEMATIK',
'MATEMATIK TAMBAHAN',
'PENDIDIKAN AL-QURAN DAN AL-SUNNAH',
'PENDIDIKAN ISLAM',
'PENDIDIKAN JASMANI DAN PENDIDIKAN KESIHATAN',
'PENDIDIKAN MORAL',
'PENDIDIKAN MUZIK',
'PENDIDIKAN SENI VISUAL',
'PENDIDIKAN SYARIAH ISLAMIAH',
'PERNIAGAAN',
'PRINSIP PERAKAUNAN',
'REKA BENTUK DAN TEKNOLOGI',
'SAINS',
'SAINS TAMBAHAN',
'SEJARAH',
'TASAWWUR ISLAM',
'USUL AL DIN']
        },
        
        KSSMPK: {
            // example without optgroups
            text: ['BAHASA MELAYU KOMUNIKASI PENDIDIKAN KHAS',
'ENGLISH FOR COMMUNICATION (SPECIAL EDUCATION)',
'MATEMATIK PENDIDIKAN KHAS',
'PENDIDIKAN ISLAM PENDIDIKAN KHAS',
'PENDIDIKAN JASMANI DAN PENDIDIKAN KESIHATAN PENDIDIKAN KHAS',
'PENDIDIKAN MORAL PENDIDIKAN KHAS',
'PENDIDIKAN MUZIK PENDIDIKAN KHAS',
'PENDIDIKAN SAINS SOSIAL DAN ALAM SEKITAR PENDIDIKAN KHAS',
'PENDIDIKAN SENI VISUAL PENDIDIKAN KHAS'],
            value: ['BAHASA MELAYU KOMUNIKASI PENDIDIKAN KHAS',
'ENGLISH FOR COMMUNICATION (SPECIAL EDUCATION)',
'MATEMATIK PENDIDIKAN KHAS',
'PENDIDIKAN ISLAM PENDIDIKAN KHAS',
'PENDIDIKAN JASMANI DAN PENDIDIKAN KESIHATAN PENDIDIKAN KHAS',
'PENDIDIKAN MORAL PENDIDIKAN KHAS',
'PENDIDIKAN MUZIK PENDIDIKAN KHAS',
'PENDIDIKAN SAINS SOSIAL DAN ALAM SEKITAR PENDIDIKAN KHAS',
'PENDIDIKAN SENI VISUAL PENDIDIKAN KHAS']
        },
        
        MPAK: {
            // example without optgroups
            text: ['BAHASA INGGERIS ALIRAN KEMAHIRAN TINGKATAN 4',
'MATEMATIK ALIRAN KEMAHIRAN TINGKATAN 4',
'PENDIDIKAN ISLAM ALIRAN KEMAHIRAN TINGKATAN 4',
'PENDIDIKAN MORAL ALIRAN KEMAHIRAN TINGKATAN 4'],
            value: ['BAHASA INGGERIS ALIRAN KEMAHIRAN TINGKATAN 4',
'MATEMATIK ALIRAN KEMAHIRAN TINGKATAN 4',
'PENDIDIKAN ISLAM ALIRAN KEMAHIRAN TINGKATAN 4',
'PENDIDIKAN MORAL ALIRAN KEMAHIRAN TINGKATAN 4']
        },
        
        MPET: {
            // example without optgroups
            text: ['LUKISAN KEJURUTERAAN',
'PENGAJIAN KEJURUTERAAN AWAM',
'PENGAJIAN KEJURUTERAAN AWAM',
'PENGAJIAN KEJURUTERAAN ELEKTRIK & ELEKTRONIK',
'PENGAJIAN KEJURUTERAAN ELEKTRIK & ELEKTRONIK',
'PENGAJIAN KEJURUTERAAN MEKANIKAL',
'PENGAJIAN KEJURUTERAAN MEKANIKAL',
'PENGAJIAN KEUSAHAWANAN'],
            value: ['LUKISAN KEJURUTERAAN',
'PENGAJIAN KEJURUTERAAN AWAM',
'PENGAJIAN KEJURUTERAAN AWAM',
'PENGAJIAN KEJURUTERAAN ELEKTRIK & ELEKTRONIK',
'PENGAJIAN KEJURUTERAAN ELEKTRIK & ELEKTRONIK',
'PENGAJIAN KEJURUTERAAN MEKANIKAL',
'PENGAJIAN KEJURUTERAAN MEKANIKAL',
'PENGAJIAN KEUSAHAWANAN']
        },
        
        PERALIHAN: {
            // example without optgroups
            text: ['AMALAN BAHASA MELAYU',
'BAHASA CINA KELAS PERALIHAN ',
'BAHASA MELAYU PERALIHAN',
'BAHASA TAMIL KELAS PERALIHAN ',
'ENGLISH FOR REMOVE CLASS',
'PENDIDIKAN JASMANI DAN PENDIDIKAN KESIHATAN KELAS PERALIHAN',
'PENDIDIKAN SENI VISUAL KELAS PERALIHAN'],
            value: ['AMALAN BAHASA MELAYU',
'BAHASA CINA KELAS PERALIHAN ',
'BAHASA MELAYU PERALIHAN',
'BAHASA TAMIL KELAS PERALIHAN ',
'ENGLISH FOR REMOVE CLASS',
'PENDIDIKAN JASMANI DAN PENDIDIKAN KESIHATAN KELAS PERALIHAN',
'PENDIDIKAN SENI VISUAL KELAS PERALIHAN']
        },
        
        SSEM: {
            // example without optgroups
            text: ['LUKISAN TINGKATAN 4 SEKOLAH SENI MALAYSIA',
'PENGKHUSUSAN KOMUNIKASI VISUAL TINGKATAN 4  SEKOLAH SENI MALAYSIA',
'PENGKHUSUSAN REKA BENTUK TINGKATAN 4 SEKOLAH SENI MALAYSIA',
'PENGKHUSUSAN SENI HALUS TINGKATAN 4  SEKOLAH SENI MALAYSIA',
'PRODUKSI SENI PERSEMBAHAN TINGKATAN 4 SEKOLAH SENI MALAYSIA',
'SEJARAH DAN PENGURUSAN SENI TINGKATAN 5 SEKOLAH SENI MALAYSIA',
'SENI MUZIK',
'SENI TARI',
'SENI TEATER'],
            value: ['LUKISAN TINGKATAN 4 SEKOLAH SENI MALAYSIA ',
'PENGKHUSUSAN KOMUNIKASI VISUAL TINGKATAN 4  SEKOLAH SENI MALAYSIA',
'PENGKHUSUSAN REKA BENTUK TINGKATAN 4 SEKOLAH SENI MALAYSIA',
'PENGKHUSUSAN SENI HALUS TINGKATAN 4  SEKOLAH SENI MALAYSIA',
'PENGKHUSUSAN SENI MUZIK TINGKATAN 4  SEKOLAH SENI MALAYSIA',
'PRODUKSI SENI PERSEMBAHAN TINGKATAN 4 SEKOLAH SENI MALAYSIA ',
'SEJARAH DAN PENGURUSAN SENI TINGKATAN 5 SEKOLAH SENI MALAYSIA ',
'SENI MUZIK',
'SENI TARI',
'SENI TEATER']
        },
        
       STAM: {
            // example without optgroups
            text: ['Bughyatu Al-Tolibin & Al-Wajiz Fi Al-Mirath',
'Tafsir Al-Nasafi',
'Fath Al- Mubdi',
'Syarah Jauharatu al-Tauhid & Syarah al-Mullawi',
'Syarah Ibnu Aqil Li Al-Soffi Al-Thani',
'Al-Sarf al-Muyassar & Muzakirah al-Firaq',
'Al-Iqna',
'Al-Mutalaah Wa Al-Insya’ Li Al-Soffi Al-Awal & Al-Soffi Al-Thani Al-Thanawi',
'Al-Mutalaah Wa Al-Insya’ Li Al-Soffi Al-Thalis & Al-Qutuf Al-Daniah',
'Syarah Ibnu Aqil Li Al-Soffi Al-Thalis',
'Tarikh Al-Adab Al-Arabi',
'Al-Balaghah Al-Arabiah Li Al-Soffi Al-Thani',
'Al-Balaghah Al-Arabiah Li Al-Soffi Al-Thalis'],
            value: ['Bughyatu Al-Tolibin & Al-Wajiz Fi Al-Mirath',
'Tafsir Al-Nasafi',
'Fath Al- Mubdi',
'Syarah Jauharatu al-Tauhid & Syarah al-Mullawi',
'Syarah Ibnu Aqil Li Al-Soffi Al-Thani',
'Al-Sarf al-Muyassar & Muzakirah al-Firaq',
'Al-Iqna',
'Al-Mutalaah Wa Al-Insya’ Li Al-Soffi Al-Awal & Al-Soffi Al-Thani Al-Thanawi',
'Al-Mutalaah Wa Al-Insya’ Li Al-Soffi Al-Thalis & Al-Qutuf Al-Daniah',
'Syarah Ibnu Aqil Li Al-Soffi Al-Thalis',
'Tarikh Al-Adab Al-Arabi',
'Al-Balaghah Al-Arabiah Li Al-Soffi Al-Thani',
'Al-Balaghah Al-Arabiah Li Al-Soffi Al-Thalis']
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
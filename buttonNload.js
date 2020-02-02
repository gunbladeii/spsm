// loading page  

var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}


		
// diasble button submit kalau xtick       
$(document).ready(function() { 
 
   $('#load').attr("disabled",true);
 
   $("#cbox").click(function() {
   $("#load").attr("disabled", !this.checked);
});
 
});
  



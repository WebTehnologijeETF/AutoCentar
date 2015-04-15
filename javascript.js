 function prikaziMeni(){
	 
   document.getElementById("padajuci").style.display="block";
 }
 function sakrijMeni(){
   document.getElementById("padajuci").style.display="none";
 }
 
 function oboji(obj){	
     obj.style.backgroundColor = "#FFB2B2";  
 }
 function vratiBoju(obj){
	 obj.style.backgroundColor="white";   
	
 }
 
 function pomocna(){
	 
	 location.href = "naslovna.html";
 }
 
 function funkcija(boja){
	 
	 getElementById("oznaka").style.backgroundColor=boja;
 }
 
 function provjeriFormu(){
	 var x;
	 var y;
	 
	x=provjeriMail();
	y=provjeriTelefon();
	if (x==true && y==true)
	document.forms["mojaForma"].submit();
		
 }

   
function provjeriMail(){  
   var mail = document.mojaForma.email.value;
   if (mail.length!=0){
	   atpoz = mail.indexOf("@");
	   dotpoz = mail.lastIndexOf(".");
	   if (atpoz < 1 || ( dotpoz - atpoz < 2 )) 
	   {
		   alert("Niste unijeli ispravnu e-mail adresu");
		   document.mojaForma.email.focus() ;
		   return false;
	   }
   }
   return true;
}

function provjeriTelefon(){
	
	if(document.mojaForma.telefon.value == "" ) return true;
	else{
		var tel = document.mojaForma.telefon.value;
		var telefonRegEx = /^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/;
		alert("Niste unijeli ispravan broj telefona");
		if (!telefonRegEx.test(tel)) {
			greska.innerHTML+="Telefon format: (061)-123-345 ili 061-123-456 ili 061123456<br>";
			alert("Niste unijeli ispravan broj telefona");
			return false;
		}
	}
	return true;
}

function provjeriGrad(){
	var x = document.getElementById("grad");
	
	var i;
    for(i=x.options.length-1;i>=0;i--)
    {
        x.remove(i);
    }
	
	if (document.mojaForma.OdaberiDrzavu.value == "BiH"){
		var option = document.createElement("option");
		option.text= "";
		x.add(option);
		var option1 = document.createElement("option");
		option1.text= "Sarajevo";
		x.add(option1);
		var option2 = document.createElement("option");
		option2.text= "Zenica";
		x.add(option2);
		var option3 = document.createElement("option");
		option3.text= "Mostar";
		x.add(option3);	
	}
	if (document.mojaForma.OdaberiDrzavu.value == "Hrvatska"){
		var option = document.createElement("option");
		option.text= "";
		x.add(option);
		var option1 = document.createElement("option");
		option1.text= "Osijek";
		x.add(option1);
		var option2 = document.createElement("option");
		option2.text= "Split";
		x.add(option2);
		var option3 = document.createElement("option");
		option3.text= "Zagreb";
		x.add(option3);
	}
	if (document.mojaForma.OdaberiDrzavu.value == "Druga"){
		var option = document.createElement("option");
		option.text= "/";
		x.add(option);
	}
	
	
}
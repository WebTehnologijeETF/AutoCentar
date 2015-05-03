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
	validirajAjax();
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
		   document.mojaForma.email.focus();
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
		if (!telefonRegEx.test(tel)) {
			alert("Niste unijeli ispravan broj telefona: (061)-123-345 ili 061-123-456 ili 061123456");
			document.mojaForma.telefon.focus();
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

function otvoriStranicu(stranica)
{
	
	var ajax = new XMLHttpRequest();

	ajax.onreadystatechange=function(){
		if(ajax.readyState == 4 && ajax.status == 200) {
			document.open();
			document.write(ajax.responseText);
			document.close();
		}
	}
	ajax.open("GET",stranica, true);
	ajax.send();
}

function validirajAjax(){
	var opcina = document.getElementById("ajaxOpcina").value;
	console.log(opcina);
	
	var mjesto = document.getElementById("ajaxMjesto").value;
	console.log(mjesto);
	 if (opcina=="" || mjesto=="") return false;
	 
	var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
				var odgovor = ajax.responseText;
				var odgovori = new Array();
				
				odgovori=odgovor.split(":");
				odgovori[0]=odgovori[0].replace('{"greska"', 'greska');
				if (odgovori[1]=='"Nepostojeća općina"}') odgovori[1]=odgovori[1].replace('"Nepostojeća općina"}', 'Nepostojeća općina');
				if (odgovori[1]=='"Nepostojeće mjesto"}') odgovori[1]=odgovori[1].replace('"Nepostojeće mjesto"}', 'Nepostojeće mjesto');
				
				if (ajax.readyState == 4 && ajax.status == 200)
                {
					if (odgovori[0]=="greska"){
					
						if (odgovori[1] == "Nepostojeća općina") {
								document.getElementById("ajaxOpcina").value="Ne postoji unesena opcina";
							
                                document.getElementById("ajaxOpcina").style.backgroundColor="#FF9999";
								document.getElementById("ajaxMjesto").style.backgroundColor="#FF9999";
								return false;
                        }  
						
						if (odgovori[1] == "Nepostojeće mjesto") {
                                document.getElementById("ajaxMjesto").style.backgroundColor="#FF9999";
								document.getElementById("ajaxMjesto").value="Ne postoji uneseno mjesto";
								return false;
                        }  
					}
					else{
						document.getElementById("ajaxOpcina").style.backgroundColor="white";
								document.getElementById("ajaxMjesto").style.backgroundColor="white";
					}
                }
				
                if (ajax.readyState == 4 && ajax.status == 404){
					return false;
				}
					
                       
			}
			
			ajax.open("GET", "http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina=" + opcina + "&mjesto=" + mjesto, true);
			ajax.send();
 
};
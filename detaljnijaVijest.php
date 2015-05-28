<!DOCTYPE html>
<html>
	<head>
		<title>Auto-centar</title>
		<META http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="stil.css">
		<script src="javascript.js"></script>
	</head>

	<body>

		<h1 class="sredina menu"> Auto-centar Sarajevo </h1>

		<div class="dodatakNaslovnoj">
		
		</div>

		 

			<ul class="uredi">
				<li class="uredi2"><a class="uredi3" onclick="otvoriStranicu('Partneri.html')">Partneri</a>
				</li>
				<li class="uredi2"><a class="uredi3" onclick="otvoriStranicu('Kontakt.html')">Kontakt</a></li>
				<li class="uredi2"><a class="uredi3" onclick="otvoriStranicu('Usluge.html')">Usluge</a></li>
				<li class="uredi2 uredi3 oznaceno" onclick="prikaziMeni()" onmouseout="sakrijMeni()">Naslovna
				
					<ul id="padajuci" class="nemojPrikazati padajuciMeni" onmouseout="sakrijMeni()">
						<li onmouseover="prikaziMeni(); oboji(this);" onmouseout="vratiBoju(this);">Vijesti</li>
						<li onmouseover="prikaziMeni(); oboji(this);" onmouseout="vratiBoju(this);">Poruke</li>
					</ul>
					
				</li>
				
				
				
			</ul>
			
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			
			<div class="zatvoreno">
			<div class="menu">
			
			
			<div class="tekstusredinu">
			
			<?php
			
			session_start();
			
			$veza = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "wt8user", "wt8pass");
			 $veza->exec("set names utf8");
			 $rezultat = $veza->query("select datum, autor, naslov, tekst, slika, detaljno from novosti order by datum");
			 if (!$rezultat) {
				  $greska = $veza->errorInfo();
				  print "SQL greška: " . $greska[2];
				  exit();
			 }
			 
			 foreach ($rezultat as $novosti) {
				
					 $tekst=$novosti['tekst'];
					 $autor=$novosti['autor'];
					 $naslov=$novosti['naslov'];
					 $slika=$novosti['slika'];
					 $datum=$novosti['datum'];
					 $detaljno=$novosti['detaljno'];
					 //if ($_SESSION['nazivFajla']==$value){
				if ($_SESSION['nazivFajla']==$naslov){
					 print "<h1>$naslov</h1>";
					 print "Datum: $datum";
					 echo "<br>";
					 print "Autor: $autor";
					 echo "<br><br>";
					 ?> <img src='<?= $slika ?>'> <br> <?php
					 echo "<br><br>";
					 print "$tekst";
					 echo "<br>";
					 print "$detaljno";
				 }
				 
		}
		
			 
			 
			
			/*//include 'Naslovna.php';
			   session_start();
			   //echo "Sesija je: " . $_SESSION['datum'];
				$log_directory = 'novosti';

				$results_array = array();
				
				//Open directory
				$dir = dir("novosti");

				//List files in directory
				while (($file = $dir->read()) !== false){
					//da li je .txt fajl
					if(strlen($file) < 5 || substr($file, -4) != '.txt')
						continue;
					$results_array[]=$file;
				}
				$dir->close();
				
				$novost='novosti/';
				foreach($results_array as $value)
				{
					
					$naziv=$novost . $value;
					
					 $fp = fopen($naziv, "r");
					 $brojac=0;
					 $line=fgets($fp);
					 if ($_SESSION['nazivFajla']==$value){
						 //echo $_SESSION['nazivFajla']. "haha";
						 //if ($nazivFajla==$value){
							 echo "Datum: ". $line;
						 
						 echo "<br>";
						 while (!feof($fp)){
							$line = fgets($fp);
							
							
							
						
						if ($brojac==1){
							echo "Autor: ";
						}
						if ($brojac==2){
							echo "<br>"; 
							$line=strtolower($line);
							$line[0]=strtoupper($line[0]);
						}
						if($brojac==3){
							?>
								<img src='<?= $line ?>'> <br>
							<?php
							echo "<br>";
							$brojac++;
							continue;
						}
						$brojac++;
						if ($brojac==3){
							?> <h1> <?= $line ?> </h1> <?php 
							echo "<br>";
							continue;
						}
						echo $line ."<br>";
						$brojac++;
						
					 }
					 
					 fclose($fp);
					 }
					 
				}	*/
			?>
			</div>
			<hr>
			
			<div class="slikaDno">
			<br><br><br><br><br><br><br><br><br><br>
			<p class="dodatakTekst">    360° perfektno. Iznad standarda. Vozi u budućnost i daj svom <br>automobilu krila. Posjeti auto-centar Sarajevo i uživaj...</p>
			</div>
			
			<form class="idinavrh" action=#>
			<input type="submit" value="Idi na vrh">
			</form>
			
	</body>

</html> 
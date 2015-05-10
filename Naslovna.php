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
			
			<h1 class="tekstusredinu">Novo u ponudi</h1>
			<p class="autor tekstusredinu"><b>Autor:</b> Jasmin Mehanović <br><b>Datum:</b> 24.3.2015.</p>
			<p class="menu tekstusredinu">Poštovani kupci i posjetitelji naše internetske stranice, obaviještavamo vas da je ponuda automobila za prodaju obogaćena novim modelima. Također, od trećeg mjeseca ove godine omogućena je narudžba dijelova za automobile iz drugih zemalja. Ponudu pogledajte klikom na "Usluge" u meniju stranice, a za narudžbu dijelova za automobile pronađite naš kontakt telefon i pozovite nas.<br><br><a class="nemojpodvuci font1" href="">Detaljnije...</a></p>
			<hr>
			</div>
			
			<div class="tekstusredinu">
			
			<?php
			session_start();
			  
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
					
					 while (!feof($fp)){
						$line = fgets($fp);
						
						if ($brojac==0){
							$_SESSION['datum'] = $line;
							echo "Datum: ";
						}
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
						if ($brojac>=8){
							if ($line!=""){ 
							if ($brojac==8){
								echo "<br>";
								?> <a style="background-color: red" onclick="otvoriStranicu('detaljnijaVijest.php')">Detaljnije</a> <?php
							}
							continue; }
						}
						echo $line ."<br>";
						
						
					 }
					 
					 fclose($fp);
					 //echo "SESIJA JE: " . $_SESSION['datum'];
					?> <hr> <?php
				}	
			?>
			</div>
			
			<div class="slikaDno">
			<br><br><br><br><br><br><br><br><br><br>
			<p class="dodatakTekst">    360° perfektno. Iznad standarda. Vozi u budućnost i daj svom <br>automobilu krila. Posjeti auto-centar Sarajevo i uživaj...</p>
			</div>
			
			<form class="idinavrh" action=#>
			<input type="submit" value="Idi na vrh">
			</form>
			
	</body>

</html> 
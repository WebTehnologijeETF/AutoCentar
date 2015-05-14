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
			
			
			<div class="tekstusredinu">
			
			<?php
			session_start();
			  //$_SESSION['nazivFajla'];
				$log_directory = 'novosti';

				$results_array = array();
				$nizDatuma = array();
				//$indexTekst=0;
				//$nazivFajla;
				//Open directory
				$dir = dir("novosti");
				$novost='novosti/';
				//List files in directory
				while (($file = $dir->read()) !== false){
					//da li je .txt fajl
					if(strlen($file) < 5 || substr($file, -4) != '.txt')
						continue;
					$results_array[]=$file;
				}
				$dir->close();
				
				
				//niz datuma svih objava
				foreach($results_array as $value)
				{
					$naziv=$novost . $value;
					$fp = fopen($naziv, "r");
					$nizDatuma[] = fgets($fp);
					fclose($fp);
				}
				
				
				//poredaj po vremenu objave
				for ($j=0; $j < count($results_array); $j++) { 
						for ($k=$j+1; $k < count($results_array); $k++) { 
						//echo date('r', strtotime($nizDatuma[$j]));
						//if (strtotime($nizDatuma[$j])==false){
							if(strtotime($nizDatuma[$j])<strtotime($nizDatuma[$k])){
								$fp = fopen("novosti/".$results_array[$k], "r");
								$fpp = fopen("novosti/".$results_array[$j], "r");
								$temp=$results_array[$j];
								$results_array[$j]=$results_array[$k];
								$results_array[$k]=$temp;
								fclose($fp);
								fclose($fpp);
							}

							
														
						}
				}
				
				/*//ispisi datume
				for ($j=0; $j<count($results_array); $j++)
				{
					echo $nizDatuma[$j];
					echo "<br>";
				}*/
				
				//foreach($results_array as $value)
				for ($j=0; $j<count($results_array); $j++)
				{
					//$niz[$indexTekst]=$value;
					//$indexTekst++;
					$naziv=$novost . $results_array[$j];
					
					 $fp = fopen($naziv, "r");
					 $brojac=0;
					
					 while (!feof($fp)){
						$line = fgets($fp);
						
						if ($brojac==0){
							//$_SESSION['datum'] = $line;
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
								?> <a style="background-color: red" onclick="otvoriStranicu('detaljnijaVijest.php'); <?php $_SESSION['nazivFajla']=$value; ?>">Detaljnije</a> <?php
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
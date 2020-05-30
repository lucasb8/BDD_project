<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "navbar.php";
include "conn.php";
?>


<?php

if(isset($_GET["lundi"])) // Une semaine précise est demandée
{
    $ts = $_GET["lundi"];
}
else //On prendra la semaine d'aujourd'hui
{
    $day = (date('w') - 1); //Jour dans la semaine... Lundi = 0
    $diff = $day * 86400; //Différence en secondes par rapport au lundi
    $ts = (time() - $diff); //On récupère le TimeStamp du lundi
}

//Initialisation des variables
$tabJour = array("", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$tabMois = array("", "01"=>"Janvier ", "02"=>"Février ", "03"=>"Mars ", "04"=>"Avril ", "05"=>"Mai ",
    "06"=>"Juin ", "07"=>"Juillet ", "08"=>"Aout ", "09"=>"Septembre ", "10"=>"Octobre ",
    "11"=>"Novembre ", "12"=>"Décembre ");
$week = date('W', $ts); //Semaine en cours
$avant = $ts - 604800; //TimeStamp Lundi précédant
$apres = $ts + 604800; //TimeStamp Lundi suivant
?>

<head>
	<meta charset="UTF-8">
	<title>Calendrier par Semaine</title>
	<link rel="stylesheet" type="text/css" href="cssCalendrier.css">
	
	<script type="text/javascript">
		var msg = ""; //Initialisation de la variable "msg"
		
		function pasRDV(e)
		{
			msg = "Il n'y a pas de rendez-vous à cette heure et dâte!";
			alert(msg);
		}
		
		function oldConsultation(e)
		{
			msg = "Le rendez-vous est deja enregistré comme consultation !";
			alert(msg);
		}
		
		function newConsultation(id_Consultation, id_Patient, e) //Action appelée lorsqu'on clique sur une date.
		{
			document.location.href = "PageConsultation.php?id_C="+ id_Consultation+"&id_P="+ id_Patient;
		}
	</script>
</head>


<body>

    <header>
        <?php
        navbar();
        ?>
    </header>
	
	</br></br></br></br>
	<h1 align="center"><?php echo $tabMois[date('m', $ts)].date('Y', $ts) ?> </h1>
	</br>
	<table>
		<tr>
			<?php 
			$jour = $ts;
			for ($j = 1; $j <= 7; $j++) {
				if( ($j == date('w')) && ($week == date('W')) ){ ?>
					<th align="center" style="background-color:black" id="jourJ">
						<b>
							<?php echo $tabJour[$j]." ".date('d', $jour);?>
						</b>
					</th>
				<?php }
				else { ?>
					<th align="center" >
						<b>
							<?php echo $tabJour[$j]." ".date('d', $jour);?>
						</b>
					</th>
				<?php }
				$jour += 86400;
			}
			?>
		</tr>
	
		<?php
		$jour = $ts;
		for($i=1;$i<8;$i++) //Pour chaque jour de la semaine... Lundi = 1
		{
			$sql = new mysqli("localhost", "root", "", "bdd_project");
			$result = $sql->query("SELECT * FROM rendez_vous WHERE Date = '".date('Y-m-d', $jour)."' ORDER BY Heure ASC");
			$nbr = 20;
			$j = 0;
			
			while ($numRDV = $result->fetch_assoc()) 
			{
				$matrice[$i-1][$j] = $numRDV["ID_rendez_vous"];
				$nbr -= 1;
				$j++;
			}
			while ($nbr > 0)
			{
				$value = 0;
				$matrice[$i-1][$j] = $value;
				$nbr -= 1;
				$j++;
			}
			$jour += 86400;
		}
		
		
		for($j=0; $j<20; $j++)
		{ ?>
			<tr>
			<?php
				for($i=0; $i<7; $i++)
				{
					if ($matrice[$i][$j] == '0')
					{ ?>
						<td class = "withBorder" align="center" onMouseUp="pasRDV(event)">
						</td> 
					
					<?php 
					}
					else
					{
					?>
						<td class = "noBorder" align="center" >
							<?php  //requete pour récuperer l'heure
                                $index = $matrice[$i][$j];
                                $sql = new mysqli("localhost", "root", "", "bdd_project");
                                $result1 = $sql->query("SELECT * FROM rendez_vous WHERE ID_rendez_vous = '".$index."'");
                                $rows = mysqli_fetch_array($result1);
								
								$result2 = $sql->query("SELECT COUNT(*) FROM consultation WHERE ID_rendez_vous = '".$rows['ID_rendez_vous']."'");
								while ($row = $result2->fetch_assoc()) {
									if ($row['COUNT(*)'] > 0){ ?>
										<p onMouseUp="oldConsultation(event)">
											<?php if (substr($rows['Minute'], 0, 5) == 0) { 
												echo substr($rows['Heure'], 0, 5)."h00".'</br>';
											} else {
												echo substr($rows['Heure'], 0, 5)."h".substr($rows['Minute'], 0, 5).'</br>';
											}
											
											$result3 = $sql->query("SELECT Nom, Prenom FROM patient WHERE ID_patient = 
												(SELECT ID_patient FROM rendez_vous WHERE ID_rendez_vous = '".$index."')");
											$rows = mysqli_fetch_array($result3);
											echo $rows["Prenom"];
											echo $rows["Nom"];
										?></p> <?php
									} else { ?>
										<p onMouseUp = "newConsultation('<?php echo $rows['ID_rendez_vous'];?>', '<?php echo $rows['ID_patient'];?>', event)">
											<?php if (substr($rows['Minute'], 0, 5) == 0) { 
												echo substr($rows['Heure'], 0, 5)."h00".'</br>';
											} else {
												echo substr($rows['Heure'], 0, 5)."h".substr($rows['Minute'], 0, 5).'</br>';
											}
											$result3 = $sql->query("SELECT Nom, Prenom FROM patient WHERE ID_patient = 
												(SELECT ID_patient FROM rendez_vous WHERE ID_rendez_vous = '".$index."')");
											$rows = mysqli_fetch_array($result3);
											echo $rows["Prenom"];
											echo $rows["Nom"]; 
										?> </p> <?php
									 }
								}?>
							<br>
							<?php // requete pour récuperer le nom

							?>
						</td>
					<?php 
					} 
				} 
			?> </tr>
		<?php }	?>
	</table>
	
	</br>
	<div class = "change" align="center">
		<a href='./calendrier.php?lundi=<?php echo $avant;?>' class="link"> << </a>
		<a> <?php echo "Semaine ".$week; ?> </a>
		<a href='./calendrier.php?lundi=<?php echo $apres;?>' class="link"> >> </a>
		
		</br></br>
		<a href='./calendrier.php' class="link" > Revenir à la semaine actuelle </a>
	</div>
</body>
</html>
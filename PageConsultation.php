<?php
session_start();
include "navbar.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Search Page</title>
    <link rel="stylesheet" href="cssEditProfile.css">
</head>

<body>

	<?php
	// if don't have session user..then
	if(! isset($_SESSION['nom']))
	{
		die("<script>alert('Je ne sais pas qui vous êtes, il faut se login !');window.location.href=index.php;</script>");
	}

	?>

	<header>
		<?php
			navbar();
		?>
	</header>


	<div id="seeProfile">
		<?php 
		$id_Consultation = $_GET['id_C'];
		$id_Patient = $_GET['id_P'];
		?>
		
		<h1>Creation d'une consultation : </h1>
		<form Method="post" action="functionConsult.php?id_C=<?php echo $id_Consultation?>&id_P=<?php echo $id_Patient?>" name="submit">
			<table>
				<tr>
					<?php 
					include "conn.php";
					$sql="SELECT * FROM patient WHERE ID_patient = '".$id_Patient."'";
					$result_nom = mysqli_query($conn, $sql);
					while($rows = mysqli_fetch_array($result_nom)){ ?>
						Patient : <?php echo $rows['Nom']." ".$rows['Prenom'] ?>
					<?php } ?>
				</tr><br><br>
				<tr>
					Nature : <input class="inputRegister" type="text" name="nature" required="required"> 
				</tr><br><br>
				<tr>
					Indicateur anxiété : 
					<select class="inputRegister" type="text" name="anxiete">
						<?php for ($i = 0; $i <= 10; $i++){ ?>
							<option value="<?php echo $i ?>"> <?php echo $i; ?> </option>
						<?php } ?>
					</select> 
				</tr><br><br>
				<tr>
					Moyen de payement : 
					<select class="inputRegister" type="text" name="methodePaiement">
						<option value="Carte Bleue"> Carte bleue </option>
						<option value="Chèque"> Chèque </option>
						<option value="Espèce"> Espèce </option>
					</select> 
				</tr><br><br>
				<tr>
					Prix : <input class="inputRegister" type="number" name="prix" required="required"> <br><br>
				</tr>
				<tr>
					Commentaire sur la seance : 
					<textarea class="inputRegister" name="commentaire"></textarea>
				</tr><br><br>
				<tr>
					Invité 1 :
					
					<?php
					$sql="SELECT * FROM patient ORDER BY nom";
					$result_inv1 = mysqli_query($conn, $sql);
					?>
				
					<select class="inputRegister" type="text" name="invite1">
						<option value="-1"> Aucun </option>
						<?php
						while($rows = mysqli_fetch_array($result_inv1)){
							if (($rows['Nom'] != "La Psy")  && ($rows['ID_patient'] != $id_Patient)){ ?>
								<option value="<?php echo $rows['ID_patient'] ?>"> <?php echo $rows['Nom']." ".$rows['Prenom']; ?> </option>
							<?php }
						} ?>
					</select>
				</tr><br><br>
				<tr>
					Invité 2 :
					
					<?php
					$result_inv2 = mysqli_query($conn, $sql);
					?>
					
					<select class="inputRegister" type="text" name="invite2">
						<option value="-1"> Aucun </option>
						<?php
						while($rows = mysqli_fetch_array($result_inv2)){
							if (($rows['Nom'] != "La Psy") && ($rows['ID_patient'] != $id_Patient)){ ?>
								<option value="<?php echo $rows['ID_patient'] ?>"> <?php echo $rows['Nom']." ".$rows['Prenom']; ?> </option>
							<?php }
						} ?>
					</select>
				</tr><br><br>
				<tr>
			</table>
			<input class="button" type="submit" value="Valider">
		</form>
	</div>
</body>
</html>
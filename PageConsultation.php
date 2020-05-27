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
		die("<script>alert('Je ne sais pas qui vous êtes, il faut se login !');window.location.href=pageLogin.php;</script>");
	}

	?>

	<header>
		<?php
			navbar();
		?>
	</header>


	<div id="seeProfile">
		<h1>Creation d'une consultation : </h1>
		<form Method="post" action="ajout-note.php" name="submit">
			<table>
				<?php
				include "conn.php";
				$sql="SELECT * FROM patient ORDER BY nom";
				$result = mysqli_query($conn, $sql);
				?>
				<tr>
					<?php echo "Nom du patient : "; ?>
					<select>
						<?php
						while($rows = mysqli_fetch_array($result)){
							if ($rows['Nom'] != "La Psy"){
							?>
								<option value="<?php echo $rows['ID_patient'];?>"><?php echo $rows['Nom']." ".$rows['Prenom'];?></option>
							<?php
							}
						}
						?>	 			
					</select>
				</tr><br><br> 
				<tr>
					<?php echo "Moyen de payement : "; ?>
					<select class="inputRegister" type="text" name="methodePayement">
						<option value="carte"> Carte bleue </option>
						<option value="cheque"> Chèque </option>
						<option value="espece"> Espèce </option>
					</select> <br><br>
				</tr>
				<tr>
					Prix : <input class="inputRegister" type="number" name="prix" required="required"> <br><br>
				</tr>
			</table
			>
			<input class="button" type="submit" value="Valider">
		</form>
	</div>
</body>
</html>
<!-- <link rel="stylesheet" href="asset/delcss.css"> -->

<div style="width: 50%;float: right;" class="container" >
	<form method="POST" id="connexion" action="?c=conversation&a=addMessage" class="form-group" >
	<label>Ajout d'un message</label>
		<h5>Conversation choisie : </h5>
		<div class="form-control">
			<select id="convers" value ="Conversation:" name="conv"  >
				<?php foreach ($conversations as $key => $value): ?>
					<option> <?php  echo $value['c_id'] ;?></option>
				<?php endforeach ?>
					
			</select>
		</div>	
		<h5>Ecrivez votre message : </h5>
		<textarea id="textarea" class="form-control" value ="message" name="mess"  cols="30" rows="3"></textarea>
		<input class="form-control" id="sending"  type="submit" name="ins" value="Inserer"></input>
		<span class="response"></span>
	</form>
	<a href="javascript:window.location.reload()">Actualiser les conversations</a>

<?php
	$co ='';
		isset($_SESSION['user']) ? $co.= '<a href="-index.php">Retour au sommaire</a>' : $co.= '<a href="-index.php">Se connecter</a>';	 
	echo '<p style=";">'.$co.'</p>';

		?>

	
<script src="asset/style.js"></script>




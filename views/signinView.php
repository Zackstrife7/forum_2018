<link rel="stylesheet" href="asset/signStyle.css">


<fieldset>
<legend>Inscription</legend>
<form action="" method="POST"  >
	<label>Pseudo : </label>
	 <input type="text" name="pseudo" placeholder="Veuillez rentrer un pseudonyme.." >
	<label>Prenom : </label>
	 <input type="text" name="prenom" placeholder="Veuillez rentrer votre prenom.." > 
	<label>Nom: </label>
	 <input type="text" name="name" placeholder="Veuillez rentrer votre nom.." >
	<label>Date de naissance: </label>
	 <input type="date" name="birth"  > 
	<input type="submit" name="sign" value="S'inscrire">
</form>

<?php if (isset($err_u)) {
	echo '<span style =font-size:18px;>'.$err_u.'</span>';
	echo "<br>";
} ?>
<div class="">
	<a href="?c=user&a=logIn">Connectez vous</a><br>
	<a href="?c=conversation&a=showConversations">Voir les conversations</a><br>
	<a href="?">Revenir au menu</a>

</div>
</fieldset>

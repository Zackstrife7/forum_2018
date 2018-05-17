<style href=""></style>
<fieldset>
	<legend>Connexion</legend>
		<form  method="post" action="">
			<label>Pseudo:</label> 
			<input type="text" name="log">
			<input type="submit" name="sub">

		</form>
		<a href="?c=conversation&a=showConversations">Voir les conversations</a><br>
		<a href="?c=user&a=signIn">Inscrivez vous</a><br>
			<?php if(isset($_SESSION['user']))
			{
				echo '<a href="?destroy">Se deconnecter</a><br>';	
			}?>
		<a href="?">Revenir au menu</a>
		
</fieldset>
<!-- affiche le message par rapport à la verification du POST -->
<?php echo $connection; ?>
<link rel="stylesheet" href="asset/messStyle.css">
	<h1>Liste des Messages de la conversation <?php echo $_GET['id']; ?></h1>
	<a href="?c=conversation&a=showConversations">Revenir au conversations</a> <br>
	<a href="?">Revenir à l'acceuil</a>
	<hr>
<table class="table table-dark"  border="2">
	<thead>
	  <tr>
	  	<th scope="col"><a href="?c=conversation&a=showMessages&id=<?php echo  $_GET['id']?>&p=<?php echo $_GET['p']?>&t=m_id" value="Id ">Id </th>
	   <th scope="col"><a href="?c=conversation&a=showMessages&id=<?php echo  $_GET['id']?>&p=<?php echo $_GET['p']?>&t=m_date" value="Date du message">Date du message</th>
	   <th scope="col"><a href="?c=conversation&a=showMessages&id=<?php echo  $_GET['id']?>&p=<?php echo $_GET['p']?>&t=m_heure"  value="Heure du message">Heure du message</th>
	   <th><a href="?c=conversation&a=showMessages&id=<?php echo  $_GET['id']?>&p=<?php echo $_GET['p']?>&t=m_auteur" value="Nom Prénom">Nom Prénom</th>
	   <th scope="col">Message</th>
	  <tr>
	</thead>
	<div class="pagination">
		
		<?php  echo $link_page; ?>
	</div>
	<?php echo $mess; ?>
</table>

				
					

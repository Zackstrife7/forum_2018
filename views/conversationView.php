<style type="text/css">
	section{
		width: 50%;
	}

</style>
<section>

	<h1>Liste des conversations</h1>
	
		
		
	<table class="table-striped table-dark" style=" float: left;" border="4">
						<thead>
						  <tr>
						   <th scope="col">ID de la conversation</th>
						   <th scope="col">Date de la conversation</th>
						   <th scope="col">Heure de la conversation</th>
						   <th scope="col">Nombre de messages</th>
						   <th scope="col">Messages</th>
						  <tr>
						</thead>
						<?php echo $str; ?>
						
	</table>
</section>	
<?php 
if(isset($err)){
	echo '<div style="float:right;"><a href="?c=user&a=login">'.$err.'</a></div>';
}
?>

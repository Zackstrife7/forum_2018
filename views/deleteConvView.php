<fieldset>
	<label>Suppression de conversation</label>
	<form onsubmit="return confirm('Etes vous sur de vouloir supprimer la conversation N '+ document.getElementById('num_conv').value+' ')" class="form-control-range" method="POST"  action="?c=conversation&a=deleteConversation" >
		<label>Conversation choisie : </label>
		<select id="num_conv" value ="Conversation:" name="conversation"  >
			<?php foreach ($conversations as $key => $value): ?>
				<option id="opt" value="<?php  echo $value['c_id'] ;?>"> <?php  echo $value['c_id'] ;?></option>
			<?php endforeach ?>
		</select>
		<input  type="submit" name="del" value="Suprimer cette conversation "  >
	</form>
	<?php if (isset($mess)) {
		echo '<h1>'.$mess.'</h1>';
	} ?>
<script ></script>
</div>
</fieldset>


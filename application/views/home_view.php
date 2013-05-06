<div class="app_content">
	<?php echo 'Użytkownik zalogowany jako ' . $user; ?>

	<div>
		<?php foreach ($form_list as $form ): 
		 anchor('/form/start/id/' . $form -> id, $form -> name);
		echo '<br />';
		endforeach; ?>
	</div>
</div>
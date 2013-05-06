<div class="app_content">
	<?php echo 'Użytkownik zalogowany jako ' . $user; ?>

	<div>
		<?php foreach ($form_list as $form ): ?>
		<?php anchor('/form/start/id/' . $form -> id, $form -> name); ?>
		<br />
		<?php endforeach; ?>
	</div>
</div>
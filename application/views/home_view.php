<div class="app_content">
	<?php echo 'Zalogowano sie jako ' . $user; ?>

	<div>
		<?php foreach ($form_list as $form ):
		?>
		<?= anchor('/form/start/id/' . $form -> id, $form -> name); ?>
		<br />
		<?php endforeach; ?>
	</div>
</div>
<div class="app_content">
	<?php echo 'Formularz '.$form_name
	?>

	<div>
		<?php foreach ($form_question_list as $question ):
		?>
		<?= anchor('/form/item/id/' . $question -> id, $question -> text); ?>
		<br />
		<?php endforeach; ?>
	</div>
</div>
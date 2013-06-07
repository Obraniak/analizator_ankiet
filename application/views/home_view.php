<div class="app_content">
	<?php echo 'Użytkownik zalogowany jako ' . $user; ?>

	<div>
		<table border="1">
			<?php 
			foreach ($form_list as $form) {
			echo "<tr>";
			echo '<td>'.$form -> id.'</td>';
			echo '<td>'.$form -> name.'</td>';
			echo "<td>";

			?>
			<?= anchor(site_url('/form/start/id/' . $form -> id), "Przejdz") ?>
			<?php echo "</td></tr>";
				}
			?>
		</table>
	</div>
</div>

<div class="app_content">
	<?php echo 'Użytkownik zalogowany jako ' . $user; ?>

	<div>
		<table border="1">
			<tr>
				<?php echo '<form action="' . site_url('/home/search') . '">'; ?>
				<td>
				<input type="text" name="cource">
				</td>
				<td>
				<input type="text" name="name">
				</td>
				<td>
				<input type="text" name="date">
				</td>
				<td>
				<input type="text" name="staus">
				</td>
				<td>
				<input type="submit" value="Szukaj">
				</td>
				<?php 	echo '</form>'; ?>
			</tr>
			<tr>
				<td>Kurs</td>
				<td>Nazwa ankiety</td>
				<td>Data</td>
				<td>Status</td>
				<td>Akcja</td>
			</tr>
			<?php
			foreach ($form_list as $form) {
				echo '<tr>';
				echo '<td>' . $form -> course . '</td>';
				echo '<td>' . $form -> name . '</td>';
				echo '<td>' . $form -> date . '</td>';
				echo '<td>' . $form -> status . '</td>';
				echo '<td><a href="' . site_url('/form/start/id/' . $form -> id) . '">Przejdz</a></td>';
				echo "</tr>";
			}
			?>
		</table>
	</div>
</div>

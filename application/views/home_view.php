<div class="app_content">
	<?php echo 'Użytkownik zalogowany jako ' . $user; ?>

	<div>
		<table border="1">
			<tr>
				<form action="http://localhost/analizator_ankiet/index.php/home/search">
					<td>
					<input type="text" name="fcource">
					</td>
					<td>
					<input type="text" name="lname">
					</td>
					<td>
					<input type="text" name="ldate">
					</td>
					<td>
					<input type="text" name="lstaus">
					</td>
					<td>
					<input type="submit" value="Szukaj">
					</td>
				</form>
			</tr>
			<tr>
				<td>Kurs</td>
				<td>Nazwa ankiety</td>
				<td>Data</td>
				<td>Status</td>
				<td>Akcja</td>
			</tr>
			<?php foreach ($form_list as $form) {
echo '<tr>';
echo '<td>'.$form -> course.'</td>';
echo '<td>'.$form -> name.'</td>';
echo '<td>'.$form -> date.'</td>';
echo '<td>'.$form -> status.'</td>';
echo '<td>';
			?>
			<?= anchor(site_url('/form/start/id/' . $form -> id), "Przejdz") ?>
			<?php echo "</td></tr>";
				}
			?>
		</table>
	</div>
</div>

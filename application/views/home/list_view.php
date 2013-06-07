<div class="app_content">
	<?php  echo lang('user_loged') . ' ' . $user; ?>

<div>
	<?php echo '<form action="' . site_url('/login') . '">'; ?>
	<input type="submit" value="<?php echo lang('logout'); ?>">
	<?php 	echo '</form>'; ?>
</div>
	<div>
		<table border="1" class="kursy">
			<tr>
				<?php echo '<form action="' . site_url('/home/search') . '">'; ?>
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
				<input type="submit" value="<?php echo lang('search'); ?>">
				</td>
				<?php 	echo '</form>'; ?>
			</tr>
			<tr>
				<td><?php echo lang('course'); ?></td>
				<td><?php echo lang('form_name'); ?></td>
				<td><?php echo lang('date'); ?></td>
				<td><?php echo lang('status'); ?></td>
				<td><?php echo lang('action'); ?></td>
			</tr>
			<?php
			foreach ($form_list as $form) {
				echo '<tr>';
				echo '<td>' . $form -> course . '</td>';
				echo '<td>' . $form -> name . '</td>';
				echo '<td>' . $form -> date . '</td>';
				echo '<td>' . $form -> status . '</td>';
				echo '<td><a class="btnakcja" href="' . site_url('/form/start/id/' . $form -> id) . '">' . lang('goto') . '</a></td>';
				echo "</tr>";
			}
			?>
		</table>
	</div>
</div>

<div class="app_content">


<div id="logininfo">

	<?php  echo lang('user_loged') . ' ' . $user; ?>
	<?php echo '<form action="' . site_url('/login') . '">'; ?>
	<input type="submit" class="button" value="<?php echo lang('logout'); ?>">
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
				<input type="submit" class="btnblue" value="<?php echo lang('search'); ?>">
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
				echo '<td>' . getState($form -> status) . '</td>';
				echo '<td><a class="' . getViewClass($form -> status) . '" href="' . site_url('/form/start/id/' . $form -> id) . '">' . getDescription($form -> status) . '</a></td>';
				echo "</tr>";
			}

			function getState($status) {

				switch($status) {
					case 0 : {
						return lang('form_new');
					}
					case 1 : {
						return lang('form_start');
					}
					case 2 : {
						return lang('form_end');
					}
					default : {
						return lang('form_new');
					}
				}

			}

			function getDescription($status) {
				switch($status) {
					case 0 : {
						return lang('form_go');
					}
					case 1 : {
						return lang('form_continue');
					}
					case 2 : {
						return lang('form_show');
					}
					default : {
						return lang('form_go');
					}
				}

			}

			function getViewClass($status) {
				switch($status) {
					case 0 : {
						return 'btngreen';
					}
					case 1 : {
						return 'btngrey';
					}
					case 2 : {
						return 'btnblue';
					}
					default : {
						return 'btnblue';
					}
				}
			}
			?>
		</table>
	</div>
</div>

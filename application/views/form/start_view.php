<div class="app_content">
	<?php echo '<script src="' . base_url('js/script.js') . '"></script>'; ?>

	<p>
		<?php echo lang('form_name') . $form_name; ?>
	</p>
	<div>
		<div>
			<p>
				<?php echo lang('course') . $form_course; ?>
			</p>
			<p>
				<?php echo lang('title') . $form_title; ?>
			</p>
			<p>
				<?php echo lang('remarks') . $form_description; ?>
			</p>
		</div>

			<table class="bottomnav">
				<tr>
					<?php echo '<form id="navi" action="' . site_url('/form/item/detail') . '">'; ?>
					<td>
					<input type="submit" value="<-" onclick="return begin();">
					</td>
					<td>
					<input type="submit" value="<" disabled="disabled" onclick="return before();">
					</td>
					<td>
					<input name="item" type="text" id="item" value="0" size="3" maxlength="3">
			    </td>
					<td>
					<input type="submit" value=">"  onclick="return next();">
					</td>
					<td>
					<input type="submit" value="->"  onclick="return end();">
					</td>
					<?php 	echo '</form>'; ?>
				</tr>
			</table>
			<?php	echo '<div id="bottombtn"><a class="btnBackToHome" href="' . site_url('/home/index') . '">' . lang('back_to_home') . '</a></div>'; ?>


	</div>

</div>
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
				<?php echo lang('title')  . $form_title; ?>
			</p>
			<p>
				<?php echo lang('remarks')  . $form_description; ?>
			</p>
		</div>
		<center>
			<table border="1">
				<tr>
					<?php echo '<form id="navi" action="' . site_url('/form/item/detail') . '">'; ?>
					<td>
					<input type="submit" value="<-" onclick="return begin();">
					</td>
					<td>
					<input type="submit" value="<" disabled="disabled" onclick="return before();">
					</td>
					<td>
					<input id="item" type="text" name="item" value="0">
					</td>
					<td>
					<input type="submit" value="->"  onclick="return next();">
					</td>
					<td>
					<input type="submit" value="=>"  onclick="return end();">
					</td>
					<?php 	echo '</form>'; ?>
				</tr>
			</table>
			<?php	echo '<td><a class="btnBackToHome" href="' . site_url('/home/index') . '">Powr�t do listy ankiet</a></td>'; ?>
		</center>

	</div>

</div>
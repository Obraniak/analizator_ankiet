<div class="app_content">
<?php echo '<script src="' . base_url('js/script.js') . '"></script>';
	?>
	<?php echo '<script src="' . base_url('js/jquery-1.9.1.min.js') . '"></script>';
	?>
	<?php echo '<script src="' . base_url('js/jquery.json-2.4.min.js') . '"></script>'; ?>

	<script>
	
	function close () {
	  alert('close');
	  return true;
	}
	
	</script>


	<h2>
		<?php echo $form_name; ?>
	</h2>

	<h3><?php echo lang('summary'); ?></h3>

	<p>
		<?php echo lang('complete_level').': '; ?>
	</p>
	<p>
		<?php echo lang('open_question') . ' ' . $answer_open_question . ' / ' . $open_question_count; ?>
	</p>
	<p>
		<?php echo lang('close_question') . ' ' . $answer_close_question . ' / ' . $close_question_count; ?>
	</p>

		<table class="bottomnav">
			<tr>
				<?php echo '<form id="navi" action="' . site_url('/form/item') . '">'; ?>
				<td>
				<input type="submit" value="<-" onclick="return begin();">
				</td>
				<td>
				<input type="submit" value="<" onclick="return before();">
				</td>
				<td>
				<input name="item" type="text" id="item" value="<?php echo $form_position; ?>" size="3" maxlength="3">
    </td>
				<td>
				<input type="submit" value=">"  disabled="disabled" onclick="return next();">
				</td>
				<td>
				<input type="submit" value="->"  onclick="return end();">
				</td>
				<?php 	echo '</form>'; ?>
			</tr>
		</table>
		<?php
		if ($form_status == 2) {
			echo '<div id="bottombtn"><a class="btnBackToHome" href="' . site_url('/home/index') . '">' . lang('back_to_home') . '</a></div>';
		} else {
			echo '<div id="bottombtn"><a class="btnBackToHome" href="' . site_url('/home/index') . '" onclick="return close();">' . lang('save_back_to_home') . ' </a></div>';
		}
 ?>

</div>
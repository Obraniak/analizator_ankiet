<div class="app_content">
	<?php echo '<script src="' . base_url('js/script.js') . '"></script>'; ?>
	<?php echo '<script src="' . base_url('js/jquery-1.9.1.min.js') . '"></script>'; ?>
	<?php echo '<script src="' . base_url('js/jquery.json-2.4.min.js') . '"></script>'; ?>

	<script>
				function saveChanges() {

		var update_url = <?php echo '"' . base_url('index.php/form/update') . '/";'; ?>

					var jsonArg1 = new Object();
		jsonArg1.id = <?php echo '"' . $form_question_detail -> id . '";'; ?>
					var jsonArg2 = new Object();
		jsonArg2.answer = $("#txtAnswer").val();

		var pluginArrayArg = new Array();
		pluginArrayArg.push(jsonArg1);
		pluginArrayArg.push(jsonArg2);

		var plugindata = new Object();
		plugindata.data = pluginArrayArg;

		$.ajax({
		type : 'POST',
		url : update_url,
		data : $.toJSON(plugindata),
		success : onSuccess,
		error : onError
		});
		}

		function onSuccess() {
		alert('<?php echo lang('change_save'); ?>
			');
			}

			function onError() {
			alert('
		<?php echo lang('error_occured'); ?>
			')
			}
	</script>

	<div id="question">
		<table>
			<tr>
				<td><textarea name="answer" id="txtAnswer" style="width: 500px; height: 100px;"></textarea></td>
			</tr>
			<tr>
				<td>
				<button type="button"  id="btnSave" style="btnSave" onclick="saveChanges();">
					<?php echo lang('save'); ?>
				</button></td>
			</tr>
		</table>

	</div>

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
			<input id="item" type="text" name="item" value="<?php echo $form_position; ?>">
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
	<?php	echo '<div id="bottombtn"><a class="btnBackToHome" href="' . site_url('/home/index') . '">' . lang('back_to_home') . '</a></div>'; ?>
</div>

<div class="app_content">
	<?php echo '<script src="' . base_url('js/script.js') . '"></script>'; ?>
	<?php echo '<script src="' . base_url('js/jquery-1.9.1.min.js') . '"></script>'; ?>
	<?php echo '<script src="' . base_url('js/jquery.json-2.4.min.js') . '"></script>'; ?>

	<script>
				function saveChanges() {

		var genders = document.getElementsByName("answer");
		var selectedItem = null;

		for(var i = 0; i < genders.length; i++) {
		if(genders[i].checked == true) {
		selectedGender = genders[i];
		}}

		<?php echo 'var update_url = "' . base_url('index.php/form/update') . '/";'; ?>

		var jsonArg1 = new Object();
		jsonArg1.id = <?php echo '"' . $form_questions_id . '";'; ?>

		var jsonArg2 = new Object();
		jsonArg2.answer = $("#txtAnswer").val();

		var jsonArg3 = new Object();
		jsonArg3.type = "1";

		var pluginArrayArg = new Array();
		pluginArrayArg.push(jsonArg1);
		pluginArrayArg.push(jsonArg2);
		pluginArrayArg.push(jsonArg3);

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

		function onSuccess() { alert(<?php echo "'" . lang('change_save') . "'"; ?>);}

		function onError() {alert(<?php echo "'". lang('error_occured')."'"?>);}
	</script>

	<div id="answers">
		<table>

			<?php
			foreach ($form_questions_detail as $question) {
				echo '
			<tr>
				<td>';
				
				$input = '<input type="radio" id="answer' ;
				$input = $input . $question -> id ;
				$input = $input . '"  name="answer" value="' ;
				$input = $input . $question -> option;
				
				if($question -> id == $form_question_answer -> id)
				{ $input = $input . ' checked '; } 
				
				$input = $input . '" />';
				
				echo $input;
				echo '<label for="answer1">' . $question -> text . '</label></td>';
				echo "</td>
			</tr>";
			}
			?>
			<td>
			<button type="button"  id="btnSave" style="btnSave" onclick="saveChanges();">
				<?php echo lang('save'); ?>
			</button></td>
			</tr>
		</table>

	</div>

	<table class="bottomnav">
		<tr>
			<?php echo '
			<form id="navi" action="' . site_url('/form/item') . '">
				';
 ?> <td>
				<input type="submit" value="<-" onclick="return begin();">
				</td>
				<td>
				<input type="submit" value="<" onclick="return before();">
				</td>
				<td>
				<input name="item" type="text" id="item" value="<?php echo $form_position; ?>" size="3" maxlength="3">
				</td>
				<td>
				<input type="submit" value=">"  onclick="return next();">
				</td>
				<td>
				<input type="submit" value="->"  onclick="return end();">
				</td>
				<?php 	echo '
			</form>
			';
 ?>
		</tr>
	</table>
	<?php	echo '
	<div id="bottombtn">
		<a class="btnBackToHome" href="' . site_url('/home/index') . '">' . lang('back_to_home') . '</a>
	</div>
	';
 ?>
</div>

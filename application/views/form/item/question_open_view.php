<div class="app_content">
	<?php echo '<script src="' . base_url('js/script.js') . '"></script>'; ?>
<?php echo '<script src="' . base_url('js/jquery-1.9.1.min.js') . '"></script>'; ?>

	<script>
		function saveCahnges() {
$.ajax({
type : 'POST',
url : <?php echo '"' . base_url('index.php/form/update?item=' . $form_question_detail -> id) . '"'; ?>
	, data : $("#txtAnswer") ,
	success : onSuccess,
	error : onError
	});
	}

	function onSuccess() {
		alert('Zmiany zapisane');
	}

	function onError() {
		alert('Wystapi³ problem');
	}

	</script>

	<div>
		<input style="width: 100px; height: 40px;" type="text" name="answer" id="txtAnswer" value="">
		<button type="button"  id="btnSave" style="btnSave" onclick="saveCahnges();">
			Zapisz
		</button>
	</div>
	<center>
		<table border="1" class="test">
			<tr>
				<?php echo '<form id="navi" action="' . site_url('/form/item') . '">'; ?>
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
		<?php	echo '<td><a class="btnBackToHome" href="' . site_url('/home/index') . '">Wróæ do listy ankiet</a></td>'; ?>
	</center>
</div>

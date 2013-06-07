<div class="app_content">
	<?php echo '<script src="' . base_url('js/script.js') . '"></script>'; ?>
<?php echo '<script src="' . base_url('js/jquery-1.9.1.min.js') . '"></script>'; ?>

	<div>
		<?php echo '<form id="navi" action="' . site_url('/form/update?item=' . $form_question_detail -> id) . '" method="post">'; ?>
		<input style="width: 100px; height: 40px;" type="text" name="answer" value="">
		<input type="submit" value="Zapisz" >
		<?php echo '</form>'; ?>
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
		<?php	echo '<td><a class="btnBackToHome" href="' . site_url('/home/index') . '">Powrót do listy ankiet</a></td>'; ?>
	</center>
</div>

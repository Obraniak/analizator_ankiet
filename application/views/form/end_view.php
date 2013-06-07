<div class="app_content">

	<p>
		<?php echo $form_name; ?>
	</p>

	<h3> Podsumowanie </h3>

	<p>
		Poziom	ukonczenia
	</p>
	<p>
		<?php echo 'Pytania otwarte ' . $answer_open_question . ' / ' . $open_question_count; ?>
	</p>
	<p>
		<?php echo 'Pytania otwarte ' . $answer_close_question . ' / ' . $close_question_count; ?>
	</p>
	<center>
		<table border="1" >
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
				<input type="submit" value="->"  disabled="disabled" onclick="return next();">
				</td>
				<td>
				<input type="submit" value="=>"  onclick="return end();">
				</td>
				<?php 	echo '</form>'; ?>
			</tr>
		</table>
		<?php	echo '<td><a class="btnBackToHome" href="' . site_url('/home/index') . '">Wróć do listy ankiet</a></td>'; ?>
	</center>
</div>
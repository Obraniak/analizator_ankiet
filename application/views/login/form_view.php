<div class="app_content">
	<div id="loginform">
		<?php echo form_open('authentication'); ?>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><label for="username"><?php echo lang('login'); ?></label></td>
				<td><input type="text" size="20" id="username" name="username"/></td>
			</tr>
			<tr>
				<td><label for="password"><?php echo lang('password'); ?></label></td>
                <td><input type="password" size="20" id="passowrd" name="password"/></td>
			</tr>
			<tr>
				<td colspan="2" class="btn">
				<input type="submit" value="<?php echo lang('dologin'); ?>"/ class="button">
				</td>
            </tr>
		</table>

		</form>
</div>
	
	<div>
		<?php echo '<form action="' . site_url('/login') . '">'; ?>
			<select name="lang">
			<option value="-" selected><?php echo lang('lang'); ?></option>
		    <option value="pl"><?php echo lang('pl_lang'); ?></option>
			<option value="en"><?php echo lang('en_lang'); ?></option>
			</select>
		<input type="submit" class="btnblue" value="<?php echo lang('accept'); ?>">
		<?php echo '</form>'; ?></div>
</div>

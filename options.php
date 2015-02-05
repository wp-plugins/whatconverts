<div class="wrap">
<h2>WhatConverts</h2>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('whatconverts'); ?>
<table class="form-table">
<tr valign="top">
<th scope="row">Account ID:</th>
<td><input type="text" name="account_id" value="<?php echo get_option('account_id'); ?>" /></td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
</form>
</div>

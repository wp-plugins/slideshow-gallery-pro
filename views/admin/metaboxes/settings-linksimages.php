<table class="form-table">
	<tbody>
    	<tr>
        	<th><label for="imagesbox_N"><?php _e('Open Images in...', $this -> plugin_name); ?></label></th>
            <td>
                <label><input <?php echo ($this -> get_option('imagesbox') == "N") ? 'checked="checked"' : ''; ?> type="radio" name="imagesbox" value="N" id="imagesbox_N" /> <?php _e('No Link', $this -> plugin_name); ?></label>
                <label><input <?php echo ($this -> get_option('imagesbox') == "W") ? 'checked="checked"' : ''; ?> type="radio" name="imagesbox" value="W" id="imagesbox_W" /> <?php _e('Window', $this -> plugin_name); ?></label>
            	<label><input <?php echo ($this -> get_option('imagesbox') == "T") ? 'checked="checked"' : ''; ?> type="radio" name="imagesbox" value="T" id="imagesbox_T" /> <?php _e('Thickbox', $this -> plugin_name); ?></label>
            	<label><input <?php echo ($this -> get_option('imagesbox') == "S") ? 'checked="checked"' : ''; ?> type="radio" name="imagesbox" value="S" id="imagesbox_S" /> <?php _e('Shadowbox', $this -> plugin_name); ?></label>
            	<label><input <?php echo ($this -> get_option('imagesbox') == "P") ? 'checked="checked"' : ''; ?> type="radio" name="imagesbox" value="P" id="imagesbox_P" /> <?php _e('PrettyPhoto', $this -> plugin_name); ?></label>
            	<span class="howto"><?php _e('Thickbox comes standard with your Wordpress install. Shadowbox and Prettyphoto come only with a specific theme or plugin', $this -> plugin_name); ?></span>
            </td>
        </tr>
		<tr>
			<th>Recommendations</th>
			<td>
				<div><a href="http://wordpress.org/extend/plugins/shadowbox-js/">Shadowbox Plugin</a></div>
				<div><a href="http://wordpress.org/extend/plugins/wp-prettyphoto/">PrettyPhoto Plugin</a></div>
			</td>
		</tr>
		<tr>
        	<th><label for="pagelink_N"><?php _e('Page Link Target', $this -> plugin_name); ?></label></th>
            <td>
                <label><input <?php echo ($this -> get_option('pagelink') == "S") ? 'checked="checked"' : ''; ?> type="radio" name="pagelink" value="S" id="pagelink_S" /> <?php _e('Current Tab', $this -> plugin_name); ?></label>
            	<label><input <?php echo ($this -> get_option('pagelink') == "B") ? 'checked="checked"' : ''; ?> type="radio" name="pagelink" value="B" id="pagelink_B" /> <?php _e('New Tab', $this -> plugin_name); ?></label>
            	<span class="howto"><?php _e('Same as setting that <em>target</em> pages are &quot;_self&quot; or &quot;_blank&quot;', $this -> plugin_name); ?></span>
            </td>
        </tr>
    </tbody>
</table>
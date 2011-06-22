<table class="form-table">
	<tbody>
		<tr>
			<th><label for="autoslideY"><?php _e('Auto Slide', SG2_PLUGIN_NAME); ?></label></th>
			<td>
				<label><input onclick="jQuery('#autoslide_div').show();" <?php echo ($this -> get_option('autoslide') == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="autoslide" value="Y" id="autoslideY" /> <?php _e('Yes', SG2_PLUGIN_NAME); ?></label>
				<label><input onclick="jQuery('#autoslide_div').hide();" <?php echo ($this -> get_option('autoslide') == "N") ? 'checked="checked"' : ''; ?> type="radio" name="autoslide" value="N" id="autoslideN" /> <?php _e('No', SG2_PLUGIN_NAME); ?></label>
			</td>
		</tr>
	</tbody>
</table>
<div id="autoslide_div" style="display:<?php echo ($this -> get_option('autoslide') == "Y") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="autospeed"><?php _e('Auto Speed', SG2_PLUGIN_NAME); ?></label></th>
				<td>
					<input type="text" style="width:45px;" name="autospeed" value="<?php echo $this -> get_option('autospeed'); ?>" id="autospeed" /> <?php _e('speed', SG2_PLUGIN_NAME); ?>
					<span class="howto"><?php _e('default:10', SG2_PLUGIN_NAME); ?><br/><?php _e('lower number for shorter interval between images', SG2_PLUGIN_NAME); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table class="form-table">
	<tbody>
		<tr>
			<th><label for="fadespeed"><?php _e('Image Fading Speed', SG2_PLUGIN_NAME); ?></label></th>
			<td>
				<input style="width:45px;" type="text" name="fadespeed" value="<?php echo $this -> get_option('fadespeed'); ?>" id="fadespeed" />
				<span class="howto"><?php _e('default:10 recommended:1-20', SG2_PLUGIN_NAME); ?><br/><?php _e('lower number for quicker fading of images', SG2_PLUGIN_NAME); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="navopacity"><?php _e('Navigation Default Opacity', SG2_PLUGIN_NAME); ?></label></th>
			<td>
				<input type="text" name="navopacity" value="<?php echo $this -> get_option('navopacity'); ?>" id="navopacity" style="width:45px;" /> <?php _e('&#37; <!-- percentage -->', SG2_PLUGIN_NAME); ?>
				<span class="howto"><?php _e('opacity of the prev/next buttons by default', SG2_PLUGIN_NAME); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="navhover"><?php _e('Navigation Hover Opacity', SG2_PLUGIN_NAME); ?></label></th>
			<td>
				<input type="text" name="navhover" value="<?php echo $this -> get_option('navhover'); ?>" id="navhover" style="width:45px;" /> <?php _e('&#37; <!-- percentage -->', SG2_PLUGIN_NAME); ?>
				<span class="howto"><?php _e('opacity of the prev/next buttons when they are hovered', SG2_PLUGIN_NAME); ?></span>
			</td>
		</tr>
		<tr>
			<th><label for="informationY"><?php _e('Show Information', SG2_PLUGIN_NAME); ?></label></th>
			<td>
				<label><input onclick="jQuery('#information_div').show();" <?php echo ($this -> get_option('information') == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="information" value="Y" id="informationY" /> <?php _e('Yes', SG2_PLUGIN_NAME); ?></label>
				<label><input onclick="jQuery('#information_div').hide();" <?php echo ($this -> get_option('information') == "N") ? 'checked="checked"' : ''; ?> type="radio" name="information" value="N" id="informationN" /> <?php _e('No', SG2_PLUGIN_NAME); ?></label>
			</td>
		</tr>
	</tbody>
</table>
<div id="information_div" style="display:<?php echo ($this -> get_option('information') == "Y") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="infospeed"><?php _e('Information Speed', SG2_PLUGIN_NAME); ?></label></th>
				<td>
					<input type="text" style="width:45px;" name="infospeed" value="<?php echo $this -> get_option('infospeed'); ?>" id="infospeed" />
					<span class="howto"><?php _e('speed at which the information will slide in', SG2_PLUGIN_NAME); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="showhover"><?php _e('Information Display Settings', SG2_PLUGIN_NAME); ?></label></th>
				<td>
					<?php $showh = $this -> get_option('showhover');?>
					<label><input <?php echo (empty($showh) || $this -> get_option('showhover') == "S") ? 'checked="checked"' : ''; ?> type="radio" name="showhover" value="S" id="showhoverS" /> <?php _e('Scroll Up', SG2_PLUGIN_NAME); ?></label>
					<label><input <?php echo ($this -> get_option('showhover') == "P") ? 'checked="checked"' : ''; ?> type="radio" name="showhover" value="P" id="showhoverP" /> <?php _e('Permanently Show', SG2_PLUGIN_NAME); ?></label>
					<label><input <?php echo ($this -> get_option('showhover') == "H") ? 'checked="checked"' : ''; ?> type="radio" name="showhover" value="H" id="showhoverH" /> <?php _e('Mouse Hover Only', SG2_PLUGIN_NAME); ?></label>
					<span class="howto"><?php _e('How do you want to display the information (caption) bar?', SG2_PLUGIN_NAME); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<table class="form-table">
	<tbody>
		<tr>
			<th><label for="thumbnailsN"><?php _e('Show Thumbnails', SG2_PLUGIN_NAME); ?></label></th>
			<td>
				<label><input onclick="jQuery('#thumbnails_div').show();" <?php echo ($this -> get_option('thumbnails') == "Y") ? 'checked="checked"' : ''; ?> type="radio" name="thumbnails" value="Y" id="thumbnailsY" /> <?php _e('Yes', SG2_PLUGIN_NAME); ?></label>
				<label><input onclick="jQuery('#thumbnails_div').hide();" <?php echo ($this -> get_option('thumbnails') == "N") ? 'checked="checked"' : ''; ?> type="radio" name="thumbnails" value="N" id="thumbnailsN" /> <?php _e('No', SG2_PLUGIN_NAME); ?></label>
			</td>
		</tr>
	</tbody>
</table>
<div id="thumbnails_div" style="display:<?php echo ($this -> get_option('thumbnails') == "Y") ? 'block' : 'none'; ?>;">
	<table class="form-table">
		<tbody>
			<tr>
				<th><label for="thubmpositionbottom"><?php _e('Thumbnails Position', SG2_PLUGIN_NAME); ?></label></th>
				<td>
					<label><input <?php echo ($this -> get_option('thumbposition') == "top") ? 'checked="checked"' : ''; ?> type="radio" name="thumbposition" value="top" id="thumbpositiontop" /> <?php _e('Top', SG2_PLUGIN_NAME); ?></label>
					<label><input <?php echo ($this -> get_option('thumbposition') == "bottom") ? 'checked="checked"' : ''; ?> type="radio" name="thumbposition" value="bottom" id="thumbpositionbottom" /> <?php _e('Bottom', SG2_PLUGIN_NAME); ?></label>
				</td>
			</tr>
			<tr>
				<th><label for="thumbopacity"><?php _e('Thumbnail Opacity', SG2_PLUGIN_NAME); ?></label></th>
				<td>
					<input style="width:45px;" type="text" name="thumbopacity" value="<?php echo $this -> get_option('thumbopacity'); ?>" id="thumbopacity" /> <?php _e('&#37; <!-- percentage -->', SG2_PLUGIN_NAME); ?>
					<span class="howto"><?php _e('default opacity of thumbnails when they are not hovered', SG2_PLUGIN_NAME); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="thumbactive"><?php _e('Thumbnail Active Border', SG2_PLUGIN_NAME); ?></label></th>
				<td>
					<input style="width:65px;" type="text" name="thumbactive" value="<?php echo $this -> get_option('thumbactive'); ?>" id="thumbactive" />
					<span class="howto"><?php _e('border color (hexidecimal) for the active image thumbnail. default:#FFFFFF', SG2_PLUGIN_NAME); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for="thumbscrollspeed"><?php _e('Thumbnails Scroll Speed', SG2_PLUGIN_NAME); ?></label></th>
				<td>
					<input class="widefat" style="width:45px;" name="thumbscrollspeed" value="<?php echo $this -> get_option('thumbscrollspeed'); ?>" id="thumbscrollspeed" /> <?php _e('speed', SG2_PLUGIN_NAME); ?>
					<span class="howto"><?php _e('default:5 recommended:1-20', SG2_PLUGIN_NAME); ?></span>
				</td>
			</tr>
			<tr>
				<th><label for=""><?php _e('Thumbnail Spacing', SG2_PLUGIN_NAME); ?></label></th>
				<td>
					<input type="text" style="width:45px;" name="thumbspacing" value="<?php echo $this -> get_option('thumbspacing'); ?>" id="thumbspacing" /> <?php _e('px', SG2_PLUGIN_NAME); ?>
					<span class="howto"><?php _e('horizontal margin/spacing between thumbnails', SG2_PLUGIN_NAME); ?></span>
				</td>
			</tr>
		</tbody>
	</table>
</div>
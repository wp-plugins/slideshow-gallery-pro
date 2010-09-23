<?php

global $post, $post_ID;
$post_ID = 1;

wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false);
wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false);

?>

<div class="wrap">
	<h2><?php _e('Configuration Settings', SG2_PLUGIN_NAME); ?></h2>
	
	<form action="<?php echo $this -> url; ?>" name="post" id="post" method="post">
		<div id="poststuff" class="metabox-holder has-right-sidebar">			
			<div id="side-info-column" class="inner-sidebar">		
				<?php do_action('submitpage_box'); ?>	
				<?php do_meta_boxes($this -> menus['gallery-settings'], 'side', $post); ?>
                <?php do_action('submitpage_box'); ?>
				<div id="submitdiv" class="postbox">
                	<h3>Slideshow Gallery Pro Full Edition!</h3>
                    <div class="inside">
                        <div id="minor-publishing">
                            <div id="#misc-publishing-actions">
                                <h4>What's different on the Full Edition?</h4>
                                <p>Vertical images will show completely.</p>
                                <p>Customize your slideshow height and width per use</p>
                                <p>Easily link your images to pages</p>
                                <p>And more!</p>
                            </div>
                        </div>
                        <div id="major-publishing-actions">
                            <div id="publishing-action">
                                <a href="http://cameronpreston.com/projects/plugins/slideshow-gallery-2/1-5-pro-edition/" class="button-primary" target="_blank">Learn More & Get it</a>
                            </div>
                            <br class="clear" />
                        </div>
                    </div>
                </div>
           
			</div>

			<div id="post-body">
				<div id="post-body-content">
					<?php do_meta_boxes($this -> menus['gallery-settings'], 'normal', $post); ?>
				</div>
			</div>
			<br class="clear" />
		</div>
	</form>
</div>
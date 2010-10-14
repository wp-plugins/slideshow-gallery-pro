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
               	<h3>Slideshow Gallery Pro- Full!</h3>
                <?php if (SG2_PRO) : ?>
                    <div class="inside">
                        <div id="minor-publishing">
                            <div id="#misc-publishing-actions">
                            	<p>Thank you Supporter!</p>
                                <h4>What do you get?</h4>
                                <p>Vertical images will show completely entire height</p>
                                <p>Customizable sizes! [slideshow w=450 h=350]</p>
                                <p>Want to link to pages without "Manage Slides"? Use the caption field! But leave it blank otherwise :)</p>
                            </div>
                        </div>
                        <div id="major-publishing-actions">
                            <div id="publishing-action">
                                <a href="http://cameronpreston.com/projects/plugins/slideshow-gallery-pro/" class="button-primary" target="_blank">Help Page</a>
                            </div>
                            <br class="clear" />
                        </div>
                    </div>
                <?php else : ?>
                    <div class="inside">
                        <div id="minor-publishing">
                            <div id="#misc-publishing-actions">
                                <h4>What's different on the Full version?</h4>
                                <p>Vertical images will show completely entire height</p>
                                <p>Customize your slideshow height and width per use</p>
                                <p>Easily link your images to pages</p>
                            </div>
                        </div>
                        <div id="major-publishing-actions">
                            <div id="publishing-action">
                                <a href="http://cameronpreston.com/projects/plugins/slideshow-gallery-pro/" class="button-primary" target="_blank">Learn More & Get it</a>
                            </div>
                            <br class="clear" />
                        </div>
                    </div>
                    <?php endif; ?>
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
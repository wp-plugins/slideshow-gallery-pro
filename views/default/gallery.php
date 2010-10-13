<?php if (!empty($slides)) : ?>

	<ul id="slideshow" style="display:none;">

		<?php if ($frompost) : ?>

			<?php foreach ($slides as $slide) : ?>
				<li>

					<h3><?php echo $slide -> post_title;  ?></h3>
                    <?php $full_image_href = wp_get_attachment_image_src($slide -> ID, 'full', false); ?>
                    <?php if ( SG2_PRO ) {
						require SG2_PLUGIN_DIR . '/pro/image_tall_frompost.php';
					} else { echo "<h4>&nbsp;</h4>";
							 echo "<h5>lightbox</h5>"; }?>
					<span><?php echo $full_image_href[0]; ?></span>
                    
					<p><?php echo $slide -> post_content; ?></p>
					<?php $thumbnail_link = wp_get_attachment_image_src($slide -> ID, 'thumbnail', false); ?>
					<?php if ($this -> get_option('thumbnails') == "Y") : ?>
						<?	if (!empty($slide -> guid)) : ?>
                        <?		if (SG2_PRO) : 
									require SG2_PLUGIN_DIR . '/pro/caption_link-frompost.php';
                        		else : ?>
				  <a rel="lightbox" href="<?php echo $slide -> guid; ?>" title="<?php echo $slide -> post_title; ?>"><img style="height:75px;" src="<?php echo $thumbnail_link[0]; ?>" alt="<?php echo $this -> Html -> sanitize($slide -> post_title); ?>" />la</a>                                
                        <?		endif; ?>
						<?	else : ?>
                        <?		list($width, $height, $type, $attr) = getimagesize($full_image_href[0]);?>
								<img style="height:75px;" src="<?php echo $thumbnail_link[0]; ?>" alt="<?php echo $this -> Html -> sanitize($slide -> post_title); ?>" />
						<?	endif; ?>

					<?php else : ?>
                    
                    	<? if (SG2_PRO):
							require SG2_PLUGIN_DIR . '/pro/caption_link-frompost-nothumb.php'; 
						else: ?>
					  <a href="<?php echo $slide -> guid; ?>" title="<?php echo $slide -> post_title; ?>"> </a>
                    	<?php endif; ?>

					<?php endif; ?>
				</li>

			<?php endforeach; ?>

		<?php else : ?>

			<?php foreach ($slides as $slide) : ?>		
				<li>
					<h3><?php echo $slide -> post_title; ?></h3>
                    <?php if ( SG2_PRO ) {
						require SG2_PLUGIN_DIR . '/pro/image_tall_custom.php';
					} else { echo "<h4>&nbsp;</h4>"; }?>
                    <h5>lightbox</h5>
					<span><?php echo SG2_UPLOAD_URL ?>/<?php echo basename($slide -> image_url); ?></span>
					<p><?php echo $slide -> description; ?></p>

					<?php if ($this -> get_option('thumbnails') == "Y") : ?>
						<?php if ($slide -> uselink == "Y" && !empty($slide -> link)) : ?>

							<a href="<?php echo $slide -> link; ?>" title="<?php echo $slide -> title; ?>">
                            	<img style="height:75px;" src="<?php echo $this -> Html -> image_url($this -> Html -> thumbname(basename($slide -> image_url))); ?>" alt="<?php echo $this -> Html -> sanitize($slide -> title); ?>" />
							</a>

						<?php else : ?>

							<img style="height:75px;" src="<?php echo $this -> Html -> image_url($this -> Html -> thumbname(basename($slide -> image_url))); ?>" alt="<?php echo $this -> Html -> sanitize($slide -> title); ?>" />

						<?php endif; ?>
					<?php else : ?>
						<?php if (!empty($slide -> caption)) : ?>
							<a href="<?php echo $slide -> caption; ?>" title="<?php echo $slide -> title; ?>"></a>
                        <?php else : ?>
							<a href="<?php echo $slide -> link; ?>" title="<?php echo $slide -> title; ?>"></a>
						<?php endif; ?>
					<?php endif; ?>

				</li>

			<?php endforeach; ?>

		<?php endif; ?>

	</ul>

	

	<div id="slideshow-wrapper">

		<?php if ($this -> get_option('thumbnails') == "Y" && $this -> get_option('thumbposition') == "top") : ?>

			<div id="thumbnails" class="thumbstop">

				<div id="slideleft" title="<?php _e('Slide Left', $this -> plugin_name); ?>"></div>
				<div id="slidearea">
					<div id="thumbslider"></div>
				</div>
				<div id="slideright" title="<?php _e('Slide Right', $this -> plugin_name); ?>"></div>
				<br style="clear:both; visibility:hidden; height:1px;" />

			</div>

		<?php endif; ?>

		<div id="fullsize">

			<div id="imgprev" class="imgnav" title="Previous Image"></div>
            <? if ($this -> get_option('link') == "Y") : ?>
			<?	 if ( SG2_PRO ) :
				 	require SG2_PLUGIN_DIR . '/pro/caption-lightbox.php';
            	 else : ?>
					<a rel="lightbox" class="lightbox" title="<?php $slide -> title ?>" id="imglink" href="" onClick="append_href(this)">&nbsp;</a>
            <?	 endif; ?>
            <? endif; ?>
            
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
				<div id="information">
			<?php if ($this -> get_option('information_temp') == "Y") : ?>

					<h3></h3>
					<p></p>

			<?php endif; ?>
            

				</div>
		</div>
		

		<?php if ($this -> get_option('thumbnails') == "Y" && $this -> get_option('thumbposition') == "bottom") : ?>

			<div id="thumbnails" class="thumbsbot">
				<div id="slideleft" title="<?php _e('Slide Left', $this -> plugin_name); ?>"></div>
				<div id="slidearea">
					<div id="thumbslider"></div>
				</div>
				<div id="slideright" title="<?php _e('Slide Right', $this -> plugin_name); ?>"></div>
				<br style="clear:both; visibility:hidden; height:1px;" />
			</div>

		<?php endif; ?>

	</div>

	

	<script type="text/javascript">

	jQuery.noConflict();

	tid('slideshow').style.display = "none";

	tid('slideshow-wrapper').style.display = 'block';

	

	var slideshow = new TINY.slideshow("slideshow");

	jQuery(window).bind('load',function() {	
	
		<?php if ($this -> get_option('autoslide_temp')) : ?>slideshow.auto = true;<?php else : ?>slideshow.auto = false;<?php endif; ?>
	
		slideshow.speed = <?php echo $this -> get_option('autospeed'); ?>;
		slideshow.imgSpeed = <?php echo $this -> get_option('fadespeed'); ?>;
		slideshow.navOpacity = <?php echo $this -> get_option('navopacity'); ?>;
		slideshow.navHover = <?php echo $this -> get_option('navhover'); ?>;
		slideshow.letterbox = "#000000";
		slideshow.link = "linkhover";
		slideshow.info = "<?php echo ($this -> get_option('information_temp') == "Y") ? 'information' : ''; ?>";
		slideshow.infoSpeed = <?php echo $this -> get_option('infospeed'); ?>;
		slideshow.left = "slideleft";
		slideshow.right = "slideright";
		slideshow.link = "linkhover";
		slideshow.thumbs = "<?php echo ($this -> get_option('thumbnails') == "Y") ? 'thumbslider' : ''; ?>";
		slideshow.thumbOpacity = <?php echo $this -> get_option('thumbopacity'); ?>;
//		slideshow.scrollSpeed = <?php echo $this -> get_option('thumbscrollspeed'); ?>;
		slideshow.scrollSpeed = <?php  if(sizeof($slides)>5) {echo $this -> get_option('thumbscrollspeed');} else {echo 0;} ?>;
		slideshow.spacing = <?php echo $this -> get_option('thumbspacing'); ?>;
		slideshow.active = "<?php echo $this -> get_option('thumbactive'); ?>";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	});

	jQuery(document).ready(function() {	
<!--		<?php if ($this -> get_option('autoslide')) : ?>slideshow.auto = true;<?php else : ?>slideshow.auto = false;<?php endif; ?>-->
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");

	});

	</script>

<?php endif; ?>
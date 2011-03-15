<?php if (!empty($slides)) : ?>
	<ul id="sgpro_slideshow" style="display:none;">
		<?php if ($frompost) : // WORDPRESS IMAGE GALLERY ONLY   ?>
			<?php foreach ($slides as $slide) : ?>
				<li>
					<h5><?php echo $slide -> post_title;  ?></h5>
                    
<?php 				$full_image_href = wp_get_attachment_image_src($slide -> ID, 'full', false); ?>
<?php				if ( SG2_PRO ) {
						require SG2_PLUGIN_DIR . '/pro/image_tall_frompost.php';
					} else { 
						echo "<h4>&nbsp;</h4>";
					}?>
					<span><?php echo $full_image_href[0]; ?></span>
                    
					<p><?php echo $slide -> post_content; ?></p>
					<?php $thumbnail_link = wp_get_attachment_image_src($slide -> ID, 'thumbnail', false); ?>
					<?php if ($this -> get_option('thumbnails_temp') == "Y") : ?>
						<?php	if (!empty($slide -> guid)) : ?>
                        <?php		if (SG2_PRO) : 
									require SG2_PLUGIN_DIR . '/pro/caption_link-frompost.php';
                        		else : ?>
				  <a rel="lightbox" href="<?php echo $slide -> guid; ?>" title="<?php echo $slide -> post_title; ?>"><img style="height:75px;" src="<?php echo $thumbnail_link[0]; ?>" alt="<?php echo $this -> Html -> sanitize($slide -> post_title); ?>" />la</a>                                
                        <?php		endif; ?>
						<?php	else : ?>
                        <?php		list($width, $height, $type, $attr) = getimagesize($full_image_href[0]);?>
								<img style="height:75px;" src="<?php echo $thumbnail_link[0]; ?>" alt="<?php echo $this -> Html -> sanitize($slide -> post_title); ?>" />
						<?php	endif; ?>
					<?php else : // NO thumbnails_temp?>
                    
<?php					if (SG2_PRO):
							require SG2_PLUGIN_DIR . '/pro/caption_link-frompost-nothumb.php'; 
						else: ?>
					  		<a href="<?php echo $slide -> guid; ?>" title="<?php echo $slide -> post_title; ?>"> </a>
<?php 					endif; ?>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		<?php else : // CUSTOM SLIDES - MANAGE SLIDES ONLY  ?>
			<?php foreach ($slides as $slide) : ?>		
				<li>
					<h5><?php echo $slide -> title; ?></h5>
                    <?php if ( SG2_PRO ) {
						require SG2_PLUGIN_DIR . '/pro/image_tall_custom.php';
					} else { echo "<h4>&nbsp;</h4>"; }?>
					<span><?php echo SG2_UPLOAD_URL ?>/<?php echo $slide -> image; ?></span>
					<p><?php echo $slide -> description; ?></p>
					<?php if ($this -> get_option('thumbnails_temp') == "Y") : ?>
						<?php if ($slide -> uselink == "Y" && !empty($slide -> link)) : ?>
							<a href="<?php echo $slide -> link; ?>" title="<?php echo $slide -> title; ?>"><img style="height:75px;" src="<?php echo $this -> Html -> image_url($this -> Html -> thumbname($slide -> image)); ?>" alt="<?php echo $this -> Html -> sanitize($slide -> title); ?>" /></a>
						<?php else : ?>
							<a href="<?php echo $this -> Html -> image_url($slide -> image); ?>" title="<?php echo $slide -> title; ?>"><img style="height:75px;" src="<?php echo $this -> Html -> image_url($this -> Html -> thumbname($slide -> image)); ?>" alt="<?php echo $this -> Html -> sanitize($slide -> title); ?>" /></a>
						<?php endif; ?>
					<?php else : // NO THUMBNAILS ?>
						<?php if ($slide -> uselink == "N" || empty($slide -> link)) : ?>
							<a href="<?php echo $slide -> image_url; ?>" title="<?php echo $slide -> title; ?>"></a>
                        <?php else : ?>
							<a href="<?php echo $slide -> link; ?>" title="<?php echo $slide -> title; ?>"></a>
						<?php endif; ?>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
	
	<div id="slideshow-wrapper">
		<?php if ($this -> get_option('thumbnails_temp') == "Y" && $this -> get_option('thumbposition') == "top") : ?>
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
            	<div id="imglink"></div>
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
			<?php if ($this -> get_option('information_temp') == "Y") : ?>
				<div id="information">
					<h5></h5>
					<p></p>
				</div>
			<?php endif; ?>
		</div>            
		<?php if ($this -> get_option('thumbnails_temp') == "Y" && $this -> get_option('thumbposition') == "bottom") : ?>
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
	<?php 
	if ($this -> get_option('imagesbox') == "T") 
		$imgbox = "thickbox";
	elseif ($this -> get_option('imagesbox') == "S") 
		$imgbox = "shadowbox";
	elseif ($this -> get_option('imagesbox') == "P") 
		$imgbox = "prettyphoto";
	elseif ($this -> get_option('imagesbox') == "N") 
		$imgbox = "nolink";
	else 
		$imgbox = "window";
		
	$style = $this -> get_option('styles');
	?>
	<script type="text/javascript">
	jQuery.noConflict();
	tid('sgpro_slideshow').style.display = "none";
	tid('slideshow-wrapper').style.display = 'block';
	tid('slideshow-wrapper').style.visibility = 'hidden';	
	/**
	 * issue #2: Bugfix for WebKit. Safari and similar browsers aren't capable to handle jQuery.ready() right. The problem
	 * here was, that sometimes the event was fired (if js is not available in browsers cache) too early, so that not all
	 * pictures were displayed in the thumbnail bar. I added a timeout to give the browser time to load the pictures.
	 * During that time I found it nice to display a spinner icon to give the visitor a hint that "somethings going on there".
	 * For this to display correctly I've added some lines to the css file too.
	 */
	// append the spinner
	jQuery("#fullsize").append('<div id="spinner"><img src="<?php echo SG2_PLUGIN_URL ?>/images/spinner.gif"></div>');
	tid('spinner').style.visibility = 'visible';
	var sgpro_slideshow = new TINY.sgpro_slideshow("sgpro_slideshow");
	jQuery(document).ready(function() {
		// set a timeout before launching the sgpro_slideshow
		window.setTimeout(function() {
		<?php if ($this -> get_option('autoslide_temp')=="Y") : ?>
		sgpro_slideshow.auto = true;
		<?php else : ?>
		sgpro_slideshow.auto = false;
		<?php endif; ?>	
		sgpro_slideshow.linker = "<?php echo ($this -> get_option('linker') == "N") ? 'false' : 'true'; ?>";	
		sgpro_slideshow.nolinkpage = "<?php echo ($this -> get_option('nolinkpage') == "N") ? 'false' : 'true'; ?>";	
		sgpro_slideshow.pagelink="<?php echo ($this -> get_option('pagelink') == "S") ? 'self' : 'blank'; ?>";
		sgpro_slideshow.speed = <?php echo $this -> get_option('autospeed'); ?>;
		sgpro_slideshow.imgSpeed = <?php echo $this -> get_option('fadespeed'); ?>;
		sgpro_slideshow.navOpacity = <?php echo $this -> get_option('navopacity'); ?>;
		sgpro_slideshow.navHover = <?php echo $this -> get_option('navhover'); ?>;
		sgpro_slideshow.letterbox = "<?php echo $style['background'] ?>";
		sgpro_slideshow.info = "<?php echo ($this -> get_option('information_temp') == "Y") ? 'information' : ''; ?>";
		sgpro_slideshow.infoSpeed = <?php echo $this -> get_option('infospeed'); ?>;
		sgpro_slideshow.left = "slideleft";
		sgpro_slideshow.right = "slideright";
		sgpro_slideshow.link = "linkhover";
		sgpro_slideshow.thumbs = "<?php echo ($this -> get_option('thumbnails_temp') == "Y") ? 'thumbslider' : ''; ?>";
		sgpro_slideshow.thumbOpacity = <?php echo $this -> get_option('thumbopacity'); ?>;
//		sgpro_slideshow.scrollSpeed = <?php echo $this -> get_option('thumbscrollspeed'); ?>;
		sgpro_slideshow.scrollSpeed = <?php  if(sizeof($slides)>5) {echo $this -> get_option('thumbscrollspeed');} else {echo 0;} ?>;
		sgpro_slideshow.spacing = <?php echo $this -> get_option('thumbspacing'); ?>;
		sgpro_slideshow.active = "<?php echo $this -> get_option('thumbactive'); ?>";
		sgpro_slideshow.imagesbox = "<?php echo ($imgbox); ?>";	
		jQuery("#spinner").remove();
		sgpro_slideshow.init("sgpro_slideshow","image","imgprev","imgnext","imglink");
		tid('slideshow-wrapper').style.visibility = 'visible';
		}, 1000);
	});
	</script>
<?php endif; ?>
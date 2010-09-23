<?php header("Content-Type: text/css"); 
?>

<?php define( 'SG2_CSS_SHOW', 'on' );?>

<?php $styles = array(); ?>

<?php foreach ($_GET as $skey => $sval) : ?>

	<?php $styles[$skey] = urldecode($sval); ?>

<?php endforeach; ?>

#slideshow { list-style:none; color:#fff; }

#slideshow span { display:none; }

#slideshow-wrapper { width:<?php if ($styles['width_temp']): echo ((int) $styles['width_temp'] - 6);else: echo ((int) $styles['width'] - 6); endif;?>px; background:<?php echo $styles['background']; ?>; padding:2px; border:<?php echo $styles['border']; ?>; margin:25px auto; display:none; }

#slideshow-wrapper * { margin:0; padding:0; }

#fullsize { position:relative; z-index:1; overflow:hidden; width:<?php if ($styles['width_temp']): echo ((int) $styles['width_temp'] - 6);else: echo ((int) $styles['width'] - 6); endif;?>px; height:<?php if ($styles['height_temp']): echo $styles['height_temp'];else: echo $styles['height']; endif?>px; }

#information { position:absolute; bottom:0; width:<?php if ($styles['width_temp']): echo ((int) $styles['width_temp'] - 6);else: echo ((int) $styles['width'] - 6); endif;?>px; height:0; background:<?php echo $styles['infobackground']; ?>; color:<?php echo $styles['infocolor']; ?>; overflow:hidden; z-index:200; opacity:.7; filter:alpha(opacity=70); }

#information h3 { color:<?php echo $styles['infocolor']; ?>; padding:4px 8px 3px; font-size:14px; }

#information p { color:<?php echo $styles['infocolor']; ?>; padding:0 8px 8px; }

#image { width:<?php if ($styles['width_temp']): echo ((int) $styles['width_temp'] - 6);else: echo ((int) $styles['width'] - 6); endif;?>px; ?>px; }

#image img { height:<?php if ($styles['height_temp']): echo ((int) $styles['height_temp'] - 6);else: echo ((int) $styles['height'] - 6); endif;?>px; }

<?php if (empty($styles['resizeimages']) || $styles['resizeimages'] == "Y") : ?>

#image img { 
position:absolute; 
border:none; 
width:<?php if ($styles['width_temp']): echo ((int) $styles['width_temp'] - 6);else: echo ((int) $styles['width'] - 6); endif;?>px;
height:auto;
}
<?php else : ?>
	#image img { position:absolute; border:none; width:auto; }<?php endif; ?> 

<?php if (empty($styles['resizeimages2']) || $styles['resizeimages2'] == "Y") : ?>

#image img#tall { 
position:absolute; 
border:none; 
width:auto;
height:<?php if ($styles['height_temp']): echo ((int) $styles['height_temp'] - 6);else: echo ((int) $styles['height'] - 6); endif;?>px;
}
<?php endif; ?>


.imgnav { position:absolute; width:25%; height:<?php if ($styles['height_temp']): echo ((int) $styles['height_temp'] + 6);else: echo ((int) $styles['height'] + 6); endif;?>px; cursor:pointer; z-index:150; }

#imgprev { left:0; background:url('../images/left.gif') left center no-repeat; }

#imgnext { right:0; background:url('../images/right.gif') right center no-repeat; }

#imglink { position:absolute; top: 0px; left: <?php echo ((int) $styles['width']*0.25 -2); ?>px; height:<?php if ($styles['height_temp']): echo ((int) $styles['height_temp'] + 6);else: echo ((int) $styles['height'] + 6); endif;?>px; width: <?php if ($styles['width_temp']): echo ((int) $styles['width_temp']*0.5-2); else: echo ((int) $styles['width']*0.5-2); endif;?>px; z-index:5000; opacity:.0; filter:alpha(opacity=0); background: #FFF;}

/*.linkhover*/

#imglink:hover { background:url('../images/link.gif') center center no-repeat; opacity:.4; filter:alpha(opacity=40)}

#thumbnails {  }

.thumbstop { margin-bottom:15px !important; }

.thumbsbot { margin-top:15px !important; }

#slideleft { float:left; width:20px; height:81px; background:url('../images/scroll-left.gif') center center no-repeat; background-color:<?php echo $styles['background']; ?> }

#slideleft:hover { background-color:#666; }

#slideright { float:right; width:20px; height:81px; background:<?php echo $styles['background']; ?> url('../images/scroll-right.gif') center center no-repeat; }

#slideright:hover { background-color:#aaa; }

#slidearea { float:left; background:<?php echo $styles['background']; ?>; position:relative; width:<?php if ($styles['width_temp']): echo ((int) $styles['width_temp'] - 55);else: echo ((int) $styles['width'] - 55); endif;?>px; margin-left:5px; height:81px; overflow:hidden; }

#thumbslider { position:absolute; left:0; height:81px; }

#thumbslider img { cursor:pointer; border:1px solid #666; padding:2px; -moz-border-radius:4px; -webkit-border-radius:4px; float:left !important; }
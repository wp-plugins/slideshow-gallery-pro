<?php header("Content-Type: text/css"); ?>
<?php $styley = array(); ?>
<?php 
foreach ($_GET as $skey => $sval) :
	$styley[$skey] = urldecode($sval);
endforeach;
IF ($styley['width_temp']) {
	$styley['width'] = $styley['width_temp'];
}
IF ($styley['height_temp']) {
	$styley['height'] = $styley['height_temp'];
}
IF (! $styley['thumbheight']) { $styley['thumbheight'] = "75"; }
$navleft = "../images/left.gif";
$navright = "../images/right.gif";
IF ($styley['navbuttons'] == 0) { $navright = '../images/right.gif';$navleft = '../images/left.gif'; }
ELSEIF ($styley['navbuttons'] == 1) { $navright = '../pro/images/right-sq.png';$navleft = '../pro/images/left-sq.png'; }
ELSEIF ($styley['navbuttons'] == 2) { $navright = '../pro/images/right-rd.png';$navleft = '../pro/images/left-rd.png'; }
ELSEIF ($styley['navbuttons'] == 3) { $navright = '../pro/images/right-pl.png';$navleft = '../pro/images/left-pl.png'; }
?>

#slideshow-wrap {width:<?php echo( (int) $styley['width']); ?>px;display:block;}
#slideshow-wrap * {margin:0;padding:0;}
#gs-fullsize {position:relative;z-index:1;overflow:hidden;width:<?php echo( (int) $styley['width']) ?>px !important;height:<?php echo( (int) $styley['height']); ?>px;}
.inav {position:absolute;width:13%;height:<?php echo( (int) $styley['height']); ?>px;cursor:pointer;z-index:150;}
#iprev {left:1px;background:url(<?php echo($navleft);?>) left center no-repeat;}
#inext {right:0;background:url(<?php echo($navright);?>) right center no-repeat;}
#imglink {position:absolute;top:0;left: <?php echo ((int) $styley['width']*0.25);?>px;height:<?php echo( (int) $styley['height']); ?>px;width: <?php if ($styley['width_temp']): echo ((int) $styley['width_temp']*0.5);else: echo ((int) $styley['width']*0.5);endif;?>px;z-index:5000;opacity:.0;filter:alpha(opacity=0);background: #FFF;}
.galslider {margin:0!important;list-style-type: none;display:none}
#slideshow-wrap .galslider li img { width:auto;height:<?php echo( (int) $styley['height']); ?>px;margin:0 auto; display:block; }
.slide-node { width:<?php echo( (int) $styley['width']); ?>px;}

<?php
if (!defined('DS')) { define('DS', DIRECTORY_SEPARATOR); }
$root = __FILE__;
for ($i = 0; $i < 4; $i++) $root = dirname($root);
class SGProAjax extends GalleryPlugin {
	var $safecommands = array('slides_order');
	function SGProAjax($cmd) {
	function slides_order() {
$SGProAjax = new SGProAjax($_GET['cmd']);

?>
<?php

/*
Plugin Name: Slideshow Gallery Pro
Plugin URI: http://cameronpreston.com/projects/plugins/slideshow-gallery-pro/
Author: Cameron Preston
Author URI: http://cameronpreston.com
Description: Slideshow Gallery Pro is a slideshow that integrates with the WordPress image attachment feature, as well as a custom slide manager. Thumbnails and captions galore! Use this <code>[slideshow]</code> into its content with optional <code>post_id</code>, <code>exclude</code>, <code>auto</code>, and <code>caption</code> parameters.
Version: 1.1
*/

define('DS', DIRECTORY_SEPARATOR);

define( 'SG2_VERSION', '1.1' );

if ( ! defined( 'SG2_PLUGIN_BASENAME' ) )
	define( 'SG2_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

if ( ! defined( 'SG2_PLUGIN_NAME' ) )
	define( 'SG2_PLUGIN_NAME', trim( dirname( SG2_PLUGIN_BASENAME ), '/' ) );

if ( ! defined( 'SG2_PLUGIN_DIR' ) )
	define( 'SG2_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . SG2_PLUGIN_NAME );

if ( ! defined( 'SG2_PLUGIN_URL' ) )
	define( 'SG2_PLUGIN_URL', WP_PLUGIN_URL . '/' . SG2_PLUGIN_NAME );

if ( ! defined( 'SG2_UPLOAD_URL' ) )
	define( 'SG2_UPLOAD_URL', get_bloginfo('wpurl')."/wp-content/uploads/". SG2_PLUGIN_NAME );

if ( ! defined( 'SG2_LOAD_CSS' ) )
	define( 'SG2_LOAD_CSS', true );

define( 'SG2_PRO', false);

define( 'SG2_CSS_SHOW', 'off' );

//require_once(dirname(__FILE__) . DS . 'slideshow-gallery-plugin.php');
require_once SG2_PLUGIN_DIR . '/slideshow-gallery-plugin.php';


//require_once SG2_PLUGIN_DIR . '/settings.php';
	

class Gallery extends GalleryPlugin {

	function Gallery() {
		$url = explode("&", $_SERVER['REQUEST_URI']);
		$this -> url = $url[0];
		
		$this -> register_plugin('slideshow-gallery-pro', __FILE__);
		
		//WordPress action hooks
		$this -> add_action('admin_menu');
		$this -> add_action('admin_head');
		$this -> add_action('admin_notices');
//		$this -> add_action('sg2_enqueue_styles');
		
		//WordPress filter hooks
		$this -> add_filter('mce_buttons');
		$this -> add_filter('mce_external_plugins');
		
		add_shortcode('slideshow', array($this, 'embed'));
	}
	
	function admin_menu() {
		add_menu_page(__('Slideshow', $this -> plugin_name), __('Slideshow', $this -> plugin_name), 10, "gallery", array($this, 'admin_slides'), SG2_PLUGIN_URL . '/images/icon.png');
		$this -> menus['gallery'] = add_submenu_page("gallery", __('Manage Slides', $this -> plugin_name), __('Manage Slides', $this -> plugin_name), 10, "gallery", array($this, 'admin_slides'));
		$this -> menus['gallery-settings'] = add_submenu_page("gallery", __('Configuration', $this -> plugin_name), __('Configuration', $this -> plugin_name), 10, "gallery-settings", array($this, 'admin_settings'));
		
		add_action('admin_head-' . $this -> menus['gallery-settings'], array($this, 'admin_head_gallery_settings'));
	}
	
	function admin_head() {
		$this -> render('head', false, true, 'admin');
	}
	
	function admin_head_gallery_settings() {		
		add_meta_box('submitdiv', __('Save Settings', $this -> plugin_name), array($this -> Metabox, "settings_submit"), $this -> menus['gallery-settings'], 'side', 'core');
		add_meta_box('generaldiv', __('General Settings', $this -> plugin_name), array($this -> Metabox, "settings_general"), $this -> menus['gallery-settings'], 'normal', 'core');
		add_meta_box('stylesdiv', __('Appearance &amp; Styles', $this -> plugin_name), array($this -> Metabox, "settings_styles"), $this -> menus['gallery-settings'], 'normal', 'core');
		
		do_action('do_meta_boxes', $this -> menus['gallery-settings'], 'normal');
		do_action('do_meta_boxes', $this -> menus['gallery-settings'], 'side');
		
	}
	
	function admin_notices() {
		$this -> check_uploaddir();
	
		if (!empty($_GET[$this -> pre . 'message'])) {		
			$msg_type = (!empty($_GET[$this -> pre . 'updated'])) ? 'msg' : 'err';
			call_user_method('render_' . $msg_type, $this, $_GET[$this -> pre . 'message']);
		}
	}
	
	function mce_buttons($buttons) {
		array_push($buttons, "separator", "gallery");
		return $buttons;
	}
	
	function mce_external_plugins($plugins) {
		$plugins['gallery'] = SG2_PLUGIN_URL . '/js/tinymce/editor_plugin.js';
		return $plugins;
	}
	
	function slideshow($output = true, $post_id = null, $exclude = null, $include = null) {		
//		$this -> add_action( 'wp_print_styles', 'sg2_enqueue_styles' );

		global $wpdb;
		$post_id_orig = $post -> ID;
		
		if (empty($post_id)) {
			$content = exclude_ids($attachments);
		}
		elseif (!empty($post_id) && $post = get_post($post_id)) {
			if ($attachments = get_children("post_parent=" . $post -> ID . "&post_type=attachment&post_mime_type=image&orderby=menu_order ASC, ID ASC")) {
				$content = exclude_ids($attachments);
			}
		}
		else {
			$slides = $this -> Slide -> find_all(null, null, array('order', "ASC"));
			$content = $this -> render('gallery', array('slides' => $slides, 'frompost' => false), false, 'default');
		}
		$post -> ID = $post_id_orig;
		if ($output) { echo $content; } else { return $content; }
	}

	function embed($atts = array(), $content = null) {
		//global variables
		global $wpdb;
		
		$defaults = array('post_id' => null, 'exclude' => null, 'include' => null, 'custom' => null, 'caption' => null, 'auto' => null, 'w' => null, 'h' => null, 'nolink' => null);
		extract(shortcode_atts($defaults, $atts));
		
		if ($this -> get_option('information')=='Y') { $this -> update_option('information_temp', 'Y'); }
		elseif ($this -> get_option('information')=='N') { $this -> update_option('information_temp', 'N'); }
		if ($this -> get_option('autoslide')=='Y') { $this -> update_option('autoslide_temp', 'Y'); }
		elseif ($this -> get_option('autoslide')=='N') { $this -> update_option('autoslide_temp', 'N'); }

		if (!empty($caption)) { 
			if (($this -> get_option('information')=='Y') && ($caption == 'off')) {
				$this -> update_option('information_temp', 'N');	
			}
			elseif (($this -> get_option('information')=='N') && ($caption == 'on')) {
				$this -> update_option('information_temp', 'Y');
			}
		}
		if (!empty($auto)) { 
			if (($this -> get_option('autoslide')=='Y') && ($auto == 'off')) {
				$this -> update_option('autoslide_temp', null);	
			}
			elseif (($this -> get_option('autoslide')=='N') && ($auto == 'on')) {
				$this -> update_option('autoslide_temp', 'Y');
			}
		}
		/******** PRO ONLY **************/
		if ( SG2_PRO ) {
			require SG2_PLUGIN_DIR . '/pro/custom_sizing.php';
		}
		//$this -> add_action(array($this, 'pro_custom_wh'));
		/******** END PRO ONLY **************/

		if (!empty($nocaption)) { $this -> update_option('information', 'N'); }
		if (!empty($nolink)) { $this -> update_option('link', 'N'); }
			else { $this -> update_option('link', 'Y'); }

		if (!empty($custom)) {
			$slides = $this -> Slide -> find_all(null, null, array('order', "ASC"));
			$content = $this -> render('gallery', array('slides' => $slides, 'frompost' => false), false, 'default');
		} else {
			global $post;
			$post_id_orig = $post -> ID;
			$pid = (empty($post_id)) ? $post -> ID : $post_id;
		
			if (!empty($pid) && $post = get_post($pid)) {
				if ($attachments = get_children("post_parent=" . $post -> ID . "&post_type=attachment&post_mime_type=image&orderby=menu_order ASC, ID ASC")) {
					$content = $this->exclude_ids($attachments, $exclude, $include);
				}
			}
			$post -> ID = $post_id_orig;
		}
		return $content;
	}

	public function exclude_ids($attachments, $exclude, $include) {
		if (!empty($exclude)) {
			$exclude = array_map('trim', explode(',', $exclude));
/*			echo("<script type='text/javascript'>alert('exclude! ".$exclude[0]."');</script>");*/

			foreach ($attachments as $id => $attachment) {
				if (in_array($id, $exclude)) {
					unset($attachments[$id]);
				}
			}
		}
		elseif (!empty($include)) {
			$include = array_map('trim', explode(',', $include));
/*			echo("<script type='text/javascript'>alert('include!".$include[0]."');</script>");*/
			foreach ($attachments as $id => $attachment) {
				if (in_array($id, $include)) {}
				else { unset($attachments[$id]); }
			}
		}
		$content = $this -> render('gallery', array('slides' => $attachments, 'frompost' => true), false, 'default');
		return $content;
	}	

	function admin_slides() {	
		switch ($_GET['method']) {
			case 'save'				:
				if (!empty($_POST)) {
					if ($this -> Slide -> save($_POST, true)) {
						$message = __('Slide has been saved', $this -> plugin_name);
						$this -> redirect($this -> url, "message", $message);
					} else {
						$this -> render('slides' . DS . 'save', false, true, 'admin');
					}
				} else {
					$this -> Db -> model = $this -> Slide -> model;
					$this -> Slide -> find(array('id' => $_GET['id']));
					$this -> render('slides' . DS . 'save', false, true, 'admin');
				}
				break;
			case 'mass'				:
				if (!empty($_POST['action'])) {
					if (!empty($_POST['Slide']['checklist'])) {						
						switch ($_POST['action']) {
							case 'delete'				:							
								foreach ($_POST['Slide']['checklist'] as $slide_id) {
									$this -> Slide -> delete($slide_id);
								}
								
								$message = __('Selected slides have been removed', $this -> plugin_name);
								$this -> redirect($this -> url, 'message', $message);
								break;
						}
					} else {
						$message = __('No slides were selected', $this -> plugin_name);
						$this -> redirect($this -> url, "error", $message);
					}
				} else {
					$message = __('No action was specified', $this -> plugin_name);
					$this -> redirect(SG2_PLUGIN_URL, "error", $message);
				}
				break;
			case 'order'			:
				$slides = $this -> Slide -> find_all(null, null, array('order', "ASC"));
				$this -> render('slides' . DS . 'order', array('slides' => $slides), true, 'admin');
				break;
			default					:
				$data = $this -> paginate('Slide');				
				$this -> render('slides' . DS . 'index', array('slides' => $data[$this -> Slide -> model], 'paginate' => $data['Paginate']), true, 'admin');
				break;
		}
	}
	
	function admin_settings() {
		switch ($_GET['method']) {
			case 'reset'			:
				global $wpdb;
				$query = "DELETE FROM `" . $wpdb -> prefix . "options` WHERE `option_name` LIKE '" . $this -> pre . "%';";
				
				if ($wpdb -> query($query)) {
					$message = __('All configuration settings have been reset to their defaults', $this -> plugin_name);
					$msg_type = 'message';
					$this -> render_msg($message);	
				} else {
					$message = __('Configuration settings could not be reset', $this -> plugin_name);
					$msg_type = 'error';
					$this -> render_err($message);
				}
				
				$this -> redirect($this -> url, $msg_type, $message);
				break;
			default					:
				if (!empty($_POST)) {
					foreach ($_POST as $pkey => $pval) {					
						$this -> update_option($pkey, $pval);
					}
					
					$message = __('Configuration has been saved', $this -> plugin_name);
					$this -> render_msg($message);
				}	
				break;
		}
				
		$this -> render('settings', false, true, 'admin');
	}
	
}
//initialize a Gallery object
$Gallery = new Gallery();
?>
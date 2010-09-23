=== Slideshow Gallery Pro ===
Contributors: Cameron Preston
Donate link: http://cameronpreston.com/projects/plugins/slideshow-gallery-pro/
Tags: slideshow pro, slide show, wordpress plugins, slideshow gallery, slides, slideshow, image gallery, gallery, content gallery, javascript, javascript slideshow, slideshow gallery, jquery, ajax
Requires at least: 2.8
Tested up to: 3.0.1
Stable tag: 1.0

Slideshow Gallery Pro: this a photo viewing solution that integrates with the WordPress image upload and gallery system. Thumbs & Lightbox!

== Description ==

Slideshow Gallery Pro is a photo and image viewing plugin that integrates seemlessly with the WordPress image upload and gallery system.  Using the most current web technologies like AJAX and JQuery, this viewing and linking solution is the best and easiest to use slideshow available on Wordpress.

Flexible, configurable and easy to use. Embed-able and hardcode-able and improved. To embed into a post/page, simply insert <code>[slideshow]</code> into its content with optional <code>post_id</code>, <code>exclude</code>, <code>exclude</code>, and <code>auto</code>  parameters. To hardcode into any PHP file of your WordPress theme, simply use <code><?php if (class_exists('Gallery')) { $Gallery = new Gallery(); $Gallery -> slideshow($output = true, $post_id = null); } ?></code> and specify the required <code>$post_id</code> parameter accordingly.

You will not be able to use "Slideshow Gallery" or "Slideshow Gallery 2" if you'd like to use "Slideshow Gallery Pro." Good news is that your previous slideshow calls will all work if you replace those plugins!

== Installation ==

Installing the WordPress Slideshow Gallery Pro plugin manually is very easy. Simply follow the steps below.

1. Extract the package to obtain the `slideshow-gallery-pro` folder
1. Upload the `slideshow-gallery-pro` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the settings according to your needs through the 'Slideshow' > 'Configuration' menu
1. Add and manage your slides in the 'Slideshow' section (Or just use the built in wordpress gallery)
1. Put `[slideshow post_id="X" exclude="" caption="on/off"]` to embed a slideshow with the images of a post into your posts/pages or use `[slideshow custom=1]` to embed a slideshow with your custom added slides or `<?php if (class_exists('Gallery')) { $Gallery = new Gallery(); $Gallery -> slideshow($output = true, $post_id = null); }; ?>` into your WordPress theme

== Frequently Asked Questions ==

= Can I display/embed multiple instances of the slideshow gallery? =

Yes, you can, but only one slideshow per page.

= What if I only want captions on some of my pages

Set your default captions to off; for any slideshow you put on your page use `[slideshow caption="on"]`

= What if my configuration isn't showing up? =

You're most likely not running PHP5. Talk to your host to upgrade or switch your hosting provider. PHP5 is eleventy years old.

= How do I find the numbers to exclude? =

Not as easy as it used to be! Go into the Media Library. Choose an image you want to exclude and click on it and notice your address bar: "/wp-admin/media.php?action=edit&attachment_id=353". Therefore, [slideshow exclude="353"]

== Screenshots ==

1. Slideshow gallery pro with thumbnails at the bottom.
2. Slideshow gallery pro with thumbnails turned OFF.
3. Slideshow gallery pro with thumbnails at the top.
4. Different styles/colors.

== Upgrade Notice ==

== Changelog ==

= 1.0 Renamed to Pro =
* [slideshow w="500" h="200"] Make your slideshow size customized per instance
* Vertical/Portfolio images show in their entirety
* IE Issue Fixed
* Last thumbnail dropping issue fixed (added 3px buffer in gallery.js)

= Slideshow Gallery 2 - 1.2 Beta = 
* Link images to pages from the post gallery. Caption field is for the page link.
* CSS is fixed to have better backgrounding for switching to white themes
* Auto Slideshow is now a feature you can turn on or off depending on the slide. [ slideshow auto="on" ]
* NextGen Gallery Config Menu overlapping issue is fixed.

= 1.1.4 =
* Fixed the thumbnails to display at startup for Chrome and Safari
* Fixed bug in the js file for lightbox

= 1.1.3 =
* Created it so captions was an option that you can turn on or off from [ slideshow ]

= 1.1.2 =
* Upgrade Manage Slides to work with the plugin nomenclature.

= 1.1.1 =
* Made it so if you pull a slideshow from a different post it still allows comments.
* Updated FAQs

= 1.1 = 
* Made it so the slideshow worked :)

= 1.0 =
* Initial release of the WordPress Slideshow Gallery 2 plugin
* Based on the popular and amazing slideshow: http://wordpress.org/extend/plugins/slideshow-gallery/

== Upgrade Notice ==

Upgrading from "Slideshow Gallery" or "Slideshow Gallery 2"?
Then you’re set! Any [slideshow] reference in your code will work smoothly when you upgrade to this Pro Edition. All you have to do is Disable the previous edition and Enable this one.

The only tricky part is if you’re using [slideshow custom=1] aka "Manage Slides" to show your gallery. Then you have a folder with all of your images in the /wp-content/uploads/slideshow-gallery/ folder that will need to to be copied to /wp-content/uploads/slideshow-gallery-pro/. So before you do the switch, FTP into your domain create the new folder and copy the files and you’ll have a smooth upgrade! Otherwise just start fresh!

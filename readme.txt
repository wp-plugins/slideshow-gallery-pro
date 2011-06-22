=== Slideshow Gallery Pro ===
Contributors: Cameron Preston
Donate link: http://cameronpreston.com/projects/plugins/slideshow-gallery-pro
Tags: slideshow pro, prettyphoto, slide show, shadowbox, wordpress plugins, slideshow gallery, slides, slideshow, image gallery, gallery, images, jquery, ajax
Requires at least: 2.8
Tested up to: 3.1.3
Stable tag: 1.4

An easily embedable photo viewing solution for photographers and bloggers that integrates with the WordPress Gallery System and offers a custom Gallery solution as well. Captions, Thumbnails, Shadowbox, PrettyPhoto, Management Tool and more!

== Description ==
A simple to use but highly customizable photo and image viewing plugin that integrates seemlessly with the WordPress image upload and gallery system.  Using the most current web technologies like AJAX and JQuery, this viewing and linking solution is the best and easiest to use slideshow available on Wordpress.

Check out more details here: http://cameronpreston.com/projects/plugins/slideshow-gallery-pro/

Flexible, configurable and easy to use. Embed-able and hardcode-able and improved. To embed into a post/page, simply insert <code>[slideshow]</code> into its content with optional <code>post_id</code>, <code>exclude</code>, <code>exclude</code>, and <code>auto</code>  parameters. Hardcoding options are also available and easily added. Check out the Slideshow Gallery Pro Manual on the plugin details page (linked above) for code examples.

Check out the website and download the manual to get fully acquainted with the features!

== Installation ==
Installing the WordPress Slideshow Gallery Pro plugin manually is very easy. Simply follow the steps below.
1. Extract the package to obtain the `slideshow-gallery-pro` folder
1. Upload the `slideshow-gallery-pro` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Configure the settings according to your needs through the 'Slideshow' > 'Configuration' menu
1. Add and manage your slides in the 'Slideshow' section (Or just use the built in wordpress gallery)
1. Put `[slideshow post_id="X" exclude="" caption="on/off"]` to embed a slideshow with the images of a post into your posts/pages or use `[slideshow custom=1]` to embed a slideshow with your custom added slides or `<?php if (class_exists('Gallery')) { $Gallery = new Gallery(); $Gallery -> slideshow($output = true, $post_id = null); }; ?>` into your WordPress theme
1. For the most up to date list of options available please goto: http://cameronpreston.com/projects/plugins/slideshow-gallery-pro/
Full Edition customers (my plugin supporters). Installing full functionality is easy! 
1.You will either download from the members page the full edition or have it emailed to you.
1. Just make sure the `/pro/` folder is in your /wp-content/plugins/slideshow-gallery-pro/ directory and you're set!

== Frequently Asked Questions ==

= How can I display the slideshow in a sidebar as a widget? =
Install the plugin Advanced Text Widget and put the embed code in there.

= Can I display/embed multiple instances of the slideshow gallery? =
Yes, you can, but only one slideshow per page.

= What if I only want captions on some of my pages
Set your default captions to off; for any slideshow you put on your page use `[slideshow caption="on"]`

= What if my configuration isn't showing up? =
You're most likely not running PHP5. Talk to your host to upgrade or switch your hosting provider. PHP5 is eleventy years old.

= How do I find the numbers to exclude (or include)? =
Not as easy as it used to be! Go into the Media Library. Choose an image you want to exclude and click on it and notice your address bar: "/wp-admin/media.php?action=edit&attachment_id=353". Therefore, `[slideshow exclude=353]`

= My thumbnails aren't scrolling, what's up? =
Make sure you have at least 6 thumbnails for that to work properly. Otherwise thumbnails are probably not necessary.

= Cufon is messing with my slideshow!! =
Edit your cufon settings to not change Header5 (H5)

Pro Questions

= My plugin breaks when I install the pro version =
Many times this has to do with how it was uploaded... Delete all the slideshow-gallery-pro files from your plugins directory (this can be done by clicking 'Delete' from the Plugin Page menu) Then use the Plugin Page -> Add New -> Upload -> to upload the slideshow-gallery-pro.zip file

You may also want to "Reset Configuration" from the Configuration page

= I get some weird `function.getimagesize` error on image clicks =
Your images have spaces in them! Replace those with dashes or underscores and you're good to go!

== Screenshots ==
1. Slideshow gallery pro with thumbnails at the bottom.
2. Slideshow gallery pro with thumbnails turned OFF.
3. Slideshow gallery pro with thumbnails at the top.
4. Different styles/colors.

== Changelog ==
= 1.4 =
* Thumbnails now are all square and can be up to size 100
* Positioning issues fixed centering images vertically & horizontally (less reliance on DOM)
* align=left and align=right added for slideshow embed
* Thickbox galleries now allowed
* Added Caption Link Feature Switch
* Upload directory now variable
* Dropping thumbnails bug fixed
* Fixed delete bug
* Fixed image upload bug (spaces and periods)

= 1.3.3 =
* Thumbnail resizing
* Information Bar Options (Always Show & Show on Hover)
* Minimize Information Bar Height (cancel out theme styling)
* Custom Slide Description no longer required
* Fixed the nolink issue

= 1.3.2 = 
* Hardcode Update: Set multiple custom values (1-10) (full edition only)
* Hardcode Update: Set width and height in slideshow() function (full edition only)
* Center Slideshow images vertically - good for long and skinny images
* Add ability to change page link target
* Add "No Link" functionality to all slideshow instances
* Now using slideshow background as letterbox

= 1.3.1 =
* Changed 'slideshow' function to 'sgpro_slideshow' to not have as many conflicts
* Added PrettyPhoto and Shadowbox functionality
* Fixed page linking for Manage Slides

= 1.3.03 =
* Fixed bug dealing with basic edition custom slideshows

= 1.3 =
* Added SSL Capability for domains using HTTPS
* Added multiple custom slides with multiple ordering for Full
* Added extra image options for Full
* Added "slug" in embed for adding pages based off slug rather than post_id
* Added "thumbs=on/off" in embed for chossing whether or not to display thumbnails per instance
* Fixed thickbox close and loading images
* Fixed the nolink issue for both customs and wp-gallery
* Updated class to _construct

= 1.2.03 =
* Re-tweaked some of the bugs

= 1.2 = 
* Fixed Order Custom Slides
* Fixed Margin-top Issue
* Updated Manage Slides Page (Upload & Look)
* Updated to spinner
* Updated transition - smooth instead of snapshot
* Updated to thickbox instead of lightbox
* Fixed bad calls of < ?php
* Fixed auto=off bug

= 1.1.06 = 
* Fixed the custom h3 issue
* Fixed the custom image linking issue
* right aligned image issue
* Configuration first!
* Deprecated author levels
* Hardcoding for custom Manage Slides
* Fixed Autoslide issue

= 1.1 =
* Fixed a scrolling bug for when there are few thumbs
* Add 'include' to embed (an addition to 'exclude')
* Cleaned code for excluding and embedding
* Added 'nolink' embed. Set to true and you won't have any link in the middle!

= 1.0.1 =
* Renaming from '2' to 'Pro' bug issue fixed

= 1.0 Renamed to Pro =
* [slideshow w="500" h="200"] Make your slideshow size customized per instance
* Vertical/Portfolio images show in their entirety
* IE Issue Fixed
* Last thumbnail dropping issue fixed (added 3px buffer in gallery.js)

=Slideshow Gallery 2=

= 1.2 Beta = 
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

= 1.3 =
Upgrade for new embed features and some major bug fixes!
Full Edition users need not download! Old editions of full (2010) will not be compatible with this. Re-download from Members page.
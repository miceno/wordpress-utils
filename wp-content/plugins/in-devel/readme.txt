=== In Development ===
Plugin Name: In development utils
Plugin URI: https://github.com/miceno/wordpress-utils
Description: A set of tools for development and enhancing your Wordpress experience.
Version: 0.2
Author: Orestes Sanchez Benavente
Author URI: https://blog.estotienearreglo.es
Requires at least: 3.0.1
Tested up to: 4.4
Stable tag: 4.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin for the Development environment.

== Description ==

Development plugin, when you need to have some quick dirty features available, code them into this plugin.


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `in-devel` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress


== Frequently Asked Questions ==


= How to make a google map responsive? =

The code to embed a map is like this:

1. You should wrap the map with a div class `google-maps-responsive`:
    <div class="responsive-iframe-wrapper google-maps-responsive aspect-traditional">
    <iframe ...></iframe>
    </div>

2. Remove the width of the map iframe
    <iframe src="https://www.google.com/maps/d/embed?mid=zBbiYjToejgg.kcUFPZVYQIFA"></iframe>


= How to disable scroll zoom over a Google Map =

1. You should wrap the map with a `div` classed `google-maps-responsive`:
    <div class="responsive-iframe-wrapper google-maps-responsive aspect-traditional">
    <iframe ...></iframe>
    </div>

2. Remove the width of the map iframe
    <iframe src="https://www.google.com/maps/d/embed?mid=zBbiYjToejgg.kcUFPZVYQIFA"></iframe>

3. Now to activate zoom scroll you click on the map. 
4. If you move the cursor out of focus of the map, you disable zoom scroll.


== Screenshots ==

Empty

== Changelog ==

= 0.1 =
* Initial version

= 0.2 =
* Move Google Analytics to plugins instead of theme.


== Upgrade Notice ==

Empty

<?php
/**
 * Plugin Name:       The Events Calendar Extension: Inherit Theme Fonts
 * Plugin URI:        https://theeventscalendar.com/extensions/inherit-themes-fonts/
 * GitHub Plugin URI: https://github.com/mt-support/tribe-ext-inherit-theme-fonts
 * Description:       Inherit the theme's fonts rather than using the default for events and event views.
 * Version:           1.0.0
 * Extension Class:   Tribe\Extensions\InheritThemeFonts\Main
 * Author:            Modern Tribe, Inc.
 * Author URI:        http://m.tri.be/1971
 * License:           GPL version 3 or any later version
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       tribe-ext-inherit-theme-fonts
 *
 *     This plugin is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     any later version.
 *
 *     This plugin is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *     GNU General Public License for more details.
 */

namespace Tribe\Extensions\InheritThemeFonts;

use Tribe__Extension;

/**
 * Define Constants
 */

if ( ! defined( __NAMESPACE__ . '\NS' ) ) {
	define( __NAMESPACE__ . '\NS', __NAMESPACE__ . '\\' );
}

if ( ! defined( NS . 'PLUGIN_TEXT_DOMAIN' ) ) {
	// `Tribe\Extensions\InheritThemeFonts\PLUGIN_TEXT_DOMAIN` is defined
	define( NS . 'PLUGIN_TEXT_DOMAIN', 'tribe-ext-inherit-fonts' );
}

// Do not load unless Tribe Common is fully loaded and our class does not yet exist.
if (
	class_exists( 'Tribe__Extension' )
	&& ! class_exists( NS . 'Main' )
) {
	/**
	 * Extension main class, class begins loading on init() function.
	 */
	class Main extends Tribe__Extension {
		/**
		 * Extension initialization and hooks.
		 */
		public function init() {
			add_action( 'wp_enqueue_scripts', function() {
				// the CSS within this stylesheet was generated using the tribe-product-utils command against relevant plugins:
				//   mt generate-css-override --search='"Helvetica Neue", Helvetica, -apple-system, BlinkMacSystemFont, Roboto, Arial, sans-serif' --replace="font-family: inherit;"
				wp_enqueue_style( 'tribe-ext-inherit-fonts', plugins_url( 'src/resources/css/style.css', __FILE__ ), [ 'tribe-events-views-v2-full' ] );
			} );
		}
	} // end class
} // end if class_exists check
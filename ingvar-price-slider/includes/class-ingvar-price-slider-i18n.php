<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://naprienko.in.ua/
 * @since      1.0.0
 *
 * @package    Ingvar_Price_Slider
 * @subpackage Ingvar_Price_Slider/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ingvar_Price_Slider
 * @subpackage Ingvar_Price_Slider/includes
 * @author     Naprienko Igor <i.v.naprienko@gmail.com>
 */
class Ingvar_Price_Slider_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ingvar-price-slider',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

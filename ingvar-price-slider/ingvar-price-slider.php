<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://naprienko.in.ua/
 * @since             1.0.0
 * @package           Ingvar_Price_Slider
 *
 * @wordpress-plugin
 * Plugin Name:       Ingvar Price Slider
 * Plugin URI:        http://naprienko.in.ua/
 * Description:       Калькулятор слайдер для расчета стоимости ремонта.
 * Version:           1.0.0
 * Author:            Naprienko Igor
 * Author URI:        http://naprienko.in.ua/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ingvar-price-slider
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ingvar-price-slider-activator.php
 */
function activate_ingvar_price_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ingvar-price-slider-activator.php';
	Ingvar_Price_Slider_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ingvar-price-slider-deactivator.php
 */
function deactivate_ingvar_price_slider() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ingvar-price-slider-deactivator.php';
	Ingvar_Price_Slider_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ingvar_price_slider' );
register_deactivation_hook( __FILE__, 'deactivate_ingvar_price_slider' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ingvar-price-slider.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ingvar_price_slider() {

	$plugin = new Ingvar_Price_Slider();
	$plugin->run();

}
run_ingvar_price_slider();

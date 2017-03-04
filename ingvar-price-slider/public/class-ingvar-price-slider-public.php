<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://naprienko.in.ua/
 * @since      1.0.0
 *
 * @package    Ingvar_Price_Slider
 * @subpackage Ingvar_Price_Slider/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ingvar_Price_Slider
 * @subpackage Ingvar_Price_Slider/public
 * @author     Naprienko Igor <i.v.naprienko@gmail.com>
 */
class Ingvar_Price_Slider_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ingvar_Price_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ingvar_Price_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'jquery-range', plugin_dir_url( __FILE__ ) . 'css/jquery.range.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ingvar-price-slider-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ingvar_Price_Slider_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ingvar_Price_Slider_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script('maskedinput', plugin_dir_url( __FILE__ ) . 'js/jquery.maskedinput.min.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( 'jquery-range', plugin_dir_url( __FILE__ ) . 'js/jquery.range-min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ingvar-price-slider-public.js', array( 'jquery' ), $this->version, false );

	}

}

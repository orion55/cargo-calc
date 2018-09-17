<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://portfolio.infoblog72.ru
 * @since      1.0.0
 *
 * @package    Cargo_Calc
 * @subpackage Cargo_Calc/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cargo_Calc
 * @subpackage Cargo_Calc/admin
 * @author     Oleg Grebenev <admin@infoblog72.ru>
 */

class Cargo_Calc_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
//        add_action('admin_menu', array($this, 'add_plugin_page'));
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Cargo_Calc_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Cargo_Calc_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/cargo-calc-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Cargo_Calc_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Cargo_Calc_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/cargo-calc-admin.js', array('jquery'), $this->version, false);

    }

    public function add_plugin_page()
    {
        add_options_page(
            'Cargo calc', // page_title
            'Калькулятор', // menu_title
            'manage_options', // capability
            'cargo-calc', // menu_slug
            array($this, 'create_admin_page') // function
        );
    }

    public function create_admin_page()
    {
        ?>
        <div class="wrap">
            <h2>Калькулятор стоимости услуг грузового такси</h2>
            <h3>Шорткод <b>[cargo-calc]</b></h3>
        </div>
    <?php }
}

<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://portfolio.infoblog72.ru
 * @since      1.0.0
 *
 * @package    Cargo_Calc
 * @subpackage Cargo_Calc/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Cargo_Calc
 * @subpackage Cargo_Calc/public
 * @author     Oleg Grebenev <admin@infoblog72.ru>
 */
class Cargo_Calc_Public
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
     * @param      string $plugin_name The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
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

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/cargo-calc-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
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

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/cargo-calc-public.js', array('jquery'), $this->version, false);

    }

    public function cargo_add()
    {
        function contact_send($info)
        {
            $title = 'Новый заказ - ' . $info['contact_name'];
            $headers[] = 'From: master-gruzov.ru <mail@master-gruzov.ru>';
            $headers[] = 'Content-type: text/html; charset=utf-8';
            $message = '<h1>' . $info['address_from'] . '</h1>';

            return wp_mail('grol55@mail.ru', $title, $message, $headers);
        }

        if (empty($_POST['nonce'])) {
            wp_die('Nonce bad');
        }

        $check_ajax_referer = check_ajax_referer('myajax-nonce123', 'nonce', false);

        if (!$check_ajax_referer) {
            wp_send_json_error('Эх! Сработала защита');
        }

        $info = [];
        $info['address_from'] = sanitize_text_field($_POST['address_from']);
        $info['address_from_entrance'] = sanitize_text_field($_POST['address_from_entrance']);
        $info['address_from_house'] = sanitize_text_field($_POST['address_from_house']);
        $info['address_from_street'] = sanitize_text_field($_POST['address_from_street']);
        $info['address_to'] = sanitize_text_field($_POST['address_to']);
        $info['address_to_entrance'] = sanitize_text_field($_POST['address_to_entrance']);
        $info['address_to_house'] = sanitize_text_field($_POST['address_to_house']);
        $info['address_to_street'] = sanitize_text_field($_POST['address_to_street']);
        $exp = sanitize_text_field($_POST['calendar']);
        $newDate = DateTime::createFromFormat("Y-m-d\TG:i:s.uO", $exp);
        $info['calendar'] = $newDate->format("d.m.Y H:i");
        $info['car'] = sanitize_text_field($_POST['car']);
        $info['card_serial'] = sanitize_text_field($_POST['card_serial']);
        $info['cargo_time'] = sanitize_text_field($_POST['cargo_time']);
        $info['contact_name'] = sanitize_text_field($_POST['contact_name']);
        $info['contact_phone'] = sanitize_text_field($_POST['contact_phone']);
        $info['discount'] = intval($_POST['discount']);
        $info['durability'] = sanitize_text_field($_POST['durability']);
        $info['economy'] = intval($_POST['economy']);
        $info['loaders'] = sanitize_text_field($_POST['loaders']);
        $info['note'] = sanitize_textarea_field($_POST['note']);
        $info['price_normal'] = intval($_POST['price_normal']);
        $info['price_result'] = intval($_POST['price_result']);
        $info['time_delivery'] = sanitize_text_field($_POST['time_delivery']);

//        contact_send($info);

        wp_send_json_success($info);
    }


}

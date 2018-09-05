<?php

class Cargo_Shortcode
{
    static $add_script;

    static function init()
    {
        add_shortcode('cargo-calc', array(__CLASS__, 'calculator_func'));
        add_action('init', array(__CLASS__, 'register_script'));
        add_action('wp_footer', array(__CLASS__, 'js_variables'));
        add_action('wp_footer', array(__CLASS__, 'print_script'));
    }

    static function calculator_func($atts)
    {
        self::$add_script = true;

        $html = "
        <div id=\"cargo-calc\"></div>
        ";

        return $html;
    }

    static function register_script()
    {
        $url = plugin_dir_url(__FILE__);
        wp_register_style('fontawesome', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css', array(), time(), 'all');
        wp_register_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css', array(), time(), 'all');
        wp_register_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js', array('jquery'), time(), false);
//        wp_register_style('bootstrap', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css', array(), time(), 'all');
//        wp_register_style('bootstrap-vue', plugin_dir_url(__FILE__) . 'assets/css/bootstrap-vue.min.css', array(), time(), 'all');
        wp_register_style('main', plugin_dir_url(__FILE__) . 'assets/css/main.min.css', array(), time(), 'all');
        wp_register_script('main', plugin_dir_url(__FILE__) . 'assets/js/main.min.js', array('jquery'), time(), false);
        wp_register_script('main', plugin_dir_url(__FILE__) . 'assets/js/main.min.js', array('jquery'), time(), false);
        wp_register_script('build', plugin_dir_url(__FILE__) . 'assets/js/build.js', array('jquery'), time(), true);
    }

    static function print_script()
    {
        if (!self::$add_script) {
            return;
        }
        wp_enqueue_style('fontawesome');
        wp_enqueue_style('select2');
        wp_print_scripts('select2');
//        wp_enqueue_style('bootstrap');
//        wp_enqueue_style('bootstrap-vue');
        wp_enqueue_style('main');
        wp_print_scripts('main');
        wp_print_scripts('build');
    }

    static function js_variables()
    {
        if (!self::$add_script) {
            return;
        }

        $variables = array(
            'plugin_dir_url' => plugin_dir_url(__FILE__),
        );
        echo('<script type="text/javascript">window.wp_data=' . json_encode($variables) . ';</script>');
    }
}
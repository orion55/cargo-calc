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
        <h1>Cargo-calc!</h1>
        ";

        return $html;
    }

    static function register_script()
    {
//        wp_register_script('calc-js', get_template_directory_uri() . '/calc/calc.js', array('jquery'), time(), true);
//        wp_register_style('calc', get_template_directory_uri() . '/calc/calc.css', array(), time(), 'all');
    }

    static function print_script()
    {
        if (!self::$add_script) {
            return;
        }
//        wp_print_scripts('calc-js');
//        wp_enqueue_style('calc');
    }

    static function js_variables()
    {
        if (!self::$add_script) {
            return;
        }

        $variables = array(
            'var0' => 0,
        );
        echo('<script type="text/javascript">window.wp_data=' . json_encode($variables) . ';</script>');
    }
}
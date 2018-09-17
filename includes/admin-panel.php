<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('theme_options', __('Опции темы', 'crb'))
        ->set_icon('dashicons-businessman')
        ->set_page_menu_title('Калькулятор')
        ->set_page_menu_position(7)
        ->add_fields(array(
            Field::make('text', 'crb_email', 'Email')
                ->set_help_text('Email для отправки заказов')
        ));

    Container::make('post_meta', __('Опции', 'crb'))
        ->where('post_type', '=', 'order_cargo')
        ->add_fields(array(
                Field::make('text', 'price_dish', 'Цена')
                    ->set_attribute('type', 'number')
                    ->set_attribute('min', '0')
            )
        );
}
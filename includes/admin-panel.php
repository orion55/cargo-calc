<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

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

    Container::make('post_meta', __('Опции заказа', 'crb'))
        ->where('post_type', '=', 'order_cargo')
        ->add_fields(array(
                Field::make('text', 'contact_name', 'Имя')
                    ->set_attribute('type', 'text')
                    ->set_required(true)
                    ->set_width(50),
                Field::make('text', 'contact_phone', 'Телефон')
                    ->set_attribute('type', 'tel')
                    ->set_attribute('placeholder', '+7 (***) ***-**-**')
                    ->set_required(true)
                    ->set_width(50),
                Field::make('text', 'address_from', 'Откуда (район)')
                    ->set_attribute('type', 'text')
                    ->set_width(40),
                Field::make('text', 'address_from_street', 'Улица')
                    ->set_attribute('type', 'text')
                    ->set_width(40),
                Field::make('text', 'address_from_house', 'Дом')
                    ->set_attribute('type', 'text')
                    ->set_width(10),
                Field::make('text', 'address_from_entrance', 'Подъезд')
                    ->set_attribute('type', 'text')
                    ->set_width(10),
                Field::make('text', 'address_to', 'Куда (район)')
                    ->set_attribute('type', 'text')
                    ->set_width(40),
                Field::make('text', 'address_to_street', 'Улица')
                    ->set_attribute('type', 'text')
                    ->set_width(40),
                Field::make('text', 'address_to_house', 'Дом')
                    ->set_attribute('type', 'text')
                    ->set_width(10),
                Field::make('text', 'address_to_entrance', 'Подъезд')
                    ->set_attribute('type', 'text')
                    ->set_width(10)
            )
        );
}
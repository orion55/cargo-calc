<?php
add_filter('manage_edit-order_cargo_sortable_columns', 'add_order_cargo_column', 4);
function add_order_cargo_column($columns)
{
    $num = 2; // после какой по счету колонки вставлять новые

    $new_columns = array(
        'contact_name' => 'Имя',
    );
    return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}

// заполняем колонку данными
//manage_	order_cargo_custom_column
add_filter('manage_order_cargo_posts_custom_column', 'fill_views_column', 10, 3);
function fill_views_column($colname, $post_id)
{
    echo '<pre>';
    print_r($colname);
    echo '</pre>';

    if ($colname === 'contact_name') {
//        echo get_post_meta($post_id, '_contact_name', 1);
        echo '111';
    }
}

function fill_columns($out, $column_name, $id)
{
    echo '<pre>';
    print_r($out);
    echo '</pre>';
    switch ($column_name) {
        case 'contact_name':
            $out .= get_post_meta($post_id, '_contact_name', 1);
            break;
        default:
            break;
    }
    return $out;
}
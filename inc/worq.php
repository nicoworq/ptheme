<?php


/*
 * IMAGE SIZE BLOG
 */

add_image_size('blog-thumbnail', 280, 150,TRUE);


/*
 * LOGIN MENU
 */

add_filter('wp_nav_menu_items', 'worq_login_menu_link', 10, 2);

function worq_login_menu_link($items, $args) {
    if ($args->theme_location == 'primary') {
        if (is_user_logged_in()) {
            $items .= '<li class="login-menu-item"><a href="' . wp_logout_url() . '">Salir</a></li>';
        } else {
            $items .= '<li class="login-menu-item"><a href="' . get_permalink(get_page_by_title('Mi Cuenta')) . '">Ingresar</a></li>';
        }
    }
    return $items;
}

/*
 * CANTIDAD CUOTAS
 */

add_option('cantidad_cuotas', 6);



/*
 * DESTACADOS HOME POST TYPE
 */

// Register Custom Post Type
function destacados_home() {

    $labels = array(
        'name' => _x('Destacados Home', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Destacado Home', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Destacados Home', 'text_domain'),
        'name_admin_bar' => __('Destacados Home', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('Todos los Destacados', 'text_domain'),
        'add_new_item' => __('Agregar nuevo Destacado', 'text_domain'),
        'add_new' => __('Agregar nuevo', 'text_domain'),
        'new_item' => __('Agregar nuevo', 'text_domain'),
        'edit_item' => __('Editar item', 'text_domain'),
        'update_item' => __('Actualizar item', 'text_domain'),
        'view_item' => __('Ver Item', 'text_domain'),
        'search_items' => __('Buscar Item', 'text_domain'),
        'not_found' => __('No encontrado', 'text_domain'),
        'not_found_in_trash' => __('No encontrado en papelera', 'text_domain'),
        'featured_image' => __('Imagen destacada', 'text_domain'),
        'set_featured_image' => __('Setear Imagen destacada', 'text_domain'),
        'remove_featured_image' => __('Eliminar Imagen destacada', 'text_domain'),
        'use_featured_image' => __('Usar como Imagen destacada', 'text_domain'),
        'insert_into_item' => __('Insertar en item', 'text_domain'),
        'uploaded_to_this_item' => __('Subir a este item', 'text_domain'),
        'items_list' => __('Listado de items', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Destacado Home', 'text_domain'),
        'description' => __('Destacado Home', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title',),
        'taxonomies' => array('category'),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-post',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('destacado_home', $args);
}

add_action('init', 'destacados_home', 0);



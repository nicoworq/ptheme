<?php

function empty_content($str) {
    return trim(str_replace('&nbsp;', '', strip_tags($str))) == '';
}

/*
 * MOSTRAR % DESCUENTO
 */

add_filter('woocommerce_get_price_html', 'editar_price_html_sale', 100, 2);

function editar_price_html_sale($price, $product) {

    if ($product->is_on_sale()) {

        return str_replace('<del>', ' <del>Antes', $price);
    }
    return $price;
}

/*
 * INPUT CREAR CUENTA CHEQUED
 */

add_filter('woocommerce_create_account_default_checked', function ($checked) {
    return true;
});


/*
 * CONFIRMACION AGREGAR AL CARRO
 */

function mostrar_popup_agregado_carro() {    
    ?>
    <script type="text/javascript">

        jQuery(document).ready(function () {


            swal({
                title: 'Producto Agregado',
                text: "Has agregado un producto al carro",
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#82277f',
                cancelButtonColor: '#7c7c7c',
                confirmButtonText: "Ver mi Carro",
                cancelButtonText: "Seguir comprando!"
            }).then(function () {
                window.location = '/carro';
            });


        });


    </script>
    <?php

}

/*
 * CHECKOUT FIELDS
 */

add_filter('woocommerce_checkout_fields', 'editar_campos_checkout');

function editar_campos_checkout($fields) {
    //sacamos los labels
    //unset($fields['billing']['billing_first_name']['label']);
    $fields['billing']['billing_first_name']['placeholder'] = 'Nombre *';

    //unset($fields['billing']['billing_last_name']['label']);
    $fields['billing']['billing_last_name']['placeholder'] = 'Apellido *';

    //unset($fields['billing']['billing_email']['label']);
    $fields['billing']['billing_email']['placeholder'] = 'Email *';

    //unset($fields['billing']['billing_phone']['label']);
    $fields['billing']['billing_phone']['placeholder'] = 'Teléfono *';


    //unset($fields['billing']['billing_address_1']['label']);
    $fields['billing']['billing_address_1']['placeholder'] = 'Dirección *';

    //unset($fields['billing']['billing_city']['label']);
    $fields['billing']['billing_city']['placeholder'] = 'Localidad / Ciudad *';

    //unset($fields['billing']['billing_postcode']['label']);
    $fields['billing']['billing_postcode']['placeholder'] = 'Código postal *';

    //unset($fields['billing']['billing_state']['label']);
    $fields['billing']['billing_state']['placeholder'] = 'Provincia *';


    // unset($fields['order']['order_comments']['label']);
    $fields['order']['order_comments']['placeholder'] = 'Notas sobre tu pedido, por ejemplo, notas especiales para la entrega o pedidos de facturación A, B, C';


    //unset($fields['account']['account_password']['label']);
    $fields['account']['account_password']['placeholder'] = 'Contraseña de tu cuenta *';


    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_country']);

    unset($fields['shipping']['billing_address_2']);
    unset($fields['shipping']['billing_country']);

    /*
      $order = array(
      "billing_first_name",
      "billing_last_name",
      "billing_company",
      "billing_email",
      "billing_phone",
      "billing_address_1",
      "billing_city",
      "billing_postcode",
      "billing_state"
      );

     */

    $fields['billing']['billing_state']['label'] = 'Provincia';
    $fields['shipping']['billing_state']['label'] = 'Provincia';



    return $fields;
}

/*
 * BREADCRUMBS
 */


if (!function_exists('worq_breadcrumb')) {

    /**
     * Output the WooCommerce Breadcrumb.
     *
     * @param array $args
     */
    function worq_breadcrumb($args = array()) {
        $args = wp_parse_args($args, apply_filters('woocommerce_breadcrumb_defaults', array(
            'delimiter' => '&nbsp;&#47;&nbsp;',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
            'wrap_after' => '</nav>',
            'before' => '',
            'after' => '',
            'home' => _x('Home', 'breadcrumb', 'woocommerce')
        )));

        $breadcrumbs = new WC_Breadcrumb();

        if ($args['home']) {
            $breadcrumbs->add_crumb($args['home'], apply_filters('woocommerce_breadcrumb_home_url', home_url()));
        }

        $args['breadcrumb'] = $breadcrumbs->generate();

        wc_get_template('global/breadcrumb-no-container.php', $args);
    }

}


/*
 * PAGE TITLE
 */


if (!function_exists('worq_page_title')) {

    /**
     * woocommerce_page_title function.
     *
     * @param  bool $echo
     * @return string
     */
    function worq_page_title($echo = true) {

        if (is_search()) {


            if (have_posts()) {
                $page_title = sprintf('Para tu búsqueda: <span> &ldquo;%s&rdquo; </span> encontramos los siguientes resultados:', get_search_query());
            } else {
                $page_title = sprintf('Lo sentimos, pero no encontramos resultados para tu búsqueda <span> &ldquo;%s&rdquo; </span>', get_search_query());
            }

            if (get_query_var('paged'))
                $page_title .= sprintf(__('&nbsp;&ndash; Page %s', 'woocommerce'), get_query_var('paged'));
        } elseif (is_tax()) {

            $page_title = single_term_title("", false);
        } else {

            $shop_page_id = wc_get_page_id('shop');
            $page_title = get_the_title($shop_page_id);
        }

        $page_title = apply_filters('woocommerce_page_title', $page_title);

        if ($echo)
            echo $page_title;
        else
            return $page_title;
    }

}



/*
 * IMAGE SIZE BLOG
 */

add_image_size('blog-thumbnail', 280, 150, TRUE);


/*
 * LOGIN MENU
 */

add_filter('wp_nav_menu_items', 'worq_login_menu_link', 10, 2);

function worq_login_menu_link($items, $args) {
    if ($args->theme_location == 'primary') {
        if (is_user_logged_in()) {
            $items .= '<li class="login-menu-item"><a href="' . get_permalink(get_page_by_title('Mi Cuenta')) . '">Mi Cuenta</a></li>';
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

/**
 *  OPEN GRAPH
 * 
 */
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype($output) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}

add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
    global $post;
    if (!is_singular()) //if it is not a post or a page
        return;

    echo '<meta property="og:title" content="' . get_the_title() . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . get_permalink() . '"/>';
    echo '<meta property="og:site_name" content="Federación Gremial"/>';
    if (!has_post_thumbnail($post->ID)) { //the post does not have featured image, use a default image
        $default_image = get_template_directory_uri() . '/assets/images/sitio/sucursal1.jpg'; //replace this with a default image on your server or an image in your media library
        echo '<meta property="og:image" content="' . $default_image . '"/>';
    } else {
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
        echo '<meta property="og:image" content="' . esc_attr($thumbnail_src[0]) . '"/>';
    }
}

add_action('wp_head', 'insert_fb_in_head', 5);

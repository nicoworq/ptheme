<?php
/*
 * SLIDER WORQ 
 */

// Register Custom Post Type SLIDE

function slide_home() {

    $labels = array(
        'name' => _x('Slides Home', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Slide Home', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Slider Home', 'text_domain'),
        'name_admin_bar' => __('Slider Home', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('Todos los slides', 'text_domain'),
        'add_new_item' => __('Agregar slide', 'text_domain'),
        'add_new' => __('Agregar nuevo', 'text_domain'),
        'new_item' => __('Nuevo slide', 'text_domain'),
        'edit_item' => __('Editar slide', 'text_domain'),
        'update_item' => __('Actualizar slide', 'text_domain'),
        'view_item' => __('Ver slide', 'text_domain'),
        'search_items' => __('Buscar slide', 'text_domain'),
        'not_found' => __('No encontrado', 'text_domain'),
        'not_found_in_trash' => __('No encontrado en papelera', 'text_domain'),
        'featured_image' => __('Imagen destacada', 'text_domain'),
        'set_featured_image' => __('Setear imagen destacada', 'text_domain'),
        'remove_featured_image' => __('Eliminar imagen destacada', 'text_domain'),
        'use_featured_image' => __('Usar como imagen destacada', 'text_domain'),
        'insert_into_item' => __('Insertar en slider', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );
    $args = array(
        'label' => __('Slide Home', 'text_domain'),
        'description' => __('Slide del slider en la home', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title',),
        'taxonomies' => array(''),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt2',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('slide_home', $args);
}

add_action('init', 'slide_home', 0);

add_shortcode('slider-worq', 'mostrar_slider_worq');

function mostrar_slider_worq() {
    $detect = new Mobile_Detect;
    $args = array(
        'numberposts' => -1,
        'post_type' => 'slide_home',
        'meta_key' => 'activo',
        'meta_value' => TRUE
    );

    $slides = new WP_Query($args);
    ?>

    <?php if ($slides->have_posts()): ?>
        <div id="slider-worq">
            <div class="ajaxing"><span></span></div>
            <div id="slider-worq-slides">
                <?php
                while ($slides->have_posts()) : $slides->the_post();
                    $img_mobile = get_field('imagen_mobile');
                    $img_desktop = get_field('imagen_de_fondo');
                    if (!$img_mobile) {
                        $img_mobile = $img_desktop;
                    }
                    $imgBg = $detect->is_mobile() ? $img_mobile : $img_desktop;
                    
                    $link = get_field('link_slide');
                    $linkHref = $link ? "href='{$link}'" : '#';
                    
                    ?>
                    <a href="<?php echo $linkHref ?>" class="slide-home" style="background-image: url(<?php echo $imgBg['url'] ?>);"></a>

                <?php endwhile; ?>
            </div>
            <div id="slider-worq-dots">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="dots-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    endif;

    wp_reset_query();  // Restore global post data stomped by the_post(). 
}

/*
 * REGISTRAR ACF
 */

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_slides-home',
        'title' => 'Slides Home',
        'fields' => array(
            array(
                'key' => 'field_56f9716896390',
                'label' => 'Imagen',
                'name' => 'imagen_de_fondo',
                'type' => 'image',
                'required' => 1,
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array(
                'key' => 'field_56f971b996391',
                'label' => 'Imagen Mobile',
                'name' => 'imagen_mobile',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
     
            array(
                'key' => 'field_56f971e196393',
                'label' => 'Link slide',
                'name' => 'link_slide',
                'type' => 'page_link',
                'post_type' => array(
                    0 => 'post',
                    1 => 'page',
                    2 => 'product',
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
           
    
            array(
                'key' => 'field_56f974b715091',
                'label' => 'Activo',
                'name' => 'activo',
                'type' => 'true_false',
                'message' => '',
                'default_value' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'slide_home',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
}
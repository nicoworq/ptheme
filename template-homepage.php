<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */
get_header();
?>

<?php
do_shortcode('[slider-worq]');

wc_get_template_part('content', 'credit-cards');
?>


<section id="home-category-preview">

    <div class="container">
        <div class="row">
            <div class="col-md-15">
                <ul class="category-list">
                    <?php
                    //excluir marcas
                    $marcas = get_term_by('slug', 'marcas', 'product_cat');

                    $args = array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => false,
                        'parent' => 0,
                        'exclude' => array($marcas->term_id)
                    );
                    $categories = get_terms($args);
                    $i = 0;
                    foreach ($categories as $cat) {
                        $linkClass = $i === 0 ? 'active' : '';
                        ?>
                        <li>
                            <a href="#" class="<?php echo $linkClass; ?>" data-category-slug="<?php echo $cat->slug; ?>"><?php echo $cat->name ?></a>
                        </li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
            </div>
            <div class="category-list-container">

                <?php
                $i = 0;
                foreach ($categories as $cat) {

                    $productsClass = $i === 0 ? 'active' : '';
                    ?>
                    <div class="category-list-products <?php echo $productsClass; ?>" data-category-slug="<?php echo $cat->slug; ?>">
                        <?php
                        $args = array('category' => $cat->slug, 'per_page' => '4', 'columns' => '8',);
                        echo storefront_do_shortcode('product_category', $args);
                        ?>
                        <div class="clearfix"></div>
                        <a href="<?php echo get_term_link($cat->term_id, 'product_cat') ?>" class="category-preview-all bt-site">Ver más productos</a>
                    </div>

                    <?php
                    $i++;
                }
                ?>


            </div>

        </div>
    </div>
</section>

<section id="home-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2><span class="style1">#Pascal</span><span class="style2">Trends</span></h2>
            </div>
            <?php
            $blogArgs = array(
                'posts_per_page' => 3,
                'category_name' => 'noticias'
            );
            $blogHome = new WP_Query($blogArgs);


            if ($blogHome->have_posts()) {
                while ($blogHome->have_posts()) {
                    $blogHome->the_post();

                    $thumbUrl = wp_get_attachment_image_url(get_post_thumbnail_id(), 'blog-thumbnail');
                    ?>
                    <div class="col-md-3">
                        <a class="news-home" href="<?php the_permalink(); ?>">
                            <div class="news-home-thumbnail">
                                <img src="<?php echo $thumbUrl ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <h3 class="news-home-title"><?php the_title(); ?></h3>
                        </a>

                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</section>

<section id="home-brands">
    <div id="home-brands-list">
        <?php
        $args2 = array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'parent' => $marcas->term_id,
        );
        $brands = get_terms($args2);
        foreach ($brands as $brand) {
            $thumbnail_id = get_woocommerce_term_meta($brand->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            $link = get_term_link($brand);
            ?>
            <a href="<?php echo $link; ?>" class="pascal-brand" style="background-image: url(<?php echo $image; ?>);" ></a>
            <?php
        }
        ?>
    </div>
    <div id="home-brands-arrows">
        <div id="brand-arrow-next" class="brand-arrow">

            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g>
            <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                  c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                  "/>
            </g>

            </svg>

        </div>
        <div id="brand-arrow-prev" class="brand-arrow">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g>
            <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                  c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/>
            </g>
            </svg>
        </div>
    </div>

</section>

<section id="destacado-primario" class="destacados-home">


    <div class="destacado-primario-col1">
        <?php
//destacado primario1

        $primario1Args = array(
            'post_type' => 'destacado_home',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'activo',
                    'value' => TRUE,
                    'compare' => '=',
                ),
                array(
                    'key' => 'ubicacion',
                    'value' => 'primario1',
                    'compare' => '=',
                ),
            ),
            'posts_per_page' => 1,
        );
        $primario1 = new WP_Query($primario1Args);

        if ($primario1->have_posts()) {

            while ($primario1->have_posts()) {
                $primario1->the_post();
                $image = get_field('imagen');
                $image_hover = get_field('imagen_hover');
                ?>

                <a class="destacado-home" id="destacado-primario1" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                    <?php
                    if ($image_hover) {
                        ?>
                        <div class="destacado-home-img-hover">
                            <img src="<?php echo $image_hover['url'] ?>" alt="<?php the_title(); ?>"/>
                        </div>
                    <?php } ?>
                    <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                </a>

                <?php
            }
        }
        wp_reset_postdata();
        ?>
    </div>

    <div class="destacado-primario-col2">

        <div class="destacado-primario-row">
            <div class="destacado-primario-col3">
                <?php
//destacado primario2

                $primario2Args = array(
                    'post_type' => 'destacado_home',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'activo',
                            'value' => TRUE,
                            'compare' => '=',
                        ),
                        array(
                            'key' => 'ubicacion',
                            'value' => 'primario2',
                            'compare' => '=',
                        ),
                    ),
                    'posts_per_page' => 1,
                );
                $primario2 = new WP_Query($primario2Args);

                if ($primario2->have_posts()) {

                    while ($primario2->have_posts()) {
                        $primario2->the_post();
                        $image = get_field('imagen');
                        $image_hover = get_field('imagen_hover');
                        ?>

                        <a class="destacado-home" id="destacado-primario2" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                            <?php
                            if ($image_hover) {
                                ?>
                                <div class="destacado-home-img-hover">
                                    <img src="<?php echo $image_hover['url'] ?>" alt="<?php the_title(); ?>"/>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                        </a>

                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="destacado-primario-col3">
                <?php
//destacado primario3

                $primario3Args = array(
                    'post_type' => 'destacado_home',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'activo',
                            'value' => TRUE,
                            'compare' => '=',
                        ),
                        array(
                            'key' => 'ubicacion',
                            'value' => 'primario3',
                            'compare' => '=',
                        ),
                    ),
                    'posts_per_page' => 1,
                );
                $primario3 = new WP_Query($primario3Args);

                if ($primario3->have_posts()) {

                    while ($primario3->have_posts()) {
                        $primario3->the_post();
                        $image = get_field('imagen');
                        $image_hover = get_field('imagen_hover');
                        ?>

                        <a class="destacado-home" id="destacado-primario3" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                            <?php
                            if ($image_hover) {
                                ?>
                                <div class="destacado-home-img-hover">
                                    <img src="<?php echo $image_hover['url'] ?>" alt="<?php the_title(); ?>"/>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                        </a>

                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="destacado-primario-row">
            <div class="destacado-primario-col3">
                <?php
//destacado primario4

                $primario4Args = array(
                    'post_type' => 'destacado_home',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'activo',
                            'value' => TRUE,
                            'compare' => '=',
                        ),
                        array(
                            'key' => 'ubicacion',
                            'value' => 'primario4',
                            'compare' => '=',
                        ),
                    ),
                    'posts_per_page' => 1,
                );
                $primario4 = new WP_Query($primario4Args);

                if ($primario4->have_posts()) {

                    while ($primario4->have_posts()) {
                        $primario4->the_post();
                        $image = get_field('imagen');
                        $image_hover = get_field('imagen_hover');
                        ?>

                        <a class="destacado-home" id="destacado-primario4" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                            <?php
                            if ($image_hover) {
                                ?>
                                <div class="destacado-home-img-hover">
                                    <img src="<?php echo $image_hover['url'] ?>" alt="<?php the_title(); ?>"/>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                        </a>

                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="destacado-primario-col3">
                <?php
//destacado primario5

                $primario5Args = array(
                    'post_type' => 'destacado_home',
                    'meta_query' => array(
                        'relation' => 'AND',
                        array(
                            'key' => 'activo',
                            'value' => TRUE,
                            'compare' => '=',
                        ),
                        array(
                            'key' => 'ubicacion',
                            'value' => 'primario5',
                            'compare' => '=',
                        ),
                    ),
                    'posts_per_page' => 1,
                );
                $primario5 = new WP_Query($primario5Args);

                if ($primario5->have_posts()) {

                    while ($primario5->have_posts()) {
                        $primario5->the_post();
                        $image = get_field('imagen');
                        $image_hover = get_field('imagen_hover');
                        ?>

                        <a class="destacado-home" id="destacado-primario5" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                            <?php
                            if ($image_hover) {
                                ?>
                                <div class="destacado-home-img-hover">
                                    <img src="<?php echo $image_hover['url'] ?>" alt="<?php the_title(); ?>"/>
                                </div>
                            <?php } ?>
                            <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                        </a>

                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>


<section id="home-products-bottom">
    <h2>Viví lo último en computación</h2>
    <h3>Seleccionamos los mejores productos para vos</h3>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="category-list category-list-inline">
                    <?php
                    $i = 0;
                    foreach ($categories as $cat) {
                        $linkClass = $i === 0 ? 'active' : '';
                        ?>
                        <li>
                            <a href="#" class="<?php echo $linkClass; ?>" data-category-slug="<?php echo $cat->slug; ?>"><?php echo $cat->name ?></a>
                        </li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="category-list-container">

                    <?php
                    $i = 0;
                    foreach ($categories as $cat) {

                        $productsClass = $i === 0 ? 'active' : '';
                        ?>
                        <div class="category-list-products <?php echo $productsClass; ?>" data-category-slug="<?php echo $cat->slug; ?>">
                            <?php
                            $args = array('category' => $cat->slug, 'per_page' => '5', 'columns' => '10');
                            echo storefront_do_shortcode('product_category', $args);
                            ?>
                            <div class="clearfix"></div>
                            <a href="<?php echo get_term_link($cat->term_id, 'product_cat') ?>" class="category-preview-all bt-site bt-site-yellow">Ver más productos</a>
                        </div>

                        <?php
                        $i++;
                    }
                    ?>

                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>

</section>


<section id="home-navigation-bottom">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                wp_nav_menu(
                        array(
                            'theme_location' => 'secondary',
                            'container' => '',
                            'menu_id' => 'nav-secondary-bottom',
                            'menu_class' => 'nav-secondary'
                        )
                );
                ?>
            </div>
        </div>

    </div>


</section>


<section id="destacado-secundario" class="destacados-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="destacado-secundario-col1">


                    <?php
//destacado secundario1

                    $secundario1Args = array(
                        'post_type' => 'destacado_home',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'activo',
                                'value' => TRUE,
                                'compare' => '=',
                            ),
                            array(
                                'key' => 'ubicacion',
                                'value' => 'secundario1',
                                'compare' => '=',
                            ),
                        ),
                        'posts_per_page' => 1,
                    );
                    $secundario1 = new WP_Query($secundario1Args);

                    if ($secundario1->have_posts()) {

                        while ($secundario1->have_posts()) {
                            $secundario1->the_post();
                            $image = get_field('imagen');
                            ?>

                            <a class="destacado-home" id="destacado-secundario1" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                            </a>

                            <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="destacado-secundario-col2">

                    <div class="destacado-secundario-row">
                        <div class="destacado-secundario-col3">
                            <?php
//destacado secundario2

                            $secundario2Args = array(
                                'post_type' => 'destacado_home',
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key' => 'activo',
                                        'value' => TRUE,
                                        'compare' => '=',
                                    ),
                                    array(
                                        'key' => 'ubicacion',
                                        'value' => 'secundario2',
                                        'compare' => '=',
                                    ),
                                ),
                                'posts_per_page' => 1,
                            );
                            $secundario2 = new WP_Query($secundario2Args);

                            if ($secundario2->have_posts()) {

                                while ($secundario2->have_posts()) {
                                    $secundario2->the_post();
                                    $image = get_field('imagen');
                                    ?>

                                    <a class="destacado-home" id="destacado-secundario2" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                                    </a>

                                    <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                        <div class="destacado-secundario-col3">
                            <?php
//destacado secundario3

                            $secundario3Args = array(
                                'post_type' => 'destacado_home',
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key' => 'activo',
                                        'value' => TRUE,
                                        'compare' => '=',
                                    ),
                                    array(
                                        'key' => 'ubicacion',
                                        'value' => 'secundario3',
                                        'compare' => '=',
                                    ),
                                ),
                                'posts_per_page' => 1,
                            );
                            $secundario3 = new WP_Query($secundario3Args);

                            if ($secundario3->have_posts()) {

                                while ($secundario3->have_posts()) {
                                    $secundario3->the_post();
                                    $image = get_field('imagen');
                                    ?>

                                    <a class="destacado-home" id="destacado-secundario3" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                                        <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                                    </a>

                                    <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="destacado-secundario-row">
                        <?php
//destacado secundario3

                        $secundario4Args = array(
                            'post_type' => 'destacado_home',
                            'meta_query' => array(
                                'relation' => 'AND',
                                array(
                                    'key' => 'activo',
                                    'value' => TRUE,
                                    'compare' => '=',
                                ),
                                array(
                                    'key' => 'ubicacion',
                                    'value' => 'secundario4',
                                    'compare' => '=',
                                ),
                            ),
                            'posts_per_page' => 1,
                        );
                        $secundario4 = new WP_Query($secundario4Args);

                        if ($secundario4->have_posts()) {

                            while ($secundario4->have_posts()) {
                                $secundario4->the_post();
                                $image = get_field('imagen');
                                ?>

                                <a class="destacado-home" id="destacado-secundario4" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo $image['url'] ?>" alt="<?php the_title(); ?>"/>
                                </a>

                                <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>





<?php
/**
 * Functions hooked in to homepage action
 *
 * @hooked storefront_homepage_content      - 10
 * @hooked storefront_product_categories    - 20
 * @hooked storefront_recent_products       - 30
 * @hooked storefront_featured_products     - 40
 * @hooked storefront_popular_products      - 50
 * @hooked storefront_on_sale_products      - 60
 * @hooked storefront_best_selling_products - 70
 */
//do_action( 'homepage' ); 
?>
<?php
get_footer();

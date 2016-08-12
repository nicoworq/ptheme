<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Home Promocional
 *
 * @package storefront
 */
get_header();
?>

<?php
do_shortcode('[slider-worq]');

wc_get_template_part('content', 'credit-cards');
?>


<section id="home-promo-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="home-promo-title">
                    <h2><?php the_field('titulo_home_promo') ?></h2>
                    <h4><?php the_field('subtitulo_home_promo') ?></h4>
                </div>
                <div id="home-promo-container">
                    <div id="home-promo-banner">
                        <img src="<?php echo get_template_directory_uri().'/assets/images/sitio/home-promo-banner.jpg' ?>"/>
                    </div>
                    <?php
                    $args = array('category' => 'promociones', 'per_page' => -1, 'columns' => 5,);
                    echo storefront_do_shortcode('product_category', $args);
                    ?>
                </div>

            </div>
        </div>
    </div>




</section>


<?php wc_get_template_part('content', 'featured-2'); ?>


<?php wc_get_template_part('content', 'featured-1'); ?>



<?php
get_footer();

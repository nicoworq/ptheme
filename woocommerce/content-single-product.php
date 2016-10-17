<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            /**
             * woocommerce_before_single_product hook.
             *
             * @hooked wc_print_notices - 10
             */
            do_action('woocommerce_before_single_product');

            if (post_password_required()) {
                echo get_the_password_form();
                return;
            }
            ?>
        </div>
    </div>
</div>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php wc_get_template('single-product/title.php'); ?>


                <div class="pascal-single-product">
                    <?php
                    /**
                     * woocommerce_before_single_product_summary hook.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    // do_action('woocommerce_before_single_product_summary');


                    wc_get_template('single-product/product-image.php')
                    ?>

                    <div class="summary entry-summary">
                        <?php
                        /**
                         * woocommerce_single_product_summary hook.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         */
                        //do_action('woocommerce_single_product_summary');
                        //wc_get_template('single-product/rating.php');
                        wc_get_template('single-product/sale-flash.php');
                        wc_get_template('single-product/price.php');

                        //cuotas
                        $cantidadCuotas = get_option('cantidad_cuotas');
                        global $product;
                        $cuotaValor = $product->get_price() / $cantidadCuotas;
                        ?>
                        <div class="product-quotes">
                            <span class="quote-quantity"><?php echo get_option('cantidad_cuotas'); ?></span> sin interes de <?php echo wc_price($cuotaValor); ?> <span class="quote-separator">|</span> <a target="blank" href="https://www.mercadopago.com.ar/promociones">Ver todas las promociones</a>

                        </div>
                        <?php
                        //wc_get_template('single-product/short-description.php');
                        global $product;
                        do_action('woocommerce_' . $product->product_type . '_add_to_cart');
                        //wc_get_template('single-product/meta.php');
                        //wc_get_template('single-product/share.php');
                        ?>

                    </div><!-- .summary -->
                </div>




            </div>
        </div>
    </div>
    <?php
    /**
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    //do_action('woocommerce_after_single_product_summary');



    wc_get_template_part('content', 'credit-cards');
    ?>



    <?php
    if (!empty_content(get_the_content())) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pascal-product-description">
                        <?php
                        the_content();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>



    <?php
    if ($product->get_attributes()) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pascal-product-info">
                        <h2>Especificaciones</h2>
                        <?php
                        $product->list_attributes();
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <?php
    }
    ?>







    <meta itemprop="url" content="<?php the_permalink(); ?>" />
</div>

<div id="pascal-product-bottom">

    <section id="pascal-related-products">

        <?php
        $args = array(
            'posts_per_page' => 5,
            'columns' => 5,
            'orderby' => 'rand'
        );
        woocommerce_related_products($args);
        ?>

    </section>

    <?php
    $args = apply_filters('woocommerce_upsell_display_args', array(
        'posts_per_page' => 5,
        'orderby' => apply_filters('woocommerce_upsells_orderby', 'title'),
        'columns' => 5
    ));

    wc_get_template('single-product/up-sells.php', $args);
    ?>

    <?php wc_get_template_part('content', 'navigation-bottom'); ?>
</div>



<?php do_action('woocommerce_after_single_product'); ?>
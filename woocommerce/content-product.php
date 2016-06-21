<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}


//columna de 20%
$classes[] = 'pascal-product';
?>
<li <?php post_class($classes); ?>>

    <?php
    /**
     * woocommerce_before_shop_loop_item hook.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    //do_action('woocommerce_before_shop_loop_item');

    echo '<a href="' . get_the_permalink() . '">';

    /**
     * woocommerce_before_shop_loop_item_title hook.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    //do_action( 'woocommerce_before_shop_loop_item_title' );

    wc_get_template('loop/sale-flash.php');

    $srcImg = '';

    if (has_post_thumbnail()) {
        $srcImg = get_the_post_thumbnail_url($post->ID, 'shop_catalog');
    } elseif (wc_placeholder_img_src()) {
        $srcImg = wc_placeholder_img_src();
    }
    ?>

    <div class="pascal-product-thumbnail" style="background-image: url(<?php echo $srcImg ?>);"></div>
    <div class="pascal-product-data">
        <?php
        /**
         * woocommerce_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_product_title - 10
         */
        //do_action('woocommerce_shop_loop_item_title');

        echo '<h3 class="pascal-product-title">' . get_the_title() . '</h3>';



        /**
         * woocommerce_after_shop_loop_item_title hook.
         *
         * @hooked woocommerce_template_loop_rating - 5
         * @hooked woocommerce_template_loop_price - 10
         */
        //do_action('woocommerce_after_shop_loop_item_title');
        wc_get_template('loop/rating.php');
        wc_get_template('loop/price.php');

        if (is_front_page()) {
            //mostramos categorias
            ?>
            <div class="pascal-product-categories">
                <?php
                $categories = wp_get_post_terms(get_the_ID(), 'product_cat');

                foreach ($categories as $cat) {
                    echo "<span class='pascal-product-category'>{$cat->name}</span>";
                }
                ?>
            </div>
            <?php
        }
        ?>

    </div>
    <?php
    /**
     * woocommerce_after_shop_loop_item hook.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
//do_action('woocommerce_after_shop_loop_item');
//woocommerce_template_loop_add_to_cart removed
    echo '</a>';
    ?>




</li>

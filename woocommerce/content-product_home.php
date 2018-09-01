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
 * @version 3.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if (empty($product) || !$product->is_visible()) {
    return;
}


//columna de 20%
$classes[] = 'pascal-product product';


?>
<li <?php post_class($classes); ?>>

    <div class="pascal-product-container">
        <?php
        //echo '<a href="' . get_the_permalink() . '">';


        wc_get_template('loop/sale-flash.php');

        $srcImg = '';

        if (has_post_thumbnail($product->get_ID())) {
            $srcImg = get_the_post_thumbnail_url($product->get_ID(), 'shop_catalog');
        } elseif (wc_placeholder_img_src()) {
            $srcImg = wc_placeholder_img_src();
        }
        ?>

        <a href="<?php echo get_permalink($product->get_ID()) ?>">
            <div class="pascal-product-thumbnail" style="background-image: url(<?php echo $srcImg ?>);"></div>
        </a>

        <div class="pascal-product-data">
            <?php
            /**
             * woocommerce_shop_loop_item_title hook.
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
//do_action('woocommerce_shop_loop_item_title');
            ?>
            <a href="<?php echo get_permalink($product->get_ID()) ?>">

                <h3 class="pascal-product-title"><?php echo get_the_title($product->get_ID()); ?></h3>
            </a>



            <?php
            /**
             * woocommerce_after_shop_loop_item_title hook.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
//do_action('woocommerce_after_shop_loop_item_title');
            wc_get_template('loop/rating.php');
            wc_get_template('loop/price.php');

            if (is_front_page() || is_single()) {
                //mostramos categorias
                ?>
                <div class="pascal-product-categories">
                    <?php
                    $categories = wp_get_post_terms($product->get_ID(), 'product_cat');

                    foreach ($categories as $cat) {
                        $catEspecial = get_field('categoria_especial', $cat);
                        $link = get_term_link($cat);
                        $classCat = '';
                        $estiloCat = '';
                        $nombreCat = $cat->name;
                        if ($catEspecial) {
                            $classCat = 'special';
                            $colorCat = get_field('color_categoria', $cat);
                            $estiloCat = "background-color:{$colorCat}";
                            $nombreCat = '';
                        }
                        ?>
                        <a href="<?php echo $link ?>" title="<?php echo $cat->name ?>" style="<?php echo $estiloCat; ?>" class="pascal-product-category <?php echo $classCat ?>">
                            <?php echo $nombreCat ?>
                        </a>
                        <?php
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
        ?>

    </div>


</li>

<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.0.3
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

wc_print_notices();
?>

<?php do_action('woocommerce_before_cart'); ?>



<form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">

    <?php do_action('woocommerce_before_cart_table'); ?>

    <table class="shop_table shop_table_responsive cart" cellspacing="0">
        <thead>
            <tr>
                <th class="product-remove">&nbsp;</th>

                <th class="product-name"><?php _e('Product', 'woocommerce'); ?></th>
                <th class="product-price"><?php _e('Price', 'woocommerce'); ?></th>
                <th class="product-quantity"><?php _e('Quantity', 'woocommerce'); ?></th>
                <th class="product-subtotal"><?php _e('Total', 'woocommerce'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php do_action('woocommerce_before_cart_contents'); ?>

            <?php
            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                    ?>
                    <tr class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                        <td class="product-remove">

                            <?php
                            $iconCross = ' <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" viewBox="0 0 95.939 95.939" x="0px" y="0px" width="10px" height="10px" xml:space="preserve">
                                    <g>
                                        <path d="M62.819,47.97l32.533-32.534c0.781-0.781,0.781-2.047,0-2.828L83.333,0.586C82.958,0.211,82.448,0,81.919,0   c-0.53,0-1.039,0.211-1.414,0.586L47.97,33.121L15.435,0.586c-0.75-0.75-2.078-0.75-2.828,0L0.587,12.608   c-0.781,0.781-0.781,2.047,0,2.828L33.121,47.97L0.587,80.504c-0.781,0.781-0.781,2.047,0,2.828l12.02,12.021   c0.375,0.375,0.884,0.586,1.414,0.586c0.53,0,1.039-0.211,1.414-0.586L47.97,62.818l32.535,32.535   c0.375,0.375,0.884,0.586,1.414,0.586c0.529,0,1.039-0.211,1.414-0.586l12.02-12.021c0.781-0.781,0.781-2.048,0-2.828L62.819,47.97   z"></path>
                                    </g>
                                </svg>';

                            echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                            '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">%s</a>', esc_url(wc_get_cart_remove_url($cart_item_key)), __('Remove this item', 'woocommerce'), esc_attr($product_id), esc_attr($_product->get_sku())
                                            , $iconCross), $cart_item_key);
                            ?>
                        </td>



                        <td class="product-name" data-title="<?php _e('Product', 'woocommerce'); ?>">

                            <div class="pascal-cart-thumbnail">

                                <?php
                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('thumbnail'), $cart_item, $cart_item_key);

                                if (!$product_permalink) {
                                    echo $thumbnail;
                                } else {
                                    printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                }
                                ?>

                            </div>
                            <div class="pascal-cart-name">
                                <?php
                                if (!$product_permalink) {
                                    echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;';
                                } else {
                                    echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_title()), $cart_item, $cart_item_key);
                                }

                                // Meta data
                                echo wc_get_formatted_cart_item_data($cart_item);

                                // Backorder notification
                                if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                    echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>';
                                }
                                ?>
                            </div>




                        </td>

                        <td class="product-price" data-title="<?php _e('Price', 'woocommerce'); ?>">
                            <?php
                            echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                            ?>
                        </td>

                        <td class="product-quantity" data-title="<?php _e('Quantity', 'woocommerce'); ?>">
                            <?php
                            if ($_product->is_sold_individually()) {
                                $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                            } else {
                                $product_quantity = woocommerce_quantity_input(array(
                                    'input_name' => "cart[{$cart_item_key}][qty]",
                                    'input_value' => $cart_item['quantity'],
                                    'max_value' => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                    'min_value' => '0'
                                        ), $_product, false);
                            }

                            echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                            ?>
                        </td>

                        <td class="product-subtotal" data-title="<?php _e('Total', 'woocommerce'); ?>">
                            <?php
                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }

            do_action('woocommerce_cart_contents');
            ?>
            <?php do_action('woocommerce_after_cart_contents'); ?>
        </tbody>
    </table>
    <?php wp_nonce_field('woocommerce-cart'); ?>
    <div id="pascal-cart-actions">

        <div id="pascal-cart-update">
            <input type="submit" class="bt-site bt-site-yellow" name="update_cart" value="<?php esc_attr_e('Actualizar Carro', 'woocommerce'); ?>" />
        </div>
        <div id="pascal-cart-coupons">
            <?php if (wc_coupons_enabled()) { ?>
                <div class="coupon">
                    <h4>¿Tenés un código<br/> promocional?</h4>
                    <h5>Escribí tu código y accede a tu descuento</h5>
                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" />
                    <input type="submit" class="bt-site bt-site-black" name="apply_coupon" value="<?php esc_attr_e('Aplicar Cupón', 'woocommerce'); ?>" />
                    <?php do_action('woocommerce_cart_coupon'); ?>
                </div>
            <?php } ?>
        </div><div id="pascal-cart-total">
            <?php do_action('woocommerce_cart_actions'); ?>

            <?php do_action('woocommerce_cart_collaterals'); ?>

        </div>
    </div>

    <?php do_action('woocommerce_after_cart_table'); ?>
</form>


<?php do_action('woocommerce_after_cart'); ?>

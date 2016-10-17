<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     2.2.0
 */
if (!defined('ABSPATH')) {
    exit;
}

if ($order) :
    ?>

    <?php if ($order->has_status('failed')) : ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="woocommerce-thankyou-order-failed woocommerce-thankyou-order-header">

                        <h3><?php _e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></h3>

                    </div>

                    <p class="woocommerce-thankyou-order-failed-actions">
                        <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php _e('Pay', 'woocommerce') ?></a>
                        <?php if (is_user_logged_in()) : ?>
                            <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php _e('My Account', 'woocommerce'); ?></a>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>



    <?php else : ?>

        <div class="woocommerce-thankyou-order-received woocommerce-thankyou-order-header">
            <h3>¡Gracias por comprar en pascal!</h3>
            <h4>Tu pedido ya está siendo procesado.</h4>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12"></div>
            </div>
        </div>


        <div class="pascal-detalle-compra">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Detalles de tu compra <span>Nº de pedido <?php echo $order->get_order_number(); ?></span></h4>
                    </div>
                </div>
            </div>

        </div>

        <div class="pascal-detalle-compra-productos">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if ($order->id) {
                            $order = wc_get_order($order->id);

                            $show_purchase_note = $order->has_status(apply_filters('woocommerce_purchase_note_order_statuses', array('completed', 'processing')));
                            $show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
                            ?>

                            <table class="shop_table order_details">
                                <thead>
                                    <tr>
                                        <th class="product-name">Productos</th>
                                        <th class="product-total"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($order->get_items() as $item_id => $item) {
                                        $product = apply_filters('woocommerce_order_item_product', $order->get_product_from_item($item), $item);

                                        wc_get_template('order/order-details-item.php', array(
                                            'order' => $order,
                                            'item_id' => $item_id,
                                            'item' => $item,
                                            'show_purchase_note' => $show_purchase_note,
                                            'purchase_note' => $product ? get_post_meta($product->id, '_purchase_note', true) : '',
                                            'product' => $product,
                                        ));
                                    }
                                    ?>
                                    <?php do_action('woocommerce_order_items_table', $order); ?>
                                </tbody>
                                <tfoot>
                                    <?php
                                    $order_item_totals = $order->get_order_item_totals();
                                    $totales = $order_item_totals['order_total'];
                                    unset($order_item_totals['order_total']);
                                    foreach ($order_item_totals as $key => $total) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $total['label']; ?></th>
                                            <td><?php echo $total['value']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
            <div class="pascal-orden-total">

                <?php
                $order_item_totals = $order->get_order_item_totals();
                $totales = $order_item_totals['order_total'];
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3><strong><?php echo $totales['label']; ?></strong><?php echo $totales['value']; ?></h3>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pascal-datos-cliente">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <?php if ($show_customer_details) : ?>
                                <?php wc_get_template('order/order-details-customer.php', array('order' => $order)); ?>
                                <?php
                            endif;
                            ?>

                        </div>
                    </div>
                </div>

            </div>


            <?php
        }
        ?>

        <div class="clear"></div>

    <?php endif; ?>
    <div class="pascal-instrucciones">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php do_action('woocommerce_thankyou_' . $order->payment_method, $order->id); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="pascal-volver-tienda">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo get_site_url(); ?>" class="bt-site bt-site-yellow">Continuar en Pascal</a>
                </div>
            </div>
        </div>
    </div>



<?php else : ?>

    <div class="woocommerce-thankyou-order-received woocommerce-thankyou-order-header">
        <h3>¡Gracias por comprar en pascal!</h3>
        <h4>Tu pedido ya está siendo procesado.</h4>
    </div>

<?php endif; ?>

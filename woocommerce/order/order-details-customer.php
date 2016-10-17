<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */
if (!defined('ABSPATH')) {
    exit;
}
?>


<div class="row">
    <div class="col-md-3">
        <h4>Datos del cliente</h4>
        <ul class="customer_details">

            <?php if ($order->customer_note) : ?>

                <li>
                    <span><?php _e('Note:', 'woocommerce'); ?></span><?php echo wptexturize($order->customer_note); ?>
                </li>


            <?php endif; ?>

            <?php if ($order->billing_email) : ?>

                <li>
                    <span><?php _e('Email:', 'woocommerce'); ?></span><?php echo esc_html($order->billing_email); ?>
                </li>

            <?php endif; ?>

            <?php if ($order->billing_phone) : ?>
                <li>
                    <span><?php _e('Telephone:', 'woocommerce'); ?></span><?php echo esc_html($order->billing_phone); ?>
                </li>

            <?php endif; ?>

            <?php do_action('woocommerce_order_details_after_customer_details', $order); ?>
        </ul>
    </div>



    <div class="col-md-3">
        <header class="title">
            <h4><?php _e('Billing Address', 'woocommerce'); ?></h4>
        </header>
        <address>
            <?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __('N/A', 'woocommerce'); ?>
        </address>
    </div>
    <?php if (!wc_ship_to_billing_address_only() && $order->needs_shipping_address()) : ?>


        <div class="col-md-3">
            <header class="title">
                <h4><?php _e('Shipping Address', 'woocommerce'); ?></h4>
            </header>
            <address>
                <?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __('N/A', 'woocommerce'); ?>
            </address>
        </div>


    <?php endif; ?>
</div>
<?php

/**
 * Storefront engine room
 *
 * @package storefront
 */
/**
 * Assign the Storefront version to a var
 */
$theme = wp_get_theme('storefront');
$storefront_version = $theme['Version'];

/**
 * Initialize all the things.
 */
require 'inc/class-storefront.php';
require 'inc/storefront-legacy.php';


require 'inc/php/worq.php';
require 'inc/php/ajax.php';
require 'inc/php/mobile-detect.php';
require 'inc/php/worq-slider.php';



if (is_woocommerce_activated()) {
    require 'inc/woocommerce/class-storefront-woocommerce.php';
    require 'inc/woocommerce/storefront-woocommerce-legacy.php';

}

if (is_admin()) {
    require 'inc/admin/class-storefront-admin.php';
}

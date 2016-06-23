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
//require 'inc/jetpack/class-storefront-jetpack.php';
//require 'inc/customizer/class-storefront-customizer.php';



require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';


require 'inc/php/worq.php';
require 'inc/php/ajax.php';
require 'inc/php/worq-slider.php';
require 'inc/php/mobile-detect.php';


if (is_woocommerce_activated()) {
    require 'inc/woocommerce/class-storefront-woocommerce.php';
    require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
    require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if (is_admin()) {
    require 'inc/admin/class-storefront-admin.php';
}

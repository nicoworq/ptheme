<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

$cantidadCuotas = get_option('cantidad_cuotas');

$cuotaValor = $product->get_price() / $cantidadCuotas;

?>

<?php if ($price_html = $product->get_price_html()) : ?>
    <div class="pascal-product-price"><?php echo $price_html; ?></div>
    <div class="pascal-product-quota">
        (<?php echo $cantidadCuotas; ?> Cuotas de <?php echo wc_price($cuotaValor); ?>)
    </div>

<?php endif; ?>

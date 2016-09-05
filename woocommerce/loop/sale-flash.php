<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
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

global $post, $product;
?>
<?php
if ($product->is_on_sale()) :

    $percentage = round(( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100);
    ?>

    <div class="flip-container">
        <div class="flipper">
            <div class="front">
                <div class="price-off-container">
                    <div class="price-off">
                        <span class="price-off-circle"></span>
                        <span class="price-off-bg"></span>
                        <span class="price-off-number"> <?php echo $percentage; ?>% <strong>off</strong> 
                        </span>    
                    </div>
                </div>
            </div>
            <div class="back">
                <div class="price-off-container">
                    <div class="price-off">
                        <span class="price-off-circle"></span>
                        <span class="price-off-bg"></span>
                        <span class="price-off-number"> <?php echo $percentage; ?>% <strong>off</strong> 
                        </span>    
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php




 endif; 

<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>


<div class="no-results">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <!-- <p class="woocommerce-info"><?php _e('No products were found matching your selection.', 'woocommerce'); ?></p>-->

            </div>
        </div>
    </div>

    <?php
    global $categories;

    //excluir marcas
    $marcas = get_term_by('slug', 'marcas', 'product_cat');

    //excluir promos
    $promociones = get_term_by('slug', 'promociones', 'product_cat');


    $args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'parent' => 0,
        'exclude' => array($marcas->term_id, $promociones->term_id)
    );
    $categories = get_terms($args);
       
    ?>
    
    
    <h2 class="no-results-title">Te recomendamos que busques por categorías</h2>
    
    <?php wc_get_template_part('content', 'products-bottom');?>
    <?php wc_get_template_part('content', 'navigation-bottom'); ?>
</div>




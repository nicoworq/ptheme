<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 3.0.2
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $post, $product;
?>
<div class="pascal-product-images images">

    <?php
    $attachment_ids = $product->get_gallery_image_ids();
    $imagePascalClass = 'no-thumbnail';

    if ($attachment_ids) {
        $imagePascalClass = '';
        wc_get_template('single-product/product-thumbnails.php');
    }
    ?>
    <div class="pascal-product-main-image-container <?php echo $imagePascalClass; ?>">
        <?php
        if (has_post_thumbnail()) {
            $attachment_count = count($product->get_gallery_image_ids());
            $gallery = $attachment_count > 0 ? '[product-gallery]' : '';
            $props = wc_get_product_attachment_props(get_post_thumbnail_id(), $post);
            /* $image = get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array(
              'title' => $props['title'],
              'alt' => $props['alt'],
              )); */

            $imageFullSrc = get_the_post_thumbnail_url($post->ID, 'shop_single');
            $imageThumbSrc = get_the_post_thumbnail_url($post->ID, 'shop_single');


            echo "<a href='{$imageFullSrc}' itemprop='image' class='woocommerce-main-image' title='{$props['title']}' data-rel='prettyPhoto{$gallery}'  style='background-image:url({$imageThumbSrc});' ></a>";

            //echo apply_filters('woocommerce_single_product_image_html', sprintf('<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $props['url'], $props['caption'], $image), $post->ID);
        } else {

            $imageThumbSrc = wc_placeholder_img_src();
            echo "<a  itemprop='image' class='woocommerce-main-image no-image'  style='background-image:url({$imageThumbSrc});' ></a>";

            // echo apply_filters('woocommerce_single_product_image_html', sprintf('<img src="%s" alt="%s" />', wc_placeholder_img_src(), __('Placeholder', 'woocommerce')), $post->ID);
        }
        ?>
    </div>
</div>

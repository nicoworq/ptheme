<?php

$args = array('post_type' => 'product', 'posts_per_page' => -1);

$loop = new WP_Query($args);

while ($loop->have_posts()) : $loop->the_post();
    global $product;

    $sku = $product->get_sku();
    $skuStripped = preg_replace('/\s+/', '', $sku);
    update_post_meta($loop->post->ID, '_sku', $skuStripped);
    echo $skuStripped;


endwhile;


wp_reset_query();

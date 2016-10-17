<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>

<div id="pascal-cart">

    <div id="pascal-cart-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>                        
                        <?php the_title(); ?>
                        <a class="bt-site bt-site-yellow pull-right" href="<?php echo get_site_url(); ?>">Seguir comprando</a>
                    </h1>                  
                </div>
            </div>
        </div>
    </div>

    <div id="pascal-cart-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">           
                    <?php
                    echo do_shortcode('[woocommerce_cart]')
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
get_footer();
?>
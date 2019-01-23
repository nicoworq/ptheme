<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 * @version     3.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            /**
             * woocommerce_before_single_product hook.
             *
             * @hooked wc_print_notices - 10
             */
            do_action('woocommerce_before_single_product');

            if (post_password_required()) {
                echo get_the_password_form();
                return;
            }
            ?>
        </div>
    </div>
</div>

<div itemscope itemtype="Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php wc_get_template('single-product/title.php'); ?>


                <div class="pascal-single-product">
                    <?php
                    /**
                     * woocommerce_before_single_product_summary hook.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    // do_action('woocommerce_before_single_product_summary');


                    wc_get_template('single-product/product-image.php')
                    ?>

                    <div class="summary entry-summary">
                        <?php
                        /**
                         * woocommerce_single_product_summary hook.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         */
                        //do_action('woocommerce_single_product_summary');
                        //wc_get_template('single-product/rating.php');
                        wc_get_template('single-product/sale-flash.php');
                        wc_get_template('single-product/price.php');

                        //cuotas
                        $cantidadCuotas = get_option('cantidad_cuotas');
                        global $product;
                        $cuotaValor = $product->get_price() / $cantidadCuotas;
                        ?>
                        <!--
                        <div class="product-quotes">
                            <span class="quote-quantity"><?php echo get_option('cantidad_cuotas'); ?></span>cuotas sin interés de <?php echo wc_price($cuotaValor); ?> con MercadoPago<br/> <a target="blank" href="https://www.mercadopago.com.ar/promociones">Ver promociones vigentes</a>

                        </div>-->
                        <div class="product-quotes">
                            <span>Precio de Contado</span><br/>
                            <div id="ver-cuotas">
                                <a class="">Click para calcular pago en cuotas</a>
                            </div>
                            <a target="blank" href="https://www.mercadopago.com.ar/cuotas">Ver promociones vigentes en cuotas con MercadoPago</a>
                        </div>

                        <a href="#" id="shipping-click">Click para info de envío</a>
                        <?php
                        //wc_get_template('single-product/short-description.php');

                        do_action('woocommerce_' . $product->get_type() . '_add_to_cart');
                        //wc_get_template('single-product/meta.php');
                        //wc_get_template('single-product/share.php');
                        ?>
                        <span></span>
                    </div><!-- .summary -->
                </div>




            </div>
        </div>
    </div>
    <?php
    /**
     * woocommerce_after_single_product_summary hook.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
//do_action('woocommerce_after_single_product_summary');



    wc_get_template_part('content', 'credit-cards');
    ?>

    <div id="modal-cuotas" class="modal-pascal">
        <div id="modal-cuotas-bg" class="modal-pascal-bg"></div>
        <div id="modal-cuotas-inner" class="modal-pascal-inner">

            <div id="modal-cuotas-relative" class="modal-pascal-relative">
                <a id="modal-cuotas-cerrar" class="modal-cerrar">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ3Ljk3MSA0Ny45NzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ3Ljk3MSA0Ny45NzE7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8cGF0aCBkPSJNMjguMjI4LDIzLjk4Nkw0Ny4wOTIsNS4xMjJjMS4xNzItMS4xNzEsMS4xNzItMy4wNzEsMC00LjI0MmMtMS4xNzItMS4xNzItMy4wNy0xLjE3Mi00LjI0MiwwTDIzLjk4NiwxOS43NDRMNS4xMjEsMC44OCAgIGMtMS4xNzItMS4xNzItMy4wNy0xLjE3Mi00LjI0MiwwYy0xLjE3MiwxLjE3MS0xLjE3MiwzLjA3MSwwLDQuMjQybDE4Ljg2NSwxOC44NjRMMC44NzksNDIuODVjLTEuMTcyLDEuMTcxLTEuMTcyLDMuMDcxLDAsNC4yNDIgICBDMS40NjUsNDcuNjc3LDIuMjMzLDQ3Ljk3LDMsNDcuOTdzMS41MzUtMC4yOTMsMi4xMjEtMC44NzlsMTguODY1LTE4Ljg2NEw0Mi44NSw0Ny4wOTFjMC41ODYsMC41ODYsMS4zNTQsMC44NzksMi4xMjEsMC44NzkgICBzMS41MzUtMC4yOTMsMi4xMjEtMC44NzljMS4xNzItMS4xNzEsMS4xNzItMy4wNzEsMC00LjI0MkwyOC4yMjgsMjMuOTg2eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></a>

                <div id="pascal-mp-cuotas">


                    <div id="simulador-de-cuotas" class="">
                        <form id="fSimulator">
                            <div class="row">
                                <div class="col-md-7">

                                    <select class="form-control" id="simulator-card-mobile"></select>

                                    <div id="simulator-card">

                                    </div>
                                    <div id="simulator-issuer-container">
                                        <label for="entidad">Selecciona el Banco de la tarjeta</label>
                                        <select class="form-control" id="simulator-issuer"></select>
                                    </div>


                                </div>
                                <div class="col-md-5">
                                    <div id="simulator-installment-result" class="row text-verde text-center">
                                        <h3>Selecciona tu tarjeta para calcular las cuotas</h3>
                                    </div>
                                </div>								

                            </div>

                        </form>

                    </div>

                </div>



            </div>

        </div>
    </div>
    <div id="modal-shipping" class="modal-pascal">

        <script>
            window.productHeight = '<?php echo $product->get_height(); ?>'
            window.productWidth = '<?php echo $product->get_width(); ?>'
            window.productLength = '<?php echo $product->get_length(); ?>'
            window.productWeigth = '<?php echo $product->get_weight(); ?>'
        </script>
        <div class="modal-pascal-bg"></div>
        <div id='modal-shipping-inner' class="modal-pascal-inner">

            <div id="modal-shipping-relative" class="modal-pascal-relative">
                <a id="modal-shipping-cerrar" class="modal-cerrar">
                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ3Ljk3MSA0Ny45NzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ3Ljk3MSA0Ny45NzE7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KPGc+Cgk8cGF0aCBkPSJNMjguMjI4LDIzLjk4Nkw0Ny4wOTIsNS4xMjJjMS4xNzItMS4xNzEsMS4xNzItMy4wNzEsMC00LjI0MmMtMS4xNzItMS4xNzItMy4wNy0xLjE3Mi00LjI0MiwwTDIzLjk4NiwxOS43NDRMNS4xMjEsMC44OCAgIGMtMS4xNzItMS4xNzItMy4wNy0xLjE3Mi00LjI0MiwwYy0xLjE3MiwxLjE3MS0xLjE3MiwzLjA3MSwwLDQuMjQybDE4Ljg2NSwxOC44NjRMMC44NzksNDIuODVjLTEuMTcyLDEuMTcxLTEuMTcyLDMuMDcxLDAsNC4yNDIgICBDMS40NjUsNDcuNjc3LDIuMjMzLDQ3Ljk3LDMsNDcuOTdzMS41MzUtMC4yOTMsMi4xMjEtMC44NzlsMTguODY1LTE4Ljg2NEw0Mi44NSw0Ny4wOTFjMC41ODYsMC41ODYsMS4zNTQsMC44NzksMi4xMjEsMC44NzkgICBzMS41MzUtMC4yOTMsMi4xMjEtMC44NzljMS4xNzItMS4xNzEsMS4xNzItMy4wNzEsMC00LjI0MkwyOC4yMjgsMjMuOTg2eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                </a>

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-left">Envío dentro de Rosario</h4>
                        <ul class="text-left">
                            <li>- Envio gratuito para compras superiores a $3000</li>
                            <li>- Envío con costo de $250 para compras menores a $3000</li>
                            <li>- Retiro por sucursal (Previa coordinación)</li>

                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-left">Envío fuera de Rosario</h4>
                        <ul class="text-left">                  
                            <li>- Envío por MercadoEnvíos</li>
                        </ul>
                    </div>
                </div>




                <form id="shipping-calculator">
                    <div class="ajaxing"><span></span></div>
                    <h4>Calculá el costo de tu envío por MercadoEnvíos: </h4>
                    <label>Ingresa tu código postal:<br/>
                        <input type="text" id="input-cp"/>
                    </label>
                    <div id="shipping-result">
                        <span>El envío de este producto costará:</span><br/>$178.85
                    </div>
                    <button id="button-cp" disabled="true">Calcular</button>
                </form>


            </div>

        </div>
    </div>
    <?php
    if (!empty_content(get_the_excerpt())) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pascal-product-short-description">
                        <?php
                        the_excerpt();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <?php
    if (!empty_content(get_the_content())) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pascal-product-description">
                        <?php
                        the_content();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>



    <?php
    if (count($product->get_attributes()) > 1) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pascal-product-info">
                        <h2>Especificaciones</h2>
                        <?php
                        wc_display_product_attributes($product);
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <?php
    }
    ?>


    <meta itemprop="url" content="<?php the_permalink(); ?>" />
</div>






<div id="pascal-product-bottom">

    <section id="pascal-related-products">

        <?php
        $args = array(
            'posts_per_page' => 5,
            'columns' => 5,
            'orderby' => 'rand'
        );
        woocommerce_related_products($args);
        ?>

    </section>

    <?php
    $args = apply_filters('woocommerce_upsell_display_args', array(
        'posts_per_page' => 5,
        'orderby' => apply_filters('woocommerce_upsells_orderby', 'title'),
        'columns' => 5
    ));

    wc_get_template('single-product/up-sells.php', $args);
    ?>

    <?php // wc_get_template_part('content', 'navigation-bottom');  ?>
</div>



<?php do_action('woocommerce_after_single_product'); ?>
<script>
    window.productPrice = '<?php echo $product->get_price(); ?>';
</script>
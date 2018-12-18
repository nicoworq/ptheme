<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Home Normal Nueva
 *
 * @package storefront
 */
get_header("nuevo");
?>

<?php
do_shortcode('[slider-worq]');

wc_get_template_part('content', 'suscribe');
wc_get_template_part('content', 'back-top');

function mostrarProductosBanners($fila) {

    $tituloFila = $fila['titulo_bloque'];

    echo "<h3 class='titulo-fila'>$tituloFila</h3>";

    $productosBannerRepeater = $fila['producto_banner_repeater'];

    foreach ($productosBannerRepeater as $pb) {


        if ($pb['producto_banner'][0]['acf_fc_layout'] === 'productoProducto') {
            //es producto

            global $product;

            $product = wc_get_product($pb['producto_banner'][0]['producto'][0]);
            wc_get_template_part('content', 'product_home');
        } else {
            $banner = $pb['producto_banner'][0]['banner'];
            $link_banner = $pb['producto_banner'][0]['link_banner'];
            ?>
            <li class="pascal-product product">
                <a href="<?php echo $link_banner ?>" style="background-image: url(<?php echo $banner['url'] ?>)" class="pascal-home-banner"></a>
            </li>
            <?php
        }
    }
}

$filas_productos = get_field("fila_home");
?>
<section class="fila-productos-home archive search">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php woocommerce_product_loop_start(); ?>

                <?php
                $primeraFila = array_shift($filas_productos);
                mostrarProductosBanners($primeraFila);
                ?>

                <?php woocommerce_product_loop_end(); ?>
            </div>
        </div>
    </div>


</section>


<?php
$catDestacadas = get_field("categorias_destacadas");

if (count($catDestacadas)) {
    ?>
    <section id="categorias-destacadas-home">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="contenedor-categorias">
                        <?php
                        foreach ($catDestacadas as $cat) {

                            $tax = $cat['categoria'];

                            $taxLink = get_term_link($tax);

                            $imagenCat = $cat['imagen_categoria']['sizes']['medium'];
                            ?><a href="<?php echo $taxLink ?>" class="cat-destacada-home" title="<?php echo $tax->name; ?>"> 

                                <img src="<?php echo $imagenCat; ?>" alt=""/>
                                <h4 class="cat-destacada-nombre"><?php echo $tax->name; ?></h4>

                            </a><?php }
                        ?>
                    </div>


                </div>


            </div>
        </div>

    </section>

    <?php
}


//mostramos el resto de las filas


foreach ($filas_productos as $fila) {
    ?>

    <section class="fila-productos-home archive search">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php woocommerce_product_loop_start(); ?>

                    <?php
                    mostrarProductosBanners($fila);
                    ?>

                    <?php woocommerce_product_loop_end(); ?>
                </div>
            </div>
        </div>


    </section>

    <?php
}
?>





<!--    
<section id="home-brands">
    <div id="home-brands-list">
<?php
$args2 = array(
    'taxonomy' => 'pa_marca',
    'hide_empty' => false,
);
$brands = get_terms($args2);
foreach ($brands as $brand) {

    $thumb = get_field('imagen_thumbnail', $brand);
    $link = get_term_link($brand);
    ?>
                                                                                                        <a href="<?php echo $link; ?>" class="pascal-brand">
                                                                                                            <div class="pascal-brand-bg" style="background-image: url(<?php echo $thumb['url']; ?>);"></div>
                                                                                                        </a>
    <?php
}
?>
    </div>
    <div id="home-brands-arrows">
        <div id="brand-arrow-next" class="brand-arrow">

            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g>
            <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                  c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                  "/>
            </g>

            </svg>

        </div>
        <div id="brand-arrow-prev" class="brand-arrow">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g>
            <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                  c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/>
            </g>
            </svg>
        </div>
    </div>

</section>-->

<?php wc_get_template_part('content', 'featured-1'); ?>
<?php //wc_get_template_part('content', 'products-bottom');  ?>
<?php// wc_get_template_part('content', 'navigation-bottom'); ?>
<?php wc_get_template_part('content', 'featured-2'); ?>

<?php
/**
 * Functions hooked in to homepage action
 *
 * @hooked storefront_homepage_content      - 10
 * @hooked storefront_product_categories    - 20
 * @hooked storefront_recent_products       - 30
 * @hooked storefront_featured_products     - 40
 * @hooked storefront_popular_products      - 50
 * @hooked storefront_on_sale_products      - 60
 * @hooked storefront_best_selling_products - 70
 */
//do_action( 'homepage' ); 
?>
<?php
get_footer();

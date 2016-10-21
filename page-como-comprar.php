<?php
/**
 *
 * Template Name: Como comprar
 *
 * @package storefront
 */
get_header();

worq_breadcrumb()
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main hentry como-comprar" role="main">
        <?php while (have_posts()) : the_post(); ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <header class="entry-header">
                            <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
                            <h2>Comprar en Pascal es muy fácil! Seguí los pasos a continuación<br/> y empeza a comprar desde la comodidad de tu casa</h2>
                        </header>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="como-comprar-paso como-comprar-paso1">
                            <h3>1</h3>
                            <h4>Productos</h4>
                            <p>
                                Navega por el sitio para descubrir nuestros productos. Puedes filtrar por categoría y utilizar el buscador. Agrega al carro los productos que sean de tu agrado.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="como-comprar-paso como-comprar-paso2">
                            <h3>2</h3>
                            <h4>Mi Carro</h4>
                            <p>
                                Cuando finalices de comprar, revisa los productos de tu carro y modificalo de ser necesario. Continua hacia el Checkout para seguir con el proceso de compra.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="como-comprar-paso como-comprar-paso3">
                            <h3>3</h3>
                            <h4>Checkout</h4>
                            <p>
                                Completa el formulario con tus datos, elegí la forma de pago, el envío, procede a abonar <br/><span>¡Y Listo!</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p style="margin-top:60px;margin-bottom:40px;"> Comenzá a comprar en Pascal y disfrutá las mejores ofertas en tecnología</p>
                        <a href="<?php echo site_url(); ?>" class="bt-site bt-site-yellow">¡Comenzá ahora!</a>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */
get_header();
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <section class="error-404 not-found">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-content">

                            <header class="page-header">
                                <h1 class="page-title">404 error</h1>
                                <h2>Parece que esta página <br/> no lleva a ninguna parte</h2>

                                <h4>
                                    <span>
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                                            <g>
                                                <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                                                      c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                                                      "></path>
                                            </g>

                                        </svg>
                                    </span> La dirección web que ingresaste no es una dirección válida.
                                </h4>
                                <a href="<?php echo site_url(); ?>" class="bt-site bt-site-yellow">Seguir navegando</a>
                            </header><!-- .page-header -->


                        </div><!-- .page-content -->
                    </div>
                </div>
            </div>

        </section><!-- .error-404 -->

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

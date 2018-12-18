<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
?>


</div><!-- #content -->


<footer class="site-footer" role="contentinfo">
    <!--<section id="institutional-module">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="institutional-block1">
                                <h3>Te conocemos <br/> <span>sabemos como tratarte</span></h3>
                                <p>
                                    Todo empezó con una computadora y hoy despues de 30 años de experiencia en el
                                    mercado, segimos con las mismas ganas
                                    de funcionar como nexo entre las personas
                                    y la tecnología.
                                </p>
                                <a class="bt-site bt-site-violet" href="<?php echo get_permalink(get_page_by_title('Institucional')); ?>">
                                    Acerca de pascal
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 pull-right col-xs-12">
                            <div class="institutional-block2">
                                <div class="institutional-block-img">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/profile.png'; ?>"/> 
                                </div>
                                <h3>La mejor atención</h3>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4" col-xs-12>
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="institutional-block2">
                                <div class="institutional-block-img">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/quality.png'; ?>"/> 
                                </div>
                                <h3>Calidad y precio</h3>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="institutional-block2">
                                <div class="institutional-block-img">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/truck.png'; ?>"/> 
                                </div>
                                <h3>Envios a todo el pais</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="institutional-block2">
                                <div class="institutional-block-img">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/credit-card.png'; ?>"/> 
                                </div>
                                <h3>Pagos seguros</h3>
                            </div>
                        </div>
                        <div class="col-md-5 col-xs-12">
                            <div class="institutional-block2">
                                <div class="institutional-block-img">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/shopping-cart.png'; ?>"/> 
                                </div>
                                <h3>Compra con confianza</h3>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>-->

    <section id="payments">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Medios de pago</h2>
                    <h3>Hasta 12 cuotas fijas.</h3>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/promociones.jpg'; ?>" alt="Promociones"/>
                </div>
            </div>
        </div>
    </section>

    <section id="footer-bottom">
        <div class="ajaxing"><span></span></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-inner">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="newsletter-footer">
                                    <h3 class="form-newsletter-title">Ofertas y descuentos</h3>
                                    <form id="form-suscribir-footer">
                                        <input type="hidden" name="suscribir" value="<?php echo wp_create_nonce('news-nonce') ?>"/>
                                        <input type="hidden" name="action" value="newsletter"/>
                                        <input type="text" name="sexo" placeholder="Sexo" value=""/>
                                        <input type="email" placeholder="Ingresa tu email..." name="email"/>
                                        <button class="bt-site bt-site-violet">Suscribirme</button>
                                    </form><br/>
                                    <h5 id="form-suscribe-label">Recibí descuentos especiales y ofertas exclusivas en tu email.</h5>
                                </div>

                                <a href="#" class="client-atention client-atention-mobile">
                                    Atención al cliente
                                    <span>+54(341)424-2129 <br/> +54(341)449-3917</span>
                                    <span>info@pascalonline.com.ar</span>
                                </a>

                                <a class="fiscal-data fiscal-data-desktop" target="blank" href="https://servicios1.afip.gov.ar/clavefiscal/qr/response.aspx?qr=s2_4Krg4izz9LcVC4IfKQg,,">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/data-fiscal.jpg'; ?>" alt="Data Fiscal"/>
                                </a>

                            </div>
                            <div class="col-md-7">
                                <ul class="nav-footer color bottom-nav">
                                    <ul>
                                        <li>
                                            <a href="<?php echo get_site_url(); ?>">
                                                Home
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo get_permalink(get_page_by_title('Mi Cuenta')) ?>">
                                                Mis pedidos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo get_permalink(get_page_by_title('Carro')) ?>">
                                                Carrito
                                            </a>
                                        </li>
                                    </ul>
                                </ul><ul class="nav-footer bottom-nav">
                                    <ul>
                                        <li>
                                            <a href="<?php echo get_permalink(get_page_by_title('Institucional')) ?>">
                                                Institucional
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo get_permalink(get_page_by_title('Como Comprar')) ?>">
                                                Cómo comprar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo get_permalink(get_page_by_title('Terminos y condiciones')) ?>">
                                                Términos y condiciones
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo get_permalink(get_page_by_title('Sucursales')) ?>">
                                                Sucursales
                                            </a>
                                        </li>
                                    </ul>
                                </ul>
                                <ul class="nav-footer last-col">
                                    <li>
                                        <a class="client-atention client-atention-desktop">
                                            Atención al cliente
                                            <span>+54(341)424-2129 +54(341)449-3917</span>
                                            <span>info@pascalonline.com.ar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">

                        <a class="fiscal-data fiscal-data-mobile" href="#">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/data-fiscal.jpg'; ?>" alt="Data Fiscal"/>
                        </a>

                        <p>
                            Copyright - 2000 - <?php echo date('Y') ?> www.pascalonline.com.ar, TODOS LOS DERECHOS RESERVADOS.<br/>
                            Está prohibida la reproducción total o parcial, sin la expresa autorización de la administradora de la tienda virtual.<br/>
                            Las ofertas publicadas son válidas únicamente para compras online//LOS PRECIOS PUBLICADOS SON PRECIOS DE CONTADO (EFECTIVO, DEBITO O CREDITO 1 PAGO). ESTOS PRECIOS NO APLICAN A LAS PROMOCIONES CON BANCOS, TARJETAS O SIMILARES QUE PUEDAN TENER LOS LOCALES Y QUE SON VALIDAS SOBRE PRECIOS DE LISTA". PROMOCIONES NO ACUMULABLES //<br/> Las especificaciones técnicas y descripciones están sujetas a cambios sin previo aviso // Promoción 6 cuotas sin interés según disponibilidad de MercadoPago, para ver ofertas vigentes ingresar a https://www.mercadopago.com.ar/cuotas<br/>
                            Las imágenes son de caracter ilustrativos, pueden presentar cambios y variaciones sin previo aviso
                        </p>




                    </div>
                </div>
                <div class="col-md-6">
                    <div class="worq">
                        <a href="https://worq.com.ar" class="footer-worq">Desarrolla WORQ</a> -
                        <a href="http://proyectobeta.com.ar">Impulsa Proyecto Beta</a>
                    </div>
                </div>
            </div>
            <?php
            /**
             * Functions hooked in to storefront_footer action
             *
             * @hooked storefront_footer_widgets - 10
             * @hooked storefront_credit         - 20
             */
            //do_action('storefront_footer');
            ?>
        </div>
    </section>





</footer>



</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-43710429-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-43710429-1');
</script>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6&appId=388886614495246";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>

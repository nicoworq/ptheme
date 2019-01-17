<section id="blog-suscribe">
    <div class="ajaxing"><span></span></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="contenedor-suscribir">
                    <h4><span>¡Seguí las tendencias en tu mail</span> y recibí los mejores descuentos!</h4>

                    <form id="form-suscribir-blog">

                        <input type="hidden" name="suscribir" value="<?php echo wp_create_nonce('news-nonce') ?>"/>
                        <input type="hidden" name="action" value="newsletter"/>
                        <input type="text" name="sexo" placeholder="Sexo" value=""/>
                        <input type="email" placeholder="Ingresa tu email..." name="email"/>
                        <button class="bt-site bt-site-violet">Suscribirme</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<?php ?>

<section id="header-blog">  
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><span class="style1">#Pascal</span><span class="style2">Trends</span></h2>
                <p>
                    Tecnología, APP’s, Novedades, Noticias y mucho más<br/>
                    encontralo en #pascaltrends.
                </p>
            </div>
        </div>
    </div>
</section>


<section id="blog-suscribe">
    <div class="ajaxing"><span></span></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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

</section>
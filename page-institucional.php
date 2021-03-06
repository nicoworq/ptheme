<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>

<section id="institutional-header">
    <div class="">
        <h1>Te conocemos<br/>
            sabemos como tratarte</h1>
        <h2>Siempre tuvimos la creencia que estabas primero,<br/>
            es por eso que hicimos, hacemos y vamos a hacer de<br/>
            tu satisfacción lo más importante.</h2>
    </div>

</section>

<section id="institutional-section">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>La atención <br/>
                    que buscabas</h3>
                <p>En cada una de nuestras sucursales contamos con profesionales capacitados para poder brindarte soluciones de todo tipo en este mundo cambiante y dinámico, pero que tanto nos apasiona, y este es el mundo de la tecnología</p>
                <a href="<?php echo get_permalink(get_page_by_title('Sucursales')); ?>" class="bt-site bt-site-violet">Nuestras sucursales</a>
            </div>
            <div class="col-md-6">
                <div id="institutional-quote">
                    <div id="institutional-quote-img">
                        <div id="institutional-quote-img-inner" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/images/sitio/quote-img.jpg' ?>);"></div>
                        
                    </div>
                    <div id="institutional-quote-text">
                        "Nuestra misión es hacer que el mundo sea más abierto y conectado"
                    </div>
                    <div id="institutional-quote-auth">
                        Mark Zuckerberg.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();




<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

get_header();
?>

<section id="offices">
    
    <div id="offices-mobile-back"></div>
    
    <div class="ajaxing">
        <span></span>
    </div>
    <div id="offices-description-container">
        <div id="offices-description">

            <h3>Sucursales</h3>
            <h2>Pascal siempre <br/>
                cerca tuyo</h2>
            <p>
                ¿Conoces todas nuestras sucursales? Tenemos una en todas las zonas de Rosario para que siempre tengas un Pascal cerca tuyo.
            </p>
            <h4>
                <span>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
                        <g>
                            <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                                  c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                                  "/>
                        </g>

                    </svg>
                </span>  Encontrá tu sucursal más cercana
            </h4>


        </div>
        <div class="office-data">
            <div class="office-data-close"></div>
            <div class="office-data-img">

            </div>
            <div class="office-data-text">
                <h3>Sucursal: Entre Rios 658</h3>

                <p class="office-data-tel"><span id="office-tel">4242129 / 4493917</span><br/>
                    <span id="office-email">ventas@pascalonline.com.ar</span></p>

                <p class="office-data-hours"><span class="title">Horarios de atencion:</span> <br/>
                    <span id="office-hours">Lunes a viernes: De 9 a 19:30 hs.<br/>
                        Sábados: De 9 a 13 hs.</span> </p>
            </div>

        </div>
    </div>


    <div id="offices-map">


    </div>

</section>

<section id="naranja-view">

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Ahora podes conocernos por dentro,
                    y explorar nuestra sucursal desde</h3>
                <img class='naranja-view' src="<?php echo get_template_directory_uri() . '/assets/images/sitio/tienda-naranja.jpg' ?>" alt='Tienda Naranja'/>

                <a target="blank" href='http://naranjaview.tiendanaranja.com/comercio/pascal/290' class='bt-site bt-site-violet'>Explorar en Naranja View</a>
            </div>
            <div class="col-md-6">
                <img class='naranja-view2' src="<?php echo get_template_directory_uri() . '/assets/images/sitio/tienda-naranja2.jpg' ?>" alt='Tienda Naranja View'/>
            </div>
        </div>
    </div>

</section>

<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDTCJD4YGJl8JCUN9tqmGUyh1aLUHRJz7Y"></script>

<?php
get_footer();




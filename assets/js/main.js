/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function ($) {

    $(document).ready(function () {


        /* -----------
         *  MAPA
         * ----------- */


        var sucursales = [{
                id: 1,
                coord: '-32.944194, -60.640647',
                titulo: 'Entre Rios 658',
                telefonos: '4242129 / 4493917',
                email: 'ventas@pascalonline.com.ar',
                horarios: 'Lunes a viernes: De 9 a 19:30 hs <br/> Sábados: De 9 a 13 hs.'
            },
            {
                id: 2,
                coord: '-32.947375, -60.637396',
                titulo: 'Galería Rosario local 79',
                telefonos: '4493522',
                email: 'galeria@pascalonline.com.ar',
                horarios: 'Lunes a viernes: De 9 a 13hs y de 15  a 19:30hs <br/> Sábados: De 9 a 13 hs.'
            },
            {
                id: 3,
                coord: '-32.974177, -60.643550',
                titulo: 'San Martin 3151',
                telefonos: ' 4728490 / 4448680',
                email: 'sanmartin@pascalonline.com.ar',
                horarios: ' Lunes a viernes: De 9 a 13hs y de 15  a 19:30hs<br/> Sábados: De 9 a 13 hs.'
            },
            {
                id: 4,
                coord: '-32.939076, -60.679098',
                titulo: 'Cordoba 5541',
                telefonos: '4577177 / 4580888',
                email: 'ventasoeste@pascalonline.com.ar',
                horarios: ' Lunes a viernes: De 9 a 13hs y de  14:30 a 19hs<br/> Sábados: De 9 a 13 hs.'
            },
            {
                id: 5,
                coord: '-32.916251, -60.685018',
                titulo: 'Alberdi 999',
                telefonos: '4724950',
                email: 'alberdi@pascalonline.com.ar',
                horarios: 'Lunes a viernes: De 9 a 13hs y de 15  a 19:30hs <br/> Sábados: De 9 a 13 hs.'
            },
            {
                id: 6,
                coord: '-32.945326, -60.666618',
                titulo: 'Francia 1102',
                telefonos: '5571612',
                email: 'ventasfrancia@pascalonline.com.ar',
                horarios: ' Lunes a viernes: De 8 a 18:30hs <br/> Sabado: De 9 a 13 hs.'
            }


        ];

        if ($('#offices-map').length > 0) {
            var mapOptions = {center: new google.maps.LatLng(-32.9396285, -60.6543727), zoom: 14, mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false};
            var map = new google.maps.Map(document.getElementById("offices-map"), mapOptions);


            var latLngMarker = new google.maps.LatLng(-32.935774, -60.670562, 17);
            var marker = new google.maps.Marker({
                position: latLngMarker,
                map: map,
                icon: Pascal.themeUrl + '/assets/images/sitio/map_pin.png',
                scrollwheel: false
            });

            google.maps.event.addListener(marker, 'click', function () {
                map.setZoom(16);
                map.setCenter(marker.getPosition());
            });

        }




        /* -----------
         *  SLIDER MARCAS
         * ----------- */

        $('#home-brands-list').slick({arrows: true, dots: false, slidesToShow: 6, autoplay: true, nextArrow: '#brand-arrow-next', prevArrow: '#brand-arrow-prev', lazyLoad: 'progressive'});

        /* -----------
         *  SLIDER HOME
         * ----------- */


        $('#slider-worq-slides').slick({arrows: false, dots: true, appendDots: '#dots-container', slidesToShow: 1});


        /* -----------
         *  SECONDARY MENU DISPLAY
         * ----------- */

        $('#nav-secondary-toggle-bt').click(function () {

            $('#secondary-navigation').toggleClass('visible');

        });

        /* -----------
         *  CATEGORY PREVIEW HOME
         * ----------- */

        $('#home-category-preview .category-list a').click(function (e) {

            e.preventDefault();
            $('#home-category-preview .category-list a').removeClass('active');
            $(this).addClass('active');
            var slug = $(this).attr('data-category-slug');
            $('#home-category-preview .category-list-products').removeClass('active');

            $($('#home-category-preview .category-list-products[data-category-slug=' + slug + ']')).addClass('active');
        });


        /* -----------
         *  HOME PRODUCTS BOTTOM
         * ----------- */

        $('#home-products-bottom .category-list a').click(function (e) {
            e.preventDefault();

            $('#home-products-bottom .category-list a').removeClass('active');
            $(this).addClass('active');
            var slug = $(this).attr('data-category-slug');
            $('#home-products-bottom .category-list-products').removeClass('active');
            $($('#home-products-bottom .category-list-products[data-category-slug=' + slug + ']')).addClass('active');

        });

    });

})(jQuery);


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
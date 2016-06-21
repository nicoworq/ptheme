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
                horarios: 'Lunes a viernes: De 9 a 19:30hs Sábados: De 9 a 13 hs.'
            },
            {
                id: 2,
                coord: '-32.947375, -60.637396',
                titulo: 'Galería Rosario local 79',
                telefonos: '4493522',
                email: 'galeria@pascalonline.com.ar',
                horarios: 'Lunes a viernes: De 9 a 13hs y de 15 a 19:30hs Sábados: De 9 a 13 hs.'
            },
            {
                id: 3,
                coord: '-32.974177, -60.643550',
                titulo: 'San Martin 3151',
                telefonos: ' 4728490 / 4448680',
                email: 'sanmartin@pascalonline.com.ar',
                horarios: ' Lunes a viernes: De 9 a 13hs y de 15 a 19:30hs Sábados: De 9 a 13 hs.'
            },
            {
                id: 4,
                coord: '-32.939076, -60.679098',
                titulo: 'Cordoba 5541',
                telefonos: '4577177 / 4580888',
                email: 'ventasoeste@pascalonline.com.ar',
                horarios: ' Lunes a viernes: De 9 a 13hs y de 14:30 a 19hs Sábados: De 9 a 13 hs.'
            },
            {
                id: 5,
                coord: '-32.916251, -60.685018',
                titulo: 'Alberdi 999',
                telefonos: '4724950',
                email: 'alberdi@pascalonline.com.ar',
                horarios: 'Lunes a viernes: De 9 a 13hs y de 15 a 19:30hs Sábados: De 9 a 13 hs.'
            },
            {
                id: 6,
                coord: '-32.945326, -60.666618',
                titulo: 'Francia 1102',
                telefonos: '5571612',
                email: 'ventasfrancia@pascalonline.com.ar',
                horarios: ' Lunes a viernes: De 8 a 18:30hs Sabado: De 9 a 13 hs.'
            }


        ];

        if ($('#offices-map').length > 0) {
            var mapOptions = {center: new google.maps.LatLng(-32.9484227, -60.6848268), zoom: 13, mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false, disableDefaultUI: true};
            var map = new google.maps.Map(document.getElementById("offices-map"), mapOptions);

            var markers = [];
            google.maps.event.addListenerOnce(map, 'idle', function () {

                setTimeout(function () {
                    $('#offices .ajaxing').velocity('transition.fadeOut', 100);
                    $('#offices-description').velocity('transition.flipXIn', {delay: 500, duration: 450});
                }, 200);


            });

            for (var i = 0; i < sucursales.length; i++) {
                var sucursalActual = sucursales[i];
                var latLng = sucursalActual.coord.split(',');
                var latLngMarker = new google.maps.LatLng(latLng[0], latLng[1], 17);
                var marker = new google.maps.Marker({
                    position: latLngMarker,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    icon: Pascal.themeUrl + '/assets/images/sitio/map_pin.png',
                    scrollwheel: false
                });
                marker['sucursal'] = sucursalActual;
                markers.push(marker);
                google.maps.event.addListener(marker, 'click', function () {
                    showOfficeData(this.sucursal);
                    toggleBounce(this);
                });

            }
            function disableBounce() {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setAnimation(null);
                }
            }
            function toggleBounce(marker) {
                disableBounce();
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }



            $('.office-data-close').click(function () {
                disableBounce();
                $('.office-data').stop().velocity('transition.slideLeftOut', 150, function () {
                    $('.office-data').removeClass('visible');
                });

            });


            function showOfficeData(sucursal) {

                if (!$('.office-data').hasClass('visible')) {
                    $('.office-data').stop().velocity('transition.slideLeftIn', 250, function () {
                        $('.office-data').addClass('visible');
                    });

                }
                $('.office-data-img').css('background-image', 'url(' + Pascal.themeUrl + '/assets/images/sitio/sucursal' + sucursal.id + '.jpg)');
                $('.office-data h3').html(sucursal.titulo);
                $('#office-tel').html(sucursal.telefonos);
                $('#office-email').html(sucursal.email);
                $('#office-hours').html(sucursal.horarios);
            }



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

            var secondaryNav = $('#secondary-navigation')
            var navCols = secondaryNav.find('.col-nav-menu');
            var navColsLi = navCols.find('.sub-menu li');
            if (!secondaryNav.hasClass('visible')) {

                secondaryNav.velocity('transition.slideDownIn', 200, function () {
                    secondaryNav.addClass('visible');
                });

                navCols.velocity('transition.expandIn', {
                    delay: 50,
                    duration: 100,
                    stagger: 200,
                    drag:true,
                    easing: "easeInOutBounce"
                });
                /*
                 navColsLi.velocity('transition.expandIn', {
                 delay: 0,
                 duration: 30,
                 stagger: 20,
                 easing: "easeInOut"
                 });
                 */
            } else {
                secondaryNav.velocity('transition.slideUpOut', 200, function () {
                    secondaryNav.removeClass('visible');
                });

                navCols.velocity('reverse');
            }


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

            $('#home-category-preview .category-list-products[data-category-slug=' + slug + ']').addClass('active');
            
            $('#home-category-preview .category-list-products.active .pascal-product').velocity('transition.slideUpIn', {stagger: 100,duration:250,drag:true});
            
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
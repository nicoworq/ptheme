/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var shareWorq = {
    shareLink: document.URL,
    shareMedia: null,
    shareTitle: document.title,
    shareDescription: '',
    shareFacebook: function () {
        window.open('//www.facebook.com/share.php?m2w&s=100&p[url]=' + encodeURIComponent(shareWorq.shareLink) + '&p[images][0]=' + encodeURIComponent(shareWorq.shareMedia) + '&p[title]=' + encodeURIComponent(shareWorq.shareTitle) + '&p[summary]=' + encodeURIComponent(shareWorq.shareDescription), 'Facebook', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
    },
    shareTwitter: function () {
        window.open('https://twitter.com/intent/tweet?original_referer=' + encodeURIComponent(shareWorq.shareLink) + '&text=' + encodeURIComponent(shareWorq.shareTitle) + '%20' + encodeURIComponent(shareWorq.shareLink), 'Twitter', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
    },
    shareGooglePlus: function () {
        window.open('//plus.google.com/share?url=' + encodeURIComponent(shareWorq.shareLink), 'GooglePlus', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
    }
};


(function ($) {

    $(document).ready(function () {


        /*
         *  CUOTAS MP
         */

        // CARGA TARJETAS DISPONIBLES

        var selectedCardID = '';

        function simulator_get_cards()
        {
            Mercadopago.getAllPaymentMethods(simulatorSetPaymentMethodInfo);
        }
        function simulatorSetPaymentMethodInfo(status, cards)
        {
            var options = '';
            var optionsMobile = '<option value="-1">Elige...</option>';
            for (i = 0; cards && i < cards.length; i++) {
                if (cards[i].payment_type_id == 'credit_card' && cards[i].status == 'active') {
                    options += '<label><div class="cont-img"><img src="' + cards[i].secure_thumbnail + '"/></div><input class="tarjeta_mp" type="radio" name="tarjeta_mp" value="' + cards[i].id + '"/><h4>' + cards[i].name + '</h4> </label>';
                    optionsMobile += '<option value="' + cards[i].id + '">' + cards[i].name + '</option>';
                }
            }
            $("#simulator-card").html(options);
            $("#simulator-card-mobile").html(optionsMobile);
        }

        // ACTUALIZO EMISORES SEGUN TARJETA
        $("#pascal-mp-cuotas").on('change', 'input[name=tarjeta_mp]', changeTarjeta);
        $("#pascal-mp-cuotas").on('change', '#simulator-card-mobile', changeTarjetaMobile);

        function changeTarjeta() {
            var card_id = $('.tarjeta_mp:checked').val();
            // LIMPIO CAMPOS DEPENDIENTES
            $("#simulator-issuer").html('');
            $("#simulator-installment").html('');
            $("#simulator-issuer").prop("disabled", false);

            selectedCardID = card_id;

            Mercadopago.getIssuers(card_id, simulatorSetIssuersInfo);
        }
        function changeTarjetaMobile() {
            var card_id = $('#simulator-card-mobile option:selected').val();
            // LIMPIO CAMPOS DEPENDIENTES
            $("#simulator-issuer").html('');
            $("#simulator-installment").html('');
            $("#simulator-issuer").prop("disabled", false);

            selectedCardID = card_id;

            Mercadopago.getIssuers(card_id, simulatorSetIssuersInfo);
        }

        function simulatorSetIssuersInfo(status, issuers)
        {
            if (issuers.length) {
                var options = '<option value="-1">Elige...</option>';
                for (i = 0; issuers && i < issuers.length; i++) {
                    options += '<option value="' + issuers[i].id + '">' + issuers[i].name + '</option>';
                }
                $("#simulator-issuer").html(options);
                $("#simulator-issuer-container").show();
                $("#simulator-installment-result").html('<h3>Selecciona tu banco para calcular las cuotas</h3>');
            } else {

                $("#simulator-issuer-container").hide();
                $("#simulator-issuer").prop("disabled", true);
                Mercadopago.getInstallments({
                    "payment_method_id": selectedCardID,
                    "amount": window.productPrice
                }, simulatorSetInstallmentInfo);
            }
        }

        // ACTUALIZO CUOTAS SEGUN EMISOR
        $("#simulator-issuer").change(function () {
            var issuer_id = $(this, "option:selected").val();
            // LIMPIO CAMPOS DEPENDIENTES
            $("#simulator-installment").html('');
            $("#simulator-installment-result");
            //
            Mercadopago.getInstallments({
                "payment_method_id": selectedCardID,
                "issuer_id": this.value,
                "amount": window.productPrice
            }, simulatorSetInstallmentInfo);
        });
        function simulatorSetInstallmentInfo(status, installments)
        {
            var payer_costs = installments[0].payer_costs;
            var options = '<option value="-1">Elige...</option>';

            var htmlCuotas = '';

            for (i = 0; payer_costs && i < payer_costs.length; i++) {
                var rate_message = '';
                var label = '';
                var rate_style = '';
                if (!payer_costs[i].installment_rate) {
                    rate_message = '<span>Sin Interés !</span>';
                    rate_style = 'style="font-weight:700;"';
                }
                for (j = 0; j < payer_costs[i].labels.length; j++) {
                    if (payer_costs[i].labels[j].substring(0, 3) == "CFT")
                        label = payer_costs[i].labels[j];
                }
                var regex = new RegExp('_', 'g');
                options += '<option ' + rate_style + ' value="' + payer_costs[i].installment_amount + '" data-message="' + payer_costs[i].recommended_message + '" data-label="' + label.replace(regex, ': ').replace('|', ' | ') + '">' + payer_costs[i].installments + rate_message + '</option>';

                var message = payer_costs[i].recommended_message;
                var labelHtml = label.replace(regex, ': ').replace('|', ' | ');
                htmlCuotas = htmlCuotas + '<div class="resultado-cuota"><big><strong>' + message + rate_message + '</strong></big><br/><small>' + labelHtml + '</small></div>';


            }

            $("#simulator-installment").html(options);

            $("#simulator-installment-result").html(htmlCuotas);


        }

        // MUESTRO VALOR CUOTA
        $("#simulator-installment").change(function () {
            var selected = $(this).find('option:selected');
            var message = selected.data('message');
            var label = selected.data('label');
            $("#simulator-installment-result").hide(function () {
                $(this).html('<big><strong>' + message + '</strong></big><br/><small>' + label + '</small>');
            });
        });






        /* -----------
         *  MODAL CUOTAS
         * ----------- */

        $("#ver-cuotas").click(function () {

            $('#modal-cuotas').show();
            simulator_get_cards();

        });

        $("#modal-cuotas-bg, #modal-cuotas-cerrar").click(function () {
            $('#modal-cuotas').hide();
        });


        /* -----------
         *  PREVIEW CATEGORY AUTO SWITCH
         * ----------- */

        var categorias = $('#home-category-preview .category-list li a');

        var catActiva = 1;

        var timer = setInterval(loopCategorias, 2500);

        function loopCategorias() {
            $(categorias[catActiva]).click();
            catActiva++;

            if (catActiva > categorias.length) {
                catActiva = 0;
            }
        }

        $('#home-category-preview .container, #home-category-preview .pascal-product-container').mouseover(function () {
            clearInterval(timer);

        });
        $('#home-category-preview .container').mouseleave(function () {
            timer = setInterval(loopCategorias, 2500);

        });


        /* -----------
         *  COMPARTIR
         * ----------- */

        jQuery('.compartir-nota-fb').click(function (e) {
            e.preventDefault();
            shareWorq.shareFacebook();
        });
        jQuery('.compartir-nota-tw').click(function (e) {
            e.preventDefault();
            shareWorq.shareTwitter();
        });
        jQuery('.compartir-nota-gp').click(function (e) {
            e.preventDefault();
            shareWorq.shareGooglePlus();
        });

        /* -----------
         *  BACK TOP
         * ----------- */

        $("#back-top").click(function () {
            $('html, body').animate({
                scrollTop: $("body").offset().top
            }, 2000);
        });


        /*
         *  SHIPPINGG
         */

        $('#shipping-click').click(function (e) {
            e.preventDefault();
            $('#modal-shipping').show();

            // vemos que esten todos los atributos

            if (!((window.productWidth && window.productHeight && window.productLength && window.productWeigth) > 0)) {
                // no tengo todo, oculto la calculadora
                $('#shipping-calculator').hide();
            } else {
                $('#shipping-calculator').show();
            }
        });
        $('#modal-shipping-cerrar,.modal-pascal-bg').click(function () {
            $('#modal-shipping').hide();
        })

        $('#shipping-calculator input').keyup(function () {
            var button = $('#shipping-calculator button');
            if ($(this).val() === '') {
                button.attr('disabled', true);
            } else {
                button.attr('disabled', false);
            }
        })
        $('#shipping-calculator').submit(function (e) {
            e.preventDefault();
            var url = Pascal.ajaxUrl;
            var zip = $('#input-cp').val();
            var width = window.productWidth;
            var height = window.productHeight;
            var depth = window.productLength;
            var weight = window.productWeigth;

            var ajaxing = $('#shipping-calculator .ajaxing');

            ajaxing.show();

            $.post(url, {action: 'shipping', zip: zip, width: width, height: height, depth: depth, weight: weight}, function (json) {
                ajaxing.hide();
                
                $('#shipping-result').show();

                if (json.success) {
                    $('#shipping-result').html(' <span>El envío de este producto costará:</span><br/>$' + json.shippingPrice)
                } else {
                    $('#shipping-result').html('<span>No pudimos determinar el costo del envío.<br/> Prueba con otro Código postal</span>');
                }
            });


        });



        /* -----------
         *  FORM SUSCRIBIR NEWS
         * ----------- */
        $('form input').keypress(function () {
            $(this).removeClass('input-error');
            $(this).parent().removeClass('input-error');
        });

        $('#form-suscribir-blog, #form-suscribir-footer').submit(function (event) {
            event.preventDefault();

            var form = $(this);

            var emailInput = form.find('input[type=email]');

            if (!validateEmail(emailInput.val())) {

                emailInput.parent().addClass('input-error');
                swal("Oops...", "Debe ingresar un Email Valido.", "error");
                return false;
            }

            var url = Pascal.ajaxUrl;
            $('#footer-bottom .ajaxing').fadeIn();

            $.post(url, form.serialize(), function (json) {
                $('#footer-bottom .ajaxing').fadeOut();
                if (json.enviado) {
                    swal("Gracias!", "Te has suscrito a nuestro newsletter!", "success");
                    form.find('input[name=suscribir]').val('');
                    form[0].reset();
                } else {
                    swal("Oops...", "Error al generar tu suscripcion!", "error");
                }
            });


        });


        /* -----------
         *  YOUTUBE RESIZE
         * ----------- */


        $(function () {

            // Find all YouTube videos
            var $allVideos = $("iframe[src^='https://www.youtube.com']"),
                    // The element that is fluid width
                    $fluidEl = $(".pascal-product-description,.entry-content").first();

            // Figure out and save aspect ratio for each video
            $allVideos.each(function () {

                $(this)
                        .data('aspectRatio', this.height / this.width)

                        // and remove the hard coded width/height
                        .removeAttr('height')
                        .removeAttr('width');

            });

            // When the window is resized
            // (You'll probably want to debounce this)
            $(window).smartresize(function () {

                var newWidth = $fluidEl.width();

                // Resize all videos according to their own aspect ratio
                $allVideos.each(function () {

                    var $el = $(this);
                    $el
                            .width(newWidth)
                            .height(newWidth * $el.data('aspectRatio'));

                });

                // Kick off one resize to fix all videos on page load
            }).resize();

        });


        function debounce(func, wait, immediate) {
            var timeout;
            return function () {
                var context = this, args = arguments;
                var later = function () {
                    timeout = null;
                    if (!immediate)
                        func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow)
                    func.apply(context, args);
            };
        }
        ;


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
                id: 7,
                coord: '-32.957294, -60.640324',
                titulo: 'Pellegrini 1070',
                telefonos: '2971551',
                email: 'pellegrini@pascalonline.com.ar',
                horarios: 'Lunes a viernes: De 9 a 13hs y de 15 a 1930 hs Sábados: De 9 a 13 hs.'
            },
            /*
             {
             id: 3,
             coord: '-32.974177, -60.643550',
             titulo: 'San Martin 3151',
             telefonos: ' 4728490 / 4448680',
             email: 'sanmartin@pascalonline.com.ar',
             horarios: ' Lunes a viernes: De 9 a 13hs y de 15 a 19:30hs Sábados: De 9 a 13 hs.'
             },
             */
            {
                id: 4,
                coord: '-32.939076, -60.679098',
                titulo: 'Cordoba 5541',
                telefonos: '4577177 / 4580888',
                email: 'ventasoeste@pascalonline.com.ar',
                horarios: ' Lunes a viernes: De 9 a 13hs y de 14:30 a 19hs Sábados: De 9 a 13 hs.'
            },
            /*
            {
                id: 5,
                coord: '-32.916251, -60.685018',
                titulo: 'Alberdi 999',
                telefonos: '4724950',
                email: 'alberdi@pascalonline.com.ar',
                horarios: 'Lunes a viernes: De 8.30 a 13hs y de 16 a 20hs Sábados: De 9 a 13 hs.'
            },*/
            {
                id: 6,
                coord: '-32.945326, -60.666618',
                titulo: 'Francia 1102',
                telefonos: '4775612',
                email: 'ventasfrancia@pascalonline.com.ar',
                horarios: ' Lunes a viernes: De 8 a 18:30hs Sabado: De 9 a 13 hs.'
            }


        ];

        if ($('#offices-map').length > 0) {


            var zoom = 13;
            if ($(window).width() < 991) {
                zoom = 12;
            }

            var mapOptions = {center: new google.maps.LatLng(-32.9484227, -60.6848268), zoom: zoom, mapTypeId: google.maps.MapTypeId.ROADMAP, scrollwheel: false, disableDefaultUI: true};
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



            $('.office-data-close , #offices-mobile-back').click(function () {
                disableBounce();
                $('.office-data').stop().velocity('transition.slideLeftOut', 150, function () {
                    $('.office-data').removeClass('visible');
                });

                if ($(window).width() < 991) {
                    $('#offices-mobile-back').fadeOut();
                }

            });


            function showOfficeData(sucursal) {

                if ($(window).width() < 991) {
                    $('#offices-mobile-back').fadeIn();
                }



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

        $('#home-brands-list').slick({
            arrows: true,
            dots: false,
            slidesToShow: 6,
            autoplay: true,
            nextArrow: '#brand-arrow-next',
            prevArrow: '#brand-arrow-prev',
            lazyLoad: 'progressive',
            responsive: [
                {breakpoint: 1300,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {breakpoint: 640,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {breakpoint: 460,
                    settings: {
                        slidesToShow: 3
                    }
                }
            ]

        });


        /* -----------
         *  SLIDER TARJETAS
         * ----------- */

        $('.credit-card-slider').slick({
            arrows: false,
            dots: false,
            fade: true,
            autoplaySpeed: 2000,
            slidesToShow: 1,
            autoplay: true,
            lazyLoad: 'progressive'

        });

        /* -----------
         *  SLIDER HOME
         * ----------- */


        $('#slider-worq-slides').slick({arrows: true, prevArrow: '#arrow-prev', nextArrow: '#arrow-next', dots: true, slidesToShow: 1, autoplay: true, adaptiveHeight: true});
        //$('#slider-worq-slides').slick({arrows: false, dots: false, appendDots: '#dots-container', slidesToShow: 1});



        /*
         * ABRIR VENTANA MP AUTOMATICAMENTE
         */

        if ($('#submit-payment').length) {


            var interval = setInterval(function () {

                if (typeof $MPC === 'function') {
                    var e = jQuery.Event('click');
                    e.target = jQuery('#submit-payment').get(0);
                    $MPC.fire(e);
                    clearInterval(interval);
                }

            }, 500);
        }
        /* -----------
         *  SECONDARY MENU DISPLAY
         * ----------- */

        $('#secondary-navigation-back , #secondary-navigation-back2, #secondary-nav-close').click(function () {

            $('#nav-secondary-toggle-bt').click();
        });

        $('#nav-secondary-toggle-bt').click(function () {

            var btMenu = $(this);
            var secondaryNav = $('#secondary-navigation')
            var navCols = secondaryNav.find('.col-nav-menu , #secondary-nav-special-cats-header li');
            var navColsLi = navCols.find('.sub-menu li');
            var menuBack = $('#secondary-navigation-back');
            if (!secondaryNav.hasClass('visible')) {

                if ($(window).width() < 640) {
                    $('body').addClass('no-scroll');
                }

                btMenu.addClass('active');
                menuBack.velocity('fadeIn', function () {
                    menuBack.addClass('visible');
                });
                secondaryNav.velocity('transition.slideDownIn', 200, function () {
                    secondaryNav.addClass('visible');
                });

                navCols.velocity('transition.expandIn', {
                    delay: 50,
                    duration: 80,
                    stagger: 100,
                    drag: true,
                    easing: "easeInOutBounce"
                });

            } else {

                if ($(window).width() < 640) {
                    $('body').removeClass('no-scroll');
                }

                menuBack.velocity('fadeOut', function () {
                    menuBack.removeClass('visible');
                });
                btMenu.removeClass('active');

                secondaryNav.velocity('transition.slideUpOut', 200, function () {
                    secondaryNav.removeClass('visible');
                });

                navCols.velocity('reverse');
            }


        });

        /* -----------
         *  SECONDARY NAV SUB MENU MOBILE
         * ----------- */

        $('.nav-secondary li .sub-menu li a').click(function (event) {

            if ($(window).width() < 640) {

                var subMenu = $(this);

                if (subMenu.siblings('.sub-menu').length) {
                    event.preventDefault();
                }

                if (subMenu.hasClass('active')) {

                    subMenu.siblings('.sub-menu').fadeOut(100);
                    subMenu.removeClass('active');
                    return false;
                }

                $('.nav-secondary li .sub-menu li a').removeClass('active');
                subMenu.addClass('active');

                if ($('.nav-secondary li .sub-menu li .sub-menu:visible').length) {

                    $('.nav-secondary li .sub-menu li .sub-menu:visible').fadeOut(100, function () {
                        subMenu.siblings('.sub-menu').fadeIn(200);

                    });
                } else {

                    subMenu.siblings('.sub-menu').fadeIn(200);
                }


            }

        });


        /* -----------
         *  HEADER FIXED
         * ----------- */

        /*
         * SCROLL SHOW NAV
         */


        var myEfficientFn = debounce(function () {
            var scrolledDistance = $(window).width() > 768 ? 600 : 200;

            var scrollTop = $(document).scrollTop();
            var body = $('body');
            if (scrollTop >= scrolledDistance) {
                body.addClass('nav-fixed');
            } else {
                body.removeClass('nav-fixed');
            }


            /* back top display*/

            var scrolledDistanceBackTop = 1000;
            var backTop = $('#back-top');
            if (scrollTop >= scrolledDistanceBackTop) {

                if (!backTop.hasClass('visible')) {
                    backTop.velocity('fadeIn');
                    backTop.addClass('visible');
                }

            } else {
                if (backTop.hasClass('visible')) {
                    backTop.velocity('fadeOut');
                    backTop.removeClass('visible');
                }

            }


        }, 10);

        window.addEventListener('scroll', myEfficientFn);





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

            $('#home-category-preview .category-list-products.active .pascal-product').velocity('transition.slideUpIn', {stagger: 100, duration: 250, drag: true});

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

            $('#home-products-bottom .category-list-products.active .pascal-product').velocity('transition.slideDownIn', {stagger: 100, duration: 250, drag: true});
        });

    });

})(jQuery);


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
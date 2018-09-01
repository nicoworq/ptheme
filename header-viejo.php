<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" />
        <?php wp_head(); ?>
        <!-- Facebook Pixel Code -->
        <script>
            !function (f, b, e, v, n, t, s)
            {
                if (f.fbq)
                    return;
                n = f.fbq = function () {
                    n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq)
                    f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '422312091292470');
            fbq('track', 'PageView');
        </script>
        <noscript>
    <img height="1" width="1" 
         src="https://www.facebook.com/tr?id=422312091292470&ev=PageView
         &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

 
</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <?php do_action('storefront_before_header'); ?>

        <header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e('Primary Navigation', 'storefront'); ?>">
                            <button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"><span><?php echo esc_attr(apply_filters('storefront_menu_toggle_text', __('Menu', 'storefront'))); ?></span></button>
                            <?php
                            wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container' => '',
                                        'menu_id' => 'nav-primary',
                                    //'walker'=> new example_nav_walker
                                    )
                            );
                            ?>
<!--                            <div class="fb-like-container">
                                <div class="fb-like" data-href="https://www.facebook.com/pascalcomputadoras/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                            </div>-->
<div class="numeros-header"><a href="tel:0341-4580888" class="">0341-4580888</a> / <a href="tel:4577177" class="">4577177</a> </div>
                        </nav><!-- #site-navigation -->



                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="site-branding">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/sitio/pascal-logo.svg'; ?>"  alt="<?php bloginfo('name'); ?>" />
                            </a>                   
                        </div>

                        <div class="header-contents">

                            <div class="nav-secondary-toggle">
                                <button id="nav-secondary-toggle-bt">
                                    <ul>
                                        <li><i>&nbsp;</i></li>
                                        <li><i>&nbsp;</i></li>
                                        <li><i>&nbsp;</i></li>
                                    </ul>
                                    <span>Menú</span>
                                </button>
                            </div>

                            <div class="site-search">
                                <?php //dynamic_sidebar( 'sidebar-header' );   ?>

                                <form role="search" method="get" id="form-search-header" class="wc_ps_form" data-ps-id="2" data-ps-cat_align="left" data-ps-cat_max_wide="30" data-ps-popup_wide="input_wide" data-ps-widget_template="sidebar" action="<?php echo site_url(); ?>">
                                    <input type="search" id="woocommerce-product-search-field" class="search-field" placeholder="Estoy buscando..." value="" name="s" title="Estoy buscando...">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve" >
                                        <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21  c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279  C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19  S32.459,40,21.983,40z" fill="#FFFFFF"/>

                                        </svg>
                                    </button>
                                    <input type="hidden" name="post_type" value="product">
                                </form>
                            </div>


                            <?php
                            if (is_cart()) {
                                $class = 'current-menu-item';
                            } else {
                                $class = '';
                            }
                            ?>
                            <ul class="site-header-cart menu">
                                <li class="cart-text">Carro</li>
                                <li class="<?php echo esc_attr($class); ?>">
                                    <?php storefront_cart_link(); ?>
                                </li>
                                <li class="cart-contents-pascal">
                                    <?php the_widget('WC_Widget_Cart', 'title='); ?>
                                </li>
                            </ul>
                            <div id="site-redes">
                                <a href="https://www.instagram.com/pascal_computadoras/" target="blank" class="instagram-header">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
                                    <g>

                                    <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                    <stop  offset="0" style="stop-color:#E09B3D"/>
                                    <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                    <stop  offset="0.6" style="stop-color:#C21975"/>
                                    <stop  offset="1" style="stop-color:#7024C4"/>
                                    </linearGradient>
                                    <path style="fill:url(#SVGID_1_);" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722
                                          c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156
                                          C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156
                                          c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722
                                          c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z"/>

                                    <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.57" x2="275.517" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                    <stop  offset="0" style="stop-color:#E09B3D"/>
                                    <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                    <stop  offset="0.6" style="stop-color:#C21975"/>
                                    <stop  offset="1" style="stop-color:#7024C4"/>
                                    </linearGradient>
                                    <path style="fill:url(#SVGID_2_);" d="M275.517,133C196.933,133,133,196.933,133,275.516s63.933,142.517,142.517,142.517
                                          S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6c-48.095,0-87.083-38.988-87.083-87.083
                                          s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083C362.6,323.611,323.611,362.6,275.517,362.6z"/>

                                    <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="418.31" y1="4.57" x2="418.31" y2="549.72" gradientTransform="matrix(1 0 0 -1 0 554)">
                                    <stop  offset="0" style="stop-color:#E09B3D"/>
                                    <stop  offset="0.3" style="stop-color:#C74C4D"/>
                                    <stop  offset="0.6" style="stop-color:#C21975"/>
                                    <stop  offset="1" style="stop-color:#7024C4"/>
                                    </linearGradient>
                                    <circle style="fill:url(#SVGID_3_);" cx="418.31" cy="134.07" r="34.15"/>
                                    </g>

                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/pascalcomputadoras/" class="facebook-header" target="blank">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 408.788 408.788" style="enable-background:new 0 0 408.788 408.788;" xml:space="preserve">
                                    <path style="fill:#475993;" d="M353.701,0H55.087C24.665,0,0.002,24.662,0.002,55.085v298.616c0,30.423,24.662,55.085,55.085,55.085
                                          h147.275l0.251-146.078h-37.951c-4.932,0-8.935-3.988-8.954-8.92l-0.182-47.087c-0.019-4.959,3.996-8.989,8.955-8.989h37.882
                                          v-45.498c0-52.8,32.247-81.55,79.348-81.55h38.65c4.945,0,8.955,4.009,8.955,8.955v39.704c0,4.944-4.007,8.952-8.95,8.955
                                          l-23.719,0.011c-25.615,0-30.575,12.172-30.575,30.035v39.389h56.285c5.363,0,9.524,4.683,8.892,10.009l-5.581,47.087
                                          c-0.534,4.506-4.355,7.901-8.892,7.901h-50.453l-0.251,146.078h87.631c30.422,0,55.084-24.662,55.084-55.084V55.085
                                          C408.786,24.662,384.124,0,353.701,0z"/>

                                    </svg>

                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div id="secondary-navigation-back"></div>
            <nav id="secondary-navigation" role="navigation" aria-label="<?php esc_html_e('Secondary Navigation', 'storefront'); ?>">                    

                <div id="secondary-navigation-back2"></div>

                <div class="container">                      
                    <div class="row">
                        <div class="col-md-12">



                            <div id="secondary-nav-container">
                                <div id="secondary-nav-close">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" viewBox="0 0 95.939 95.939" x="0px" y="0px" width="10px" height="10px"xml:space="preserve">
                                    <g>
                                    <path d="M62.819,47.97l32.533-32.534c0.781-0.781,0.781-2.047,0-2.828L83.333,0.586C82.958,0.211,82.448,0,81.919,0   c-0.53,0-1.039,0.211-1.414,0.586L47.97,33.121L15.435,0.586c-0.75-0.75-2.078-0.75-2.828,0L0.587,12.608   c-0.781,0.781-0.781,2.047,0,2.828L33.121,47.97L0.587,80.504c-0.781,0.781-0.781,2.047,0,2.828l12.02,12.021   c0.375,0.375,0.884,0.586,1.414,0.586c0.53,0,1.039-0.211,1.414-0.586L47.97,62.818l32.535,32.535   c0.375,0.375,0.884,0.586,1.414,0.586c0.529,0,1.039-0.211,1.414-0.586l12.02-12.021c0.781-0.781,0.781-2.048,0-2.828L62.819,47.97   z"/>
                                    </g>
                                    </svg>
                                </div>


                                <?php
                                wp_nav_menu(
                                        array(
                                            'theme_location' => 'primary',
                                            'container' => '',
                                            'menu_id' => 'nav-primary-mobile',
                                        )
                                );
                                ?>


                                <?php
                                wp_nav_menu(
                                        array(
                                            'theme_location' => 'secondary',
                                            'container' => '',
                                            'menu_id' => 'nav-secondary-head',
                                            'menu_class' => 'nav-secondary'
                                        )
                                );

                                $args = array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => 0
                                );
                                $c = get_categories($args);

                                $catsMagic = array();
                                foreach ($c as $cat) {
                                    $catEspecial = get_field('categoria_especial', $cat);
                                    if ($catEspecial) {
                                        $catsMagic[] = $cat;
                                    }
                                }
                                ?><ul class="secondary-nav-special-cats" id="secondary-nav-special-cats-header">
                                <?php
                                foreach ($catsMagic as $cat) {
                                    $color = get_field('color_categoria', $cat);
                                    $link = esc_url(get_term_link($cat));
                                    $img = get_field('imagen_categoria_menu', $cat);
                                    echo "<li>"
                                    . "<a href='{$link}' style='background-color:{$color}' title='{$cat->name}'>"
                                    . "<div class='cat-especial-header-bg' style='background-image:url({$img['sizes']['medium']});'></div><span>{$cat->name}</span></a>"
                                    . "</li>";
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </nav><!-- #site-navigation -->

        </header><!-- #masthead -->

        <?php
        /**
         * Functions hooked in to storefront_before_content
         *
         * @hooked storefront_header_widget_region - 10
         */
        do_action('storefront_before_content');
        ?>

        <div id="content" class="site-content" tabindex="-1">


            <?php
            /**
             * Functions hooked in to storefront_content_top
             *
             * @hooked woocommerce_breadcrumb - 10
             */
            do_action('storefront_content_top');
            
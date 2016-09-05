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

        <?php wp_head(); ?>
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

                                <div class="fb-like-container">
                                    <div class="fb-like" data-href="https://www.facebook.com/pascalcomputadoras/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                                </div>


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
                                    <form role="search" method="get" id="form-search-header" action="<?php echo site_url(); ?>">
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
                                        echo "<li><a href='{$link}' style='background-color:{$color}'>{$cat->name}</a></li>";
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
                
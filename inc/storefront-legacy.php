<?php


/**
 * Storefront  functions.
 *
 * @package storefront
 */

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.4.6
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function storefront_do_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

/**
 * Get the content background color
 * Accounts for the Storefront Designer's content background option.
 *
 * @since  1.6.0
 * @return string the background color
 */
function storefront_get_content_background_color() {
	// Set the bg color var based on whether the Storefront designer has set a content bg color or not.
	$content_bg_color = get_theme_mod( 'sd_content_background_color' );
	$content_frame    = get_theme_mod( 'sd_fixed_width' );

	// Set the bg color based on the default theme option.
	$bg_color = str_replace( '#', '', get_theme_mod( 'background_color' ) );

	// But if the Storefront Designer extension is active, and the content frame option is enabled we need that bg color instead.
	if ( $content_bg_color && 'true' == $content_frame && class_exists( 'Storefront_Designer' ) ) {
		$bg_color = str_replace( '#', '', $content_bg_color );
	}

	return '#' . $bg_color;
}

/**
 * Apply inline style to the Storefront header.
 *
 * @uses  get_header_image()
 * @since  2.0.0
 */
function storefront_header_styles() {
	$is_header_image = get_header_image();

	if ( $is_header_image ) {
		$header_bg_image = 'url(' . esc_url( $is_header_image ) . ')';
	} else {
		$header_bg_image = 'none';
	}

	$styles = apply_filters( 'storefront_header_styles', array(
		'background-image' => $header_bg_image,
	) );

	foreach ( $styles as $style => $value ) {
		echo esc_attr( $style . ': ' . $value . '; ' );
	}
}

/**
 * Adjust a hex color brightness
 * Allows us to create hover styles for custom link colors
 *
 * @param  strong  $hex   hex color e.g. #111111.
 * @param  integer $steps factor by which to brighten/darken ranging from -255 (darken) to 255 (brighten).
 * @return string        brightened/darkened hex color
 * @since  1.0.0
 */
function storefront_adjust_color_brightness( $hex, $steps ) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter.
	$steps  = max( -255, min( 255, $steps ) );

	// Format the hex color string.
	$hex    = str_replace( '#', '', $hex );

	if ( 3 == strlen( $hex ) ) {
		$hex    = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
	}

	// Get decimal values.
	$r  = hexdec( substr( $hex, 0, 2 ) );
	$g  = hexdec( substr( $hex, 2, 2 ) );
	$b  = hexdec( substr( $hex, 4, 2 ) );

	// Adjust number of steps and keep it inside 0 to 255.
	$r  = max( 0, min( 255, $r + $steps ) );
	$g  = max( 0, min( 255, $g + $steps ) );
	$b  = max( 0, min( 255, $b + $steps ) );

	$r_hex  = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
	$g_hex  = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
	$b_hex  = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

	return '#' . $r_hex . $g_hex . $b_hex;
}

/**
 * Sanitizes choices (selects / radios)
 * Checks that the input matches one of the available choices
 *
 * @param array $input the available choices.
 * @param array $setting the setting object.
 * @since  1.3.0
 */
function storefront_sanitize_choices( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 * @since  1.5.0
 */
function storefront_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Sanitizes the layout setting
 *
 * Ensures only array keys matching the original settings specified in add_control() are valid
 *
 * @param array $input the layout options.
 * @since 1.0.3
 */
function storefront_sanitize_layout( $input ) {
	_deprecated_function( 'storefront_sanitize_layout', '2.0', 'storefront_sanitize_choices' );

	$valid = array(
		'right' => 'Right',
		'left'  => 'Left',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Storefront Sanitize Hex Color
 *
 * @param string $color The color as a hex.
 * @todo remove in 2.1.
 */
function storefront_sanitize_hex_color( $color ) {
	_deprecated_function( 'storefront_sanitize_hex_color', '2.0', 'sanitize_hex_color' );

	if ( '' === $color ) {
		return '';
	}

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}

	return null;
}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 * @todo remove in 2.1.
 */
function storefront_categorized_blog() {
	_deprecated_function( 'storefront_categorized_blog', '2.0' );

	if ( false === ( $all_the_cool_cats = get_transient( 'storefront_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'storefront_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so storefront_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so storefront_categorized_blog should return false.
		return false;
	}
}


/**
 * Storefront template functions.
 *
 * @package storefront
 */
if (!function_exists('storefront_display_comments')) {

    /**
     * Storefront display comments
     *
     * @since  1.0.0
     */
    function storefront_display_comments() {
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || '0' != get_comments_number()) :
            comments_template();
        endif;
    }

}

if (!function_exists('storefront_comment')) {

    /**
     * Storefront comment template
     *
     * @param array $comment the comment array.
     * @param array $args the comment args.
     * @param int   $depth the comment depth.
     * @since 1.0.0
     */
    function storefront_comment($comment, $args, $depth) {
        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo esc_attr($tag); ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
        <div class="comment-body">
            <div class="comment-meta commentmetadata">
                <div class="comment-author vcard">
                    <?php echo get_avatar($comment, 128); ?>
                    <?php printf(wp_kses_post('<cite class="fn">%s</cite>', 'storefront'), get_comment_author_link()); ?>
                </div>
                <?php if ('0' == $comment->comment_approved) : ?>
                    <em class="comment-awaiting-moderation"><?php esc_attr_e('Your comment is awaiting moderation.', 'storefront'); ?></em>
                    <br />
                <?php endif; ?>

                <a href="<?php echo esc_url(htmlspecialchars(get_comment_link($comment->comment_ID))); ?>" class="comment-date">
                    <?php echo '<time>' . get_comment_date() . '</time>'; ?>
                </a>
            </div>
            <?php if ('div' != $args['style']) : ?>
                <div id="div-comment-<?php comment_ID() ?>" class="comment-content">
                <?php endif; ?>
                <div class="comment-text">
                    <?php comment_text(); ?>
                </div>
                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    <?php edit_comment_link(__('Edit', 'storefront'), '  ', ''); ?>
                </div>
            </div>
            <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif; ?>
        <?php
    }

}

if (!function_exists('storefront_footer_widgets')) {

    /**
     * Display the footer widget regions
     *
     * @since  1.0.0
     * @return  void
     */
    function storefront_footer_widgets() {
        if (is_active_sidebar('footer-4')) {
            $widget_columns = apply_filters('storefront_footer_widget_regions', 4);
        } elseif (is_active_sidebar('footer-3')) {
            $widget_columns = apply_filters('storefront_footer_widget_regions', 3);
        } elseif (is_active_sidebar('footer-2')) {
            $widget_columns = apply_filters('storefront_footer_widget_regions', 2);
        } elseif (is_active_sidebar('footer-1')) {
            $widget_columns = apply_filters('storefront_footer_widget_regions', 1);
        } else {
            $widget_columns = apply_filters('storefront_footer_widget_regions', 0);
        }

        if ($widget_columns > 0) :
            ?>

            <section class="footer-widgets col-<?php echo intval($widget_columns); ?> fix">

                <?php
                $i = 0;
                while ($i < $widget_columns) : $i++;
                    if (is_active_sidebar('footer-' . $i)) :
                        ?>

                        <section class="block footer-widget-<?php echo intval($i); ?>">
                            <?php dynamic_sidebar('footer-' . intval($i)); ?>
                        </section>

                        <?php
                    endif;
                endwhile;
                ?>

            </section><!-- /.footer-widgets  -->

            <?php
        endif;
    }

}

if (!function_exists('storefront_credit')) {

    /**
     * Display the theme credit
     *
     * @since  1.0.0
     * @return void
     */
    function storefront_credit() {
        ?>
        <div class="site-info">
            <?php echo esc_html(apply_filters('storefront_copyright_text', $content = '&copy; ' . get_bloginfo('name') . ' ' . date('Y'))); ?>
            <?php if (apply_filters('storefront_credit_link', true)) { ?>
                <br /> <?php printf(esc_attr__('%1$s designed by %2$s.', 'storefront'), 'Storefront', '<a href="http://www.woothemes.com" alt="Premium WordPress Themes & Plugins by WooThemes" title="Premium WordPress Themes & Plugins by WooThemes" rel="designer">WooThemes</a>'); ?>
            <?php } ?>
        </div><!-- .site-info -->
        <?php
    }

}

if (!function_exists('storefront_header_widget_region')) {

    /**
     * Display header widget region
     *
     * @since  1.0.0
     */
    function storefront_header_widget_region() {
        if (is_active_sidebar('header-1')) {
            ?>
            <div class="header-widget-region" role="complementary">
                <div class="col-full">
                    <?php dynamic_sidebar('header-1'); ?>
                </div>
            </div>
            <?php
        }
    }

}

if (!function_exists('storefront_site_branding')) {

    /**
     * Display Site Branding
     *
     * @since  1.0.0
     * @return void
     */
    function storefront_site_branding() {
        if (function_exists('the_custom_logo') && has_custom_logo()) {
            the_custom_logo();
        } elseif (function_exists('jetpack_has_site_logo') && jetpack_has_site_logo()) {
            jetpack_the_site_logo();
        } else {
            ?>
            <div class="site-branding">
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php if ('' != get_bloginfo('description')) { ?>
                    <p class="site-description"><?php echo bloginfo('description'); ?></p>
                <?php } ?>
            </div>
            <?php
        }
    }

}

if (!function_exists('storefront_primary_navigation')) {

    /**
     * Display Primary Navigation
     *
     * @since  1.0.0
     * @return void
     */
    function storefront_primary_navigation() {
        ?>
        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e('Primary Navigation', 'storefront'); ?>">
            <button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"><span><?php echo esc_attr(apply_filters('storefront_menu_toggle_text', __('Menu', 'storefront'))); ?></span></button>
            <?php
            wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container_class' => 'primary-navigation',
                    )
            );

            wp_nav_menu(
                    array(
                        'theme_location' => 'handheld',
                        'container_class' => 'handheld-navigation',
                    )
            );
            ?>
        </nav><!-- #site-navigation -->
        <?php
    }

}

if (!function_exists('storefront_secondary_navigation')) {

    /**
     * Display Secondary Navigation
     *
     * @since  1.0.0
     * @return void
     */
    function storefront_secondary_navigation() {
        ?>
        <nav class="secondary-navigation" role="navigation" aria-label="<?php esc_html_e('Secondary Navigation', 'storefront'); ?>">
            <?php
            wp_nav_menu(
                    array(
                        'theme_location' => 'secondary',
                        'fallback_cb' => '',
                    )
            );
            ?>
        </nav><!-- #site-navigation -->
        <?php
    }

}

if (!function_exists('storefront_skip_links')) {

    /**
     * Skip links
     *
     * @since  1.4.1
     * @return void
     */
    function storefront_skip_links() {
        ?>
        <a class="skip-link screen-reader-text" href="#site-navigation"><?php esc_attr_e('Skip to navigation', 'storefront'); ?></a>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_attr_e('Skip to content', 'storefront'); ?></a>
        <?php
    }

}

if (!function_exists('storefront_page_header')) {

    /**
     * Display the post header with a link to the single post
     *
     * @since 1.0.0
     */
    function storefront_page_header() {
        ?>
        <header class="entry-header">
            <?php
            storefront_post_thumbnail('full');
            the_title('<h1 class="entry-title">', '</h1>');
            ?>
        </header><!-- .entry-header -->
        <?php
    }

}

if (!function_exists('storefront_page_content')) {

    /**
     * Display the post content with a link to the single post
     *
     * @since 1.0.0
     */
    function storefront_page_content() {
        ?>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'storefront'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
        <?php
    }

}

if (!function_exists('storefront_post_header')) {

    /**
     * Display the post header with a link to the single post
     *
     * @since 1.0.0
     */
    function storefront_post_header() {
        ?>
        <header class="entry-header">
            <?php
            if (is_single()) {
                storefront_posted_on();
                the_title('<h1 class="entry-title">', '</h1>');
            } else {
                if ('post' == get_post_type()) {
                    storefront_posted_on();
                }

                the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>');
            }
            ?>
        </header><!-- .entry-header -->
        <?php
    }

}

if (!function_exists('storefront_post_content')) {

    /**
     * Display the post content with a link to the single post
     *
     * @since 1.0.0
     */
    function storefront_post_content() {
        ?>
        <div class="entry-content">
            <?php
            storefront_post_thumbnail('full');

            the_content(
                    sprintf(
                            __('Continue reading %s', 'storefront'), '<span class="screen-reader-text">' . get_the_title() . '</span>'
                    )
            );

            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'storefront'),
                'after' => '</div>',
            ));
            ?>
        </div><!-- .entry-content -->
        <?php
    }

}

if (!function_exists('storefront_post_meta')) {

    /**
     * Display the post meta
     *
     * @since 1.0.0
     */
    function storefront_post_meta() {
        ?>
        <aside class="entry-meta">
            <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search.
                ?>
                <div class="author">
                    <?php
                    echo get_avatar(get_the_author_meta('ID'), 128);
                    echo '<div class="label">' . esc_attr(__('Written by', 'storefront')) . '</div>';
                    the_author_posts_link();
                    ?>
                </div>
                <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list(__(', ', 'storefront'));

                if ($categories_list) :
                    ?>
                    <div class="cat-links">
                        <?php
                        echo '<div class="label">' . esc_attr(__('Posted in', 'storefront')) . '</div>';
                        echo wp_kses_post($categories_list);
                        ?>
                    </div>
                <?php endif; // End if categories.  ?>

                <?php
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', __(', ', 'storefront'));

                if ($tags_list) :
                    ?>
                    <div class="tags-links">
                        <?php
                        echo '<div class="label">' . esc_attr(__('Tagged', 'storefront')) . '</div>';
                        echo wp_kses_post($tags_list);
                        ?>
                    </div>
                <?php endif; // End if $tags_list.  ?>

            <?php endif; // End if 'post' == get_post_type().  ?>

            <?php if (!post_password_required() && ( comments_open() || '0' != get_comments_number() )) : ?>
                <div class="comments-link">
                    <?php echo '<div class="label">' . esc_attr(__('Comments', 'storefront')) . '</div>'; ?>
                    <span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'storefront'), __('1 Comment', 'storefront'), __('% Comments', 'storefront')); ?></span>
                </div>
            <?php endif; ?>
        </aside>
        <?php
    }

}

if (!function_exists('storefront_paging_nav')) {

    /**
     * Display navigation to next/previous set of posts when applicable.
     */
    function storefront_paging_nav() {
        global $wp_query;

        $args = array(
            'type' => 'list',
            'next_text' => _x('Next', 'Next post', 'storefront'),
            'prev_text' => _x('Previous', 'Previous post', 'storefront'),
        );

        the_posts_pagination($args);
    }

}

if (!function_exists('storefront_post_nav')) {

    /**
     * Display navigation to next/previous post when applicable.
     */
    function storefront_post_nav() {
        $args = array(
            'next_text' => '%title',
            'prev_text' => '%title',
        );
        the_post_navigation($args);
    }

}

if (!function_exists('storefront_posted_on')) {

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function storefront_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
                _x('Posted on %s', 'post date', 'storefront'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo wp_kses(apply_filters('storefront_single_post_posted_on_html', '<span class="posted-on">' . $posted_on . '</span>', $posted_on), array(
            'span' => array(
                'class' => array(),
            ),
            'a' => array(
                'href' => array(),
                'title' => array(),
                'rel' => array(),
            ),
            'time' => array(
                'datetime' => array(),
                'class' => array(),
            ),
        ));
    }

}

if (!function_exists('storefront_product_categories')) {

    /**
     * Display Product Categories
     * Hooked into the `homepage` action in the homepage template
     *
     * @since  1.0.0
     * @param array $args the product section args.
     * @return void
     */
    function storefront_product_categories($args) {

        if (is_woocommerce_activated()) {

            $args = apply_filters('storefront_product_categories_args', array(
                'limit' => 3,
                'columns' => 3,
                'child_categories' => 0,
                'orderby' => 'name',
                'title' => __('Shop by Category', 'storefront'),
            ));

            echo '<section class="storefront-product-section storefront-product-categories">';

            do_action('storefront_homepage_before_product_categories');

            echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';

            do_action('storefront_homepage_after_product_categories_title');

            echo storefront_do_shortcode('product_categories', array(
                'number' => intval($args['limit']),
                'columns' => intval($args['columns']),
                'orderby' => esc_attr($args['orderby']),
                'parent' => esc_attr($args['child_categories']),
            ));

            do_action('storefront_homepage_after_product_categories');

            echo '</section>';
        }
    }

}

if (!function_exists('storefront_recent_products')) {

    /**
     * Display Recent Products
     * Hooked into the `homepage` action in the homepage template
     *
     * @since  1.0.0
     * @param array $args the product section args.
     * @return void
     */
    function storefront_recent_products($args) {

        if (is_woocommerce_activated()) {

            $args = apply_filters('storefront_recent_products_args', array(
                'limit' => 4,
                'columns' => 4,
                'title' => __('New In', 'storefront'),
            ));

            echo '<section class="storefront-product-section storefront-recent-products">';

            do_action('storefront_homepage_before_recent_products');

            echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';

            do_action('storefront_homepage_after_recent_products_title');

            echo storefront_do_shortcode('recent_products', array(
                'per_page' => intval($args['limit']),
                'columns' => intval($args['columns']),
            ));

            do_action('storefront_homepage_after_recent_products');

            echo '</section>';
        }
    }

}

if (!function_exists('storefront_featured_products')) {

    /**
     * Display Featured Products
     * Hooked into the `homepage` action in the homepage template
     *
     * @since  1.0.0
     * @param array $args the product section args.
     * @return void
     */
    function storefront_featured_products($args) {

        if (is_woocommerce_activated()) {

            $args = apply_filters('storefront_featured_products_args', array(
                'limit' => 4,
                'columns' => 4,
                'orderby' => 'date',
                'order' => 'desc',
                'title' => __('We Recommend', 'storefront'),
            ));

            echo '<section class="storefront-product-section storefront-featured-products">';

            do_action('storefront_homepage_before_featured_products');

            echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';

            do_action('storefront_homepage_after_featured_products_title');

            echo storefront_do_shortcode('featured_products', array(
                'per_page' => intval($args['limit']),
                'columns' => intval($args['columns']),
                'orderby' => esc_attr($args['orderby']),
                'order' => esc_attr($args['order']),
            ));

            do_action('storefront_homepage_after_featured_products');

            echo '</section>';
        }
    }

}

if (!function_exists('storefront_popular_products')) {

    /**
     * Display Popular Products
     * Hooked into the `homepage` action in the homepage template
     *
     * @since  1.0.0
     * @param array $args the product section args.
     * @return void
     */
    function storefront_popular_products($args) {

        if (is_woocommerce_activated()) {

            $args = apply_filters('storefront_popular_products_args', array(
                'limit' => 4,
                'columns' => 4,
                'title' => __('Fan Favorites', 'storefront'),
            ));

            echo '<section class="storefront-product-section storefront-popular-products">';

            do_action('storefront_homepage_before_popular_products');

            echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';

            do_action('storefront_homepage_after_popular_products_title');

            echo storefront_do_shortcode('top_rated_products', array(
                'per_page' => intval($args['limit']),
                'columns' => intval($args['columns']),
            ));

            do_action('storefront_homepage_after_popular_products');

            echo '</section>';
        }
    }

}

if (!function_exists('storefront_on_sale_products')) {

    /**
     * Display On Sale Products
     * Hooked into the `homepage` action in the homepage template
     *
     * @param array $args the product section args.
     * @since  1.0.0
     * @return void
     */
    function storefront_on_sale_products($args) {

        if (is_woocommerce_activated()) {

            $args = apply_filters('storefront_on_sale_products_args', array(
                'limit' => 4,
                'columns' => 4,
                'title' => __('On Sale', 'storefront'),
            ));

            echo '<section class="storefront-product-section storefront-on-sale-products">';

            do_action('storefront_homepage_before_on_sale_products');

            echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';

            do_action('storefront_homepage_after_on_sale_products_title');

            echo storefront_do_shortcode('sale_products', array(
                'per_page' => intval($args['limit']),
                'columns' => intval($args['columns']),
            ));

            do_action('storefront_homepage_after_on_sale_products');

            echo '</section>';
        }
    }

}

if (!function_exists('storefront_best_selling_products')) {

    /**
     * Display Best Selling Products
     * Hooked into the `homepage` action in the homepage template
     *
     * @since 2.0.0
     * @param array $args the product section args.
     * @return void
     */
    function storefront_best_selling_products($args) {
        if (is_woocommerce_activated()) {
            $args = apply_filters('storefront_best_selling_products_args', array(
                'limit' => 4,
                'columns' => 4,
                'title' => esc_attr__('Best Sellers', 'storefront'),
            ));
            echo '<section class="storefront-product-section storefront-best-selling-products">';
            do_action('storefront_homepage_before_best_selling_products');
            echo '<h2 class="section-title">' . wp_kses_post($args['title']) . '</h2>';
            do_action('storefront_homepage_after_best_selling_products_title');
            echo storefront_do_shortcode('best_selling_products', array(
                'per_page' => intval($args['limit']),
                'columns' => intval($args['columns']),
            ));
            do_action('storefront_homepage_after_best_selling_products');
            echo '</section>';
        }
    }

}

if (!function_exists('storefront_homepage_content')) {

    /**
     * Display homepage content
     * Hooked into the `homepage` action in the homepage template
     *
     * @since  1.0.0
     * @return  void
     */
    function storefront_homepage_content() {
        while (have_posts()) {
            the_post();

            get_template_part('content', 'page');
        } // end of the loop.
    }

}

if (!function_exists('storefront_social_icons')) {

    /**
     * Display social icons
     * If the subscribe and connect plugin is active, display the icons.
     *
     * @link http://wordpress.org/plugins/subscribe-and-connect/
     * @since 1.0.0
     */
    function storefront_social_icons() {
        if (class_exists('Subscribe_And_Connect')) {
            echo '<div class="subscribe-and-connect-connect">';
            subscribe_and_connect_connect();
            echo '</div>';
        }
    }

}

if (!function_exists('storefront_get_sidebar')) {

    /**
     * Display storefront sidebar
     *
     * @uses get_sidebar()
     * @since 1.0.0
     */
    function storefront_get_sidebar() {
        get_sidebar();
    }

}

if (!function_exists('storefront_post_thumbnail')) {

    /**
     * Display post thumbnail
     *
     * @var $size thumbnail size. thumbnail|medium|large|full|$custom
     * @uses has_post_thumbnail()
     * @uses the_post_thumbnail
     * @param string $size the post thumbnail size.
     * @since 1.5.0
     */
    function storefront_post_thumbnail($size) {
        if (has_post_thumbnail()) {
            the_post_thumbnail($size);
        }
    }

}

/**
 * The primary navigation wrapper
 */
function storefront_primary_navigation_wrapper() {
    echo '<section class="storefront-primary-navigation">';
}

/**
 * The primary navigation wrapper close
 */
function storefront_primary_navigation_wrapper_close() {
    echo '</section>';
}

if (!function_exists('storefront_init_structured_data')) {

    /**
     * Generate the structured data...
     * Initialize Storefront::$structured_data via Storefront::set_structured_data()...
     * Hooked into:
     * `storefront_loop_post`
     * `storefront_single_post`
     * `storefront_page`
     * Apply `storefront_structured_data` filter hook for structured data customization :)
     */
    function storefront_init_structured_data() {
        if (is_home() || is_category() || is_date() || is_search() || is_single() && ( is_woocommerce_activated() && !is_woocommerce() )) {
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'normal');
            $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');

            $json['@type'] = 'BlogPosting';

            $json['mainEntityOfPage'] = array(
                '@type' => 'webpage',
                '@id' => get_the_permalink(),
            );

            $json['image'] = array(
                '@type' => 'ImageObject',
                'url' => $image[0],
                'width' => $image[1],
                'height' => $image[2],
            );

            $json['publisher'] = array(
                '@type' => 'organization',
                'name' => get_bloginfo('name'),
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => $logo[0],
                    'width' => $logo[1],
                    'height' => $logo[2],
                ),
            );

            $json['author'] = array(
                '@type' => 'person',
                'name' => get_the_author(),
            );

            $json['datePublished'] = get_post_time('c');
            $json['dateModified'] = get_the_modified_date('c');
            $json['name'] = get_the_title();
            $json['headline'] = get_the_title();
            $json['description'] = get_the_excerpt();
        } elseif (is_page()) {
            $json['@type'] = 'WebPage';
            $json['url'] = get_the_permalink();
            $json['name'] = get_the_title();
            $json['description'] = get_the_excerpt();
        }

        if (isset($json)) {
            Storefront::set_structured_data(apply_filters('storefront_structured_data', $json));
        }
    }

}


/**
 * Storefront hooks
 *
 * @package storefront
 */

/**
 * General
 *
 * @see  storefront_header_widget_region()
 * @see  storefront_get_sidebar()
 */
add_action( 'storefront_before_content', 'storefront_header_widget_region', 10 );
add_action( 'storefront_sidebar',        'storefront_get_sidebar',          10 );

/**
 * Header
 *
 * @see  storefront_skip_links()
 * @see  storefront_secondary_navigation()
 * @see  storefront_site_branding()
 * @see  storefront_primary_navigation()
 */

/*
add_action( 'storefront_header', 'storefront_skip_links',                       0 );
add_action( 'storefront_header', 'storefront_site_branding',                    20 );
add_action( 'storefront_header', 'storefront_secondary_navigation',             30 );
add_action( 'storefront_header', 'storefront_primary_navigation_wrapper',       42 );
add_action( 'storefront_header', 'storefront_primary_navigation',               50 );
add_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );
*/
/**
 * Footer
 *
 * @see  storefront_footer_widgets()
 * @see  storefront_credit()
 */
add_action( 'storefront_footer', 'storefront_footer_widgets', 10 );
add_action( 'storefront_footer', 'storefront_credit',         20 );

/**
 * Homepage
 *
 * @see  storefront_homepage_content()
 * @see  storefront_product_categories()
 * @see  storefront_recent_products()
 * @see  storefront_featured_products()
 * @see  storefront_popular_products()
 * @see  storefront_on_sale_products()
 * @see  storefront_best_selling_products()
 */
add_action( 'homepage', 'storefront_homepage_content',      10 );
add_action( 'homepage', 'storefront_product_categories',    20 );
add_action( 'homepage', 'storefront_recent_products',       30 );
add_action( 'homepage', 'storefront_featured_products',     40 );
add_action( 'homepage', 'storefront_popular_products',      50 );
add_action( 'homepage', 'storefront_on_sale_products',      60 );
add_action( 'homepage', 'storefront_best_selling_products', 70 );

/**
 * Posts
 *
 * @see  storefront_post_header()
 * @see  storefront_post_meta()
 * @see  storefront_post_content()
 * @see  storefront_init_structured_data()
 * @see  storefront_paging_nav()
 * @see  storefront_single_post_header()
 * @see  storefront_post_nav()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_loop_post',         'storefront_post_header',          10 );
add_action( 'storefront_loop_post',         'storefront_post_meta',            20 );
add_action( 'storefront_loop_post',         'storefront_post_content',         30 );
add_action( 'storefront_loop_post',         'storefront_init_structured_data', 40 );
add_action( 'storefront_loop_after',        'storefront_paging_nav',           10 );
add_action( 'storefront_single_post',       'storefront_post_header',          10 );
add_action( 'storefront_single_post',       'storefront_post_meta',            20 );
add_action( 'storefront_single_post',       'storefront_post_content',         30 );
add_action( 'storefront_single_post',       'storefront_init_structured_data', 40 );
add_action( 'storefront_single_post_after', 'storefront_post_nav',             10 );
add_action( 'storefront_single_post_after', 'storefront_display_comments',     20 );

/**
 * Pages
 *
 * @see  storefront_page_header()
 * @see  storefront_page_content()
 * @see  storefront_init_structured_data()
 * @see  storefront_display_comments()
 */
add_action( 'storefront_page',       'storefront_page_header',          10 );
add_action( 'storefront_page',       'storefront_page_content',         20 );
add_action( 'storefront_page',       'storefront_init_structured_data', 30 );
add_action( 'storefront_page_after', 'storefront_display_comments',     10 );

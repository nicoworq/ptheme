<?php
/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    /**
     * Functions hooked in to storefront_loop_post action.
     *
     * @hooked storefront_post_header          - 10
     * @hooked storefront_post_meta            - 20
     * @hooked storefront_post_content         - 30
     * @hooked storefront_init_structured_data - 40
     */
    //do_action( 'storefront_loop_post' );
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

    <div class="entry-content">

        <?php
        $urlThumb = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full');
        ?>

        <div class="entry-thumbnail" style="background-image: url(<?php echo $urlThumb; ?>);"></div>

        <?php
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
storefront_init_structured_data();
?>

</article><!-- #post-## -->



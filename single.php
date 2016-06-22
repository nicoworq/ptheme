<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="primary" class="content-area worq-singlepage">
                <main id="main" class="site-main" role="main">

                    <?php
                    while (have_posts()) : the_post();

                        do_action('storefront_single_post_before');

                        get_template_part('content', 'single');

                        /**
                         * Functions hooked in to storefront_single_post_after action
                         *
                         * @hooked storefront_post_nav         - 10
                         * @hooked storefront_display_comments - 20
                         */
                        do_action('storefront_single_post_after');

                    endwhile; // End of the loop. 
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->


            <?php
            do_action('storefront_sidebar');
            ?>


        </div>
    </div>
</div>
<?php
get_footer();
?>
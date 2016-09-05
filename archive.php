<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storefront
 *
 */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section id="primary" class="content-area blog-page">
                <main id="main" class="site-main" role="main">

                    <?php
                    if (have_posts()) :


                        get_template_part('loop');

                    else :

                        get_template_part('content', 'none');

                    endif;
                    ?>

                </main><!-- #main -->
            </section><!-- #primary -->
            <?php do_action('storefront_sidebar'); ?>
        </div>
    </div>
</div>



<?php
get_footer();

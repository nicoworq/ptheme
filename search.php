<?php
/**
 * The template for displaying search results pages.
 *
 * @package storefront
 */
get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <section id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <?php if (have_posts()) : ?>

                        <header class="page-header">
                            <h1 class="page-title"><?php printf(esc_attr__('Search Results for: %s', 'storefront'),  get_search_query() ); ?></h1>
                        </header><!-- .page-header -->

                        <?php
                        get_template_part('loop');

                    else :

                        get_template_part('content', 'none');

                    endif;
                    ?>

                </main><!-- #main -->
            </section><!-- #primary -->
            <?php do_action('storefront_sidebar');?>
        </div>
    </div>
</div>


<?php

get_footer();

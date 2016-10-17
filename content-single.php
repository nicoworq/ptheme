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

        <div class="entry-thumbnail">
            <div class="entry-thumbnail-bg"  style="background-image: url(<?php echo $urlThumb; ?>);"></div>
        </div>

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

    <div class="blog-post__share">
        <h5>Compartir en redes sociales</h5>
        <a class="btn btn--sm bg--facebook compartir-nota-fb" href="#">
            <span class="btn__text">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="16px" height="15px" viewBox="0 0 430.113 430.114" style="enable-background:new 0 0 430.113 430.114;" xml:space="preserve">
                    <g>
                        <path id="Facebook" d="M158.081,83.3c0,10.839,0,59.218,0,59.218h-43.385v72.412h43.385v215.183h89.122V214.936h59.805   c0,0,5.601-34.721,8.316-72.685c-7.784,0-67.784,0-67.784,0s0-42.127,0-49.511c0-7.4,9.717-17.354,19.321-17.354   c9.586,0,29.818,0,48.557,0c0-9.859,0-43.924,0-75.385c-25.016,0-53.476,0-66.021,0C155.878-0.004,158.081,72.48,158.081,83.3z" fill="#FFFFFF"/>
                    </g>

                </svg> Compartir en Facebook
            </span>
        </a>
        <a class="btn btn--sm bg--twitter compartir-nota-tw" href="#">
            <span class="btn__text">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve"  width="16px" height="15px">
                    <g>
                        <g>
                            <path d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411    c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513    c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101    c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104    c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194    c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485    c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z" fill="#FFFFFF"/>
                        </g>
                    </g>
                </svg> Compartir en Twitter
            </span>
        </a>
        <a class="btn btn--sm bg--googleplus compartir-nota-gp" href="#">
            <span class="btn__text">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="15px"
                     viewBox="0 0 458.246 458.246" style="enable-background:new 0 0 458.246 458.246;" xml:space="preserve">
                    <g>
                        <path style="fill:#FFF;" d="M160.777,259.368h71.594c-12.567,35.53-46.603,61.004-86.45,60.71
                              c-48.349-0.357-88.327-39.035-90.204-87.349c-2.012-51.789,39.537-94.563,90.887-94.563c23.479,0,44.905,8.946,61.058,23.605
                              c3.826,3.473,9.65,3.495,13.413-0.047l26.296-24.749c4.112-3.871,4.127-10.408,0.027-14.292
                              c-25.617-24.269-59.981-39.396-97.876-40.136C68.696,80.969,0.567,147.238,0.004,228.078
                              c-0.568,81.447,65.285,147.649,146.6,147.649c78.199,0,142.081-61.229,146.36-138.358c0.114-0.967,0.189-33.648,0.189-33.648
                              H160.777c-5.426,0-9.824,4.398-9.824,9.824v35.999C150.953,254.97,155.352,259.368,160.777,259.368z"/>
                        <path style="fill:#FFF;" d="M414.464,206.99v-35.173c0-4.755-3.854-8.609-8.609-8.609h-29.604c-4.755,0-8.609,3.854-8.609,8.609
                              v35.173h-35.173c-4.755,0-8.609,3.854-8.609,8.609v29.604c0,4.755,3.854,8.609,8.609,8.609h35.173v35.173
                              c0,4.755,3.854,8.609,8.609,8.609h29.604c4.755,0,8.609-3.854,8.609-8.609v-35.173h35.173c4.755,0,8.609-3.854,8.609-8.609v-29.604
                              c0-4.755-3.854-8.609-8.609-8.609L414.464,206.99L414.464,206.99z"/>
                    </g>

                </svg> Compartir en GooglePlus
            </span>
        </a>
    </div>

    <?php
    storefront_init_structured_data();
    ?>

</article><!-- #post-## -->



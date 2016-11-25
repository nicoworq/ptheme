<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Home Normal
 *
 * @package storefront
 */
get_header();
?>

<?php
do_shortcode('[slider-worq]');

wc_get_template_part('content', 'credit-cards');
wc_get_template_part('content', 'back-top');
?>


<section id="home-category-preview">

    <div class="container">
        <div class="row">
            <div class="col-md-15">
                <ul class="category-list">
                    <?php
                    
                    //excluir promos
                    $promociones = get_term_by('slug', 'promociones', 'product_cat');


                    $args = array(
                        'taxonomy' => 'product_cat',
                        'hide_empty' => false,
                        'parent' => 0,
                        'exclude' => array( $promociones->term_id)
                    );
                    $categories = get_terms($args);
                    $i = 0;
                    foreach ($categories as $cat) {
                        $catEspecial = get_field('categoria_especial', $cat);
                        if ($catEspecial) {
                            continue;
                        }
                        $linkClass = $i === 0 ? 'active' : '';
                        ?>
                        <li>
                            <a href="#" class="<?php echo $linkClass; ?>" data-category-slug="<?php echo $cat->slug; ?>"><?php echo $cat->name ?></a>
                        </li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
            </div>
            <div class="category-list-container">

                <?php
                $i = 0;
                foreach ($categories as $cat) {
                    $catEspecial = get_field('categoria_especial', $cat);
                    if ($catEspecial) {
                        continue;
                    }
                    $productsClass = $i === 0 ? 'active' : '';
                    ?>
                    <div class="category-list-products <?php echo $productsClass; ?>" data-category-slug="<?php echo $cat->slug; ?>">
                        <?php
                        $args = array('category' => $cat->slug, 'per_page' => '4', 'columns' => '8',);
                        echo storefront_do_shortcode('product_category', $args);
                        ?>
                        <div class="clearfix"></div>
                        <a href="<?php echo get_term_link($cat->term_id, 'product_cat') ?>" class="category-preview-all bt-site">Ver más productos</a>
                    </div>
                    <?php
                    $i++;
                }
                ?>


            </div>

        </div>
    </div>
</section>

<section id="home-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo get_permalink(get_page_by_title('Blog')); ?>"><h2><span class="style1">#Pascal</span><span class="style2">Trends</span></h2></a>
            </div>
            <?php
            $blogArgs = array(
                'posts_per_page' => 3,
                'category_name' => 'noticias'
            );
            $blogHome = new WP_Query($blogArgs);


            if ($blogHome->have_posts()) {
                while ($blogHome->have_posts()) {
                    $blogHome->the_post();

                    $thumbUrl = wp_get_attachment_image_url(get_post_thumbnail_id(), 'blog-thumbnail');
                    ?>
                    <div class="col-md-3">
                        <a class="news-home" href="<?php the_permalink(); ?>">
                            <div class="news-home-thumbnail">
                                <img src="<?php echo $thumbUrl ?>" alt="<?php the_title(); ?>" />
                            </div>
                            <h3 class="news-home-title"><?php the_title(); ?></h3>
                        </a>

                    </div>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</section>

<section id="home-brands">
    <div id="home-brands-list">
        <?php
        $args2 = array(
            'taxonomy' => 'pa_marca',
            'hide_empty' => false,
        );
        $brands = get_terms($args2);
        foreach ($brands as $brand) {

            $thumb = get_field('imagen_thumbnail', $brand);
            $link = get_term_link($brand);
            ?>
            <a href="<?php echo $link; ?>" class="pascal-brand">
                <div class="pascal-brand-bg" style="background-image: url(<?php echo $thumb['url']; ?>);"></div>
            </a>
            <?php
        }
        ?>
    </div>
    <div id="home-brands-arrows">
        <div id="brand-arrow-next" class="brand-arrow">

            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g>
            <path d="M360.731,229.075l-225.1-225.1c-5.3-5.3-13.8-5.3-19.1,0s-5.3,13.8,0,19.1l215.5,215.5l-215.5,215.5
                  c-5.3,5.3-5.3,13.8,0,19.1c2.6,2.6,6.1,4,9.5,4c3.4,0,6.9-1.3,9.5-4l225.1-225.1C365.931,242.875,365.931,234.275,360.731,229.075z
                  "/>
            </g>

            </svg>

        </div>
        <div id="brand-arrow-prev" class="brand-arrow">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 477.175 477.175" style="enable-background:new 0 0 477.175 477.175;" xml:space="preserve">
            <g>
            <path d="M145.188,238.575l215.5-215.5c5.3-5.3,5.3-13.8,0-19.1s-13.8-5.3-19.1,0l-225.1,225.1c-5.3,5.3-5.3,13.8,0,19.1l225.1,225
                  c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1L145.188,238.575z"/>
            </g>
            </svg>
        </div>
    </div>

</section>

<?php wc_get_template_part('content', 'featured-1'); ?>
<?php wc_get_template_part('content', 'products-bottom'); ?>
<?php wc_get_template_part('content', 'navigation-bottom'); ?>
<?php wc_get_template_part('content', 'featured-2'); ?>

<?php
/**
 * Functions hooked in to homepage action
 *
 * @hooked storefront_homepage_content      - 10
 * @hooked storefront_product_categories    - 20
 * @hooked storefront_recent_products       - 30
 * @hooked storefront_featured_products     - 40
 * @hooked storefront_popular_products      - 50
 * @hooked storefront_on_sale_products      - 60
 * @hooked storefront_best_selling_products - 70
 */
//do_action( 'homepage' ); 
?>
<?php
get_footer();

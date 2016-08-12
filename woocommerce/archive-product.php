<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');
?>

<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
//do_action('woocommerce_before_main_content');


$category = get_queried_object();

if (isset($category->term_id)) {
    $catID = $category->term_id;
} else {
    $catID = 0;
}

$isParent = TRUE;
$isSpecial = FALSE;
if (isset($category->parent) && $category->parent === 0) {
    //es padre
    $idCategoryImg = $category->term_id;

    $isSpecial = get_field('categoria_especial', $category);
} else {
    // no es padre
    $isParent = FALSE;

    $idCategoryImg = isset($category->parent) ? $category->parent : 0;
}
add_filter('loop_shop_columns', 'loop_columns');

function loop_columns() {
    $category = get_queried_object();
    if (is_search()) {
        return 5;
    } else {
        if (isset($category->parent)) {
            return $category->parent === 0 ? 5 : 4;
        } else {
            return 4;
        }
    }
}

if (is_search()) {
    $background = "";
} else {
    $categoryImgThumbID = get_woocommerce_term_meta($idCategoryImg, 'thumbnail_id', true);
    $categoryImgSrc = wp_get_attachment_image_src($categoryImgThumbID, 'full');
    $background = "background-image:url({$categoryImgSrc[0]})";
}
?>

<section id="archive-header" style="<?php echo $background; ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="archive-header-content">
                    <h1>
                        <?php
                        if (!$isSpecial) {
                            worq_page_title();
                        }
                        ?>
                    </h1> 
                </div>
            </div>
        </div>
    </div>
</section>

<?php
/**
 * woocommerce_archive_description hook.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
//do_action('woocommerce_archive_description');
?>

<?php if (have_posts()) : ?>

    <?php
    /**
     * woocommerce_before_shop_loop hook.
     *
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    //do_action('woocommerce_before_shop_loop');
    ?>

    <section id="archive-filters">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="archive-breadcrumb">
                        <?php
                        worq_breadcrumb();
                        ?>
                    </div>
                    <div class="archive-filter-order">
                        <?php
                        wc_get_template('loop/result-count.php');
                        woocommerce_catalog_ordering();
                        ?> 
                    </div>

                </div>
            </div>
        </div>
    </section>



    <section id="archive-products" class='<?php echo $isParent ? 'parent-cat' : 'child-cat'; ?>'>

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php
                    if ($isParent) {
                        echo '<ul class="category-list category-list-inline category-list-archive">';
                        $marcas = get_term_by('slug', 'marcas', 'product_cat');

                        $args = array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => false,
                            'parent' => $category->term_id,
                        );
                        $childCategories = get_terms($args);

                        foreach ($childCategories as $cat) {
                            ?>
                            <li>
                                <a href="<?php echo get_term_link($cat) ?>" data-category-slug="<?php echo $cat->slug; ?>"><?php echo $cat->name ?></a>
                            </li>
                            <?php
                        }
                        echo '</ul>';
                    }
                    ?>

                    <?php
                    /**
                     * woocommerce_sidebar hook.
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
                    if (!$isParent && !is_search()) {
                        get_sidebar('subcategorias');
                    }
                    ?>

                    <div id="primary">
                        <?php woocommerce_product_loop_start(); ?>

                        <?php //woocommerce_product_subcategories();            ?>



                        <?php while (have_posts()) : the_post(); ?>

                            <?php wc_get_template_part('content', 'product'); ?>

                        <?php endwhile; // end of the loop.                ?>

                        <?php woocommerce_product_loop_end(); ?>

                        <?php
                        /**
                         * woocommerce_after_shop_loop hook.
                         *
                         * @hooked woocommerce_pagination - 10
                         */
                        do_action('woocommerce_after_shop_loop');
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </section>

<?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="no-results-archive">
                    <h2>Opss ! Lo sentimos</h2>
                    <h3>No se han encontrado productos</h3>
                </div>

            </div>
        </div>
    </div>

    <?php wc_get_template('loop/no-products-found.php'); ?>

<?php endif; ?>




<div class="clearfix"></div>
<?php
get_footer('shop');

<?php
global $categories;
?>

<section id="home-products-bottom">
    <h2>Viví lo último en computación</h2>
    <h3>Seleccionamos los mejores productos para vos</h3>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="category-list category-list-inline">
                    <?php
                    $i = 0;
                    foreach ($categories as $cat) {
                        $linkClass = $i === 0 ? 'active' : '';
                        $listarHome = get_field('listar_home', $cat);
                        if (!$listarHome) {
                            continue;
                        }

                        $catEspecial = get_field('categoria_especial', $cat);
                        if ($catEspecial) {
                            continue;
                        }
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
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="category-list-container">

                    <?php
                    $i = 0;
                    foreach ($categories as $cat) {
                        $catEspecial = get_field('categoria_especial', $cat);
                        if ($catEspecial) {
                            continue;
                        }
                        $listarHome = get_field('listar_home', $cat);
                        if (!$listarHome) {
                            continue;
                        }
                        $productsClass = $i === 0 ? 'active' : '';
                        ?>
                        <div class="category-list-products <?php echo $productsClass; ?>" data-category-slug="<?php echo $cat->slug; ?>">
                            <?php
                            $args = array('category' => $cat->slug, 'per_page' => '5', 'columns' => '10');
                            echo storefront_do_shortcode('product_category', $args);
                            ?>
                            <div class="clearfix"></div>
                            <a href="<?php echo get_term_link($cat->term_id, 'product_cat') ?>" class="category-preview-all bt-site bt-site-yellow">Ver más productos</a>
                        </div>

                        <?php
                        $i++;
                    }
                    ?>

                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>

</section>
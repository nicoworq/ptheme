<section id="home-navigation-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                wp_nav_menu(
                        array(
                            'theme_location' => 'secondary',
                            'container' => '',
                            'menu_id' => 'nav-secondary-bottom',
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
                ?><ul class="secondary-nav-special-cats">
                    <?php
                    foreach ($catsMagic as $cat) {
                        $color = get_field('color_categoria', $cat);
                        $link = esc_url(get_term_link($cat));
                        $img = get_field('imagen_categoria_menu', $cat);
                        echo "<li>"
                        . "<a href='{$link}' style='background-color:{$color}' title='{$cat->name}'>"
                        . "<div class='cat-especial-header-bg' style='background-image:url({$img['sizes']['medium']});'></div><span>{$cat->name}</span></a>"
                        . "</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="destacado-secundario" class="destacados-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="destacado-secundario-col1">


                    <?php
                    //destacado secundario1

                    $secundario1Args = array(
                        'post_type' => 'destacado_home',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'activo',
                                'value' => TRUE,
                                'compare' => '=',
                            ),
                            array(
                                'key' => 'ubicacion',
                                'value' => 'secundario1',
                                'compare' => '=',
                            ),
                        ),
                        'posts_per_page' => 1,
                    );
                    $secundario1 = new WP_Query($secundario1Args);

                    if ($secundario1->have_posts()) {

                        while ($secundario1->have_posts()) {
                            $secundario1->the_post();
                            $image = get_field('imagen');
                            ?>

                            <a class="destacado-home" id="destacado-secundario1" style="background-image:url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">

                            </a>

                            <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="destacado-secundario-col2">

                    <div class="destacado-secundario-row">
                        <div class="destacado-secundario-col3">
                            <?php
//destacado secundario2

                            $secundario2Args = array(
                                'post_type' => 'destacado_home',
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key' => 'activo',
                                        'value' => TRUE,
                                        'compare' => '=',
                                    ),
                                    array(
                                        'key' => 'ubicacion',
                                        'value' => 'secundario2',
                                        'compare' => '=',
                                    ),
                                ),
                                'posts_per_page' => 1,
                            );
                            $secundario2 = new WP_Query($secundario2Args);

                            if ($secundario2->have_posts()) {

                                while ($secundario2->have_posts()) {
                                    $secundario2->the_post();
                                    $image = get_field('imagen');
                                    ?>

                                    <a class="destacado-home" id="destacado-secundario2" style="background-image:url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                                        
                                    </a>

                                    <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                        <div class="destacado-secundario-col3">
                            <?php
//destacado secundario3

                            $secundario3Args = array(
                                'post_type' => 'destacado_home',
                                'meta_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'key' => 'activo',
                                        'value' => TRUE,
                                        'compare' => '=',
                                    ),
                                    array(
                                        'key' => 'ubicacion',
                                        'value' => 'secundario3',
                                        'compare' => '=',
                                    ),
                                ),
                                'posts_per_page' => 1,
                            );
                            $secundario3 = new WP_Query($secundario3Args);

                            if ($secundario3->have_posts()) {

                                while ($secundario3->have_posts()) {
                                    $secundario3->the_post();
                                    $image = get_field('imagen');
                                    ?>

                                    <a class="destacado-home" id="destacado-secundario3" style="background-image:url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                                        
                                    </a>

                                    <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="destacado-secundario-row">
                        <?php
//destacado secundario3

                        $secundario4Args = array(
                            'post_type' => 'destacado_home',
                            'meta_query' => array(
                                'relation' => 'AND',
                                array(
                                    'key' => 'activo',
                                    'value' => TRUE,
                                    'compare' => '=',
                                ),
                                array(
                                    'key' => 'ubicacion',
                                    'value' => 'secundario4',
                                    'compare' => '=',
                                ),
                            ),
                            'posts_per_page' => 1,
                        );
                        $secundario4 = new WP_Query($secundario4Args);

                        if ($secundario4->have_posts()) {

                            while ($secundario4->have_posts()) {
                                $secundario4->the_post();
                                $image = get_field('imagen');
                                ?>

                                <a class="destacado-home" id="destacado-secundario4" style="background-image:url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                                    
                                </a>

                                <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
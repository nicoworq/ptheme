<section id="destacado-primario" class="destacados-home">

    <div class="destacado-primario-col1">
        <?php
//destacado primario1

        $primario1Args = array(
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
                    'value' => 'primario1',
                    'compare' => '=',
                ),
            ),
            'posts_per_page' => 1,
        );
        $primario1 = new WP_Query($primario1Args);

        if ($primario1->have_posts()) {

            while ($primario1->have_posts()) {
                $primario1->the_post();
                $image = get_field('imagen');
                $image_hover = get_field('imagen_hover');
                ?>

                <a class="destacado-home" id="destacado-primario1" style="background-image: url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                    <?php
                    if ($image_hover) {
                        ?>
                        <div class="destacado-home-img-hover" style="background-image: url(<?php echo $image_hover['url'] ?>);">

                        </div>
                    <?php } ?>                    
                </a>

                <?php
            }
        }
        wp_reset_postdata();
        ?>
    </div>

    <div class="destacado-primario-col2">

        <div class="destacado-primario-row">
            <div class="destacado-primario-col3">
                <?php
//destacado primario2

                $primario2Args = array(
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
                            'value' => 'primario2',
                            'compare' => '=',
                        ),
                    ),
                    'posts_per_page' => 1,
                );
                $primario2 = new WP_Query($primario2Args);

                if ($primario2->have_posts()) {

                    while ($primario2->have_posts()) {
                        $primario2->the_post();
                        $image = get_field('imagen');
                        $image_hover = get_field('imagen_hover');
                        ?>

                        <a class="destacado-home" id="destacado-primario2" style="background-image: url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                            <?php
                            if ($image_hover) {
                                ?>
                                <div class="destacado-home-img-hover" style="background-image: url(<?php echo $image_hover['url'] ?>);">

                                </div>
                            <?php } ?>

                        </a>

                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="destacado-primario-col3">
                <?php
//destacado primario3

                $primario3Args = array(
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
                            'value' => 'primario3',
                            'compare' => '=',
                        ),
                    ),
                    'posts_per_page' => 1,
                );
                $primario3 = new WP_Query($primario3Args);

                if ($primario3->have_posts()) {

                    while ($primario3->have_posts()) {
                        $primario3->the_post();
                        $image = get_field('imagen');
                        $image_hover = get_field('imagen_hover');
                        ?>

                        <a class="destacado-home" id="destacado-primario3" style="background-image: url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                            <?php
                            if ($image_hover) {
                                ?>
                                <div class="destacado-home-img-hover" style="background-image: url(<?php echo $image_hover['url'] ?>);">

                                </div>
                            <?php } ?>

                        </a>

                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="destacado-primario-row">
            <div class="destacado-primario-col3">
                <?php
//destacado primario4

                $primario4Args = array(
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
                            'value' => 'primario4',
                            'compare' => '=',
                        ),
                    ),
                    'posts_per_page' => 1,
                );
                $primario4 = new WP_Query($primario4Args);

                if ($primario4->have_posts()) {

                    while ($primario4->have_posts()) {
                        $primario4->the_post();
                        $image = get_field('imagen');
                        $image_hover = get_field('imagen_hover');
                        ?>

                        <a class="destacado-home" id="destacado-primario4"  style="background-image: url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                            <?php
                            if ($image_hover) {
                                ?>
                                <div class="destacado-home-img-hover"  style="background-image: url(<?php echo $image_hover['url'] ?>);">

                                </div>
                            <?php } ?>

                        </a>

                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="destacado-primario-col3">
                <?php
//destacado primario5

                $primario5Args = array(
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
                            'value' => 'primario5',
                            'compare' => '=',
                        ),
                    ),
                    'posts_per_page' => 1,
                );
                $primario5 = new WP_Query($primario5Args);

                if ($primario5->have_posts()) {

                    while ($primario5->have_posts()) {
                        $primario5->the_post();
                        $image = get_field('imagen');
                        $image_hover = get_field('imagen_hover');
                        ?>

                        <a class="destacado-home" id="destacado-primario5" style="background-image: url(<?php echo $image['url'] ?>);" href="<?php echo get_field('link'); ?>" title="<?php the_title(); ?>">
                            <?php
                            if ($image_hover) {
                                ?>
                                <div class="destacado-home-img-hover" style="background-image: url(<?php echo $image_hover['url'] ?>);">
                                    
                                </div>
                            <?php } ?>
                          
                        </a>

                        <?php
                    }
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
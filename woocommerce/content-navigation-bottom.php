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
                ?>
            </div>
        </div>
    </div>
</section>
<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package storefront
 */
if (!is_active_sidebar('sidebar-subcategorias')) {
    return;
}
?>

<div id="secondary" class="widget-area filter-sidebar" role="complementary">
    <h2 class="filter-title">Filtros</h2>
    <?php dynamic_sidebar('sidebar-subcategorias'); ?>
</div><!-- #secondary -->

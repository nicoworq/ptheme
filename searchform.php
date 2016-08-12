
<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label>
        <span class="screen-reader-text">Buscar:</span>
        <input type="search" class="search-field" placeholder="Buscar posteos …" value="" name="s">
        <input type="hidden" name="post_type" value="post">
    </label>
    <input type="submit" class="search-submit" value="Buscar">
</form>
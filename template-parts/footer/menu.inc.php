<?php
list('footer_menu' => $menu_id) = (array) get_nav_menu_locations();
$menu_items = wp_get_nav_menu_items($menu_id);
if (!empty($menu_items)) { ?>
<ul class="footer-menu">
    <?php foreach ((array) $menu_items as $menu_item) { ?>
        <li><a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li>
    <?php } ?>
</ul>
<?php } ?>

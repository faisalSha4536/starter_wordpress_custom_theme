<?php
$menu_class = \PRACTICE_3\Inc\Menu::get_instance();
$header_menu_id = $menu_class->menu_id('PRACTICE_header_menu'); // Use the correct menu location key
$header_menus = wp_get_nav_menu_items($header_menu_id);
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo home_url('/'); ?>">
      <?php
      if (has_custom_logo()) {
        the_custom_logo();
      }
      ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
      if (!empty($header_menus) && is_array($header_menus)) {
      ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
          foreach ($header_menus as $menu) {
            if (!$menu->menu_item_parent) {
              $childs = $menu_class->child_menus($header_menus, $menu->ID);
              $has_child = !empty($childs) && is_array($childs);

              if (!$has_child && intval($menu->menu_item_parent) === 0) {
          ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?= esc_url($menu->url) ?>"><?= esc_html($menu->title) ?></a>
                </li>
              <?php
              } else {
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="<?= esc_url($menu->url) ?>" id="navbarDropdown<?= $menu->ID ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= esc_html($menu->title) ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown<?= $menu->ID ?>">
                    <?php
                    foreach ($childs as $child) {
                    ?>
                      <li><a class="dropdown-item" href="<?= esc_url($child->url) ?>"><?= esc_html($child->title) ?></a></li>
                    <?php
                    }
                    ?>
                  </ul>
                </li>
          <?php
              }
            }
          }
          ?>
        </ul>
      <?php
      }
      ?>

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

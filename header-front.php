<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php wp_head(); ?>
    </head>
    <body>
      <!-- <h3>This is only used on the front page</h3> -->
      <?php wp_nav_menu( array ( 'theme_locaiton' => 'header_nav', 'menu_id' => 'header_nav' ) ); ?>

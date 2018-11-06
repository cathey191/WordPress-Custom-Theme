    <?php
      $footerText = get_theme_mod('footer_text_setting');
      if (strlen($footerText) > 0 ):
    ?>
      <footer>
        <div class="row">
          <div class="col text-center">
            <p><?= get_theme_mod('footer_text_setting'); ?></p>
          </div>
        </div>
      </footer>
    <?php endif; ?>
    <?php wp_footer(); ?>
  </body>
</html>

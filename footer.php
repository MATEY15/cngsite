    
    <?php if(!is_404() and !get_field('footer')) { ?>
    <?php if(get_field('email','ts') or get_field('phone','ts') or get_field('address','ts')) { ?>
    <div id="footer-scroll"></div>
    <footer class="footer" id="footer">
      <div class="container">
        <div class="footer-head"><a class="logo-footer" href="<?php bloginfo('url'); ?>/"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>"></a></div>
        <div class="footer-foot">
          <div class="footer-contact">
            <?php if(get_field('email','ts')) { ?>
            <div class="contact-items">
              <h4 class="name">EMAIL</h4><i class="icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-mail.svg" alt=""></i>
              <div class="footer-contact--info"><a href="mailto:<?php echo get_field('email','ts'); ?>"><?php echo get_field('email','ts'); ?></a></div>
            </div>
            <?php } if(get_field('phone','ts')) { ?>
            <div class="contact-items">
              <h4 class="name">PHONE</h4><i class="icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-phone.svg" alt=""></i>
              <div class="footer-contact--info"><a href="tel:<?php echo esc_html(str_replace(array(' ','(',')','-'),'',get_field('phone','ts'))); ?>"><?php echo get_field('phone','ts'); ?></a></div>
            </div>
            <?php } if(get_field('address','ts')) { ?>
            <div class="contact-items">
              <h4 class="name">FIND US</h4><i class="icon"><img src="<?php bloginfo('template_url'); ?>/img/icon-marker.svg" alt=""></i>
              <div class="footer-contact--info">
                <p><?php echo get_field('address','ts'); ?></p>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </footer>
    <?php } ?>
    <?php } ?>

    <script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/template.js"></script>
    <?php wp_footer(); ?>

  </body>
</html>
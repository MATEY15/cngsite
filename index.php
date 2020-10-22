<?php get_header(); ?>
    
    <main class="main">
      <section class="blog-main">
        <div class="container">

          <?php if(have_posts()): ?> 	
          <div class="blog-main--wrapper" id="load">
            <?php while(have_posts()): the_post(); ?> 
            <div class="blog-main--items">
              <?php if(has_post_thumbnail()){ $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'post',true); ?>
              <a class="blog-img--link" href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumb[0]); ?>" alt="<?php the_title(); ?>"></a>
              <?php } ?>
              <div class="blog-main--items-text full-blog--items">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo get_the_excerpt(); ?></p>
                <span class="date"><?php the_time("F j, Y"); ?></span>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <?php if (  $wp_query->max_num_pages > 1 ) : ?>
		  <script type="text/javascript">
			var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
			var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
			var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
			var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
		  </script>
          <div class="wrapper-button--blog"><a class="button button-gray" id="load-btn" href="#">Show More</a></div>
          <?php endif; endif; ?>

        </div>
      </section>
    </main>
 
<?php get_footer(); ?>
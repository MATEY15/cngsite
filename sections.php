<?php get_header(); ?>

    <main class="main">
    <?php if(have_rows('sections')): while(have_rows('sections')): the_row(); ?>
    
      <?php if( get_row_layout() == 'b1' ): ?>

      <section class="blog-main">
        <div class="container">
          <div class="blog-post <?php if(get_sub_field('picture')) { echo 'blog-main--post-v2'; } else { echo 'blog-main--post-v1'; } ?>">
            <?php if(get_sub_field('title')) { ?>
            <h1><?php echo get_sub_field('title'); ?></h1>
            <?php } if(get_sub_field('picture')) { $img = get_sub_field('picture'); ?>
            <img class="<?php echo get_sub_field('align'); ?>" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
            <?php } echo get_sub_field('text'); ?>
          </div>
        </div>
      </section>

      <?php elseif( get_row_layout() == 'b2' ): ?>

      <div class="bloch">
        <?php if(have_rows('texts')): while(have_rows('texts')): the_row(); ?>
        <div class="section section-animate">
          <div class="home-sections">
            <div class="container">
              <?php if(get_sub_field('title')) { ?>
              <div class="heading-default">
                <h4 class="animate-item"><?php echo get_sub_field('title'); ?></h4>
              </div>
              <?php } echo get_sub_field('text'); ?>
              <?php if(get_sub_field('button') and get_sub_field('link')) { ?>
              <div class="button-wrapper"><a<?php if(get_sub_field('new')) { echo ' target="_blank"'; } ?> class="button animate-item" href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('button'); ?></a></div>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php endwhile; endif; ?>
        <?php if(have_rows('slider')): ?>
        <div class="section section-slider">
          <div class="container">
            <div class="home-slider">
              <?php while(have_rows('slider')): the_row(); $img = get_sub_field('picture'); ?>
              <div class="slider-items slider-animate" data-duration=".4">
                <div class="slider-items--img"><img src="<?php echo $img['sizes']['slider']; ?>" alt="<?php echo $img['alt']; ?>"></div>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>

      <?php elseif( get_row_layout() == 'b3' ): ?>

      <div class="bloch">
        <?php if(have_rows('blocks')): ?>
        <div class="section">
          <div class="container">
            <div class="image-main offset-padding--image-main">
                <?php $i = 2; while(have_rows('blocks')): the_row(); $i++; $i++; ?>
              <div class="image-main--items" data-duration=".<?php echo $i; ?>">
                <?php if(get_sub_field('link')) { ?><a<?php if(get_sub_field('new')) { echo ' target="_blank"'; } ?> href="<?php echo get_sub_field('link'); ?>"><?php } ?>
                    <?php if(get_sub_field('picture')) { $img = get_sub_field('picture'); ?>
                    <span class="img-wrapper"><img src="<?php echo $img['sizes']['block']; ?>" alt="<?php echo $img['alt']; ?>"></span>
                    <?php } if(get_sub_field('title')) { ?>
                    <span class="img-main--name"><?php echo get_sub_field('title'); ?></span>
                    <?php } ?>
                <?php if(get_sub_field('link')) { ?></a><?php } ?>
              </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if(have_rows('texts')): while(have_rows('texts')): the_row(); ?>
        <div class="section section-animate">
          <div class="home-sections">
            <div class="container">
              <?php if(get_sub_field('title')) { ?>
              <div class="heading-default">
                <h4 class="animate-item"><?php echo get_sub_field('title'); ?></h4>
              </div>
              <?php } echo get_sub_field('text'); ?>
              <?php if(get_sub_field('button') and get_sub_field('link')) { ?>
              <div class="button-wrapper"><a<?php if(get_sub_field('new')) { echo ' target="_blank"'; } ?> class="button animate-item" href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('button'); ?></a></div>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php endwhile; endif; ?>
        <?php if(get_sub_field('indent')) { ?><div class="height-125 modile-disable"></div><?php } ?>
      </div>

      <?php elseif( get_row_layout() == 'b4' ): ?>
      
      <section class="section-contact">
        <div class="container">
            <?php echo do_shortcode(get_sub_field('form')); ?>
        </div>
      </section>

      <?php endif; ?>

    <?php endwhile; endif; ?>
    </main>
	   
<?php get_footer(); ?>
<?php

register_nav_menus(array('primary'=>__('Main menu'), 'primary0'=>__('Links')));
add_filter( 'wpcf7_autop_or_not', '__return_false' );
add_theme_support( 'title-tag' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'post',576,400,true);
	add_image_size( 'block',360,360,true);
	add_image_size( 'slider',360,460,true);
}

if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

remove_action('wp_head','feed_links_extra', 3);
remove_action('wp_head','feed_links', 2);
remove_action('wp_head','rsd_link');
remove_action('wp_head','wlwmanifest_link');
remove_action('wp_head','wp_generator'); 
remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','rel_canonical');
remove_action( 'wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head','wp_shortlink_wp_head', 10, 0 );

function my_revisions_to_keep( $revisions ) { return 0; }
add_filter( 'wp_revisions_to_keep', 'my_revisions_to_keep' );

function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );

add_filter('tiny_mce_before_init', 'tinymce_init');
function tinymce_init( $init ) {
    $init['extended_valid_elements'] .= ', span[style|id|nam|class|lang]';
    $init['verify_html'] = false;
    return $init;
}

function true_load_posts(){
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';
	$q = new WP_Query($args);
	if( $q->have_posts() ): while($q->have_posts()): $q->the_post(); global $post;
?>
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
<?php 
    endwhile; endif; wp_reset_postdata(); die(); 
}
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
?>
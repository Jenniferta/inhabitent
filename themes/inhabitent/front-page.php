
<?php get_header();?>

  <div class="hero-background">
    <div class = "hero-banner">
      <img src="<?php echo get_template_directory_uri() ?>/images/inhabitent-logo-full.svg" alt="inhabitentlogo">
    </div>
  </div>


<div class="shopcontainer">
  <h1> SHOP STUFF </h1>
  <div class="shopstuff">
<!--The do eat sleep wear loop-->
  <section class="product-info container">
  <?php $product_types = get_terms(array (
    'taxonomy'=>'product-type',
    'hide_empty'=>false
      ));
      if (!empty($product_types)&& !is_wp_error($product_type)) :?>
        <?php foreach ( $product_types as $product_type ): ?>

          <div class="single-product-type">
            <img src="<?php echo get_template_directory_uri() ?>/images/product-type-icons/<?php echo $product_type->slug ?>.svg " alt="<p><?php echo $term->description; ?></p>">
            <p><?php echo $product_type->description ?></p>
            <h3><a href="<?php echo get_term_link($product_type) ?>"><?php echo $product_type->name?> Stuff</a></h3>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
  </div>
</div>

  <div class="journal-container">
    <h1> INHABITENT JOURNAL </h1>
      <div class = "featured">
        <?php
        query_posts('posts_per_page=3');
        if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <img src=<?php echo the_post_thumbnail_url(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
            <p><a href="<?php the_permalink(); ?>">Read Entry</a></p>
        <?php endwhile; ?>
       </div>
    </div>

<section class="adventure">
<h1> LATEST ADVENTURES </h1>
  <div class="adventure1">
    <h2>Getting back to nature in a canoe</ph2>
    <p>Read More</p>
   </div>

  <div class="adventure2">
    <h2>A Night with Friend's at the beach</h2>
    <p>Read More</p>
  </div>

  <div class="adventure3">
    <h2>Taking in the view at Big Mountain</h2>
    <p>Read More</p>
  </div>
<div class="adventure4">
  <h2>Skygazing at the Night Sky</h2>
  <p>Read More</p>
</div>

More Adventures

</section>

  </div>
</body>
<!--The WP_Query task -->


<?php get_footer();?>
